<?= $this->extend('layout/dosen') ;?>
<?= $this->section('content') ;?>

<div>
    <h2>Jumlah Pengajuan Bimbingan Yang Masuk</h2>
    <h3><?=count($pengajuan); ?></h3>
</div>

<div>
    <h2>Jumlah Pengajuan yang Disetujui</h2>
    <h3><?= count($disetujui); ?></h3>
</div>

<div>
    <h2>Jumlah Pengajuan yang Tidak Disetujui</h2>
    <h3><?= count($ditolak); ?></h3>
</div>

<?= $this->endSection() ;?>
