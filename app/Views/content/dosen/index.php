<?= $this->extend('layout/dosen'); ?>
<?= $this->section('content'); ?>
<section id="home" class="home">
    <div class="container p-5">
        <div class="row">
            <div class="col-12 pb-5">
                <div id="tanggal"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h1 class="fw-bold">Ayo Bimbingan !!</h1>
                <p>Jadwalkan bimbinganmu dengan BTA</p>
                <span class="baru">
                    <a href="#login" id="login" class="btn btn-warning fw-bold text-white me-2 px-4">Mulai</a>
                </span>
            </div>
            <div class="col-sm-0 col-md-4">
                <img src="<?= base_url('assets/img/schedule.svg') ?>" class="float-end" width="304" height="236" alt="login">
            </div>
        </div>
    </div>
</section>

<section id="pengajuan" class="pengajuan">
    <div class="container mt-3">
        <div class="row">
            <div class="bb col-md my-2 me-2 bg-warning">
                <div class="box py-5 mt-1 text-center text-white">
                    <p>Jumlah Pengajuan yang Masuk</p>
                    <span class="display-6 fw-bold"><?= count($pengajuan); ?></span>
                </div>
            </div>
            <div class="bb col-md my-2 me-2 bg-secondary">
                <div class="box py-5 mt-1 text-center text-white">
                    <p>Jumlah Pengajuan yang Disetujui</p>
                    <span class="display-6 fw-bold"><?= count($disetujui); ?></span>
                </div>
            </div>
            <div class="bb col-md my-2 ms-2 bg-light">
                <div class="box py-5 mt-1 text-center text-black">
                    <p>Jumlah Pengajuan yang Tidak Disetujui</p>
                    <span class="display-6 fw-bold"><?= count($ditolak); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>