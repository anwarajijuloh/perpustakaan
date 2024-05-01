<?php

class Book{
    public $bookId;
    public $title;
    public $author;
    public $year;
    public $status;

    public function __construct($bookId, $title, $author, $year, $status){
        $this->bookId = $bookId;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = $status;
    }

    public function getBookId(){
        return $this->bookId;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getYear(){
        return $this->year;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setBookId($bookId){
        $this->bookId = $bookId;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function setYear($year){
        $this->year = $year;
    }
    public function setStatus($status){
        $this->status = $status;
    }
}