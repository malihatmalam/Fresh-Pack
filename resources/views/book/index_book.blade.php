@extends('master')

@section('content')
<div class="container">
        @if(Session::has('pesan'))
                <div class="alert alert-success">{{Session::get('pesan')}}</div>
        @endif

        <div class="container" >
                <h1>Buku</h1>

        </div>
        <div class="container">
                <p> 
                        <a href="{{ route('buku.create') }}" class="btn btn-primary">
                                Tambah Buku
                        </a>
                </p>

                        <div class="container">
                                <form action="{{ route('buku.search') }}" method="get">@csrf
                                        <input type="text" name="kata" class="form-control" placeholder="Cari..." 
                                        style="width:30%; display:inline; margin-top:10px; margin-bottom:10px; float:right;">
                                </form>
                        </div>
                
                <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th> No </th>
                                        <th> Judul </th>
                                        <th> Penulis </th>
                                        <th> Harga </th>
                                        <th> Tanggal Terbit </th>
                                        <th> Foto </th>                                       
                                </tr>
                        </thead>
                        <tbody>
                                @foreach ($data_book as $buku)
                                <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $buku->judul }}</td>
                                        <td>{{ $buku->penulis }}</td>
                                        <td>{{ "Rp ".number_format($buku->harga,2,',','.')  }}</td>
                                        <td>
                                                <img src="{{ $buku->foto != null ? 
                                                                asset('images/'.$buku->foto) : 
                                                                asset('image-not-found.jpg') }}" 
                                                                        style="width: 100px">
                                        </td>
                                        <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                                        <td>
                                                <form action="{{ route('buku.deleted', $buku -> id )}}" method="POST">
                                                        @csrf
                                                                <a href="{{ route('buku.edit', $buku -> id) }}" class="btn btn-warning">
                                                                        Update
                                                                </a>

                                                                <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ?') " >
                                                                        Delete
                                                                </button>
                                                </form>
                                                
                                        </td>                                       
                                </tr>
                                @endforeach
                        </tbody>
                </table>
                
                <div>
                        <div class="kiri"><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
                        <div class="kanan">{{ $data_book->links() }}</div>
                </div>
        </div>
</div>
        
@endsection