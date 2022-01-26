<?php
 namespace App\Http\Controllers\Admin\UserManagment;

 use App\User;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;

 class UserController extends Controller
 {
     @return

 public function index()
 {
     return view('admin.user_managment.users.index', [
         'users' => User::paginate(10)
     ]);
 }

 @return

 public function  create ()
 {

 }
 @param
 @return
 public function store(Request $request)
 {}
 }
