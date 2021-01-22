<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Book;
use File;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $batas = 5;
        $jumlah_buku = Book::count();
        $data_book = Book::orderBy('tgl_terbit','desc')->paginate($batas);
        $no = $batas *($data_book->currentPage()-1);

        return view('book.index_book', compact('data_book','no','jumlah_buku'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create_book');
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
            'judul' => 'required|string|max:20',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'foto'=>'required|image|mimes:jpeg,jpg,png',

        ]);


        $buku = new Book;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;


        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        $buku->foto = $namafile;
        $foto->move('images/', $namafile);


        $buku->save();
        
        return redirect('/book')->with('pesan','Data Buku Berhasil di simpan');
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
        $buku = Book::find($id);
        
        return view('book.update_book', compact('buku'));
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
            'judul' => 'required|string|max:20',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        $buku = Book::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;

        if (request('foto')!= null){
            File::delete('images/'.$buku->foto);

            $foto = request('foto');
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('images/', $namafile);
            $buku->foto = $namafile;
        }

        $buku->save();
        
        return redirect('/book')->with('pesan','Data Buku Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Book::find($id);
        $buku -> delete();

        $namafile = $buku->foto;
        File::delete('images/'.$namafile);


        return redirect('/book')->with('pesan','Data Buku Berhasil di deleted');

    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_book = Book::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $jumlah_buku = $data_book->count();
        $no = $batas *($data_book->currentPage()-1);

        return view('book.search_book', compact('data_book','no','jumlah_buku','cari'));
    }


}
