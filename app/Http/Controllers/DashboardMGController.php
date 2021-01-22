<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Livestock;

class DashboardMGController extends Controller
{
    public function index()
    {
        $batas = 5;
        $jumlah_hewan = Livestock::count();
        $order_menunggu = Order::where('status','Menunggu');
        $order = $order_menunggu->paginate($batas);
        $no = $batas *($order->currentPage()-1);
        
        $livestock_sudah_mati = Livestock::where('status','Mati')->get();
        $livestock_sudah_dibeli = Livestock::where('status','Sudah dibeli')->get();
        $livestock_belum_dibeli = Livestock::where('status','Belum dibeli')->get();

        $jumlah_stock = $livestock_belum_dibeli->count();
        $jumlah_dibeli = $livestock_sudah_dibeli->count();
        $jumlah_mati = $livestock_sudah_mati->count();    

        $order_sukses = Order::where('status','Sukses')->get();
        
        $order_batal = Order::where('status','Tolak')->get();
        $order_kirim = Order::where('status','Kirim')->get();

        $jumlah_sukses = $order_sukses->count();
        $jumlah_menunggu = $order_menunggu->count();
        $jumlah_batal = $order_batal->count();
        $jumlah_kirim = $order_kirim->count(); 

        
        return view('manajemen.manajemen_dashboard', compact(
        'order',
        'no',
        'jumlah_hewan',
        'jumlah_stock',
        'jumlah_dibeli',
        'jumlah_mati',
        
        'jumlah_sukses',
        'jumlah_menunggu',
        'jumlah_batal',
        'jumlah_kirim'
        ));
    }
}
