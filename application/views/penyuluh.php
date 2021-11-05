<div class="main-panel scr">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Penyluh</h4>
							</div>
						</div>
						<div class="card-body">
							<table id="data-tb" class="display table table-striped table-hover" cellspacing="0" style="width:100%;">
								<thead>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nama Penyuluh</th>
										<th>Golongan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Agama</th>
										<th>Keterangan</th>
										<th>Status</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>id</th>
										<th>No</th>
										<th>Nama Penyuluh</th>
										<th>Golongan</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Agama</th>
										<th>Keterangan</th>
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
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="flaticon-cross"></i></span>
				</button>
			</div>
			<form id="myform">
				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="id" value="">
						<div class="form-group col-md-12">
							<label>Nama Penyuluh</label>
							<input type="text" class="form-control kmk" name="nama_penyuluh" placeholder="nama_penyuluh" aria-label="nama_penyuluh">
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
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control txt">
								<option selected disabled>Jenis Kelamin</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
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
							<label>Keterangan</label>
							<select name="keterangan" class="form-control txt">
								<option value="PNS">PNS</option>
								<option value="CPNS">CPNS</option>
								<option value="Honorer/Kontrak">Honorer/Kontrak</option>
								<option value="THL-TB">THL-TB</option>
								<option value="Penyuluh Swadaya">Penyluh Swadaya</option>
								<option value="Penyuluh Swasta">Penyuluh Swasta</option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Status</label>
							<select name="status" class="form-control txt">
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
						</div>
						<div class="form-group col-md-12" id="alasan">
							<label>Alasan</label>
							<input type="text" class="form-control txt" name="alasan" placeholder="Masukan Alasan">
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
<div id="temp"></div>

<?php $this->load->view('include/script'); ?>
<script>
	let url = "<?= base_url() ?>/penyuluh/getData";
	table = get(url, null);
	$('#temp').hide();
	$('#alasan').hide();


	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];
		$('#temp').html(data[9]);
		let status = $('#temp input').val();
		$('#my-modal [name="id"]').val(data[0]);
		$('#my-modal [name="nama_penyuluh"]').val(data[2]);
		$('#my-modal [name="golongan"]').val(data[3]).trigger('change');
		$('#my-modal [name="tempat_lahir"]').val(data[4]);
		$('#my-modal [name="tgl_lahir"]').val(data[5]);
		$('#my-modal [name="jenis_kelamin"]').val(data[6]).trigger('change');
		$('#my-modal [name="agama"]').val(data[7]).trigger('change');
		$('#my-modal [name="keterangan"]').val(data[8]);
		$('#my-modal [name="status"]').val(status).trigger('change');
		$('#my-modal [name="alasan"]').val($('#temp input').data('content'));

		$('#my-modal').modal({
			keyboard: false,
			backdrop: 'static',
		});


	});



	$('tbody').on('click', '.hapus', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];
		var url2 = "<?= base_url() ?>/penyuluh/delete";
		hapus(url2, id);
		table.ajax.reload();


	});

	$(document).ready(function() {
		$('#myform').on('submit', function(e) {
			e.preventDefault();
			url1 = "<?= base_url() ?>/penyuluh/update";
			let data = new FormData(this);
			post(url1, data);
			table.ajax.reload();
			$('#myform').trigger("reset");
			$('#my-modal').modal('hide');

		});


	});


	$('tbody').on('mouseenter', '.popStatus', function() {

		$(this).popover({

			title: "Alasan :",
			placement: "bottom",
			trigger: 'hover',
			html: true,
			//content: 'Oke Ajalah' + $(this).data('conten'),
			delay: {
				'show': 60,
				'hide': 3000
			},
			template: '<div class="popover " role="tooltip"><div class="arrow"></div><h3 class="popover-header text-warning"></h3><div class="popover-body"></div></div>'
		});
		$(this).popover('show');
	});
	$('tbody').on('mouseleave', '.popStatus', function() {
		setTimeout(() => {
			$(this).popover('hide');
		}, 500);
	});


	$('#my-modal [name="status"]').on('change', function() {
		if ($(this).val() == "Aktif") {
			$('#alasan').hide();
		} else {
			$('#alasan').show();
		}
	});
</script>

</body>

</html>