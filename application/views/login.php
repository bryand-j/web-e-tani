<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login | KHS-Elektro</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url()?>assets/icn.png" type="image/x-icon" />
	<!-- Add to home screen for Windows-->
	<meta name="msapplication-TileImage" content="<?=base_url()?>assets/icn.png"/>
	<meta name="msapplication-TileColor" content="#0d59ba" />
	<meta name="theme-color" content="#ffffff">
	
	
	<meta name="description" content="APP KHS ELEKTRO" />
	<link rel="apple-touch-icon" href="<?=base_url()?>assets/icn.png" />
	<!-- Fonts and icons -->
	<script src="<?=base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
					"simple-line-icons"
				],
				urls: ['<?=base_url()?>assets/css/fonts.min.css']
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});

	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/atlantis.css">
</head>

<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div
			class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<img style="width:50%;" src="<?=base_url()?>assets/img/gg.svg" alt="login logo">
			<h1 class="title fw-bold text-white mb-3">KHS - Elektro</h1>
			<p class="subtitle text-white op-7">Aplikasi KHS Jurusan Teknik Elektro</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<h3 class="text-center">Sign In</h3>
				<div class="login-form">
					<form action="<?= base_url();?>login/Cek_Login" method="post">
						<div class="form-group">
							<label for="username" class="placeholder"><b>Username</b></label>
							<input id="username" name="username" type="text" class="form-control" required placeholder="masukan username / nip / nim">
						</div>
						<div class="form-group">
							<label for="password" class="placeholder"><b>Password</b></label>
							<a href="#" class="link float-right lupa">Lupa Password ?</a>
							<div class="position-relative">
								<input id="password" placeholder="Masukan Password" name="password" type="password" class="form-control" required>
								<div class="show-password">
									<i class="icon-eye"></i>
								</div>
							</div>
						</div>
						<div class="form-group form-action-d-flex mb-3 justify-content-center">
							<button type="submit" class="btn btn-secondary col-md-5 mt-3 mt-sm-0 fw-bold">Sign In</button>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="<?=base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?=base_url()?>assets/js/atlantis.min.js"></script>
	<script type="text/javascript">
		$('.lupa').click(function () {
			swal("Info", "Segera Laporkan Ke Jurusan !", {
				icon: "info",
				buttons: {
					confirm: {
						className: 'btn btn-info'
					}
				},
			});
		});

		$(document).ready(function () {
			let err = "<?php echo $this->session->flashdata('Gagal');?>";
			if (err != "") {
				swal(
					'Gagal',
					'Username  Atau Password Salah',
					'error'
				);
			}
		});

	</script>

</body>

</html>
