@extends('layout_master.master')

@section('content')
<!-- INPUTS -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    <h2 class="page-title">Detail Hewan</h2>
                        <div class="row">

                            <!-- Detail Sapi -->                        
                            <div class="col-md-8">
        
                                <div class="panel panel-headline">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> <b> Kode Hewan : {{ $livestock -> kode }} </b> </h3>
                                        <h4 >Kode Kandang : {{ $livestock -> kode_kandang }} </h4>
                                    </div>
                                    <div class="panel-body">
                                        <h4><b >Detail Infomasi</b></h4>
                                        <br>

                                        <h5>Jenis Kelamin :  
                                            @if($livestock->jenis_kelamin == 'male')
                                                <b>Jantan</b>
                                            @endif
                                            @if($livestock->jenis_kelamin == 'female')
                                                <b>Betina<b>
                                            @endif 
                                        </h5>
                                        <br>

                                        <h5>Tipe Hewan : <b> {{ $livestock -> type }}  </b> </h5>
                                        <br>

                                        <h5>Warna Hewan : <b> {{ $livestock -> warna }} </b>  </h5>
                                        <br>

                                        <h5>Berat : <b> {{ $livestock -> berat }} </b>  Kg </h5>
                                        <br>

                                        <h5>Deskripsi : </h5>
                                        <p>{{ $livestock -> description }}</p>
                                        <br>

                                        <a href="{{ route('livestock.index') }}" class="btn btn-warning">
                                            KEMBALI
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Gambar Hewan dan Status -->
                            <div class="col-md-4">

                               <!-- Status -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Status Hewan</h3>
                                    </div>
                                    <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    @if($livestock->jenis == 'cow')
                                                        <img src="{{ asset('admin/assets/images/Sapi.jpg') }}" style="width: 100px">
                                                        <h5>Jenis Hewan : <b >Sapi</b></h5>
                                                    @endif
                                                    @if($livestock->jenis == 'goat')
                                                        <img src="{{ asset('admin/assets/images/Kambing.jpg') }}" style="width: 100px">
                                                        <h5>Jenis Hewan : <b>Kambing</b></h5>
                                                    @endif
                                                    @if($livestock->jenis == 'sheep')
                                                        <img src="{{ asset('admin/assets/images/Domba.jpg') }}" style="width: 100px">
                                                        <h5>Jenis Hewan : <b>Domba</b></h5>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    @if($livestock->status == 'Sudah dibeli')
                                                        <img src="{{ asset('admin/assets/images/Status Sudah Dibeli.png') }}" style="width: 100px">
                                                        <h5>Status: <b>Sudah Dibeli</b></h5>
                                                    @endif
                                                    @if($livestock->status == 'Belum dibeli')
                                                        <img src="{{ asset('admin/assets/images/Status Belum Dibeli.png') }}" style="width: 100px">
                                                        <h5>Status : <b>Belum Dibeli</b></h5>
                                                    @endif
                                                    @if($livestock->status == 'Mati')
                                                        <img src="{{ asset('admin/assets/images/Status Mati.png') }}" style="width: 100px">
                                                        <h5>Status : <b>Sudah Mati</b></h5>    
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                </div>
                               <!-- Gambar -->
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
                                                <img src="{{ $livestock->foto != null ? asset('images/livestock/'.$livestock->foto) : asset('image-not-found.jpg') }}" class="card-img-top" width="250px" alt="...">
                                                    <div class="card-body">
                                                        <br>
                                                        <p class="card-text">Hewan ini berada di kandang {{ $livestock -> kode_kandang }}.</p>
                                                    </div>
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
                                                        <a href="{{ route('livestock.edit', $livestock -> id) }}" class="btn btn-warning">
                                                        EDIT
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <form action="{{ route('livestock.deleted', $livestock-> id )}}" method="POST">
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
                                                            <form action="{{ route('livestock.sudah_beli', $livestock-> id )}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary" onClick="return confirm('Apakah anda  untuk mengubah status ? ') " >
                                                                SUDAH DIBELI
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <form action="{{ route('livestock.belum_beli', $livestock-> id )}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning" onClick="return confirm('Apakah anda  untuk mengubah status ? ') " >
                                                                BELUM DIBELI
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <form action="{{ route('livestock.mati', $livestock-> id )}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda  untuk mengubah status ? ') " >
                                                                SUDAH MATI
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
