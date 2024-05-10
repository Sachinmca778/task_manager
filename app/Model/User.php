<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
    public $useTable = 'users'; // Name of the users table
    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid email address'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email is already taken'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('minLength', '8'),
                'message' => 'Password must be at least 8 characters long'
            )
        )
    );
}
?>

