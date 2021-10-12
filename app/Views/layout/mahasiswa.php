<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mahasiswa</title>
</head>

<body class="container">
    <header>
        <nav>
            <ul>
                <li>
                    <a href="<?= base_url('mahasiswa') ?>">Home</a>
                </li>
                <li>
                    <a href="<?= base_url('mahasiswa/pengajuan') ?>">Pengajuan</a>
                </li>
                <li>
                    <a href="">Panduan</a>
                </li>
            </ul>

            <div>
                <p><?= $nama; ?></p>
                <a href="<?= base_url('user/logout'); ?>">logout</a>
            </div>
        </nav>

        <?php if (session()->getFlashData('alert')) {
            echo session()->getFlashData('alert');
        } ?>

    </header>
    <main>
        <?= $this->renderSection('content'); ?>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>