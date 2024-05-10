<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email','password' => 'password'), // If using email as username
                    'userModel' => 'User'
                )
            ),
            'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('register', 'login'); // Allowing registration and login actions
    }

    // public function login() {
    //     if ($this->request->is('post')) {
    //         if ($this->Auth->login()) {
    //             $this->redirect($this->Auth->redirectUrl());
    //         } else {
    //             $this->Session->setFlash('Invalid username or password, try again', 'flash_error');
    //         }
    //     }
    // }

    public function login() {
        if ($this->request->is('post')) {
            $this->User->recursive = -1;
            $user = $this->User->findByUsername($this->request->data['User']['username']);
            if ($user && AuthComponent::password($this->request->data['User']['password']) === $user['User']['password']) {
                unset($user['User']['password']); // Remove password from user data before login
                $this->Auth->login($user['User']);
                $this->redirect($this->Auth->redirect(array('controller' => 'tasks', 'action' => 'index')));
            } else {
                $this->Session->setFlash('Invalid username or password.', 'default', array(), 'auth');
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        if ($this->request->is('post')) {
            // Include username field in the request data
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']); // Example: Use email as username
            
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Registration successful');
                return $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('Registration failed. Please, try again.'));
            }
        }
    }
    

    public function index() {
        // Placeholder logic for index action
        // You can customize this according to your requirements
        $this->set('users', $this->User->find('all'));
    }
}
?>
