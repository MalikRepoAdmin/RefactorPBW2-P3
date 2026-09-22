<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Triage;

class TriaseController extends Controller
{
    public function index()
    {
        $instansi = "Unit Gawat Darurat SehatNusantara";
        return view('Triase', compact('instansi'));
    }

    public function proses(Request $request)
    {
        $instansi = "Unit Gawat Darurat SehatNusantara";
      
// Memastikan input wajib diisi, dan berupa angka
        $validated = $request->validate([
            'detak_jantung' => 'required|numeric|min:0',
            'kesadaran'     => 'required|string|in:baik,penurunan',
        ]);

        $detak_jantung = (int) $validated['detak_jantung'];
        $kesadaran = $validated['kesadaran'];
      
// Logika bisnis triase
        if ($kesadaran == "penurunan" || $detak_jantung > 130 || $detak_jantung < 40) {
            $kategori_triase = "TRIASE MERAH (Prioritas Utama - Penanganan Segera)";
            $warna_label = "red";
        } elseif ($detak_jantung >= 100 && $detak_jantung <= 130) {
            $kategori_triase = "TRIASE KUNING (Prioritas Kedua - Pengawasan Ketat)";
            $warna_label = "orange";
        } else {
            $kategori_triase = "TRIASE HIJAU (Prioritas Ketiga - Kondisi Stabil)";
            $warna_label = "green";
        }

        return view('Triase', [
            'instansi' => $instansi,
            'kategori_triase' => $kategori_triase,
            'warna_label' => $warna_label,
            'detak_jantung' => $detak_jantung,
            'kesadaran' => $kesadaran
        ]);
    }
}
