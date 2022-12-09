<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function change(Request $request, Task $task)
    {
        $task->update(['status' => $request->status]);

        return ['data' => $task];
    }
}
