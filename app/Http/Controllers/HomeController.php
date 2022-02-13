<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
@return
    public function __construct()
    {
        $this->middleware('auth');
    }

    @return

public function index()
{
    return view('home');
}
}
