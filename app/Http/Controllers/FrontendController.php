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
            'username' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'password' => 'required|min:6|max:20',
        ]);
        $society = new Society;
        $society->nik = $request->nik;
        $society->name = $request->name;
        $society->username = $request->username;
        $society->phone_number = $request->phone_number;
        $society->address = $request->address;
        $society->photo = $request->photo;
        $society->password = Hash::make($request->password);
    }
}
