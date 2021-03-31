<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function show($id)
    {
        $data['item'] = Complaint::with(['Society', 'Response'])->findOrFail($id);
        return view('admin.complaints.edit', $data);
    }

    public function save(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->status = $request->status;
        $result = $complaint->save();
        if ($result) {
            return redirect()->route('complaints.index')->with(['success' => 'Response has been updated']);
        } else {
            return redirect()->back();
        }
    }
}
