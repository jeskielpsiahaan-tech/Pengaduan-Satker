<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboards.index');
    }
    public function welcome()
    {
        return view('frontend.home.index');
    }
}
