<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url() ?>Prodi/tambah" class="btn btn-info mb-2">Tambah Prodi</a></div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Prodi</td>
                        <td>Ruangan</td>
                        <td>Jurusan</td>
                        <td>Akreditasi</td>
                        <td>Nama Kaprodi</td>
                        <td>Tahun Berdiri</td>
                        <td>Output Lulusan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Teknik Informatika</td>
                        <td>328</td>
                        <td>JTI</td>
                        <td>A</td>
                        <td>Kartina Diah Kusuma Wardhani, S.T., M.T.</td>
                        <td>2008</td>
                        <td>Multimedia</td>
                        <td>
                            <a href="" class="badge badge-danger">Hapus</a>
                            <a href="" class="badge badge-warning">Edit</a>
                            <a href="" class="badge badge-info">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->

<!-- </div> -->
<!-- End of Main Content -->