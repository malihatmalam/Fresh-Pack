<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//MODEL SECTOR ( karena akan mengambil : Database, function, Relasi dari model Sector)
use App\Sector;

//MODEL SECTOR DETAIL ( karena akan mengambil : Database, function, Relasi dari model Sector Detail)
use App\Sector_detail;

//MODEL CITY ( karena akan mengambil : Database, function, Relasi dari model City)
use App\City;

class sectorController extends Controller
{
    /**
     * Menampilkan List Sector.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Data Sector dengan Data Sector Detail
        // Berdasaarkan tanggal terbaru
        $sector = Sector::with(['sector_detail'])->orderBy('created_at', 'DESC')->paginate(5);

        // Mengambil Data City 
        $city = City::orderBy('name', 'ASC')->get();

        // Mengirimkan list Sector ke index view
        return view('sector.index', compact('sector', 'city')); 

    }

    /**
     * Menampilkan Form Penambahan Sector.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil Data City 
        $city = City::orderBy('name', 'ASC')->get();

        // Mengirimkan Data ke Create View
        return view('sectors.create', compact('city'));

    }

    /**
     * Menambahkan Data Customer kedalam Database.
     * Untuk Kedepan Fungsi ini tidak diperlukan
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data.
        $this->validate($request, [
            'name' => 'required|string|unique:sectors',
            'code' => 'required|string|max:3',
            'city_id' => 'required|exists:cities,id',
        ]);

        // Menambahkan data dengan request yang tadi 
        $sector = Sector::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        $city = City::find($request->city_id);

        $sector_detail = Sector_detail::create([
            'sector_id' => $sector->id,
            'city_id' => $request->city_id,
            'name' => $city->type.' '.$city->name,
        ]);

        // Mengirimkan list Sector ke index view
        return redirect(route('sector.index'))->with(['success' => 'Sector Baru Ditambahkan']); 
    }

    /**
     * Menambahkan Data Sector Detail kedalam Database. (Yang berhubungan )
     * Untuk Kedepan Fungsi ini tidak diperlukan
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSectorDetail(Request $request)
    {
        // Melakukan validasi data.
        $this->validate($request, [
            'sector_id' => 'required|exists:sectors,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        // Mengambil data dengan request yang tadi 
        $sector = Sector::find($request->sector_id);
        $city = City::find($request->city_id);

        $sector_detail = Sector_detail::create([
            'sector_id' => $sector->id,
            'city_id' => $request->city_id,
            'name' => $city->type.' '.$city->name,
        ]);

        // Mengirimkan list Sector ke index view
        return redirect(route('sector.index'))->with(['success' => 'Penambahan Area Baru di Sector : '.$sector->name.', Telah Sukses']); 
    }

    /**
     * Display the specified resource.
     * Tidak diperlukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Menampilkan Form Edit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // Ambil Data Sector Terkait Bedasarkan ID
        $sector = Sector::find($id)->with(); 

        // Mengambil Data Sector Detail
        $sector = Sector::orderBy('name', 'DESC')->get();

        // Mengirimkan Data ke Create View
        return view('customer.edit', compact('customer', 'sector')); 
    }

    /**
     * Mengupdate Data Customer
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi data.
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:customers', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            // 'password' => 'required|string',
            // 'status' => 'required', // KARENA SETIAP CUSTOMER 
            'sector_id' => 'required|exists:sectors,id', //SECTOR_ID KITA CEK HARUS ADA DI TABLE SECTORS DENGAN FIELD ID 
        ]);

        // Ambil Data Customer Terkait Bedasarkan ID
        $customer = Customer::find($id);
        
        // Jika ada gambar profil
            // $filename = $product->image; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
            // //JIKA ADA FILE GAMBAR YANG DIKIRIM
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //     //MAKA UPLOAD FILE TERSEBUT
            //     $file->storeAs('public/products', $filename);
            //     //DAN HAPUS FILE GAMBAR YANG LAMA
            //     File::delete(storage_path('app/public/products/' . $product->image));
            // }
        // <End> Jika ada gambar profil 
    
        // KEMUDIAN UPDATE PRODUK TERSEBUT
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'sector_id' => $request->sector_id,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect(route('customer.index'))->with(['success' => 'Data Customer Diperbaharui']);
    }

    /**
     * Menghapus data dari penyimpanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Ambil Data Customer Terkait Bedasarkan ID
        $customer = Customer::find($id);

        // Jika ada gambar profil
            // //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
            // File::delete(storage_path('app/public/products/' . $product->image));
            // //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        // <End> Jika ada gambar profil

        $customer->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('customer.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
}
