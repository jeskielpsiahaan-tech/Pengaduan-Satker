<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // User: tampilkan form
    public function create()
    {
        return view('frontend.feedback.create');
    }

    // User: simpan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'jenis' => 'required|in:masukan,kritik',
            'isi'   => 'required|string',
        ]);

        Feedback::create($request->only('nama', 'email', 'jenis', 'isi'));

        return redirect()->route('feedback.create')->with('success', 'Terima kasih! Masukan/kritik Anda telah terkirim.');
    }

    // Admin: daftar semua feedback
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    // Admin: tandai sudah dibaca
    public function markRead($id)
    {
        Feedback::findOrFail($id)->update(['status' => 'sudah_dibaca']);
        return back()->with('success', 'Feedback ditandai sudah dibaca.');
    }

    // Admin: hapus
    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();
        return back()->with('success', 'Feedback berhasil dihapus.');
    }
}
