<?php

namespace App\Http\Controllers\Client\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Requests\UpdateStatusTaskRequest;

class TaskStatusController extends Controller
{
    public function change(UpdateStatusTaskRequest $request, Task $task)
    {
        $task->update([
            'status' => $request->status
        ]);

        return response()->json(TaskResource::make($task));
    }
}
