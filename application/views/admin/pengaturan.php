<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view("admin/_partials/sidebar.php") ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view("admin/_partials/navbar.php") ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
					</div>

					<!-- Form -->
					<?php echo form_open(base_url('panel-admin/pengaturan')) ?>
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="font-weight-bold text-primary" style="display: inline-block; margin-right: 1em;"><?= $title ?> Aplikasi</h6>
						</div>
						<div class="card-body">
							<?php
							echo '<div class="form-row">';
							foreach ($opsi as $opsi => $nilai) {
								//inputs need a unique "name" and "id", use the counter for that purpose
								$attributes['name'] = $opsi;
								$attributes['id'] = $opsi;
								$attributes['class'] = 'form-control js-example-basic-single';

								//add the 'value' of each profile to the array     
								$attributes['value'] = $nilai;

								$label_arr = explode('_', $opsi);
								$label = '';
								$i = 0;
								foreach ($label_arr as $str) {
									if ($i === 0) {
										$label .= $str;
									} else {
										$label .= ' ' . $str;
									}
									$i++;
								}
								$label = ucwords($label);

								//send the array to form_input
								echo '<div class="form-group col-md-3">';
								echo form_label($label, $attributes['id']);
								echo form_input($attributes);
								echo '</div>';
							}
							echo '</div>';
							?>
						</div>
						<div class="card-footer py-3">
							<button type="submit" class="btn btn-success btn-icon-split btn-sm">
								<span class="icon text-white-50">
									<i class="fas fa-save"></i>
								</span>
								<span class="text">Simpan Perubahan</span>
							</button>
						</div>
					</div>
					</form>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<?php $this->load->view("admin/_partials/scrolltop.php") ?>

	<!-- Logout Modal-->
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<!-- Script -->
	<?php $this->load->view("admin/_partials/js.php") ?>

	<!-- Page level custom scripts -->
	<link href="<?php echo base_url('assets/select2/select2.min.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/select2/select2-bootstrap.min.css') ?>" rel="stylesheet" />
	<script defer src="<?php echo base_url('assets/select2/select2.min.js') ?>"></script>
	<script>
		window.onload = function() {
			$('.js-example-basic-single').select2({
				placeholder: 'Pilih Akun',
				allowClear: true,
				theme: "bootstrap"
			});
			removeLoader();
		}

		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 1000);
	</script>

</body>

</html>