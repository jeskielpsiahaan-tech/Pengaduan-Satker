<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocietyController extends Controller
{
    public function index()
    {
        $data['society'] = Society::all();
        return view('admin.society.index', $data);
    }

    public function create()
    {
        return view('admin.society.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:2|max:20',
            'username' => 'required|min:2|max:20',
            'password' => 'required|min:5|max:20',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        $society = new Society;
        $society->nik = $request->nik;
        $society->username = $request->username;
        $society->phone_number = $request->phone_number;
        $society->address = $request->address;
        $society->password = Hash::make($request->password);
        $society->save();
        if ($request->submit == "more") {
            return redirect()->route('society.create')->with(['success' => 'User has been saved !']);
        } else {
            return redirect()->route('society.index')->with(['success' => 'User has been saved']);
        };
    }
}
