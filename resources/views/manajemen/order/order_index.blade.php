@extends('layout_master.master')

@section('content')
<!-- INPUTS -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    @if(Session::has('pesan'))
                        <div class="alert alert-success">{{Session::get('pesan')}}</div>
                    @endif
                    <h2 class="page-title">Daftar Pesanan <b> (Semuanya) </b></h2>
                    <div class="row">

                            <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ringkasan Informasi Mengenai Pesanan Hewan Ternak</h3>
                                <p class="panel-subtitle">Hari ini</p>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                            <p>
                                                <span class="number">{{$jumlah_order}}</span>
                                                <span class="title">Jumlah Pesanan</span>
                                            </p>
                                            <br>
                                            <br>
                                            <div>
                                                <h3 class="panel-title">Tambah Data Pesanan</h3>
                                                <br>
                                                <form action="{{ route('order.add' )}}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                            <p>
                                                <span class="number">{{$jumlah_menunggu}}</span>
                                                <span class="title">Pesanan Yang Belom Diproses</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                            <p>
                                                <span class="number">{{$jumlah_kirim}}</span>
                                                <span class="title">Pesanan Yang Sedang Dikirim</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                            <p>
                                                <span class="number">{{$jumlah_sukses}}</span>
                                                <span class="title">Pesanan Yang Sukses</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                            <p>
                                                <span class="number">{{$jumlah_batal}}</span>
                                                <span class="title">Pesanan Yang Dibatalkan</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <h3>Pencarian</h3>
                                    <!-- <form action="{{ route('order.search') }}" method="get">
                                        @csrf
                                            <input type="text" name="kata" class="form-control" placeholder="Cari..." 
                                            style="width:30%; display:inline; margin-top:10px; margin-bottom:10px; float:left;">
                                    </form> -->
                            </div>
                        </div>
                    </div>
                    


                    <div class="panel">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nomor Pesanan </th>
                                        <th> Nama Pemesan</th>
                                        <th> Nomor Telepon </th>
                                        <th> Tanggal Pembayaran </th>
                                        <th> Tanggal Antar </th>
                                        <th> Status </th>
                                        <th> Aksi </th>
                                         <!-- <th> Deskripsi </th> -->
                                        <!-- <th> Foto </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($order as $od)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $od->kode }}</td>
                                            <td>{{ $od->name }}</td>
                                            <td>{{ $od->telephone }}</td>
                                            <td>{{ $od->tgl_beli->format('d/m/Y') }}</td>
                                            <td>{{ $od->tgl_antar->format('d/m/Y') }}</td>
                                            <td>
                                                @if($od->status == 'Sukses')
                                                    <span class="label label-success">{{ $od->status }}</span></td>
                                                @endif
                                                @if($od->status == 'Menunggu')
                                                    <span class="label label-warning">{{ $od->status }}</span></td>
                                                @endif
                                                @if($od->status == 'Tolak')
                                                    <span class="label label-danger">{{ $od->status }}</span></td>
                                                @endif
                                                @if($od->status == 'Kirim')
                                                    <span class="label label-info">{{ $od->status }}</span></td>
                                                @endif
                                            <td>
                                                    <a href="{{ route('order.detail', $od -> id) }}" class="btn btn-info">
                                                        Detail
                                                    </a>
                                            </td>                                       
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div>
                                    <div class="kiri"><strong>Jumlah Order  : {{ $jumlah_order }}</strong></div>
                                    <div class="kanan">{{ $order->links() }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
   
</div>
@endsection