<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk;
use App\BarangKeluar;
use App\BarangMasukDet;
use App\BarangKeluarDet;
use Carbon\Carbon;
use PDF;

class PrintController extends Controller
{
    public function printLaporan(Request $request)
    {
        // Logic untuk mengambil data barang masuk dan keluar sesuai periode
        $periode = $request->input('periode');
        $barangMasuk = BarangMasuk::whereBetween('tglbm', [$periode['start'], $periode['end']])->get();
        $barangKeluar = BarangKeluar::whereBetween('tglbk', [$periode['start'], $periode['end']])->get();

        // Generate PDF
        $pdf = PDF::loadView('pdf.laporan', ['barangMasuk' => $barangMasuk, 'barangKeluar' => $barangKeluar]);

        // Set nama file PDF
        $filename = 'laporan_' . date('YmdHis') . '.pdf';

        // Download atau tampilkan PDF
        return $pdf->download($filename);
    }
}
