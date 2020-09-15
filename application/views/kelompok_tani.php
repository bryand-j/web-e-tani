<div class="main-panel scr">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Kelompok Tani</h4>
							</div>
						</div>
						<div class="card-body">
							<table id="data-tb" class="display table table-striped table-hover" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>No Sk Poktan</th>
										<th>Nama Poktan</th>
										<th>Tanggal Berdiri</th>
										<th>Jumlah Anggota</th>
										<th>Status</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>No Sk Poktan</th>
										<th>Nama Poktan</th>
										<th>Tanggal Berdiri</th>
										<th>Jumlah Anggota</th>
										<th>Status</th>
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
							<label>No Sk Portan</label>
							<input disabled="true" type="text" class="form-control kmk" name="no_sk_portan" placeholder="no_sk_portan" aria-label="no_sk_portan">

						</div>
						<div class="form-group col-md-12">
							<label>Nama Portan</label>

							<input disabled="true" type="text" class="form-control kmk" name="nama_portan" placeholder="nama_portan" aria-label="nama_portan">

						</div>
						<div class="form-group col-md-12">
							<label>Tanggal Berdiri</label>
							<input type="date" class="form-control txt" name="tanggal_berdiri" placeholder="Masukan Tanggal Berdiri">
						</div>
						<div class="form-group col-md-12">
							<label>Jumlah Anggota</label>
							<input type="number" class="form-control txt" name="jumlah_anggota" placeholder="Masukan Jumlah Anggota">
						</div>
						<div class="form-group col-md-12">
							<label>Status</label>
							<input type="text" class="form-control txt" name="status" placeholder="Masukan Status">
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

<?php $this->load->view('include/script'); ?>
<script>
	let url = "<?= base_url() ?>/kelompok_tani/getData";
	table = get(url, null);


	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];

		$('#my-modal [name="id"]').val(data[0]);
		$('#my-modal [name="no_sk_portan"]').val(data[2]);
		$('#my-modal [name="nama_portan"]').val(data[3]);
		$('#my-modal [name="tanggal_berdiri"]').val(data[4]);
		$('#my-modal [name="jumlah_anggota"]').val(data[5]);
		$('#my-modal [name="status"]').val(data[6]);


		$('#my-modal').modal({
			keyboard: false,
			backdrop: 'static',
		});


	});

	$('tbody').on('click', '.hapus', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];
		var url2 = "<?= base_url() ?>/kelompok_tani/delete";
		hapus(url2, id);
		table.ajax.reload();


	});

	$(document).ready(function() {
		$('#myform').on('submit', function(e) {
			e.preventDefault();
			url1 = "<?= base_url() ?>/kelompok_tani/update";
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