<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Society;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data['complaints'] = Complaint::all()->count();
        $data['unprocessed'] = Complaint::where('status', '0')->count();
        $data['process'] = Complaint::where('status', 'process')->count();
        $data['finished'] = Complaint::where('status', 'finished')->count();
        $data['users'] = User::all()->count();
        $data['society'] = Society::all()->count();


        return view('admin.dashboards.index', $data);
    }
    public function welcome()
    {
        return view('frontend.home.index');
    }
}
