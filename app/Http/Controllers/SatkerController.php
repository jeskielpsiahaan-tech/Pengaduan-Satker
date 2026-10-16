<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SatkerController extends Controller
{
    public function index()
    {
        $data['satker'] = Satker::all();
        return view('admin.satker.index', $data);
    }

    public function create()
    {
        return view('admin.satker.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_satker'     => 'required|unique:satker',
            'nama_satker'     => 'required',
            'nama_pelapor'    => 'required',
            'jabatan_pelapor' => 'nullable',
            'username'        => 'required|unique:satker',
            'email'           => 'required|email|unique:satker',
            'phone_number'    => 'nullable',
            'password'        => 'required|min:6',
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
        $satker->save();
        return redirect()->route('satker.index')->with(['success' => 'Satker berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $data['satker'] = Satker::findOrFail($id);
        return view('admin.satker.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_satker'     => 'required',
            'nama_satker'     => 'required',
            'nama_pelapor'    => 'required',
            'jabatan_pelapor' => 'nullable',
            'username'        => 'required',
            'email'           => 'required|email',
            'phone_number'    => 'nullable',
        ]);
        $satker = Satker::findOrFail($id);
        $satker->kode_satker     = $request->kode_satker;
        $satker->nama_satker     = $request->nama_satker;
        $satker->nama_pelapor    = $request->nama_pelapor;
        $satker->jabatan_pelapor = $request->jabatan_pelapor;
        $satker->username        = $request->username;
        $satker->email           = $request->email;
        $satker->phone_number    = $request->phone_number;
        if ($request->password) {
            $satker->password = Hash::make($request->password);
        }
        $satker->save();
        return redirect()->route('satker.index')->with(['success' => 'Satker berhasil diupdate']);
    }

    public function destroy($id)
    {
        Satker::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Satker berhasil dihapus']);
    }
}
