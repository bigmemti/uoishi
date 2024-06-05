<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\UpdateStatusTaskRequest;

class TaskStatusController extends Controller
{
    public function change(UpdateStatusTaskRequest $request, Task $task)
    {
        $task->update(['status' => $request->status]);

        return ['data' => $task];
    }
}
