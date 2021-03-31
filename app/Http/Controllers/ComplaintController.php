<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $data['complaints'] = Complaint::all();
        return view('admin.complaints.index', $data);
    }
    public function show($id)
    {
        $data['complaint'] = Complaint::findOrFail($id);
        $data['response']
        return view('admin.complaints.show', $data);
    }
}
