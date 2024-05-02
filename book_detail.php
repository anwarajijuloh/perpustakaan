<?php
require_once 'features/library.php';

// Inisialisasi objek LibraryManagement
$library = new Library();

// Ambil ID buku dari parameter GET
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Mendapatkan detail buku berdasarkan ID
    $book = $library->getBookById($bookId);

    // Periksa apakah buku ditemukan
    if ($book) {
        $title = $book->title;
        $author = $book->author;
        $year = $book->year;
        $status = $book->status;
        $isbn = $book->isbn;
        $publisher = $book->publisher;
    } else {
        // Jika buku tidak ditemukan, kembalikan pesan kesalahan
        $error = "Buku tidak ditemukan";
    }
} else {
    // Jika parameter ID tidak diberikan, kembalikan pesan kesalahan
    $error = "ID buku tidak diberikan";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <h1>Error: <?php echo $error; ?></h1>
    <?php else: ?>
        <h1>Book Detail</h1>
        <ul>
            <li><strong>Title:</strong> <?php echo $title; ?></li>
            <li><strong>Author:</strong> <?php echo $author; ?></li>
            <li><strong>Genre:</strong> <?php echo $genre; ?></li>
        </ul>
    <?php endif; ?>
</body>
</html>
