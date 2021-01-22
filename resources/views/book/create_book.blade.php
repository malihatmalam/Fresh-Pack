@extends('master')

@section('content')
<div class="container">
        <div class="container" >
                <h1>Tambah Buku</h1>
                @if(count($errors)>0)
                        <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                        </ul>
                @endif
        </div>
        <div class="container">
                <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                    <table >
                    <div class="container"> 
                                    <tr>
                                            <td>Judul</td>
                                            <td><input type="text" name="judul"></td>                                       
                                    </tr>
                                    <tr>
                                            <td>Penulis</td>
                                            <td><input type="text" name="penulis"></td>                                       
                                    </tr>
                                    <tr>
                                            <td>harga</td>
                                            <td><input type="text" name="harga"></td>                                       
                                    </tr>
                                    <tr>
                                            <td>Gambar</td>
                                            <td><input type="file" class="form-control" name="foto"></td>                                       
                                    </tr>
                                    <tr>
                                            <td>Tanggal Terbit</td>
                                            <td><input type="date" name="tgl_terbit"></td>                                       
                                    </tr>
                                    <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary"> Simpan </button>
                                                <a href="/book" class="btn btn-warning" > Kembali </A>
                                            </td>                                       
                                    </tr>
                        </div>
                    </table>
                </form>
                
        </div>
</div>
        
@endsection