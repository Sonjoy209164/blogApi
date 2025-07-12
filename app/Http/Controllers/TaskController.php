<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    // Add a new task
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'title' => $request->title,
        ]);

        return response()->json($task, 201);
    }

    // Mark task as completed
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['is_completed' => true]);

        return response()->json($task);
    }

    // Get all pending tasks
    public function pending()
    {
        $tasks = Task::where('is_completed', false)->get();
        return response()->json($tasks);
    }
}
