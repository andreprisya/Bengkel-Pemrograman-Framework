<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Prodi</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" name="ruangan" class="form-control" id="ruangan" placeholder="Ruangan">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control">
                                <option value="">Jurusan</option>
                                <option value="JTI">JTI</option>
                                <option value="JTIN">JTIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="akreditasi">Akreditasi</label>
                            <input type="text" name="akreditasi" class="form-control" id="akreditasi" placeholder="Akreditasi">
                        </div>

                        <div class="form-group">
                            <label for="kaprodi">Nama Kaprodi</label>
                            <input type="text" name="kaprodi" class="form-control" id="kaprodi" placeholder="Nama Kaprodi">
                        </div>

                        <div class="form-group">
                            <label for="berdiri">Tahun Berdiri</label>
                            <input type="text" name="berdiri" class="form-control" id="berdiri" placeholder="Tahun Berdiri">
                        </div>

                        <div class="form-group">
                            <label for="lulusan">Output Lulusan</label>
                            <input type="text" name="lulusan" class="form-control" id="lulusan" placeholder="Output Lulusan">
                        </div>

                        <!-- <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <select name="prodi" id="prodi" class="form-control">
                                <option value="">Ppilih Prodi</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Asal Sekolah">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="asal_sekolah" placeholder="No HP">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                        </div> -->
                        <a href="<?= base_url('Prodi') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Prodi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>