<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskValidationRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $email = Auth::user()->email;
        $tasks = Task::get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskValidationRequest $request)
    {
        try {

            $task = Task::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task created successfully');
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->with('error', 'Error creating task: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $task = Task::findOrFail($id);
            return view('tasks.edit', compact('task'));
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Error fetching task: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskValidationRequest $request, $id)
    {
        // return $request;
        try {
            $task = Task::findOrFail($id);

            $task->name = $request->input('name');
            $task->description = $request->input('description');
            $task->status = $request->input('status');
            $task->save();

            return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error updating task: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Error deleting task: ' . $e->getMessage());
        }
    }
}
