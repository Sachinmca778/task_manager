<?php 
// app/Model/Book.php
class Book extends AppModel {
    public $name = 'Book';
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
            'message' => 'Please enter title'
        ),
        'author' => array(
            'rule' => 'notBlank',
            'message' => 'Please enter author'
        ),
        'genre' => array(
            'rule' => 'notBlank',
            'message' => 'Please enter genre'
        )
    );
}
?>