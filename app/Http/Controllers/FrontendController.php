<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        $society->password = Hash::make($request->password);
        $photo = $request->file('photo');
        $tujuan_upload = 'avatar_society';
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $photo->move($tujuan_upload, $photo_name);
        $society->photo = $photo_name;
        $result = $society->save();
        if ($result) {
            return redirect()->route('user_login')->with(['success' => 'Register successfully !']);
        } else {
            return redirect()->back()->with(['success' => 'Society Data Failed Saved']);
        };
    }
    public function login()
    {
        return view('frontend.login.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'password' => 'required',
        ]);
        $nik = $request->nik;
        $pw = $request->password;
        $society = Society::where('nik', $nik)->first();
        if ($society != NULL) {
            if (Hash::check($pw, $society->password)) {
                Session::put('society_id', $society->id);
                Session::put('nik', $society->nik);
                Session::put('name', $society->name);
                Session::put('username', $society->username);
                Session::put('photo', $society->photo);
                Session::put('phone_number', $society->phone_number);
                Session::put('address', $society->address);
                return redirect()->route('user_home');
            } else {
                return redirect()->back()->with(['error' => 'Invalid nik or password']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Invalid nik or password']);
        }
    }

    public function home()
    {
        $nik = Session::get('nik');
        $data['count_complaint'] = Complaint::where('nik', $nik)->count();
        return view('frontend.complaint.index', $data);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function add_complaint()
    {
        return view('frontend.complaint.add');
    }
}
