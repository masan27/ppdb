<ul class="navbar-nav bg-gradient-primary  sidebar sidebar-dark accordion" id="accordionSidebar">
	<div style="position: sticky; top: 1px; position: -webkit-sticky;">

		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
			<!-- Sidebar - Brand -->
			<!-- <div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div> -->
			<div class="sidebar-brand-text mx-3"><?php echo "PPDB - " . $this->session->nama ?></div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item <?php echo $this->uri->segment(3) == '' || $this->uri->segment(3) == 'detail' ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo site_url('panel-admin/ppdb') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>		

		<li class="nav-item <?php echo strstr($this->uri->uri_string(), '/pending') ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('panel-admin/ppdb/pending') ?>">
				<i class="fas fa-fw fa-clock"></i>
				<span>Pending</span>
			</a>
		</li>

		<li class="nav-item <?php echo strstr($this->uri->uri_string(), '/verif') ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('panel-admin/ppdb/verif') ?>">
				<i class="fas fa-fw fa-money-check-alt"></i>
				<span>Verifikasi</span>
			</a>
		</li>

		<li class="nav-item <?php echo strstr($this->uri->uri_string(), '/valid') ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('panel-admin/ppdb/valid') ?>">
				<i class="fas fa-fw fa-check"></i>
				<span>Valid</span>
			</a>
		</li>
		
		<li class="nav-item <?php echo strstr($this->uri->uri_string(), '/pengaturan') ? 'active' : '' ?>">
			<a class="nav-link" href="<?php echo base_url('panel-admin/pengaturan') ?>">
				<i class="fas fa-fw fa-cog"></i>
				<span>Pengaturan</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-block">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>
	</div>
</ul>