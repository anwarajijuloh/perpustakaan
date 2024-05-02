<?php
require_once 'features/library.php';

session_start();

$library = new Library();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = $library->registerUser($username, $password);
    echo "<script>alert('$message');</script>";
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Daftar terlebih dahulu.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-center">

    <main class="form-signin col-6 col-lg-4 mx-auto p-lg-5 p-2 mt-5 rounded shadow">
        <form action="" method="post">
            <img class="my-5" src="img/andev-logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-bold">Silahkan masuk terlebih dahulu</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="example">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 mb-4 btn btn-lg btn-primary" name="register" type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>