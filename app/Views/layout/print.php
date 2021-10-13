<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container p-5">
        <div class="row text-center">
            <h2>Jadwal Bimbingan Tugas Akhir</h2>
            <p>Ajuan ID : <?= $ajuan['ajuanid']; ?></p>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Inputan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tanggal Submit</td>
                        <td><?= $ajuan['created_at']; ?></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><?= $ajuan['keterangan']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Dosen</td>
                        <td><?= $ajuan['nama_dosen']; ?></td>
                    </tr>
                    <tr>
                        <td>NIP Dosen</td>
                        <td><?= $ajuan['nip_dosen']; ?></td>
                    </tr>
                    <tr>
                        <td>NIM Mahasiswa</td>
                        <td><?= $ajuan['nim_mhs']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td><?= $ajuan['nama_mhs']; ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td><?= $ajuan['jurusan']; ?></td>
                    </tr>
                    <tr>
                        <td>Waktu Bimbingan</td>
                        <td><?= $ajuan['tanggal_bim'] . ' | ' . $ajuan['jam_bim']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $ajuan['status']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>