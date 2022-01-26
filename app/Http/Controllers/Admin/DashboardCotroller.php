<?php

namespace App\Http\Conrollers\Admin;

use Illuminate\Http\Request;
use App\Http\Contrillers\Controller;

class DashboardConroller extends Controller
{
 //Dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }
}
