<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

// MODEL CATEGORY
use App\Category; 

class categoryController extends Controller
{
    /**
     * Menampilkan Data dar resource 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data Category dengan 
        // urutan tanggal pembuatan terbaru
        $category = Category::orderBy('created_at', 'DESC')->paginate(10);

        return view('categories.index', compact('category'));
    }


    /**
     * Menyimpan Data Baru Kedalam Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data 
        // sebelum memasukan kedalam database.
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);

        // FIELD slug AKAN DITAMBAHKAN KEDALAM COLLECTION $REQUEST
        $request->request->add(['slug' => $request->name]);

        // Memasukan data (create new record) kedalam database
        Category::create([          
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
        ]);

        // Meredirect ke halaman index dengan pesan 'success'
        return redirect(route('category.index'))->with(['success' => 'Kategori Telah Ditambahkan']);

    }


    /**
     * Menampilkan View Edit Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data sesuai id.
        $category = Category::find($id);
        

        // Menampilkan view edit Category
        return view('categories.edit', compact('category'));
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
        // Melakukan validasi data 
        // sebelum memasukan kedalam database.
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);

        // Mengambil data berdasarkan id yang dicari. 
        $category = Category::find($id);

        // Memasukan data (create new record) kedalam database
        Category::update([          
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Meredirect ke halaman index dengan pesan 'success'
        return redirect(route('category.index'))->with(['success' => 'Kategori Diperbaharui!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mengambil data berdasarkan id yang dicari. 
        $category = Category::find($id);

        // Menghapus data kategori
        $category->delete();

        // Meredirect ke halaman index dengan pesan 'success'
        return redirect(route('category.index'))->with(['success' => 'Kategori Dihapus!']);

    }

    //MUTATOR : untuk memodifikasi data sebelum data sebelum
    //data disimpan ke dalam database. 
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    //ACCESSOR : formating dilakukan setelah data diterima dari database. 
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
