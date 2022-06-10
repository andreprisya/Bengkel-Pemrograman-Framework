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
						<input type="hidden" name="id" value="<?= $ukm['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama UKM</label>
							<input name="nama" value="<?= $ukm['nama']; ?>" type="text" class="form-control" id="nama" placeholder="Nama UKM">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="singkatan">Singkatan</label>
							<input name="singkatan" value="<?= $ukm['singkatan']; ?>" type="text" class="form-control" id="singkatan" placeholder="Singkatan">
							<?= form_error('singkatan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="tahun_berdiri">Tahun Berdiri</label>
							<input value="<?= $ukm['tahun_berdiri']; ?>" name="tahun_berdiri" type="text" class="form-control" id="tahun_berdiri" placeholder="Tahun Berdiri">
							<?= form_error('tahun_berdiri', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="bidang">Bidang</label>
							<input value="<?= $ukm['bidang']; ?>" name="bidang" type="text" class="form-control" id="bidang" placeholder="Bidang">
							<?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<a href="<?= base_url('Ukm') ?>" class="btn btn-danger">Tutup</a>
						<button type="submit" name="tambah" class="btn btn-primary float-right">Ubah UKM</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
