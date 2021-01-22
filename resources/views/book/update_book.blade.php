@extends('master')

@section('content')
<div class="container">
        <div class="container" >
                <h1>Update Buku</h1>
                @if(count($errors)>0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
        </div>
        <div class="container">
                <form action="{{ route('buku.update', $buku -> id) }}" method="post" enctype="multipart/form-data">
                @csrf
                    <table >
                    <div class="container"> 
                        <div class="form-group row">
                            <label for="judul_buku" class="col-sm-3 col-form-label" > Judul </label>
                            <div class="col-sm-9">
                                <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku -> judul }}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penuliss_buku" class="col-sm-3 col-form-label" > Penulis </label>
                            <div class="col-sm-9">
                                <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $buku -> penulis }}">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_buku" class="col-sm-3 col-form-label" > Harga </label>
                            <div class="col-sm-9">
                                <input type="text" id="harga" name="harga" class="form-control" value="{{ $buku -> harga }}">
                                
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_buku" class="col-sm-3 col-form-label" > Gambar </label>
                            <div>
                                <img src="{{ $buku->foto != null ? asset('images/'.$buku->foto) : asset('image-not-found.jpg') }}" style="width: 100px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga_buku" class="col-sm-3 col-form-label" > Upload Foto </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_terbit_buku" class="col-sm-3 col-form-label" > Tanggal Terbit </label>
                            <div class="col-sm-9">
                                <input type="text" id="tgl_terbit" name="tgl_terbit" class="form-control" value="{{ $buku -> tgl_terbit }}">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary"> Simpan </button>
                                    <a href="/book" class="btn btn-warning" > Kembali </a>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
                
        </div>
</div>
        
@endsection