<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use App\Models\Employee; // Import the Employee model
use App\Models\Student;
use App\Models\Student_register;



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
    $user->save(); //ORM method hai ye student ko database me save karega
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

// $student = new Employee;
//     $student->name = $req->username;
//     $student->email = $req->email;
//     $student->city = $req->city;
//     $student->gender = $req->gender;
//     $student->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
//     $student->save(); //ORM method hai ye student ko database me save karega
//     return redirect('/view');

}
function view_employee(){
$student = Employee::all(); //database me jitna student hai wo sab fetch ho jayega
$student = compact('student');


    return view('view-student')->with($student);


}
function edit_employee($id){
    $student = Employee::find($id);
    if(!is_null($student)){
        $student = compact('student');
        return view('/employeeform')->with($student);
    }else{
        return redirect('/view')->with('error', 'Employee not found!');
    }
}

function update_employee($id, Request $req){
    $student = Employee::find($id);

    $student->name = $req->username;
    $student->email = $req->email;
    $student->city = $req->city;
    $student->gender = $req->gender;
    $student->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
    $student->save(); //ORM m
    return redirect('/view')->with('success', 'Employee updated successfully!');

}
function delete_employee($id){
    $student = Employee::find($id);
    if ($student) {
        $student->delete();
        return redirect()->back();
    } else {
        return redirect('')->back();
    }
}


function studentdata (Request $req){

   $student= $req->validate([
  'studentname' => 'required|min:3|max:25',
  'mobileno'    => 'required|min:10',
  'email'       => 'required|email',
  'courses'     => 'required',
  'date'        => 'required',



     ]);





     $student = new Student;

      $student->studentname = $req->studentname;
    $student->email = $req->email;
    $student->mobileno =$req->mobileno;
    $student->gender = $req->gender;
    $student->courses = $req->courses;
    $student->date = $req->date;
    $student->save(); //ORM method hai ye student ko database me save karega

    return redirect()->route('student.student')->with('success', 'User added successfully!');

}

function studenttable(){
$student = student::all(); //database me jitna student hai wo sab fetch ho jayega
$student = compact('student');


    return view('view_student_data')->with($student);


}
public function delete_student($id)
{
    $student = Student::find($id);
    if ($student) {
        $student->delete();
        return redirect()->back()->with('success', 'Student deleted successfully!');
    } else {
        return redirect()->back()->with('error', 'Student not found.');
    }
}

public function studentregister(Request $req){
       $req->validate([
        'name'=> 'required|min:3|max:20',
        'email' => 'required|email',
        'mobileno'=>'required|max:10',
        'doj' =>'required',
        'gender' => 'required|in:male,female',
       ],[
        'name.required'=> 'name is required',
        'email.required'=> 'Email must be required',
        'mobileno.requred'=> 'Mobile no must b 10 digit',
        'doj.required'=> 'Date of joining must be required',
        'gender.required'=> 'please select gender',
       ]);

       $student = new Student_register;
        $student->name = $req->name;
        $student->email =$req->email;
        $student->mobileno = $req->mobileno;
        $student->doj = $req->doj;
        $student->gender =$req->gender;
        $student-> save();

        return redirect('views')->with('success','student inserted successfully');
}

function view_student(){
$student = Student_register::all(); //database me jitna student hai wo sab fetch ho jayega
$student = compact('student');


    return view('view_data_student')->with($student);


}


function edits_student($id){
    $student = Student_register::find($id);
    if(!is_null($student)){
        $datas = compact('student');
        return view('form_student')->with($datas);
    }else{
        return redirect('/views')->with('error', 'Employee not found!');
    }
}


function update_student($id, Request $req){
    $student = Student_register::find($id);

    $student->name = $req->name;
    $student->email = $req->email;
    $student->mobileno = $req->mobileno;
    $student->gender = $req->gender;
    $student->doj = $req->doj;
    $student->save(); //ORM m
    return redirect('/views')->with('success', 'Employee updated successfully!');








}

}


///registration

