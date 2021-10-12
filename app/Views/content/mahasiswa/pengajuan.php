<?= $this->extend('layout/mahasiswa'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-2 mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buatAjuanModal">Buat Ajuan</button>
    </div>
    <div class="col-lg-10">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="kolomCari" name="cari" placeholder="Cari Ajuan">
            <button class="btn btn-warning" type="button" id="btnCari">Search</button>
        </div>
    </div>
</div>

<div class="row table-responsive">
    <table class="table text-center" id="ajuanTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Submit</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">NIP Dosen</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Waktu Bimbingan</th>
                <th scope="col">Status Ajuan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ajuan as $data) : ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?= $data['created_at']; ?></td>
                    <td><?= $data['keterangan']; ?></td>
                    <td><?= $data['nama_dosen']; ?></td>
                    <td><?= $data['nip_dosen']; ?></td>
                    <td><?= $data['jurusan']; ?></td>
                    <td>
                        <?php if ($data['status'] == 'Disetujui') {
                            echo $data['tanggal_bim'] . '|' . $data['jam_bim'];
                        } else {
                            echo '-';
                        }
                        ?></td>
                    <td><?= $data['status']; ?></td>
                    <td>
                        <a href="<?= base_url('mahasiswa/delete/' . $data['ajuanid']); ?>">Hapus</a>
                        <a href="">Cetak Bukti</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="buatAjuanModal" tabindex="-1" aria-labelledby="buatAjuanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatAjuanModalLabel">Buat Ajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('mahasiswa/insert') ?>" method="POST">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP Dosen</label>
                        <input type="text" class="form-control" name="nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        Rentang Pemilihan Jadwal <br>
                        <label for="tgl_mulai" class="form-label">Mulai:</label>
                        <input type="date" class="form-control" name="tgl_mulai" required>

                        <label for="tgl_akhir" class="form-label">Sampai:</label>
                        <input type="date" class="form-control" name="tgl_akhir" required>
                    </div>

                    <input type="hidden" name="userid" value="<?= $userid; ?>">
                    <input type="hidden" name="nama_mhs" value="<?= $nama; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#btnCari").click(function() {
            var value = $('#kolomCari').val().toLowerCase();
            $("#ajuanTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<?= $this->endSection(''); ?>