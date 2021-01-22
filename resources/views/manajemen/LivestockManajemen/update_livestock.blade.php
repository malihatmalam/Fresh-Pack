@extends('layout_master.master')

@section('content')
<!-- INPUTS -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                <h2 class="page-title" ><b> Edit Hewan Ternak </b></h2>
                @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                 @endif
                <div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Tambah Hewan Ternak</h2>
		</div>
		<div class="panel-body">
            <form action="{{ route('livestock.update', $livestock -> id) }}" method="post" enctype="multipart/form-data" >
                @csrf

                    
                        <!-- jenis hewan -->
                        <div class="form-group">
                            <label for="jenis-hewan" class="col-sm-3 col-form-label" > Jenis Hewan </label>
                            <br>
                            <br>
                            <div class="container">
                                <label class="fancy-radio">
                                    <input name="jenis" value="cow" type="radio" {{$livestock->jenis  == 'cow'? 'checked' : ''}} >
                                        <span><i></i>Sapi</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="jenis" value="goat" type="radio" {{$livestock->jenis == 'goat'? 'checked' : ''}} >
                                        <span><i></i>Kambing</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="jenis" value="sheep" type="radio" {{$livestock->jenis == 'sheep'? 'checked' : ''}}>
                                        <span><i></i>Domba</span>
                                </label>
                            </div>
                        </div>
                        <br>

                        <!-- tipe -->
                        <label for="type-hewan" class="col-sm-3 col-form-label" > Tipe Hewan </label>
                        <input type="text" class="form-control" name="type" placeholder="Tipenya..." value="{{ $livestock -> type }}">
                        <br>
                    
                        <!-- kode-kandang -->
                        <label for="kode-kandang" class="col-sm-3 col-form-label" > Kode Kandang </label>
                        <input type="text" class="form-control" name="kode_kandang" placeholder="Kode Kandang...." value="{{ $livestock -> kode_kandang }}">
                        <br>

                        <!-- jenis kelamin -->
                        <div class="form-group">
                        <label for="jenis-kelamin-hewan" class="col-sm-3 col-form-label" > Jenis Kelamin Hewan </label>
                            <br>
                            <br>
                            <div class="container">
                                <label class="fancy-radio">
                                    <input name="jenis_kelamin" value="male" type="radio" {{$livestock->jenis_kelamin == 'male'? 'checked' : ''}}>
                                        <span><i></i>Jantan</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="jenis_kelamin" value="female" type="radio" {{$livestock->jenis_kelamin == 'female'? 'checked' : ''}}>
                                        <span><i></i>Betina</span>
                                </label>
                            </div>
                        </div>
                        <br>

                        <!-- warna -->
                        <label for="warna-hewan" class="col-sm-3 col-form-label" > Warna Hewan </label>
                        <input type="text" class="form-control" name="warna" placeholder="Warna hewan ...." value="{{ $livestock -> warna }}">
                        <br>

                        <!-- tanggal lahir -->
                        <label for="tgl-lahir-hewan" class="col-sm-3 col-form-label" > Tanggal Lahir </label>
                        <input type="text" class="form-control" name="tgl_lahir" placeholder="Tanggal lahir hewan ...." value="{{ $livestock -> tgl_lahir }}">
                        <br>

                        <!-- deskripsi -->
                        <label for="deskripsi-hewan" class="col-sm-3 col-form-label" > Deskripsi Hewan </label>
                        <textarea class="form-control" placeholder="Deskripsi hewan..." name="description" rows="4" value="{{ $livestock -> description }}"></textarea>
                        <br>

                        <!-- berat -->
                        <label for="berat-hewan" class="col-sm-3 col-form-label" > Berat Hewan </label>
                        <input type="text" class="form-control" name="berat" placeholder="Berat hewan ...." value="{{ $livestock -> berat }}">
                        <br>
                        <br>

                        <!-- foto hewan -->
                        <div class="form-group row">
                            <div class="container">
                                <img src="{{ $livestock->foto != null ? asset('images/livestock/'.$livestock->foto) : asset('image-not-found.jpg') }}" style="width: 500px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_hewan" class="col-sm-3 col-form-label" > Upload Foto </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary"> Simpan </button>
                                    <a href="/manager/livestock" class="btn btn-warning" > Kembali </a>
                            </div>
                        </div>
                          
            </form>
        </div>
</div>


@endsection