<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentcontroller extends Controller
{
    //

    function show(){
        return "student list";
    }

    function add(){
        return "add new student";
    }

    function delete(){
        return "delete student";
    }
    function about($name){
        return $name;
    }
}
