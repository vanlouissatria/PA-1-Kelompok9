<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakMessageController extends Controller
{
    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        // Kirim email ke admin (sesuaikan dengan konfigurasi mail Anda)
        Mail::raw("Nama: {$request->nama}\nEmail: {$request->email}\nPesan: {$request->pesan}", function ($message) {
            $message->to('admin@geotoba.com')
                    ->subject('Pesan Baru dari Website');
        });

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }
}