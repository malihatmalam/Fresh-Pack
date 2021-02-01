<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//MODEL CUSTOMER (Database, function, Relasi)
use App\Customer; 
//MODEL SECTOR ( karena akan mengambil : Database, function, Relasi dari model Sector)
use App\Sector;
//MENGGUNAKAN (AKSES) FILE, SEPERTI POST FILE DLL  
use File;



class customerController extends Controller
{
    /**
     * Menampilkan List Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Data Customer dengan Data Sector
        // Berdasaarkan tanggal terbaru
        $customer = Customer::with(['sector'])->orderBy('created_at', 'DESC')->paginate(10);

        // Mengirimkan list Customer ke index view
        return view('customers.index', compact('customer')); 

    }

    /**
     * Menampilkan Form Penambahan Customer.
     * Untuk Kedepan Fungsi ini tidak diperlukan
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil Data Sector 
        $sector = Sector::orderBy('name', 'DESC')->get();

        // Mengirimkan Data ke Create View
        return view('customers.create', compact('sector'));

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
            'name' => 'required|string',
            'email' => 'required|email|unique:customers', 
            // 'password' => 'required|string',
            // 'status' => 'required', // KARENA SETIAP CUSTOMER 
            'sector_id' => 'required|exists:sectors,id', //SECTOR_ID KITA CEK HARUS ADA DI TABLE SECTORS DENGAN FIELD ID 
        ]);

        // Menambahkan data dengan request yang tadi 
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Str::random(4).time().Str::random(4),
            'status' => 'Buatan Admin',
            'sector_id' => $request->sector_id,
            'phone' => '08'.rand(0000000000,9999999999),
            'balance' => 0,
            'point' => 0,
        ]);

        // Mengirimkan list Customer ke index view
        return redirect(route('customers.index'))->with(['success' => 'Customer Baru Ditambahkan']); 


        // Bila ada gambar profil
            // //JIKA FILENYA ADA
            // if ($request->hasFile('image')) {
            //     //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            //     $file = $request->file('image');
            //     //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            //     $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //     //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            //     $file->storeAs('public/products', $filename);
            

            //     // Menambahkan data dengan request yang tadi 
            //     $product = Product::create([
            //         'name' => $request->name,
            //         'slug' => $request->name,
            //         'description' => $request->description,
            //         'image' => $filename, //PASTIKAN MENGGUNAKAN VARIABLE FILENAM YANG HANYA BERISI NAMA FILE SAJA (STRING)
            //         'price' => $request->price,
            //         'typeunit' => $request->typeunit,
            //         'status' => $request->status,
            //         'category_id' => $request->category_id,
            //     ]);

            //     //JIKA SUDAH MAKA REDIRECT KE LIST PRODUK
            //     return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
            // }
        // <End> Jika ada gambar profil 
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

        // Ambil Data Customer Terkait Bedasarkan ID
        $customer = Customer::find($id); 

        // Mengambil Data Sector 
        $sector = Sector::orderBy('name', 'DESC')->get();

        // Mengirimkan Data ke Create View
        return view('customers.edit', compact('customer', 'sector')); 
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
            'email' => 'required|email|unique:customers', 
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

        return redirect(route('customers.index'))->with(['success' => 'Data Customer Diperbaharui']);
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
        return redirect(route('customers.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
}
