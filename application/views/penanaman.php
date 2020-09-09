<div class="main-panel scr" >
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Penanaman</h4>
							</div>
						</div>
						<div class="card-body">
							<table id="data-tb" class="display table table-striped table-hover" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Kelompok Tani</th>
										<th>Pemilik Lahan</th>
										<th>Jenis tanaman</th>
										<th>Nama tanaman</th>
										<th>Tanggal tanam</th>
										<th>Perkiraan panen</th>
										<th>Jumlah tanam</th>
										<th>Jumlah panen</th>
										<th>Status penanaman</th>
										<th>Realisasi panen</th>
										<th>Kebutuhan</th>
										<th>Estimasi biaya</th>
										<th>Realisasi kebutuhan</th>
										<th>Foto</th>
										<th>Lokasi</th>
										<th>aksi</th>
									</tr>
								</thead>
							

							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Modal add -->
<div class="modal fade" id="my-modal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<form id="myform">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="id" value="">
						<div class="form-group col-md-12">
							<label>Elemen Matakuliah</label>
							<select name="elemenmk" class="form-control myselect" style="width:100%;">
							<option value="" selected disabled>Pilih Elemen Matakuliah</option>
							
						</select>
						</div>
						<div class="form-group col-md-12">
							<label>Kode Mk</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">...</span>
								</div>
								<input disabled="true" type="text" class="form-control kmk" name="kodemk" placeholder="kode matakuliah" aria-label="kodemk" aria-describedby="basic-addon1">
							</div>
						</div>
						<div class="form-group col-md-12">
							<label>Nama Mk</label>
							<input type="text" class="form-control txt" name="namamk" placeholder="Masukan Nama Elemen">
						</div>
						<div class="form-group col-md-12">
							<label>SKS</label>
							<input type="number" class="form-control txt" name="sks" placeholder="Masukan Nama Elemen">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-success btn-round edit-data">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('include/script');?>

<script>
	let url="<?= base_url()?>/penanaman/getData";
	table = get(url,null);
</script>

</body>

</html>
