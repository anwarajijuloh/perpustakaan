<?php

class Reference extends Book{
    public $isbn;
    public $publisher;

    public function __construct($bookId, $title, $author, $year, $status, $isbn, $publisher){
        parent::__construct($bookId, $title, $author, $year, $status);
        $this->isbn = $isbn;
        $this->publisher = $publisher;
    }

    public function getIsbn(){
        return $this->isbn;
    }
    public function getPublisher(){
        return $this->publisher;
    }
    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }
    public function setPublisher($publisher){
        $this->publisher = $publisher;
    }
}