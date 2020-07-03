<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/sb-admin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/sb-admin2/css/responsive.css') ?>" rel="stylesheet">

	<style>
		a {
			color: black;
		}

		.btn-dash {
			width: 100%;
		}

		.rounded {
			border-radius: 2rem !important;
		}

		.container {
			height: auto;
		}

		.img-fluid {
			padding-bottom: 30px;
		}

		.custom-file-label {
			top: 32px !important;
		}

		.rekening {
			max-height: 100px;
		}

		.norek {
			font-family: Arial Black;
			position: relative;
			top: 8px;
			padding-left: 10px;
		}

		.harga {
			font-family: Arial;
			position: relative;
			top: 14px;
		}
	</style>

</head>

<body class="bg-gradient-primary">

	<div class="container align-middle">
		<div class="row justify-content-center ">
			<div class="col-xl-5 col-lg-6 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<?php if ($this->session->flashdata('success')) : ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata('success'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('danger')) : ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata('danger'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('warning')) : ?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata('warning'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>								
							<?php endif; ?>
							<!-- Panggil Modal Form Pendaftaran -->
							<?php include('pendaftaran.php') ?>
							<!-- Panggil Modal Form Pembayaran -->
							<?php include('pembayaran.php') ?>
							<!-- Panggil Modal Introduksi -->
							<?php include('intro.php') ?>
							<!-- Panggil Modal Tagihan -->
							<?php include('tagihan.php') ?>
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<img src="<?= base_url('assets/pendukung/ppdb-online-2020.png') ?>" class="img-fluid" alt="">
										<h1 class="h4 text-gray-900 mb-4"><?= $pt ?></h1>
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-success btn-lg rounded btn-dash" data-toggle="modal" data-target="#Pendaftaran">
											PENDAFTARAN
										</button>
									</div>
									<div class="form-group">
										<button class="btn btn-warning btn-lg rounded btn-dash" data-toggle="modal" data-target="#Pembayaran">
											PEMBAYARAN
										</button>
									</div>
									<div class="form-group">
										<button class="btn btn-secondary btn-lg rounded btn-dash" data-toggle="modal" data-target="#Intro">
											INTRODUKSI
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
	<script type="text/javascript" defer src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

	<!-- Custom scripts for all pages-->
	<script type="text/javascript" defer src="<?php echo base_url('assets/sb-admin2/js/sb-admin-2.min.js') ?>"></script>
	<script>
		window.onload = function() {
			<?php if (isset($tagihan)) { ?>
				$('#Tagihan').modal('show');
			<?php } ?>
		}
	</script>

</body>

</html>