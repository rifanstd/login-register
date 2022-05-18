<?php
// require files
require 'functions.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Boostrap CSS -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

    <title>Register</title>

</head>
<body>

    <!-- Register -->
    <div class="container mt-5" style="max-width: 500px">
        <div class="row text-center">
            <h1>Login</h1>
        </div>
        <div class="row">
            <div class="col-md">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Please input your username here!">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Input your password!">
                        <div class="form-text">Password must be at least 8 characters!</div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm your password!">
                        <div class="form-text">Password must be same with your password above!</div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End of register -->

    <!-- Execute php -->
    <div class="container mt-2" style="max-width: 500px;">
        <div class="row text-center">
            <div class="col-md">
                <?php if (isset($_POST["register"])) { ?>
                    <!-- if successed -->
                    <?php if (register($_POST) > 0) { ?>
                        <p class="fw-bold" style="color: green;">Pendaftaran berhasil! Selamat.</p>
                        <a href="login.php">
                            <form>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </a>
                    <?php } elseif (register($_POST) == 0) { ?>
                        <span class="fw-bold" style="color: red;">Username sudah digunakan oleh user lain.</span>
                        <br>
                        <span class="fw-bold" style="color: red;">Silahkan gunakan username yang lain.</span>
                    <?php } elseif (register($_POST) == -1) { ?>
                        <p class="fw-bold mt-0" style="color: red;">Password harus terdiri dari minimal 8 karakter!</p>
                    <?php } elseif (register($_POST) == -2) { ?>
                        <p class="fw-bold" style="color: red;">Konfirmasi password salah. Harap periksa kembali.</p>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- end of execute -->



    <!-- Bootstrap JS -->
    <script src="bootstrap\js\bootstrap.min.js"></script>
</body>
</html>