<?php
require_once 'features/library.php';

session_start();

$library = new Library();

if (isset($_SESSION['username'])) {
    $userInfo = $library->getUserInfo($_SESSION['username']);
    if (is_object($userInfo)) {
        $username = $userInfo->username;
    }
}

if (isset($_POST['logout'])) {
    $message = $userManagement->logoutUser();
    echo "<script>alert('$message');</script>";
}

$books = $library->getAllBooks();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Aplikasi Perpustakaan PHP | Anwar Ajijuloh</title>
</head>

<body>
    <header class="p-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0">
                    <img src="img/andev-logo.png" width="40" height="40" alt="Anwar Developer">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#home" class="nav-link px-2 text-secondary fw-bolder">Home</a></li>
                    <li><a href="#book" class="nav-link px-2 text-secondary">Book</a></li>
                    <li><a href="#about" class="nav-link px-2 text-secondary">About</a></li>
                </ul>

                <div class="text-end">
                    <?php if (isset($_SESSION['username'])) : ?>
                        <p class="me-2">Hello <?= $_SESSION['username']; ?>!</p>
                        <button type="button" class="btn btn-danger" name="logout">Keluar</button>
                    <?php else : ?>
                        <button type="button" class="btn btn-outline-dark me-2"><a href="login.php" class="text-decoration-none text-dark">Login</a></button>
                        <button type="button" class="btn btn-success"><a href="register.php" class="text-decoration-none text-light">Register</a></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <div id="home" class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://wallpapers.com/images/hd/colorful-bookshelf-vector-illustration-9pk8lci6j9gxzjer.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="500" height="400" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Membaca Buku Jendela Dunia.</h1>
                <p class="lead">Membaca ialah upaya merekuk makna ikhtiar untuk memahami alam semesta. Itulah mengapa buku disebut jendela dunia, yang merangsang pikiran agar terus terbuka.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="cari judul atau penulis.." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="book" class="container">
        <h1 class="display-5 fw-bold text-center">Koleksi Terkini</h1>
        <hr>
        <div class="row d-flex g-4 py-4 align-items-center">
            <?php foreach ($books as $book) : ?>
            <div class="col-lg-2 col-4 col-sm-4">
                <img src="https://picsum.photos/id/<?= $book->getBookId() ?>/200/300" alt="book-love" class="d-block mx-lg-auto img-fluid" width="300" height="400" loading="lazy">
            </div>
            <div class="col-lg-4 col-8 col-sm-8 px-4">
                <h4 class="display-8 fw-bold"><a href="book_detail.php?id=<?php echo $book->getBookId(); ?>" class="text-decoration-none"><?= $book->getTitle() ?></a></h4>
                <p>penulis: <?= $book->getAuthor() ?></p>
                <p>Tahun: <?= $book->getYear() ?></p>
                <p>ISBN: <?= $book->getIsbn() ?></p>
                <p>Penerbit: <?= $book->getPublisher() ?></p>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <div id="about" class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Anwar Ajijuloh</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Web Aplikasi Perpustakaan menggunakan PHP dengan Object Oriented Programming yang Membangun program pada modul kerja yang memungkinkan berkomunikasi satu sama lain.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold"><a href="https://github.com/anwarajijuloh" class="text-decoration-none text-info">GITHUB</a></button>
                </div>
            </div>
        </div>
    </div>
    <footer class="d-flex flex-column justify-content-center align-items-center py-4">
        <p>Aplikasi dibuat murni menggunakan <a href="https://getbootstrap.com/" class="text-decoration-none fw-bolder text-secondary">Bootstrap</a> by <a href="https://github.com/anwarajijuloh" class="text-decoration-none fw-bolder text-secondary">@anwarajijuloh</a>.</p>
        <p>
            <a href="#" class="text-decoration-none fw-bolder text-success">Kembali Keatas</a>
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>