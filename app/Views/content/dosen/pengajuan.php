<?= $this->extend('layout/dosen'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-lg-2 mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buatAjuanModal">Buat Ajuan</button>
    </div>
    <div class="col-lg-10">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="kolomCari" name="cari" placeholder="Cari Ajuan">
            <button class="btn btn-secondary" type="button" id="btnCari">Search</button>
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
                <th scope="col">Nama Mahasiswa</th>
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
                    <td><?= $data['nama_mhs']; ?></td>
                    <td>
                        <?php if ($data['status'] == 'Disetujui') {
                            echo $data['tanggal_bim'] . '|' . $data['jam_bim'];
                        } else {
                            echo $data['pilihan_tgl_mulai'] . ' s/d ' . $data['pilihan_tgl_akhir'];
                        }
                        ?>
                    </td>
                    <td><?= $data['status']; ?></td>
                    <td>
                        <?php if ($data['status'] !== 'Ditolak') {
                                echo $data['tanggal_bim'] . ' | ' . $data['jam_bim'];
                                ?>
                                <a href="">Cetak Bukti</a>
                        <?php    } 
                        ?>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buatAjuanModal">Tanggapi</button>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tolakAjuanModal">Tolak</button>
                        <a href="<?= base_url('dosen/delete/' . $data['ajuanid']); ?>"><button class="btn btn-danger">Hapus</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$uri = service('uri');
?>

<!-- Modal -->
<div class="modal fade" id="buatAjuanModal" tabindex="-1" aria-labelledby="buatAjuanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatAjuanModalLabel">Buat Ajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dosen/update'). $uri->getSegment(3) ?>" method="POST">
                    <div class="mb-3">
                        Pemilihan Jadwal <br>
                        <label for="tgl_mulai" class="form-label">Tanggal:</label>
                        <input type="date" class="form-control" name="tgl_bim" required>

                        <label for="tgl_akhir" class="form-label">Jam:</label>
                        <input type="time" class="form-control" name="jam_bim" required>
                    </div>

                    <input type="hidden" name="id_ajuan" value="<?= $uri->getSegment(3); ?>">
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tolak-->
<div class="modal fade" id="tolakAjuanModal" tabindex="-1" aria-labelledby="tolakAjuanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakAjuanModalLabel">Tolak Ajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dosen/cancel'). $uri->getSegment(3) ?>" method="POST">
                <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                    <input type="hidden" name="id_ajuan" value="<?= $uri->getSegment(3); ?>">
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