@extends('layout_master.master')
@section('content')
<!-- INPUTS -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    <h2 class="page-title"><b>Detail Pesanan</b></h2>
                    @if(Session::has('pesan'))
                        <div class="alert alert-success">{{Session::get('pesan')}}</div>
                    @endif
                        <div class="row">

                            <!-- Detail Pesanan -->                        
                            <div class="col-md-8">
        
                                <div class="panel panel-headline">

                                    <div class="panel-heading">
                                        <h3> <b> Detail Informasi </b> </h3>
                                        
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                        
                                            <div class="col-md-6">

                                                <!-- Kode (Nomor) Pemesan -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Nomor Pemesan</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> kode }}</h4>
                                                    </div>
                                                </div>

                                                <!-- Nama Pemesan -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Nama Pemesan</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> name }}</h4>
                                                    </div>
                                                </div>
                                                
                                                <!-- Email Pemesan -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Email Pemesan</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> email }}</h4>
                                                    </div>
                                                </div>

                                                <!-- Nomor Telepon Pemesan -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Nomor Telepon Pemesan</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> telephone }}</h4>
                                                    </div>
                                                </div>

                                                <!-- Alamat Pemesan -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Alamat Pemesan</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> address }}</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                
                                                <!-- Tanggal Pembayaran -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Tanggal Pembayaran</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> tgl_beli }}</h4>
                                                    </div>
                                                </div>

                                                <!-- Tanggal Antar -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4><b>Tanggal Pengantaran</b></h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4> : {{ $order -> tgl_antar }}</h4>
                                                    </div>
                                                </div>

                                            </div>                      
                                        
                                        </div>

                                        <br>
                                        <!-- Informasi Tambahan  -->
                                        <div class="panel-heading">
                                            <h3> <b> Informasi Tambahan </b> </h3>
                                        </div>

                                        <div class="row">

                                            <!-- Pesan dari Pemesan -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4><b>Pesan dari Pemesan</b></h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4> : {{ $order -> message }}</h4>
                                                </div>
                                            </div>

                                            <br>

                                            <!-- Pesan dari Internal -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4><b>Catatan Pemesanan Dari Internal</b></h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4> : {{ $order -> manager_notes }}</h4>
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            
                                            <a href="{{ route('order.index') }}" class="btn btn-warning">
                                                KEMBALI
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">

                               <!-- Status -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><b>Status Pesanan</b></h3>
                                    </div>
                                    <div class="panel-body">
                                            <div class="row">
                                                    <h4 > Dengan Nomor Pesanan :</h4>
                                                    <h4 > <b>{{ $order -> kode }}</b> </h4>
                                                    <br>
                                                    <h4 > Atas Nama :</h4>
                                                    <h4 > <b>{{ $order -> name }}</b> </h4>
                                                    <br>

                                                <div class="col-sm-6">
                                                    <h3 > <b>Status Pesanan :</b> </h3>
                                                </div>

                                                <div class="col-sm-6">

                                                    @if($order->status == 'Sukses')
                                                        <img src="{{ asset('admin/assets/images/Status Sukses.png') }}" style="width: 100px">
                                                        <h5> <b >Sukses</b> (Telah Diterima) </h5>
                                                    @endif
                                                    @if($order->status == 'Menunggu')
                                                        <img src="{{ asset('admin/assets/images/Status Menunggu.png') }}" style="width: 100px">
                                                        <h5> <b>Menunggu</b> (Sedang Diproses) </h5>
                                                    @endif
                                                    @if($order->status == 'Kirim')
                                                        <img src="{{ asset('admin/assets/images/Status Kirim.png') }}" style="width: 100px">
                                                        <h5> <b>Dikirim</b> (Sedang diKirim)</h5>
                                                    @endif
                                                    @if($order->status == 'Tolak')
                                                        <img src="{{ asset('admin/assets/images/Status Tolak.png') }}" style="width: 100px">
                                                        <h5> <b>Dibatalkan</b> (Pesanan Ditolak/dibatalkan)</h5>
                                                    @endif

                                                </div>
                                            </div>
                                    </div>
                                </div>
                               <!-- Gambar
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Gambar Hewan Ternak</h3>
                                        <div class="right">
                                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding ">
                                        <div class="padding-card">
                                            <div class="card" style="width: 18rem;">
                                                <img src="{{ $order->foto != null ? asset('images/livestock/'.$order->foto) : asset('image-not-found.jpg') }}" class="card-img-top" width="250px" alt="...">
                                                    <div class="card-body">
                                                        <br>
                                                        <p class="card-text">Hewan ini berada di kandang {{ $order -> kode_kandang }}.</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"> <b> Data Hewan Yang Dibeli</b> </h3>
                                                <p>Berikut Data yang Dibeli</p>
                                            </div>

                                            <!-- Ini Yang Sapi -->
                                            <div>
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> <b> Sapi </b> </h3>
                                                    <p>Anda dapat menambahkan</p
                                                </div>
                                                <br>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <a type="button" class="btn btn-info" data-toggle="modal" data-target="#Sapi">
                                                                Tambah Hewan
                                                            </a>
                                                        </div>
                                                        

                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> Kode Hewan</th>
                                                                    <th> Kode Kandang </th>
                                                                    <th> Tipe </th>
                                                                    <th> Jenis Kelamin </th>
                                                                    <th> Warna </th>
                                                                    <th> Berat </th>
                                                                    <th> Aksi </th>
                                                                <!-- <th> Deskripsi </th> -->
                                                                <!-- <th> Foto </th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($sapi_order as $sp_order)
                                                                <tr>
                                                                    <td>{{ $sp_order->kode }}</td>
                                                                    <td>{{ $sp_order->kode_kandang }}</td>
                                                                    <td>{{ $sp_order->type }}</td>
                                                                    <td>
                                                                        @if($sp_order->jenis_kelamin == 'male')
                                                                            <span>Jantan</span></td>
                                                                        @endif
                                                                        @if($sp_order->jenis_kelamin == 'female')
                                                                            <span>Betina</span></td>
                                                                        @endif                                            
                                                                    </td>
                                                                    <td>{{ $sp_order->warna }}</td>
                                                                    <td>{{ $sp_order->berat }}</td>
                                                                    <td>
                                                                        <div>
                                                                            <form action="{{ route('order.hapus_hewan', ['id' => $order->id , 'id_livestock'=> $sp_order->id ] )}}" method="POST">
                                                                                        @csrf
                                                                                        <!-- <a href="{{ route('livestock.detail', $sp_order -> id) }}" class="btn btn-primary">
                                                                                            Detail
                                                                                        </a> -->
                                                                                        <!-- <a href="{{ route('livestock.edit', $sp_order -> id) }}" class="btn btn-warning">
                                                                                            Update
                                                                                        </a> -->
                                                                                        <button type="submit" class="btn btn-info" >
                                                                                            Hapus
                                                                                        </button>
                                                                                </form>
                                                                        
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>             
                                                    </div>
                                            </div>
                                            
                                            <!-- Ini Yang Kambing -->
                                            <div>
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> <b> Kambing </b> </h3>
                                                    <p>Anda dapat menambahkan</p
                                                </div>
                                                <br>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <a type="button" class="btn btn-info" data-toggle="modal" data-target="#Kambing">
                                                                Tambah Hewan
                                                            </a>
                                                        </div>

                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> Kode Hewan</th>
                                                                    <th> Kode Kandang </th>
                                                                    <th> Tipe </th>
                                                                    <th> Jenis Kelamin </th>
                                                                    <th> Warna </th>
                                                                    <th> Berat </th>
                                                                    <th> Aksi </th>
                                                                <!-- <th> Deskripsi </th> -->
                                                                <!-- <th> Foto </th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($kambing_order as $kb_order)
                                                                <tr>
                                                                    <td>{{ $kb_order->kode }}</td>
                                                                    <td>{{ $kb_order->kode_kandang }}</td>
                                                                    <td>{{ $kb_order->type }}</td>
                                                                    <td>
                                                                        @if($kb_order->jenis_kelamin == 'male')
                                                                            <span>Jantan</span></td>
                                                                        @endif
                                                                        @if($kb_order->jenis_kelamin == 'female')
                                                                            <span>Betina</span></td>
                                                                        @endif                                            
                                                                    </td>
                                                                    <td>{{ $kb_order->warna }}</td>
                                                                    <td>{{ $kb_order->berat }}</td>
                                                                    <td>
                                                                            <form action="{{ route('order.hapus_hewan', ['id' => $order->id , 'id_livestock'=> $kb_order->id ] )}}" method="POST">
                                                                                    @csrf
                                                                                    <!-- <a href="{{ route('livestock.detail', $kb_order -> id) }}" class="btn btn-primary">
                                                                                        Detail
                                                                                    </a> -->
                                                                                    <!-- <a href="{{ route('livestock.edit', $kb_order -> id) }}" class="btn btn-warning">
                                                                                        Update
                                                                                    </a> -->
                                                                                    <button type="submit" class="btn btn-info" >
                                                                                        Hapus
                                                                                    </button>
                                                                            </form>
                                                                    </td>
                                                                </tr>
                                                                @endforeach    
                                                            </tbody>
                                                        </table>             
                                                    </div>
                                            </div>

                                            <!-- Ini Yang Domba -->
                                            <div>
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> <b> Domba </b> </h3>
                                                    <p>Anda dapat menambahkan</p
                                                </div>
                                                <br>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <a type="button" class="btn btn-info" data-toggle="modal" data-target="#Domba">
                                                                Tambah Hewan
                                                            </a>
                                                        </div>

                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> Kode Hewan</th>
                                                                    <th> Kode Kandang </th>
                                                                    <th> Tipe </th>
                                                                    <th> Jenis Kelamin </th>
                                                                    <th> Warna </th>
                                                                    <th> Berat </th>
                                                                    <th> Aksi </th>
                                                                <!-- <th> Deskripsi </th> -->
                                                                <!-- <th> Foto </th> -->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($domba_order as $db_order)
                                                                <tr>
                                                                    <td>{{ $db_order->kode }}</td>
                                                                    <td>{{ $db_order->kode_kandang }}</td>
                                                                    <td>{{ $db_order->type }}</td>
                                                                    <td>
                                                                        @if($db_order->jenis_kelamin == 'male')
                                                                            <span>Jantan</span></td>
                                                                        @endif
                                                                        @if($db_order->jenis_kelamin == 'female')
                                                                            <span>Betina</span></td>
                                                                        @endif                                            
                                                                    </td>
                                                                    <td>{{ $db_order->warna }}</td>
                                                                    <td>{{ $db_order->berat }}</td>
                                                                    <td>
                                                                            <form action="{{ route('order.hapus_hewan', ['id' => $order->id , 'id_livestock'=> $db_order->id ] )}}" method="POST">
                                                                                    @csrf
                                                                                    <!-- <a href="{{ route('livestock.detail', $db_order -> id) }}" class="btn btn-primary">
                                                                                        Detail
                                                                                    </a> -->
                                                                                    <!-- <a href="{{ route('livestock.edit', $db_order -> id) }}" class="btn btn-warning">
                                                                                        Update
                                                                                    </a> -->
                                                                                    <button type="submit" class="btn btn-info" >
                                                                                        Hapus
                                                                                    </button>
                                                                            </form>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>            
                                                    </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"> <b> Aksi </b> </h3>
                                            <p>Untuk memberikan aksi seperti edit atau menghapus</p>
                                        </div>
                                        <div class="panel-body">
                                                <div class="row">            
                                                    <div class="col-sm-2">
                                                        <a href="{{ route('order.edit', $order -> id) }}" class="btn btn-warning">
                                                        EDIT
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <form action="{{ route('order.deleted', $order-> id )}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda yakin Untuk Menghapus ?') " >
                                                            HAPUS
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>


                                        <div class="panel-heading">
                                            <h3 class="panel-title"> <b> Memberikan Status </b> </h3>
                                            <p>Untuk memberikan status seperti belum dibeli, sudah dibeli atau sudah mati</p>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">            
                                                        <div class="col-sm-4">
                                                            <form action="{{ route('order.sukses', $order-> id )}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary" onClick="return confirm('Apakah anda  untuk mengubah status ? ') " >
                                                                    Sukses
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <form action="{{ route('order.kirim', $order-> id )}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-info" onClick="return confirm('Apakah anda  untuk mengubah status ? ') " >
                                                                    Kirim
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <form action="{{ route('order.batal', $order-> id )}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda  untuk mengubah status ? ') " >
                                                                    Batal
                                                                </button>
                                                            </form>
                                                        </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
                @endsection
</div>
</div>

<!-- Modal Sapi -->
<div class="modal fade" id="Sapi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Pilih Sapi yang Dipesan</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>    
                                        <!-- <th> jenis </th> -->
                                        <th> Kode Hewan</th>
                                        <th> Kode Kandang </th>
                                        <th> Tipe </th>
                                        <th> Jenis Kelamin </th>
                                        <th> Warna </th>
                                        <th> Tanggal Lahir </th>
                                        <th> Berat </th>
                                        <th> Aksi </th>
                                         <!-- <th> Deskripsi </th> -->
                                        <!-- <th> Foto </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($sapi as $sp)
                                        <tr>
                                            
                                            <!-- <td>
                                                @if($sp->jenis == 'cow')
                                                    <img src="{{ asset('admin/assets/images/Sapi.jpg') }}" style="width: 100px">
                                                @endif
                                                @if($sp->jenis == 'goat')
                                                    <img src="{{ asset('admin/assets/images/Kambing.jpg') }}" style="width: 100px">
                                                @endif
                                                @if($sp->jenis == 'sheep')
                                                    <img src="{{ asset('admin/assets/images/Domba.jpg') }}" style="width: 100px">
                                                @endif
                                            </td> -->
                                            <td>{{ $sp->kode }}</td>
                                            <td>{{ $sp->kode_kandang }}</td>
                                            <td>{{ $sp->type }}</td>
                                            <td>
                                                @if($sp->jenis_kelamin == 'male')
                                                    <span>Jantan</span></td>
                                                @endif
                                                @if($sp->jenis_kelamin == 'female')
                                                    <span>Betina</span></td>
                                                @endif                                            
                                            </td>
                                            <td>{{ $sp->warna }}</td>
                                            <td>{{ $sp->tgl_lahir->format('d/m/Y') }}</td>
                                            <!-- <td>{{ $sp->description }}</td> -->
                                            <td>{{ $sp->berat }}</td>
                                            <td>
                                                    <form action="{{ route('order.pilih_hewan', ['id' => $order->id , 'id_livestock'=> $sp->id ] )}}" method="POST">
                                                            @csrf
                                                            <!-- <a href="{{ route('livestock.detail', $sp -> id) }}" class="btn btn-primary">
                                                                Detail
                                                            </a> -->
                                                            <!-- <a href="{{ route('livestock.edit', $sp -> id) }}" class="btn btn-warning">
                                                                Update
                                                            </a> -->
                                                            <button type="submit" class="btn btn-info" >
                                                                Pilih
                                                            </button>
                                                    </form>
                                            </td>                                       
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div>
                                    <div class="kanan">{{ $sapi->links() }}</div>
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Kambing -->
<div class="modal fade" id="Kambing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Pilih Kambing yang Dipesan</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>    
                                        <!-- <th> jenis </th> -->
                                        <th> Kode Hewan</th>
                                        <th> Kode Kandang </th>
                                        <th> Tipe </th>
                                        <th> Jenis Kelamin </th>
                                        <th> Warna </th>
                                        <th> Tanggal Lahir </th>
                                        <th> Berat </th>
                                        <th> Aksi </th>
                                         <!-- <th> Deskripsi </th> -->
                                        <!-- <th> Foto </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($kambing as $kb)
                                        <tr>
                                            
                                            <!-- <td>
                                                @if($kb->jenis == 'cow')
                                                    <img src="{{ asset('admin/assets/images/Sapi.jpg') }}" style="width: 100px">
                                                @endif
                                                @if($kb->jenis == 'goat')
                                                    <img src="{{ asset('admin/assets/images/Kambing.jpg') }}" style="width: 100px">
                                                @endif
                                                @if($kb->jenis == 'sheep')
                                                    <img src="{{ asset('admin/assets/images/Domba.jpg') }}" style="width: 100px">
                                                @endif
                                            </td> -->
                                            <td>{{ $kb->kode }}</td>
                                            <td>{{ $kb->kode_kandang }}</td>
                                            <td>{{ $kb->type }}</td>
                                            <td>
                                                @if($kb->jenis_kelamin == 'male')
                                                    <span>Jantan</span></td>
                                                @endif
                                                @if($kb->jenis_kelamin == 'female')
                                                    <span>Betina</span></td>
                                                @endif                                            
                                            </td>
                                            <td>{{ $kb->warna }}</td>
                                            <td>{{ $kb->tgl_lahir->format('d/m/Y') }}</td>
                                            <!-- <td>{{ $kb->description }}</td> -->
                                            <td>{{ $kb->berat }}</td>
                                            <td>
                                                    <form action="{{ route('order.pilih_hewan', ['id' => $order->id , 'id_livestock'=> $kb->id ] )}}" method="POST">
                                                            @csrf
                                                            <!-- <a href="{{ route('livestock.detail', $kb -> id) }}" class="btn btn-primary">
                                                                Detail
                                                            </a> -->
                                                            <!-- <a href="{{ route('livestock.edit', $kb -> id) }}" class="btn btn-warning">
                                                                Update
                                                            </a> -->
                                                            <button type="submit" class="btn btn-info" >
                                                                Pilih
                                                            </button>
                                                    </form>
                                            </td>                                       
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div>
                                    <div class="kanan">{{ $sapi->links() }}</div>
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Domba -->
<div class="modal fade" id="Domba" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Pilih Domba yang Dipesan</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>    
                                        <!-- <th> jenis </th> -->
                                        <th> Kode Hewan</th>
                                        <th> Kode Kandang </th>
                                        <th> Tipe </th>
                                        <th> Jenis Kelamin </th>
                                        <th> Warna </th>
                                        <th> Tanggal Lahir </th>
                                        <th> Berat </th>
                                        <th> Aksi </th>
                                         <!-- <th> Deskripsi </th> -->
                                        <!-- <th> Foto </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($domba as $db)
                                        <tr>
                                            
                                            <!-- <td>
                                                @if($db->jenis == 'cow')
                                                    <img src="{{ asset('admin/assets/images/Sapi.jpg') }}" style="width: 100px">
                                                @endif
                                                @if($db->jenis == 'goat')
                                                    <img src="{{ asset('admin/assets/images/Kambing.jpg') }}" style="width: 100px">
                                                @endif
                                                @if($db->jenis == 'sheep')
                                                    <img src="{{ asset('admin/assets/images/Domba.jpg') }}" style="width: 100px">
                                                @endif
                                            </td> -->
                                            <td>{{ $db->kode }}</td>
                                            <td>{{ $db->kode_kandang }}</td>
                                            <td>{{ $db->type }}</td>
                                            <td>
                                                @if($db->jenis_kelamin == 'male')
                                                    <span>Jantan</span></td>
                                                @endif
                                                @if($db->jenis_kelamin == 'female')
                                                    <span>Betina</span></td>
                                                @endif                                            
                                            </td>
                                            <td>{{ $db->warna }}</td>
                                            <td>{{ $db->tgl_lahir->format('d/m/Y') }}</td>
                                            <!-- <td>{{ $db->description }}</td> -->
                                            <td>{{ $db->berat }}</td>
                                            <td>
                                                    <form action="{{ route('order.pilih_hewan', ['id' => $order->id , 'id_livestock'=> $db->id ] )}}" method="POST">
                                                            @csrf
                                                            <!-- <a href="{{ route('livestock.detail', $db -> id) }}" class="btn btn-primary">
                                                                Detail
                                                            </a> -->
                                                            <!-- <a href="{{ route('livestock.edit', $db -> id) }}" class="btn btn-warning">
                                                                Update
                                                            </a> -->
                                                            <button type="submit" class="btn btn-info" >
                                                                Pilih
                                                            </button>
                                                    </form>
                                            </td>                                       
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div>
                                    <div class="kanan">{{ $sapi->links() }}</div>
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>