<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::with(['Society', 'Satker']);

        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('date_complaint', [$request->dari, $request->sampai]);
        } elseif ($request->filled('dari')) {
            $query->where('date_complaint', '>=', $request->dari);
        } elseif ($request->filled('sampai')) {
            $query->where('date_complaint', '<=', $request->sampai);
        }

        $data['complaints'] = $query->orderBy('date_complaint', 'desc')->get();
        $data['dari']    = $request->dari;
        $data['sampai']  = $request->sampai;
        return view('admin.complaints.index', $data);
    }
    public function show($id)
    {
        $data['complaint'] = Complaint::with(['Society', 'Satker'])->findOrFail($id);
        $data['response'] = Response::where('complaint_id', $id)->first();
        return view('admin.complaints.show', $data);
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        if ($complaint->photo && file_exists(public_path('avatar_complaint/' . $complaint->photo))) {
            unlink(public_path('avatar_complaint/' . $complaint->photo));
        }
        $complaint->delete();
        return redirect()->back()->with(['success' => 'Pengaduan berhasil dihapus']);
    }
}
