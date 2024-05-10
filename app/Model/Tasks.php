<?php
class Tasks extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
            'message' => 'Title cannot be empty.'
        ),
        'description' => array(
            'rule' => 'notBlank',
            'message' => 'Description cannot be empty.'
        )
    );
    
}
?>


