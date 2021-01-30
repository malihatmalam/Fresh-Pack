<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

//MODEL PRODUCT (Database, function, Relasi)
use App\Product; 
//MODEL KATEGORI ( karena akan mengambil : Database, function, Relasi dari model Kategori)
use App\Category;
//MENGGUNAKAN (AKSES) FILE, SEPERTI POST FILE DLL  
use File;
//MASS UPLOAD

class productController extends Controller
{
    /**
     * Menampilkan List Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Data Product dengan Data Kategori
        // Berdasaarkan tanggal terbaru
        $product = Product::with(['category'])->orderBy('created_at', 'DESC')->paginate(10);

        // Mengirimkan list Product ke index view
        return view('products.index', compact('product')); 

    }

    /**
     * Menampilkan Form Penambahan Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil Data Kategori 
        $category = Category::orderBy('name', 'DESC')->get();

        // Mengirimkan Data ke Create View
        return view('products.create', compact('category'));

    }

    /**
     * Menambahkan Data Product kedalam Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data.
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'image' => 'required|image|mimes:png,jpeg,jpg', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            'price' => 'required|integer',
            'typeunit' => 'required|string',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id', //CATEGORY_ID KITA CEK HARUS ADA DI TABLE CATEGORIES DENGAN FIELD ID
        ]);

        //JIKA FILENYA ADA
        if ($request->hasFile('image')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('image');
            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/products', $filename);
        

            // Menambahkan data dengan request yang tadi 
            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->description,
                'image' => $filename, //PASTIKAN MENGGUNAKAN VARIABLE FILENAM YANG HANYA BERISI NAMA FILE SAJA (STRING)
                'price' => $request->price,
                'typeunit' => $request->typeunit,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            //JIKA SUDAH MAKA REDIRECT KE LIST PRODUK
            return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);

        }
    }

    /**
     * Display the specified resource.
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
        $product = Product::find($id); //AMBIL DATA PRODUK TERKAIT BERDASARKAN ID
        $category = Category::orderBy('name', 'DESC')->get(); //AMBIL SEMUA DATA KATEGORI
        return view('products.edit', compact('product', 'category')); //LOAD VIEW DAN PASSING DATANYA KE VIEW
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
        // Melakukan validasi data.
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:png,jpeg,jpg', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            'price' => 'required|integer',
            'typeunit' => 'required|string',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id', //CATEGORY_ID KITA CEK HARUS ADA DI TABLE CATEGORIES DENGAN FIELD ID
        ]);

        $product = Product::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        $filename = $product->image; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
      
        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/products', $filename);
              //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/products/' . $product->image));
        }
    
        // KEMUDIAN UPDATE PRODUK TERSEBUT
        $product->update([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'image' => $filename, //PASTIKAN MENGGUNAKAN VARIABLE FILENAM YANG HANYA BERISI NAMA FILE SAJA (STRING)
            'price' => $request->price,
            'typeunit' => $request->typeunit,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);
        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }

    /**
     * Menghapus data dari penyimpanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        File::delete(storage_path('app/public/products/' . $product->image));
        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $product->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
}
