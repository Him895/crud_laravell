<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;



class Dashboardcontroller extends Controller
{

    function karan(){
        return 'Welcome' . Session::get('username');
    }

    function logouts(){
        session::flush();
        return redirect('/');
    }


     public function color()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('dashboard', compact('tasks'));
    }

    // Add a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Task added successfully.');
    }

    // Mark task as completed
    public function markComplete($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Task marked as completed.');
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
    //
}
