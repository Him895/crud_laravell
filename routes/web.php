<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller; // Usercontroller ko import karna hai
use App\Http\Controllers\studentcontroller; // studentcontroller ko import karna hai
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;      // ← यहाँ जोड़ें




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');// ye view ko welcome page pe redirect karega
});



Route::view('/about','about');

Route::view('/user-form','user-form');
Route::post('/adduser', [Usercontroller::class, 'addUser'])->name('user.add');
// ye user controller ko call karega aur adduser function ko call karega

Route::get('/user-form', [Usercontroller::class, 'showUserForm'])->name('user.form');



Route::prefix('student')->group(function(){
    Route::view('/home','home');
    Route::get('/show',[Usercontroller::class,'show']);
Route::get('/add',[Usercontroller::class,'add']);
});



//Route groupeing with controller
Route::controller(studentcontroller::class)->group(function(){
    Route::get('show','show');// ye student controller ko call karega aur show function ko call karega
Route::get('add','add');// ye student controller ko call karega aur add function ko call karega
Route::get('delete','delete');// ye student controller ko call karega aur delete function ko call karega
Route::get('about/{name}','about');// ye student controller ko call karega aur about function ko call karega

});

Route::delete('/delete-user/{id}', [Usercontroller::class, 'delete'])->name('deleteuser');
Route::get('/edit-user/{id}', [Usercontroller::class, 'edit'])->name('edituser');
Route::put('/update-user/{id}', [Usercontroller::class, 'update'])->name('updateuser');


Route::view('/employeeform','employeeform');// ye view ko employeeform page pe redirect karega
Route::post('/addemployee', [Usercontroller::class, 'store'])->name('employee.add');
Route::get('/view', [Usercontroller::class, 'view_employee'])->name('employee.view');
Route::get('/edit/{id}', [Usercontroller::class, 'edit_employee'])->name('edit.employee');
Route::post('/update/{id}', [Usercontroller::class, 'update_employee'])->name('update.employee');
Route::get('/delete/{id}', [Usercontroller::class, 'delete_employee'])->name('delete.employee');

//comonted routes

Route::get('/componentform',function(){
    return view('component-form');// ye view ko componentform page pe redirect karega
});

//session routes
Route::get('get-session',function(Request $req){
    echo $req->session()->get('name');
     echo $req->session()->get('surname');

});// session ko view krne ke liye hai



Route::get('put-session',function(Request $req){
    $req->session()->put('name','Himansu');// session me name variable ko set karega
    $req->session()->put('surname','Gondane');
});// session ko set krne ke liye hai


Route::view('/studentform','studentform');
Route::post('/addstudent',[Usercontroller::class,'studentdata'])->name('add.student');



//Route:: redirect('/home','/');//ye jo redirect hai ye home ko welcome page pe redirect karega

//Route::get('/about/{name}',function($name){

    //return view('about',['name'=>$name]);// ye view ko about page pe redirect karega aur name variable ko pass karega
//});
//Route::get('user',[Usercontroller::class,'getuser']);// ye user controller ko call karega aur getuser function ko call karega
//Route::get('user/{name}',[Usercontroller::class,'getUserName']);// ye user controller ko call karega aur getUserName function ko call karega
//Route::get('admin',[Usercontroller::class,'adminlogin']);// ye user controller ko call karega aur adminlogin function ko call karega
