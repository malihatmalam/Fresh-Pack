<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livestock;
use File;


class SheepController extends Controller
{
    public function index()
    {
        $batas = 5;
        
        $livestock = Livestock::where('jenis','sheep')
        ->where('status','Belum dibeli')
        ->paginate($batas);

        $jumlah_hewan = $livestock->count();
        
        $livestock_jenis = "sheep";
        $no = $batas *($livestock->currentPage()-1);

        $livestock_sudah_mati = Livestock::where('jenis','sheep')->where('status','Mati')->get();
        $livestock_sudah_dibeli = Livestock::where('jenis','sheep')->where('status','Sudah dibeli')->get();
        $livestock_belum_dibeli = Livestock::where('jenis','sheep')->where('status','Belum dibeli')->get();

        
        $jumlah_stock = $livestock_belum_dibeli->count();
        $jumlah_dibeli = $livestock_sudah_dibeli->count();
        $jumlah_mati = $livestock_sudah_mati->count();    

        return view('manajemen.sheep.sheep_show', compact('livestock',
        'livestock_jenis',
        'no',
        'jumlah_hewan',
        'jumlah_stock',
        'jumlah_dibeli',
        'jumlah_mati'));
    }
}
