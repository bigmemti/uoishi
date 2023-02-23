<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('viewAny', [Task::class,$user]);

        $user->tokens()->delete();

        $token = auth()->user()->createToken('status_token');
        $tasks = $user->tasks()->latest()->paginate($user->task_per_page);

        return view('task.index', ['tasks' => $tasks, 'user' => $user,'token' => $token]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request, User $user)
    {
        Task::create($request->validated());

        return to_route('user.task.index', ['user' => $user])->with('success', __("Task Successfully created."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $user = $task->user_id;
        $task->delete();

        return to_route('user.task.index', ['user' => $user])->with('success', __("Task Successfully deleted."));
    }
}
