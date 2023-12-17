<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk; 
use App\Barangkeluar; 
use DB; 

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pr = \App\Persediaan::All(); 
        return view( 'persediaan.persediaan' , ['persediaan'  => $pr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persediaan.input'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan data kedalam tabel 
        $save_persediaan = new \App\Persediaan; 
        $save_persediaan->idpr=$request->get('kode'); 
        $save_persediaan->nmpr=$request->get('nama'); 
        $save_persediaan->jnspr=$request->get('jenis'); 
        $save_persediaan->jmlpr=$request->get('jumlah');
        $save_persediaan->save(); 

        return redirect()->route( 'persediaan.index' ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pr = \App\Persediaan::findOrFail($id); 
        //Query Mengambil Data Detail 
        $detail = DB::select('SELECT persediaan.idpr, persediaan.nmpr, kas_keluar_det.nilcr FROM kas_keluar_det, persediaan WHERE persediaan.id=kas_keluar_det.idakun AND idpr = :id', ['id' => $pr->id]); 
        return view( 'persediaan.detail' , ['persediaan'  => $pr, 'kaskeluardet' => $detail]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persediaan_edit = \App\Persediaan::findOrFail($id); 
        return view( 'persediaan.edit' , ['persediaan'  => $persediaan_edit]); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persediaan = \App\Persediaan::findOrFail($id); 
        $persediaan->idpr=$request->get('kode'); 
        $persedian->nmpr=$request->get('nama'); 
        $persediaan->jnspr=$request->get('jenis'); 
        $persediaan->jmlpr=$request->get('jumlah');
        $persediaan->save(); 
        return redirect()->route( 'persediaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
