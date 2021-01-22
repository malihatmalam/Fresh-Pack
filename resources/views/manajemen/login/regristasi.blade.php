<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Ternak Pak Abdullah | Regristasi</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/images/Logo Ternak Singel.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('admin/assets/images/Logo Ternak Coba.png')}}" width="150" alt="Ternak Pak Abdullah Logo"></div>
                                <p class="lead">Regristasi Akun Manajemen Ternak Pak Abdullah</p>
							</div>
                            <form class="form-auth-small" action="/manager/postregistrasi" method="POST" >
                                @csrf
                                <div class="form-group">
									<label for="signin-email" class="control-label sr-only">Nama</label>
									<input name ="name" type="text" class="form-control" id="signin-email" placeholder="Nama">
								</div>
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name ="email" type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name ="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                                </div>
                                <!-- <div class="form-group">
									<label for="signin-password" class="control-label sr-only">Ulangi Password Anda</label>
									<input name ="password_konfirmasi" type="password" class="form-control" id="signin-password" placeholder="Password">
                                </div> -->
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
								<!-- <div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div> -->
								<button type="submit" class="btn btn-primary btn-lg btn-block">Regristasi</button>
								<!-- <div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div> -->
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"><b>Manajemen Ternak Pak Abdullah</b></h1>
							<p><b>Silahkan Masuk</b></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
