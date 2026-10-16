<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use App\Models\Satker;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Date;

class FrontendController extends Controller
{
    public function register()
    {
        return view('frontend.register.index');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|min:2|max:50',
            'nik'          => 'required|min:2|max:20',
            'username'     => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'address'      => 'required',
            'password'     => 'required|min:6|max:20',
        ]);
        $society               = new Society;
        $society->name         = $request->name;
        $society->nik          = $request->nik;
        $society->username     = $request->username;
        $society->email        = $request->email;
        $society->phone_number = $request->phone_number;
        $society->address      = $request->address;
        $society->password     = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $photo      = $request->file('photo');
            $photo_name = time() . '_' . $photo->getClientOriginalName();
            $photo->move('avatar_society', $photo_name);
            $society->photo = $photo_name;
        }

        $result = $society->save();
        if ($result) {
            return redirect()->route('user_login')->with(['success' => 'Pendaftaran berhasil! Silakan login.']);
        }
        return redirect()->back()->with(['error' => 'Pendaftaran gagal, coba lagi.']);
    }

    public function register_satker()
    {
        return redirect()->route('user_register', ['tab' => 'satker']);
    }

    public function save_satker(Request $request)
    {
        $this->validate($request, [
            'kode_satker'     => 'required|unique:satker',
            'nama_satker'     => 'required',
            'nama_pelapor'    => 'required',
            'jabatan_pelapor' => 'nullable',
            'username'        => 'required|unique:satker',
            'email'           => 'required|email|unique:satker',
            'phone_number'    => 'nullable',
            'password'        => 'required|min:6|max:20',
        ]);
        $satker = new Satker;
        $satker->kode_satker     = $request->kode_satker;
        $satker->nama_satker     = $request->nama_satker;
        $satker->nama_pelapor    = $request->nama_pelapor;
        $satker->jabatan_pelapor = $request->jabatan_pelapor;
        $satker->username        = $request->username;
        $satker->email           = $request->email;
        $satker->phone_number    = $request->phone_number;
        $satker->password        = Hash::make($request->password);
        $result = $satker->save();
        if ($result) {
            return redirect()->route('user_login')->with(['success' => 'Pendaftaran Satker berhasil! Silakan login.']);
        }
        return redirect()->back()->with(['error' => 'Pendaftaran gagal, coba lagi.']);
    }

    public function login()
    {
        return view('frontend.login.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username    = $request->username;
        $pw          = $request->password;
        $tipe        = $request->tipe_pengadu ?? 'masyarakat';

        if ($tipe === 'satker') {
            $satker = Satker::where('username', $username)->first();
            if ($satker && Hash::check($pw, $satker->password)) {
                Session::put('satker_id',      $satker->id);
                Session::put('kode_satker',    $satker->kode_satker);
                Session::put('nama_satker',    $satker->nama_satker);
                Session::put('nama_pelapor',   $satker->nama_pelapor);
                Session::put('jabatan_pelapor',$satker->jabatan_pelapor);
                Session::put('username',       $satker->username);
                Session::put('email',          $satker->email);
                Session::put('phone_number',   $satker->phone_number);
                Session::put('photo',          $satker->photo);
                Session::put('tipe_pengadu',   'satker');
                Session::put('nik',            $satker->kode_satker);
                Session::put('name',           $satker->nama_satker);
                return redirect()->route('user_home');
            }
            return redirect()->back()->with(['error' => 'Username atau password salah']);
        }

        $society = Society::where('username', $username)->first();
        if ($society && Hash::check($pw, $society->password)) {
            Session::put('society_id',   $society->id);
            Session::put('nik',          $society->nik);
            Session::put('name',         $society->name);
            Session::put('username',     $society->username);
            Session::put('email',        $society->email);
            Session::put('photo',        $society->photo);
            Session::put('phone_number', $society->phone_number);
            Session::put('address',      $society->address);
            Session::put('tipe_pengadu', 'masyarakat');
            return redirect()->route('user_home');
        }
        return redirect()->back()->with(['error' => 'Username atau password salah']);
    }

    public function home()
    {
        if (Session::get('nik') != NULL) {
            $nik                    = Session::get('nik');
            $data['count_complaint'] = Complaint::where('nik', $nik)->count();
            return view('frontend.complaint.index', $data);
        }
        return redirect('/');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function add_complaint()
    {
        if (Session::get('nik') != NULL) {
            return view('frontend.complaint.add');
        }
        return redirect('/');
    }

    public function save_complaint(Request $request)
    {
        $this->validate($request, [
            'judul'                  => 'required|min:2|max:100',
            'kategori'               => 'required',
            'contents_of_the_report' => 'required|min:2',
            'photo'                  => 'nullable|file|max:10240',
        ]);

        $nik         = Session::get('nik');
        $tipe        = Session::get('tipe_pengadu', 'masyarakat');
        $complaint   = new Complaint;

        $complaint->judul                  = $request->judul;
        $complaint->kategori               = $request->kategori;
        $complaint->contents_of_the_report = $request->contents_of_the_report;
        $complaint->status                 = '0';
        $complaint->date_complaint         = Date::now()->format('Y-m-d');
        $complaint->nik                    = $nik;
        $complaint->tipe_pengadu           = $tipe;

        if ($tipe === 'satker') {
            $complaint->satker_id  = Session::get('satker_id');
        } else {
            $complaint->society_id = Session::get('society_id');
        }

        if ($request->hasFile('photo')) {
            $file      = $request->file('photo');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move('avatar_complaint', $file_name);
            $complaint->photo = $file_name;
        }

        $complaint->save();

        $response               = new Response;
        $response->complaint_id = $complaint->id;
        $response->save();

        return redirect()->back()->with(['success' => 'Pengaduan berhasil dikirim!']);
    }

    public function complaint()
    {
        if (Session::get('nik') != NULL) {
            $nik                 = Session::get('nik');
            $data['complaint']   = Complaint::where('nik', $nik)->get();
            return view('frontend.complaint.index1', $data);
        }
        return redirect('/');
    }

    public function detail_complaint($id)
    {
        if (Session::get('nik') != NULL) {
            $data['complaint'] = Complaint::with(['Society', 'Satker', 'Response'])->findOrFail($id);
            return view('frontend.complaint.detail', $data);
        }
        return redirect('/');
    }

    public function search_complaint(Request $request)
    {
        $tipe = $request->tipe ?? 'nonsatker';

        if ($tipe === 'satker') {
            $this->validate($request, [
                'kode_satker' => 'required|min:2|max:20',
            ]);
            $satker = Satker::where('kode_satker', $request->kode_satker)->first();
            if (!$satker) {
                return redirect()->back()->withInput()->with('error', 'Kode Satker tidak ditemukan.');
            }
            $data['complaints'] = Complaint::with(['Society', 'Satker', 'Response'])
                ->where('satker_id', $satker->id)->get();
            $data['search_key'] = $request->kode_satker;
        } else {
            $this->validate($request, [
                'nik' => 'required|min:2|max:20',
            ]);
            $data['complaints'] = Complaint::with(['Society', 'Satker', 'Response'])
                ->where('nik', $request->nik)
                ->where(function ($q) {
                    $q->where('tipe_pengadu', 'masyarakat')->orWhereNull('tipe_pengadu');
                })
                ->get();
            $data['search_key'] = $request->nik;
        }

        $data['tipe'] = $tipe;
        return view('frontend.search_result', $data);
    }

    public function track_complaint()
    {
        return view('frontend.track_complaint');
    }
}
