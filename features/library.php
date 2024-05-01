<?php
class Library {
    private $books;
    private $borrowedBooks;
    public function __construct() {
        $this->books = [
            ['id' => 101, 'title' => 'Book 1', 'author' => 'Author 1', 'available' => true],
            ['id' => 102, 'title' => 'Book 2', 'author' => 'Author 2', 'available' => true],
            ['id' => 103, 'title' => 'Book 3', 'author' => 'Author 3', 'available' => true]
        ];
        $this->borrowedBooks = [];
    }
    public function displayBooks() {
        foreach ($this->books as $book) {
            echo "ID: " . $book['id'] . ", Title: " . $book['title'] . ", Author: " . $book['author'];
            if ($book['available']) {
                echo " (Available)";
            } else {
                echo " (Not Available)";
            }
            echo "<br>";
        }
    }
    public function borrowBook($bookId) {
        foreach ($this->books as &$book) {
            if ($book['id'] == $bookId && $book['available']) {
                $book['available'] = false;
                $this->borrowedBooks[] = $book;
                return true;
            }
        }
        return false;
    }
    public function returnBook($bookId) {
        // Mengembalikan buku
        foreach ($this->borrowedBooks as $key => $book) {
            if ($book['id'] == $bookId) {
                $this->borrowedBooks[$key]['available'] = true;
                unset($this->borrowedBooks[$key]);
                return true; 
            }
        }
        return false; 
    }
    public function calculateFine($days) {
        return $days * 1000; 
    }
}