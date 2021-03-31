<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function register()
    {
        return view('frontend.register.index');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:2|max:20',
            'name' => 'required|min:2|max:20',
            'username' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'phone_number' => 'required',
            'level_id' => 'required',
            'photo' => 'required',
        ]);
        $society = new Society;
        $society->nik = $request->nik;
        $society->name = $request->name;
        $society->username = $request->username;
        $society->phone_number = $request->phone_number;
        $society->address = $request->address;
        $society->photo = $request->photo;
        $society->password = Hash::make($request->password);
        dd($society);
    }
}
