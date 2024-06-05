<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskTrashController extends Controller
{
    public function index(User $user)
    {
        $tasks = $user->tasks()->onlyTrashed()->latest('deleted_at')->paginate($user->task_per_page);

        return view('task.trash', ['tasks' => $tasks, 'user' => $user]);
    }

    public function restore(Task $task)
    {
        $this->authorize('restore', $task);

        $task->restore();

        return to_route('user.task.trash',['user' => $task->user])->with('success', __("Task Successfully restored."));
    }
    
    public function forceDelete(Task $task)
    {
        $this->authorize('forceDelete', $task);

        $task->forceDelete();

        return to_route('user.task.trash',['user' => $task->user])->with('success', __("Task Successfully deleted."));
    }
}