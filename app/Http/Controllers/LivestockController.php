<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livestock;
use File;

class LivestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $jumlah_hewan = Livestock::count();
        $livestock = Livestock::paginate($batas);
        $no = $batas *($livestock->currentPage()-1);

        $livestock_sudah_mati = Livestock::where('status','Mati')->get();
        $livestock_sudah_dibeli = Livestock::where('status','Sudah dibeli')->get();
        $livestock_belum_dibeli = Livestock::where('status','Belum dibeli')->get();

        
        $jumlah_stock = $livestock_belum_dibeli->count();
        $jumlah_dibeli = $livestock_sudah_dibeli->count();
        $jumlah_mati = $livestock_sudah_mati->count();    

        return view('manajemen.livestock', compact('livestock',
        'no',
        'jumlah_hewan',
        'jumlah_stock',
        'jumlah_dibeli',
        'jumlah_mati'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajemen.LivestockManajemen.create_livestock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'jenis' => 'required',
            'jenis_kelamin' => 'required',
            'warna' => 'required|string',
            'tgl_lahir' => 'required|date',
            'foto'=>'image|mimes:jpeg,jpg,png',

        ]);


        $livestock = new Livestock;
        $livestock->jenis = $request->jenis;
        $livestock->type = $request->type;
        $livestock->kode_kandang = $request->kode_kandang;
        $livestock->jenis_kelamin = $request->jenis_kelamin;
        $livestock->warna = $request->warna;
        $livestock->tgl_lahir = $request->tgl_lahir;
        $livestock->description = $request->description;
        $livestock->berat = $request->berat;

        
        $livestock->status = "Belum dibeli";

        if (request('foto')!= null){

            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();

            $livestock->foto = $namafile;
            $foto->move('images/livestock/', $namafile);
        }


        $livestock->save();

        if($livestock->jenis == "cow" ){
            $livestock->kode = "SP-".$livestock->id;
        }

        if($livestock->jenis == "goat" ){
            $livestock->kode = "GT-".$livestock->id;
        }

        if($livestock->jenis == "sheep" ){
            $livestock->kode = "SH-".$livestock->id;
        }
        
        $livestock->save();

        return redirect('/manager/livestock')->with('pesan','Data Hewan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livestock = Livestock::find($id);
        
        return view('manajemen.LivestockManajemen.detail_livestock', compact('livestock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livestock = Livestock::find($id);
        
        return view('manajemen.LivestockManajemen.update_livestock', compact('livestock'));
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
        $this->validate($request,[
            'jenis' => 'required',
            'jenis_kelamin' => 'required',
            'warna' => 'required|string',
            'tgl_lahir' => 'required|date',
            'foto'=>'image|mimes:jpeg,jpg,png',

        ]);


        $livestock = Livestock::find($id);
        $livestock->jenis = $request->jenis;
        $livestock->type = $request->type;
        $livestock->kode_kandang = $request->kode_kandang;
        $livestock->jenis_kelamin = $request->jenis_kelamin;
        $livestock->warna = $request->warna;
        $livestock->tgl_lahir = $request->tgl_lahir;
        $livestock->description = $request->description;
        $livestock->berat = $request->berat;

        if (request('foto')!= null){

            File::delete('images/livestock/'.$livestock->foto);
            
            $foto = request('foto');
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('images/livestock/', $namafile);
            $livestock->foto = $namafile;
            
        }

        $livestock->save();
        
        return redirect('/manager/livestock')->with('pesan','Data Hewan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livestock = Livestock::find($id);
        $livestock -> delete();

        $namafile = $livestock->foto;
        File::delete('images/livestock/'.$namafile);


        return redirect('/manager/livestock')->with('pesan','Data Hewan Berhasil Dihapus');
    }

    public function mati(Request $request, $id)
    {
        $livestock = Livestock::find($id);
        $livestock->status = "Mati";
        $livestock->save();

        return redirect('/manager/livestock')->with('pesan','Data Hewan Telah Diganti Dari Hidup Menjadi Sudah Mati');
    }

    public function sudahBeli(Request $request, $id)
    {
        $livestock = Livestock::find($id);
        $livestock->status = "Sudah dibeli";
        $livestock->save();

        return redirect('/manager/livestock')->with('pesan','Data Hewan Telah Diganti Dari Hidup Menjadi Sudah Dibeli');
    }

    public function belumBeli(Request $request, $id)
    {
        $livestock = Livestock::find($id);
        $livestock->status = "Belum dibeli";
        $livestock->save();

        return redirect('/manager/livestock')->with('pesan','Data Hewan Telah Diganti Dari Hidup Menjadi Belum Dibeli');
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;

        $jumlah_hewan = Livestock::count();
        $livestock = Livestock::where('kode','like',"%".$cari."%")
        ->orwhere('kode_kandang','like',"%".$cari."%")
        ->orwhere('jenis','like',"%".$cari."%")
        ->orwhere('type','like',"%".$cari."%")
        ->orwhere('warna','like',"%".$cari."%")
        ->orwhere('tgl_lahir','like',"%".$cari."%")
        ->orwhere('berat','like',"%".$cari."%")
        ->paginate($batas);;
        
        $no = $batas *($livestock->currentPage()-1);
        
        $livestock_sudah_mati = Livestock::where('status','Mati')->get();
        $livestock_sudah_dibeli = Livestock::where('status','Sudah dibeli')->get();
        $livestock_belum_dibeli = Livestock::where('status','Belum dibeli')->get();

        
        $jumlah_stock = $livestock_belum_dibeli->count();
        $jumlah_dibeli = $livestock_sudah_dibeli->count();
        $jumlah_mati = $livestock_sudah_mati->count();    

        return view('manajemen.LivestockManajemen.search_livestock', compact('livestock',
        'no',
        'jumlah_hewan',
        'jumlah_stock',
        'jumlah_dibeli',
        'jumlah_mati'));
    }
}
