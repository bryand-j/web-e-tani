<div class="main-panel scr">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header row">
							<div class="d-flex align-items-center ml-3 ">
								<h4 class="card-title">Penyuluh Provinsi</h4>
							</div>
							<button class="ml-auto mr-5 btn btn-primary btn-border btn-round tambah">Tambah</button>
						</div>
						<div class="card-body">
							<table id="data-tb" class="display table table-striped table-hover" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nama</th>
										<th>Golongan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Agama</th>
										<th>Jenis Kelamin</th>
										<th>Password</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nama</th>
										<th>Golongan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Agama</th>
										<th>Jenis Kelamin</th>
										<th>Password</th>
										<th>aksi</th>
									</tr>
								</tfoot>

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
				<h5 class="modal-title" id="exampleModalLongTitle">Form User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<form id="myform">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="id" value="">

						<div class="form-group col-md-12">
							<label>Nama</label>
							<input type="text" class="form-control kmk" name="nama" placeholder="nama" aria-label="nama">

						</div>
						<div class="form-group col-md-12">
							<label>Golongan</label>
							<select class="form-control txt" name="golongan">
								<option value="I A">I A</option>
								<option value="I B">I B</option>
								<option value="I C">i C</option>
								<option value="I D">I D</option>
								<option value="II A">II A</option>
								<option value="II B">II B</option>
								<option value="II C">II C</option>
								<option value="II D">II D</option>
								<option value="III A">III A</option>
								<option value="III B">III B</option>
								<option value="III C">III C</option>
								<option value="III D">III D</option>
								<option value="IV A"> IV A</option>
								<option value="IV B">IV B</option>
								<option value="IV C">IV C</option>
								<option value="IV D">IV D</option>
								<option value="IV E">IV E</option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Tempat Lahir</label>
							<input type="text" class="form-control txt" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
						</div>
						<div class="form-group col-md-12">
							<label>Tanggal Lahir</label>
							<input type="date" class="form-control txt" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
						</div>
						<div class="form-group col-md-12">
							<label>Agama</label>
							<select name="agama" class="form-control txt">
								<option selected disabled>Pilih Agama</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katolik">Katolik</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control txt">
								<option selected disabled>Jenis Kelamin</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
							<!-- <input type="text" class="form-control txt" name="jenis_kelamin" placeholder="Masukan Jenis Kelamin"> -->
						</div>
						<div class="form-group col-md-12">
							<label>Password</label>
							<input type="text" class="form-control txt" name="password" placeholder="Masukan Password">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-border btn-round" data-dismiss="modal">batal</button>
					<button type="submit" class="btn btn-success btn-round edit-data">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('include/script'); ?>
<script>
	let url = "<?= base_url() ?>/user/getData";
	table = get(url, null);


	$('.tambah').on('click', function() {
		$('#my-modal [name="id"]').val(null);
		$('#myform').trigger("reset");
		$('#my-modal').modal('show');

	});


	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];

		$('#my-modal [name="id"]').val(data[0]);
		$('#my-modal [name="nama"]').val(data[2]);
		$('#my-modal [name="golongan"]').val(data[3]).trigger('change');
		$('#my-modal [name="tempat_lahir"]').val(data[4]);
		$('#my-modal [name="tgl_lahir"]').val(data[5]);
		$('#my-modal [name="agama"]').val(data[6]).trigger('change');
		$('#my-modal [name="jenis_kelamin"]').val(data[7]).trigger('change');
		$('#my-modal [name="password"]').val(data[8]);

		$('#my-modal').modal({
			keyboard: false,
			backdrop: 'static',
		});
	});

	$('tbody').on('click', '.hapus', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];
		var url2 = "<?= base_url() ?>/user/delete";
		hapus(url2, id);
		table.ajax.reload();


	});

	$(document).ready(function() {
		$('#myform').on('submit', function(e) {
			e.preventDefault();
			url1 = "<?= base_url() ?>/user/update";
			let data = new FormData(this);
			post(url1, data);
			table.ajax.reload();
			$('#myform').trigger("reset");
			$('#my-modal').modal('hide');
		});
	});
</script>

</body>

</html>