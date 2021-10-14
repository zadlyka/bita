<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ajuan['ajuanid']; ?>-BiTA</title>
    <style>
        .main-print {
            border: 1px solid black;
            padding: 80px;
            margin: 50px;
        }

        .header-text {
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            width: 70%;
            margin: auto;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="main-print">
        <div class="header-text">
            <h2>Jadwal Bimbingan Tugas Akhir</h2>
            <p>Ajuan ID : <?= $ajuan['ajuanid']; ?></p>
        </div>
        <table style="border-collapse: collapse;">
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
</body>

</html>