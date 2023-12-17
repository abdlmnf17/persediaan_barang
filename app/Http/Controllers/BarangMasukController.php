<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\BarangMasuk; 
use DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bm = \App\BarangMasuk::All(); 
        return view( 'barangmasuk.barangmasuk' , ['barangmasuk'  => $bm]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = \App\BarangMasuk::All(); 
        $akun2 = BarangMasuk::paginate(3); 

        $AWAL = 'BM'; 
        // karna array dimulai dari 0 maka kita tambah di awal data kosong 
        // bisa juga mulai dari "1"=>"I" 
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII"
        ,"IX","X", "XI","XII"); 
        $noUrutAkhir = \App\barangmasuk::max('idbm'); 
        $nomorawal=$noUrutAkhir+1; 
        $no = 1; 
        if($noUrutAkhir) { 
            //echo "No urut surat di database : " . $noUrutAkhir; 
            //echo "<br>"; 
            $nomor=sprintf($AWAL . '-' ."%05s", abs($noUrutAkhir + 1));  
        }
        else 
        { 
        //echo "No urut surat di database : 0" ; 
        //echo "<br>"; 
        $nomor=sprintf($AWAL . '-' ."%05s", $no);  
        } 
        return view('barangmasuk.input', ['nomor'=>$nomor,'nomorawal'=>$nomorawal,'akun'=>$akun,'akn'=>$akun2]);   
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Menyimpan Data Ke Tabel Barang_Masuk 
         $save_bm = new \App\BarangMasuk; 
         $save_bm->idbm=$request->get('notrans'); 
         $save_bm->jnsbm=$request->get('jenis');    
         $save_bm->tglbm=$request->get('tgltr'); 
         $save_bm->memobm=$request->get('memo'); 
         $save_bm->jmbm=$request->get('total'); 
         $save_bm->save();         
          
         //Menyimpan Data Ke Tabel Barang_Masuk_det 
         for($i=1;$i<=3;$i++)     
         { 
             $idbm=$request->get('idbm'); 
             $nil=$request->get('txt'.$i); 
  
             { 
                 return redirect()->route( 'barangmasuk.index' ); 
             } 
            { 
                 $savedet = new \App\BarangMasukDet; 
                 $savedet->idbm=$idbm;  
                 $savedet->nilcr=$nil; 
                 $savedet->save(); 
             }                  
         }  
         return redirect()->route( 'Barangmasuk.index' ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangmasuk_edit = \App\BarangMasuk::findOrFail($id); 
        return view( 'barangmasuk.edit' , ['barangmasuk'  => $barangmasuk_edit]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bm = \App\BarangMasuk::findOrFail($id); 
        $bm->delete(); 
        DB::table('barang_masuk_det')->where('id','=',$bm->id)->delete(); 
 
        return redirect()->route( 'barangmasuk.index');
    }
}
