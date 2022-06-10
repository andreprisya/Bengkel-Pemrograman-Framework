<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
				<div class="card-header">
					Form Tambah Data UKM
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama">Nama UKM</label>
							<input name="nama" type="text" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama UKM">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="singkatan">Singkatan</label>
							<input name="singkatan" type="text" value="<?= set_value('singkatan'); ?>" class="form-control" id="singkatan" placeholder="Singkatan">
							<?= form_error('singkatan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label for="tahun_berdiri">Tahun Berdiri</label>
							<input name="tahun_berdiri" type="text" value="<?= set_value('tahun_berdiri'); ?>" class="form-control" id="tahun_berdiri" placeholder="Tahun Berdiri">
							<?= form_error('tahun_berdiri', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="bidang">Bidang</label>
							<input name="bidang" type="text" value="<?= set_value('bidang'); ?>" class="form-control" id="bidang" placeholder="Bidang">

							<?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah UKM</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
