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
                    <h2 class="page-title">Stock Hewan Ternak <b> Kambing </b></h2>
                        <div class="row">
            
                            <div class="col-md-2">
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                        <h3> <b>Jenis Hewan :</b>  </h3>
                                        <h3> <b >Kambing</b></h3>
                                        <br>
                                            @if($livestock_jenis == 'cow')
                                                <img src="{{ asset('admin/assets/images/Sapi.jpg') }}" style="width: 100px">
                                                
                                            @endif
                                            @if($livestock_jenis == 'goat')
                                                <img src="{{ asset('admin/assets/images/Kambing.jpg') }}" style="width: 100px">
                                                
                                            @endif
                                            @if($livestock_jenis == 'sheep')
                                                <img src="{{ asset('admin/assets/images/Domba.jpg') }}" style="width: 100px">
                                                
                                            @endif
                                        </div>
                                    </div>
                                    
                            </div>

                            <div class="col-md-10">
                                <div class="row">
                                    <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Ringkasan Informasi Mengenai Stok Ternak</h3>
                                                <p class="panel-subtitle">Hari ini</p>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="metric">
                                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                                            <p>
                                                                <span class="number">{{$jumlah_stock}} Ekor</span>
                                                                <span class="title">Stok Hewan</span>
                                                            </p>
                                                            <br>
                                                            <br>
                                                            <div>
                                                                <h3 class="panel-title">Tambah Data Hewan Ternak</h3>
                                                                <br>
                                                                <form action="{{ route('livestock.add' )}}" method="GET">
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
                                                                <span class="number">{{$jumlah_dibeli}} Ekor</span>
                                                                <span class="title">Hewan Yang Sudah Dibeli</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="metric">
                                                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                                            <p>
                                                                <span class="number">{{$jumlah_mati}} Ekor</span>
                                                                <span class="title">Hewan Yang Mati</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Pencarian</h3>
                                                    <form action="{{ route('livestock.search') }}" method="get">
                                                        @csrf
                                                            <input type="text" name="kata" class="form-control" placeholder="Cari..." 
                                                            style="width:30%; display:inline; margin-top:10px; margin-bottom:10px; float:left;">
                                                    </form>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                        </div>

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tabel Stock <b> Kambing </b></h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Kode Hewan</th>
                                            <th> Kode Kandang </th>
                                            <th> Tipe </th>
                                            <th> Jenis Kelamin </th>
                                            <th> Warna </th>
                                            <th> Tanggal Lahir </th>
                                            <th> Berat </th>
                                            <th> Status </th>
                                            <th> Aksi </th>
                                       <!-- <th> Deskripsi </th> -->
                                            <!-- <th> Foto </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($livestock as $animal)
                                        <tr>
                                            <td>{{ ++$no }}</td>                                           
                                            <td>{{ $animal->kode }}</td>                                            
                                            <td>{{ $animal->kode_kandang }}</td>                                            
                                            <td>{{ $animal->type }}</td>                                            
                                            <td>                                            
                                                @if($animal->jenis_kelamin == 'male')
                                                <span>Jantan</span></td>
                                                @endif
                                                
                                                @if($animal->jenis_kelamin == 'female')
                                                <span>Betina</span></td>
                                                @endif                                            
                                            </td>
                                            <td>{{ $animal->warna }}</td>                                                
                                            <td>{{ $animal->tgl_lahir->format('d/m/Y') }}</td>                    
                                            <!-- <td>{{ $animal->description }}</td> -->
                                            <td>{{ $animal->berat }}</td>                    
                                            <td>
                                                                    
                                            @if($animal->status == 'Sudah dibeli')
                                            
                                            <span class="label label-success">{{ $animal->status }}</span></td>
                                            
                                            @endif
                                            
                                            @if($animal->status == 'Belum dibeli')
                                            
                                            <span class="label label-warning">{{ $animal->status }}</span></td>
                                            
                                            @endif
                                            
                                            @if($animal->status == 'Mati')
                                            
                                            <span class="label label-danger">{{ $animal->status }}</span></td>
                                            
                                            @endif
                                            
                                            <td>                                            
                                                <form action="{{ route('livestock.mati', $animal-> id )}}" method="POST">                                            
                                                    @csrf                                            
                                                    <a href="{{ route('livestock.detail', $animal -> id) }}" class="btn btn-primary">
                                                    Detail
                                                    </a>
                                                    <!-- <a href="{{ route('livestock.edit', $animal -> id) }}" class="btn btn-warning">                                                
                                                    Update
                                                            </a> -->    
                                                    <button type="submit" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ?') " >                                                
                                                    Mati                                                    
                                                    </button>                                                         
                                                </form>                                                                
                                            </td>           
                                        </tr>                                                 
                                        @endforeach                                                
                                    </tbody>                                                
                                </table>                                            
                                <div>                                        
                                    <div class="kiri"><strong>Jumlah Hewan : {{ $jumlah_hewan }}</strong></div>                                     
                                    <div class="kanan">{{ $livestock->links() }}</div>                                                
                                </div>                                               
                            </div>
                                             
                        

                </div>
            </div>
        </div>
   
</div>
@endsection