<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeApicontroller extends Controller
{

    public function view(){
       $data = Employee::all();

      return response()->json($data);//share api
    }

    function create(Request $req){
        $employee = new Employee;
    $employee->name = $req->username;
    $employee->email = $req->email;
    $employee->city = $req->city;
    $employee->gender = $req->gender;
    $employee->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
    $employee->save(); //insert api through data

    }
    function delete(Request$req){
        Employee::find(10)->delete();//delete api through data
    }

    function update(Request$req){
        $employee =  Employee::find($req->id);
    $employee->name = $req->name;
    $employee->email = $req->email;
    $employee->city = $req->city;
    $employee->gender = $req->gender;
    $employee->hobbies = json_encode($req->hobbies); // Convert hobbies array to JSON
    $employee->save(); //insert api through data

    }
    //
}
