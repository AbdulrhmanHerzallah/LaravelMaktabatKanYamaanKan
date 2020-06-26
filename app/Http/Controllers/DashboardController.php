<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //return man index page and return info
    public function index()
    {
        return view('dashboard.index');
    }
}
