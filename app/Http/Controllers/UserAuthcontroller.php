<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserAuthcontroller extends Controller
{
    // Show Registration Page
    public function showregister() {
        return view('register');
    }

    // Handle Registration
    public function register(Request $req) {
       echo $filename = $req->file('file')->getClientOriginalName();

       $req->file('file')->storeAs('public/uploads',$filename);


        $req->validate([
            'username' => 'required|min:3|max:20',
            'email'    => 'required|email|unique:login,email',
            'gender'   => 'required|in:male,female',
            'password' => 'required|min:4',
        ]);

        Login::create([
            'username' => $req->username,
            'email'    => $req->email,
            'gender'   => $req->gender,
            'password' => Hash::make($req->password),
            'file'     => $filename,
        ]);


        return redirect('login')->with('success', 'Registration successful! Please login.');
    }

    // Show Login Page
    public function showlogin() {
        return view('logint');
    }

    // Handle Login
    public function login(Request $req) {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])) {
            return redirect('/dashboard')->with('success', 'Login successful!');
        } else {
            return back()->with('error', 'Invalid credentials.');
        }
    }

    // Show Dashboard with Tasks
    public function dashboard() {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('dashboard', compact('tasks'));
    }

    // Logout
    public function logout(Request $req) {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }

    // task add karne wala function
    // ye function dashboard me task add karne ke liye hai
    public function store(Request $request) {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
        ]);

        Task::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
            'status'      => 'pending',
        ]);

        return redirect('dashboard')->with('success', 'Task added successfully.');
    }

    // complete hone ke bad mark karne wala function
    public function markComplete($id) {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Task marked as completed.');
    }

    // Delete wala task hai
    public function destroy($id) {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
}
