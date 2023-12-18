<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasukDet;
use App\BarangKeluarDet;
use App\BarangMasuk;
use App\BarangKeluar;
use Carbon\Carbon;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function generate(Request $request)
    {
        $periode = $request->input('periode', []);
        $startDate = Carbon::parse($periode['start_date'] ?? now())->startOfDay();
        $endDate = Carbon::parse($periode['end_date'] ?? now())->endOfDay();

        $barangMasuk = BarangMasuk::whereBetween('tglbm', [$startDate, $endDate])->get();
        $barangKeluar = BarangKeluar::whereBetween('tglbk', [$startDate, $endDate])->get();

        return view('laporan.result', compact('barangMasuk', 'barangKeluar', 'startDate', 'endDate'));
    }

    public function printPDF(Request $request)
    {
        // Logic untuk mengambil data barang masuk dan keluar sesuai periode
        $periode = $request->input('periode', []);
        $startDate = Carbon::parse($periode['start_date'] ?? now())->startOfDay();
        $endDate = Carbon::parse($periode['end_date'] ?? now())->endOfDay();

        $barangMasuk = BarangMasuk::whereBetween('tglbm', [$startDate, $endDate])->get();
        $barangKeluar = BarangKeluar::whereBetween('tglbk', [$startDate, $endDate])->get();

        // Generate PDF
        $pdf = PDF::loadView('pdf.laporan', ['barangMasuk' => $barangMasuk, 'barangKeluar' => $barangKeluar]);

        // Set nama file PDF
        $filename = 'laporan_' . date('YmdHis') . '.pdf';

        // Download atau tampilkan PDF
        return $pdf->download($filename);
    }
}
