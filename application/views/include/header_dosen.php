
<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" data-background-color="blue">
		
		<a href="#" class="logo">
			<img src="<?=base_url()?>assets/img/lg.svg" alt="navbar brand" class="navbar-brand">
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
		
		<div class="container-fluid">
		
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

				<li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="<?=base_url()?>assets/images/dosen/<?=$this->session->userdata('foto');?>" alt="user" class="FotoUser avatar-img rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-user animated fadeIn">
						<div class="dropdown-user-scroll scrollbar-outer">
							<li>
								<div class="user-box">
									<div class="avatar-lg"><img src="<?=base_url()?>assets/images/dosen/<?=$this->session->userdata('foto');?>" alt="user" class="avatar-img rounded FotoUser"></div>
									<div class="u-text">
										<h4 class="nUser"><?=$this->session->userdata('nama');?></h4>
										<p class="text-muted"><?=$this->session->userdata('lv');?></p><a href="<?=base_url()?>dosen/profile" class="btn btn-xs btn-secondary btn-sm">Profile</a>
									</div>
								</div>
							</li>
							<li>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url()?>login/logout">Logout</a>
							</li>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>

<div class="modal fade" id="printModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Print Daftar Nilai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<form id="PrintForm">
				<div class="modal-body">
					<div class="row">
				
						<div class="form-group col-md-12">
							<label>Mahasiswa</label>
							<select name="nimPrint" class="form-control selectNim" style="width:100%;">
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Judul TA</label>
							<input type="text" placeholder="Judul Tugas akhir" name="judulTa" class="form-control" style="width:100%;">
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-primary btn-round">Print Preview
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


