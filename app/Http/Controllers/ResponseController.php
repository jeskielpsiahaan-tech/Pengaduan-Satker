<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ResponseController extends Controller
{
    public function show($id)
    {
        $data['item']     = Complaint::with(['Society', 'Satker', 'Response'])->findOrFail($id);
        $data['response'] = Response::where('complaint_id', $id)->first();
        return view('admin.complaints.edit', $data);
    }

    public function save(Request $request, $id)
    {
        $this->validate($request, [
            'response'     => 'required|min:2',
            'status'       => 'required',
            'file_balasan' => 'nullable|file|max:10240',
        ]);

        $complaint         = Complaint::findOrFail($id);
        $complaint->status = $request->status;
        $complaint->save();

        $response = Response::firstOrNew(['complaint_id' => $id]);
        $response->complaint_id   = $id;
        $response->response       = $request->response;
        $response->response_date  = Date::now()->format('Y-m-d');
        $response->user_id        = Auth::user()->id;

        if ($request->hasFile('file_balasan')) {
            // hapus file lama jika ada
            if ($response->file_balasan && file_exists(public_path('balasan/' . $response->file_balasan))) {
                unlink(public_path('balasan/' . $response->file_balasan));
            }
            $file      = $request->file('file_balasan');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('balasan'), $file_name);
            $response->file_balasan = $file_name;
        }

        $response->save();

        return redirect()->route('complaints.index')->with(['success' => 'Balasan berhasil disimpan']);
    }
}
