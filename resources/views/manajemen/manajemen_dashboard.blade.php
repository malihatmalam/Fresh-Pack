@extends('layout_master.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Ringkasan Informasi</h3>
							<p class="panel-subtitle">Hari ini</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{ $jumlah_menunggu }}</span>
											<span class="title">Pesanan Menunggu</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{ $jumlah_kirim }}</span>
											<span class="title">Pesanan Dikirim</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{ $jumlah_sukses }}</span>
											<span class="title">Pesanan Sukses</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{ $jumlah_batal }}</span>
											<span class="title">Pesanan Gagal</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{ $jumlah_stock }} Ekor</span>
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
											<span class="number">{{ $jumlah_mati }} Ekor</span>
											<span class="title">Hewan yang Mati</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					
					</div>
					<!-- RECENT PURCHASES -->
					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Pesanan Menunggu</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
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
										<div class="kiri"><strong>Jumlah Order  : {{ $jumlah_menunggu }}</strong></div>
										<div class="kanan">{{ $order->links() }}</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
                </div>
            </div>
</div>
					<!-- END OVERVIEW -->



@endsection