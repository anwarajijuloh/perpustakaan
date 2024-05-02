<?php

require_once './models/book.php';
require_once './models/reference.php';
require_once './models/user.php';
class Library {
    private $books = [];
    private $users = [];
    private $borrowedBooks;
    public function __construct() {
        $this->books[] = new Reference(1, "To Kill a Mockingbird", "Harper Lee", 2022, "avaible", 1282-4347-3573, "Mahardika");
        $this->books[] = new Reference(2, "1984", "George Orwell", 1993, "avaible", 1282-4347-3573, "Mahardika");
        $this->books[] = new Reference(3, "The Great Gatsby", "F. Scott Fitzgerald", 2005, "avaible", 1282-4347-3573, "Mahardika");
        $this->books[] = new Reference(4, "Pride and Prejudice", "Jane Austen", 2009, "avaible", 1282-4347-3573, "Mahardika");
    }
    public function getAllBooks() {
        return $this->books;
    }
    public function getBookById($id) {
        foreach ($this->books as $book) {
            if ($book->bookId == $id) {
                return $book;
            }
        }
        return null;
    }
    public function registerUser($username, $password){
        if ($this->isUserExist($username)) {
            return "Username sudah digunakan";
        }
        $newUser = new User($username, $password);
        $this->users[$username] = $newUser;
        return "Pendaftaran berhasil";
    }
    public function loginUser($username, $password) {
        if ($this->isUserExist($username)) {
            $user = $this->users[$username];
            if ($user->getPassword() == $password) {
                $_SESSION['username'] = $username;
                return "Login berhasil";
            } else {
                return "Password salah";
            }
        } else {
            return "User tidak ditemukan";
        }
    }
    private function isUserExist($username) {
        return array_key_exists($username, $this->users);
    }
    public function getUserInfo($username) {
        if ($this->isUserExist($username)) {
            return $this->users[$username];
        } else {
            return "User tidak ditemukan";
        }
    }
    public function logoutUser() {
        session_unset();
        session_destroy();
        return "Logout berhasil";
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