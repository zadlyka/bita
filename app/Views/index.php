<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BiTA - Bimbingan Tugas Akhir</title>
</head>

<body class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="text-dark text-decoration-none">
            <h1>BiTA`</h1>
        </a>
        <?php if (session()->getFlashData('alert')) {
            echo session()->getFlashData('alert');
        } ?>
    </header>

    <main>
        <div class="p-5 mb-4 bg-primary text-white rounded-3">
            <div class="container-fluid m-10">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="display-5">Ayo Bimbingan!!</h3>
                        <p class="lead">Jadwalkan Bimbinganmu dengan BiTA</p>
                        <a href="" class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        <a href="" class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="<?= base_url('assets/img/schedule.svg'); ?>" height="250px">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="userid" class="form-label">User ID</label>
                            <input type="text" name="userid" class="form-control" placeholder="NIP / NIM">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="********">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/register'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="userid" class="form-label">User ID</label>
                            <input type="text" name="userid" class="form-control" placeholder="NIP / NIM">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role">
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Dosen">Dosen</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="********">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="pt-3 mt-4 text-center border-top">
        © 2021
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>