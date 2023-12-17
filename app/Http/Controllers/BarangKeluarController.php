<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangKeluar; 
use DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bk = \App\BarangKeluar::All(); 
        return view( 'barangkeluar.barangkeluar' , ['barangkeluar'  => $bk]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = \App\BarangKeluar::All(); 
        $akun2 = BarangKeluar::paginate(3); 

        $AWAL = 'BK'; 
        // karna array dimulai dari 0 maka kita tambah di awal data kosong 
        // bisa juga mulai dari "1"=>"I" 
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII"
        ,"IX","X", "XI","XII"); 
        $noUrutAkhir = \App\barangkeluar::max('id'); 
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
        return view('barangkeluar.input', ['nomor'=>$nomor,'nomorawal'=>$nomorawal,'akun'=>$akun,'akn'=>$akun2]);   
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Ke Tabel Barang_Keluar 
        $save_bk = new \App\BarangKeluar; 
        $save_bk->id=$request->get('notrans'); 
        $save_bk->nmcsbk=$request->get('nmcsbk');
        $save_bk->jnsbk=$request->get('jenis');    
        $save_bk->tglbk=$request->get('tgltr'); 
        $save_bk->memobk=$request->get('memo'); 
        $save_bk->jmbk=$request->get('total'); 
        $save_bk->save();         
         
        //Menyimpan Data Ke Tabel Persediaan
        //$savepr= new \App\Persediaan; 
        //$savepr->id=$request->get('idpr'); 
        //$savepr->jmlpr=$request->get('total'); 
        //$savepr->jmlcr=0; 
        //$savepr->save(); 
     
        //Menyimpan Data Ke Tabel Barang_Keluar_det 
        for($i=1;$i<=3;$i++)     
        { 
            $idbk=$request->get('id'); 
            $nil=$request->get('txt'.$i); 
 
            { 
                return redirect()->route( 'barangkeluar.index' ); 
            } 
            { 
                $savedet = new \App\BarangKeluarDet; 
                $savedet->id=$id;
                $savedet->nilcr=$nil; 
                $savedet->save(); 
            }                  
        }  
        return redirect()->route( 'Barangkeluar.index' ); 
    
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
        $barangkeluar_edit = \App\BarangKeluar::findOrFail($id); 
        return view( 'barangkeluar.edit' , ['barangkeluar'  => $barangkeluar_edit]); 

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
        $bk = \App\BarangKeluar::findOrFail($id); 
        $bk->delete(); 
        DB::table('barang_keluar_det')->where('id','=',$bk->id)->delete(); 
 
        return redirect()->route( 'barangkeluar.index'); 
    }
}
