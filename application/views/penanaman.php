<div class="main-panel scr">
	<div class="content">
		<div class="page-inner" style="margin-top: 60px;">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header row">
							<div class="d-flex align-items-center ml-3 ">
								<h4 class="card-title">Penanaman</h4>

							</div>
							<div class="ml-auto d-flex flex-row">

								<select class="form-control mr-3 input-solid" id="tahun">
									<?php
									$tahun = date('Y');
									for ($i = $tahun; $i > 2015; $i--) : ?>
										<option value="<?= $i ?>"><?= 'Tahun ' . $i ?></option>
									<?php endfor; ?>

								</select>
								<button class="mr-5 btn btn-primary btn-round cetak">Cetak Laporan</button>
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
							<label>Pemilik Lahan</label>
							<input type="text" class="form-control txt" name="pemilik" readonly placeholder="Masukan Nama Elemen">
						</div>
						<div class="form-group col-md-12">
							<label>Kelompok Tani</label>
							<input type="text" class="form-control txt" name="poktan" readonly placeholder="Masukan Nama Elemen">
						</div>
						<div class="form-group col-md-12">
							<label>Nama Tanaman</label>
							<input type="text" class="form-control txt" name="nama_tanaman" readonly>
						</div>
						<div class="form-group col-md-6">
							<label>Tanggal Tanam</label>
							<input type="date" class="form-control txt" name="tgl_tanam">
						</div>
						<div class="form-group col-md-6">
							<label>Perkiraan Tanggal Panen</label>
							<input type="date" class="form-control txt" name="perkiraan_tgl_panen">
						</div>
						<div class="form-group col-md-6">
							<label>Jumlah Tanam</label>
							<input type="number" class="form-control txt" name="jumlah_tanam">
						</div>
						<div class="form-group col-md-6">
							<label>Jumlah Panen</label>
							<input type="number" class="form-control txt" name="jumlah_panen">
						</div>
						<div class="form-group col-md-12">
							<label>Status Penanaman</label>
							<input type="text" class="form-control txt" name="status_penanaman">
						</div>
						<div class="form-group col-md-12">
							<label>Realisasi Panen</label>
							<input type="text" class="form-control txt" name="realisasi_panen">
						</div>
						<div class="form-group col-md-12">
							<label>Kebutuhan</label>
							<textarea class="form-control txt" style="margin-top: 0px; margin-bottom: 0px; height: 140px;" rows="5" name="kebutuhan">
							</textarea>
						</div>
						<div class="form-group col-md-12">
							<label>Estimasi Biaya</label>
							<input type="text" class="form-control txt" name="estimasi_biaya">
						</div>
						<div class="form-group col-md-12">
							<label>Realisasi Kebutuhan</label>
							<input type="text" class="form-control txt" name="realisasi_kebutuhan">
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
	let url = "<?= base_url() ?>/penanaman/getData";
	table = get(url, null);


	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];

		$('#my-modal [name="id"]').val(data[0]);
		$('#my-modal [name="pemilik"]').val(data[3]);
		$('#my-modal [name="poktan"]').val(data[2]);
		$('#my-modal [name="nama_tanaman"]').val(data[5]);
		$('#my-modal [name="tgl_tanam"]').val(data[6]);
		$('#my-modal [name="perkiraan_tgl_panen"]').val(data[7]);
		$('#my-modal [name="jumlah_tanam"]').val(data[8]);
		$('#my-modal [name="jumlah_panen"]').val(data[9]);
		$('#my-modal [name="status_penanaman"]').val(data[10]);
		$('#my-modal [name="realisasi_panen"]').val(data[11]);
		$('#my-modal [name="kebutuhan"]').val(data[12]);
		$('#my-modal [name="estimasi_biaya"]').val(data[13]);
		$('#my-modal [name="realisasi_kebutuhan"]').val(data[14]);


		$('#my-modal').modal({
			keyboard: false,
			backdrop: 'static',
		});


	});

	$('#myform').on('submit', function(e) {
		e.preventDefault();
		url1 = "<?= base_url() ?>/penanaman/update";
		post(url1, new FormData(this));
		table.ajax.reload();
		$('#myform').trigger("reset");
		$('#my-modal').modal('hide');

	});


	$('tbody').on('click', '.hapus', function() {
		let data = table.row($(this).parents('tr')).data();
		let id = data[0];
		var url2 = "<?= base_url() ?>/penanaman/delete";
		hapus(url2, id);
		table.ajax.reload();
	});
	$('.cetak').click(function(e) {

		let tahun = $('#tahun').val();
		$('#pdf').attr('src', '<?= base_url() ?>penanaman/report?tahun=' + tahun);

	});
</script>

</body>

</html>