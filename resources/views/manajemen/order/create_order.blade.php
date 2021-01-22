@extends('layout_master.master')

@section('content')
<!-- INPUTS -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid"> 
                <h2 class="page-title" ><b> Tambah Pesanan (Order) </b></h2>
                <div class="panel">
                
		<div class="panel-heading">
			<h2 class="panel-title">Silahkan Tambahkan Pesanan Customers Anda</h2>
		</div>
        @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
		<div class="panel-body">
            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                    
                <div class="row">
                    <div class="col-md-6">
                        <!-- Nama Pemesan -->
                        <label for="name-orders" class="col-sm-4 col-form-label" > Nama Pemesan </label>
                        <input type="text" class="form-control" name="name" placeholder="Nama pemesan...">
                        <br>

                        <!-- Email Pemesan -->
                        <label for="email-orders" class="col-sm-4 col-form-label" > Email Pemesan </label>
                        <input type="text" class="form-control" name="email" placeholder="Nama pemesan...">
                        <br>

                        <!-- Telepon Pemesan -->
                        <label for="telephone-orders" class="col-sm-4 col-form-label" > Nomor Telepon Pemesan </label>
                        <input type="text" class="form-control" name="telephone" placeholder="Nomor telepon pemesan...">
                        <br>

                        <!-- Status Pemesanan (Sukses/Menunggu/Kirim/Tolak) -->
                        <!-- <div class="form-group">
                            <label for="status-orders" class="col-sm-4 col-form-label" > Status </label>
                            <br>
                            <br>                                    
                            <div class="container">
                                <label class="fancy-radio">
                                    <input name="status" value="Sukses" type="radio">
                                        <span><i></i>Sukses (Sudah Dikirim)</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="status" value="Menunggu" type="radio">
                                        <span><i></i>Menunggu (Belom Diproses)</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="status" value="Kirim" type="radio">
                                        <span><i></i>Pengiriman (Sedang Dikirim)</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="status" value="Tolak" type="radio">
                                        <span><i></i>Pembatalan (Penolakan atau Pembatalan)</span>
                                </label>
                            </div>
                        </div>
                        <br> -->

                        <!-- Alamat -->
                        <label for="alamat-orders" class="col-sm-4 col-form-label" > Alamat Pemesan (Alamat Hewan di Antar) </label>
                        <textarea class="form-control" placeholder="Alamat dimana hewan di antar..." name="address" rows="4"></textarea>
                        <br>

                    </div>

                    <div class="col-md-6">
                        
                        <!-- Pesan dari Pemesan -->
                        <label for="message-orders" class="col-sm-5 col-form-label" > Pesan dari Pemesan </label>
                        <textarea class="form-control" placeholder="Pesan dari si Pemesan ..." name="message" rows="8"></textarea>
                        <br>

                        <!-- Catatan Managemen -->
                        <label for="manager_notes-orders" class="col-sm-5 col-form-label" > Catatan Pemesanan Dari Internal </label>
                        <textarea class="form-control" placeholder="Catatan pemesanan dari internal..." name="manager_notes" rows="8"></textarea>
                        <br>
                        
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Total Hewan yang Dipesan -->
                        <label for="total_livestock-orders" class="col-sm-8 col-form-label" > Jumlah Hewan Ternak yang Dipesan </label>
                        <input type="text" class="form-control" name="total_livestock" placeholder="Jumlah hewan ...">
                        <br>

                        <!-- Harga Total Hewan Ternak
                        <label for="total_prive_livestock-orders" class="col-sm-8 col-form-label" > Biaya Total Hewan </label>
                        <input type="text" class="form-control" name="total_price_livestock" placeholder="Biaya total hewan...">
                        <br> -->

                    </div>
                </div>
                <!-- <br>
                <br> -->

                <div class="row">
                
                    <!-- <div class="col-md-6">

                        Biaya Antar 
                        <label for="delivery_price-orders" class="col-sm-8 col-form-label" > Biaya Antar </label>
                        <input type="text" class="form-control" name="delivery_price" placeholder="Biaya antar...">
                        <br>

                    </div> -->
                    <div class="col-md-6">
                        <!-- Tanggal Pembayaran (Tanggal Beli) -->
                        <label for="tgl-beli-orders" class="col-sm-8 col-form-label" > Tanggal Pembayaran </label>
                        <input type="date" class="form-control" name="tgl_beli" placeholder="Tanggal pembayaran ....">
                        <br>

                        <!-- Tanggal Pengantaran (Tanggal Antar) -->
                        <label for="tgl-antar-orders" class="col-sm-8 col-form-label" > Tanggal Pengantaran </label>
                        <input type="date" class="form-control" name="tgl_antar" placeholder="Tanggal hewan di antar ....">
                        <br>
                    </div>
                </div>
                <br>
                <br>
                                        
    
                        <div class="form-group row">
                            <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary"> Simpan </button>
                                    <a href="/manager/order" class="btn btn-warning" > Kembali </a>
                            </div>
                        </div>
                          
            </form>
        </div>
</div>

@endsection