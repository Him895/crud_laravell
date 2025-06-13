<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use App\Models\Employee; // Import the Employee model


class Usercontroller extends Controller
{
    //
    function getuser(){
        return "himanshu gondane";
    }

    function getUserName($name){
        return "user name is ".$name;
    }
    function adminlogin(){
        return view('admin.login');
    }
    public function showUserForm() {
    $users = User::all(); // saare users database se fetch ho rahe hain
    return view('user-form', compact('users'));// ye view ko user-form page pe redirect karega aur users variable ko pass karega
}

function show(){
    return "student list"   ;
}

function add(){
    return "add new student";
}
    function addUser(Request $req) {
    $req->validate([
        'username' => 'required|min:3|max:20|Uppercase',
        'email' => 'required|email',
        'city' => 'required',
        'hobbies' => 'required|array',
        'gender' => 'required|in:male,female,other',
    ],[
       'username.required' => 'Username is required',
         'username.min' => 'Username must be at least 3 characters',
            'username.max' => 'Username must not exceed 20 characters',
        'email.required' => 'Email is required',
        'email.email' => 'Email must be a valid email address',
        'city.required' => 'City is required',
        'hobbies.required' => 'At least one hobby is required',
        'hobbies.array' => 'Hobbies must be an array',

    ]);


    $user = new User;
    $user->username = $req->username;
    $user->email = $req->email;
    $user->city = $req->city;
    $user->gender = $req->gender;
    $user->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
    $user->save(); //ORM method hai ye data ko database me save karega
    return redirect()->route('user.form')->with('success', 'User added successfully!');

}
function delete($id) {
    $user = User::find($id);
    if ($user) {
        $user->delete();
        return redirect()->route('user.form')->with('success', 'User deleted successfully!');
    } else {
        return redirect()->route('user.form')->with('error', 'User not found!');
    }
}

function edit($id) {
    $user = User::find($id);
    if ($user) {
        return view('edit-user', compact('user'));
    } else {
        return redirect()->route('user.form')->with('error', 'User not found!');
    }


}

public function update(Request $request, $id)
{
    $request->validate([
        'username' => 'required|min:3|max:20',
        'email' => 'required|email',
        'city' => 'required',
        'gender' => 'required|in:male,female,other',
        'hobbies' => 'required|array',
    ]);

    $user = User::findOrFail($id);
    $user->username = $request->username;
    $user->email = $request->email;
    $user->city = $request->city;
    $user->gender = $request->gender;
    $user->hobbies = json_encode($request->hobbies); // Store as JSON
    $user->save();

    return redirect()->route('user.form')->with('success', 'User updated successfully!');
}

function store(Request $req){
    // Handle form submission logic here

    $req->validate([
        'username' => 'required|min:3|max:20',
        'email' => 'required|email',
        'city' => 'required',
        'gender' => 'required|in:male,female,other',
        'hobbies' => 'required|array',

]);

$employee = new Employee;
    $employee->name = $req->username;
    $employee->email = $req->email;
    $employee->city = $req->city;
    $employee->gender = $req->gender;
    $employee->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
    $employee->save(); //ORM method hai ye data ko database me save karega
    return redirect('/view');

}
function view_employee(){
$employee = Employee::all(); //database me jitna data hai wo sab fetch ho jayega
$data = compact('employee');


    return view('view-data')->with($data);


}
function edit_employee($id){
    $employee = Employee::find($id);
    if(!is_null($employee)){
        $data = compact('employee');
        return view('/employeeform')->with($data);
    }else{
        return redirect('/view')->with('error', 'Employee not found!');
    }
}

function update_employee($id, Request $req){
    $employee = Employee::find($id);

    $employee->name = $req->username;
    $employee->email = $req->email;
    $employee->city = $req->city;
    $employee->gender = $req->gender;
    $employee->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
    $employee->save(); //ORM m
    return redirect('/view')->with('success', 'Employee updated successfully!');

}
function delete_employee($id){
    $employee = Employee::find($id);
    if ($employee) {
        $employee->delete();
        return redirect()->back();
    } else {
        return redirect('')->back();
    }
}


function studentdata (Request $req){
     $req->validate([
        'studentname' => 'req|min:3|max:25',
        'mobileno' => 'req|min:10',
        'email' => 'req|email',
        'courses' => 'req|array',
        'date'=> 'req|',
     ]);

}

}





