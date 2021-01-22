<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Livestock;

class OrderController extends Controller
{
    public function index()
    {
        $batas = 5;
        $jumlah_order = Order::count();
        $order = Order::paginate($batas);
        $no = $batas *($order->currentPage()-1);

        $order_sukses = Order::where('status','Sukses')->get();
        $order_menunggu = Order::where('status','Menunggu')->get();
        $order_batal = Order::where('status','Tolak')->get();
        $order_kirim = Order::where('status','Kirim')->get();

        $sapi = Livestock::where('jenis','cow')->get();
        $kambing = Livestock::where('jenis','goat')->get();
        $domba = Livestock::where('jenis','sheep')->get();
        
        $jumlah_sukses = $order_sukses->count();
        $jumlah_menunggu = $order_menunggu->count();
        $jumlah_batal = $order_batal->count();
        $jumlah_kirim = $order_kirim->count(); 

        return view('manajemen.order.order_index', compact('order',
        'sapi',
        'kambing',
        'domba',
        'no',
        'jumlah_order',
        'jumlah_sukses',
        'jumlah_menunggu',
        'jumlah_batal',
        'jumlah_kirim'));
    }

    public function create()
    {
        return view('manajemen.order.create_order');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'telephone' => 'required|numeric',
            'total_livestock' => 'required|numeric',
            'tgl_beli' => 'required',
            'address' => 'required',
        ]);


        $order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->telephone = $request->telephone;
        $order->total_livestock = $request->total_livestock;
        $order->message = $request->message;
        $order->tgl_beli = $request->tgl_beli;
        $order->tgl_antar = $request->tgl_antar;
        $order->address = $request->address;
        $order->manager_notes = $request->manager_notes;        
        $order->status = "Menunggu";

        $order->save();

        $order->kode = $order->id ."-". $order->created_at ."-".  $order->name;

        $order->tgl_pesan = $order->created_at;
        
        $order->save();

        return redirect('/manager/order')->with('pesan','Data Order Berhasil Disimpan');
    }

    public function customerStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'telephone' => 'required|numeric',
            'total_livestock' => 'required|numeric',
            'tgl_beli' => 'required',
            'address' => 'required',
        ]);


        $order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->telephone = $request->telephone;
        $order->total_livestock = $request->total_livestock;
        $order->message = $request->message;
        $order->tgl_beli = $request->tgl_beli;
        $order->tgl_antar = $request->tgl_antar;
        $order->address = $request->address;
        $order->manager_notes = $request->manager_notes;        
        $order->status = "Menunggu";

        $order->save();

        $order->kode = $order->id ."-". $order->created_at ."-".  $order->name;

        $order->tgl_pesan = $order->created_at;
        
        $order->save();

        return redirect('/')->with('pesan','Pesanan Anda Telah Kami Simpan, Terima Kasih');
    }

    public function show($id)
    {
        $batas = 5;
        $order =  Order::find($id);
        $orderId = $order->id;

        $sapi = Livestock::where('jenis','cow')->where('status','Belum dibeli')->paginate($batas);
        $sapi_order = Livestock::where('order_id', $orderId )->where('jenis','cow')->get();

        $kambing = Livestock::where('jenis','goat')->where('status','Belum dibeli')->paginate($batas);
        $kambing_order = Livestock::where('order_id', $orderId )->where('jenis','goat')->get();
        
        $domba = Livestock::where('jenis','sheep')->where('status','Belum dibeli')->paginate($batas);
        $domba_order = Livestock::where('order_id', $orderId )->where('jenis','sheep')->get();
        
        return view ('manajemen.order.detail_order', compact('order',
        'sapi',
        'sapi_order',
        'kambing',
        'kambing_order',
        'domba',
        'domba_order'));
    }

    public function pilihHewan($id,$id_livestock)
    {
        $order =  Order::find($id);
        
        $livestock = Livestock::find($id_livestock);

        $livestock->order_id = $order->id;
        $livestock->status = "Sudah dibeli";
        $livestock->save();

        $orderId = $order->id;

        $batas = 5;
        // $order =  Order::find($id);

        $sapi = Livestock::where('jenis','cow')->where('status','Belum dibeli')->paginate($batas);
        $sapi_order = Livestock::where('order_id', $orderId )->where('jenis','cow')->get();

        $kambing = Livestock::where('jenis','goat')->where('status','Belum dibeli')->paginate($batas);
        $kambing_order = Livestock::where('order_id', $orderId )->where('jenis','goat')->get();
        
        $domba = Livestock::where('jenis','sheep')->where('status','Belum dibeli')->paginate($batas);
        $domba_order = Livestock::where('order_id', $orderId )->where('jenis','sheep')->get();
        
        
        return view ('manajemen.order.detail_order', compact('order',
        'sapi',
        'sapi_order',
        'kambing',
        'kambing_order',
        'domba',
        'domba_order'));
    }


    public function hapusHewan($id,$id_livestock)
    {
        $order =  Order::find($id);
        
        $livestock = Livestock::find($id_livestock);

        $livestock->order_id = null;
        $livestock->status = "Belum dibeli";
        $livestock->save();

        $orderId = $order->id;

        $batas = 5;
        // $order =  Order::find($id);

        $sapi = Livestock::where('jenis','cow')->where('status','Belum dibeli')->paginate($batas);
        $sapi_order = Livestock::where('order_id', $orderId )->where('jenis','cow')->get();

        $kambing = Livestock::where('jenis','goat')->where('status','Belum dibeli')->paginate($batas);
        $kambing_order = Livestock::where('order_id', $orderId )->where('jenis','goat')->get();
        
        $domba = Livestock::where('jenis','sheep')->where('status','Belum dibeli')->paginate($batas);
        $domba_order = Livestock::where('order_id', $orderId )->where('jenis','sheep')->get();
        
        
        return view ('manajemen.order.detail_order', compact('order',
        'sapi',
        'sapi_order',
        'kambing',
        'kambing_order',
        'domba',
        'domba_order'));
    }

    public function edit($id)
    {
        $order =  Order::find($id);
        
        return view('manajemen.order.update_order', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'telephone' => 'required|numeric',
            'total_livestock' => 'required|numeric',
            'tgl_beli' => 'required',
            'tgl_antar' => 'required',
            'address' => 'required',
        ]);


        $order = Order::find($id);
        $order->name = $request->name;
        $order->email = $request->email;
        $order->telephone = $request->telephone;
        $order->total_livestock = $request->total_livestock;
        $order->message = $request->message;
        $order->tgl_beli = $request->tgl_beli;
        $order->tgl_antar = $request->tgl_antar;
        $order->address = $request->address;
        $order->manager_notes = $request->manager_notes;        
        $order->status = $request->status;

        $order->save();

        $orderId = $order->id;

        $batas = 5;
        $sapi = Livestock::where('jenis','cow')->where('status','Belum dibeli')->paginate($batas);
        $sapi_order = Livestock::where('order_id', $orderId )->where('jenis','cow')->get();

        $kambing = Livestock::where('jenis','goat')->where('status','Belum dibeli')->paginate($batas);
        $kambing_order = Livestock::where('order_id', $orderId )->where('jenis','goat')->get();
        
        $domba = Livestock::where('jenis','sheep')->where('status','Belum dibeli')->paginate($batas);
        $domba_order = Livestock::where('order_id', $orderId )->where('jenis','sheep')->get();

        return view ('manajemen.order.detail_order', compact('order',
        'sapi',
        'sapi_order',
        'kambing',
        'kambing_order',
        'domba',
        'domba_order'))->with('pesan','Data Hewan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order -> delete();

        return redirect('/manager/order')->with('pesan','Data Pesanan Berhasil Dihapus');
    }

    public function batal(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = "Tolak";
        $order->save();

        return redirect('/manager/order')->with('pesan','Pesanan Telah Dibatalkan');
    }

    public function sukses(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = "Sukses";
        $order->save();

        return redirect('/manager/order')->with('pesan','Pesanan Telah Sukses');
    }

    public function kirim(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = "Kirim";
        $order->save();

        return redirect('/manager/order')->with('pesan','Pesanan Sedang Dikirim ');
    }



}
