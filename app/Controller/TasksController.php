<?php
App::uses('Appcontroller','Controller');
class TasksController extends AppController {
    // public $helpers = array('Html', 'Form');

    public $helpers = array('Html', 'Form', 'Paginator');
    public $components = array('Paginator');

    // public function beforeFilter() {
    //     parent::beforeFilter();
    //     if (!$this->Session->check('User')) {
    //         $this->Flash->error('You must be logged in to access this page.');
    //         $this->redirect(array('controller' => 'users', 'action' => 'login'));
    //     }
    // }

    // public function index() {
    //     $this->set('tasks', $this->Task->find('all'));
    // }

    public function index() {
        $this->paginate = array(
            'limit' => 3, 
            'order' => array('Task.id' => 'asc') 
        );
        $tasks = $this->Paginator->paginate('Task');
        $this->set(compact('tasks'));


        if($this->request->is('ajax')) {
            $this->autoRender = false; // We don't render a view in this case
            echo json_encode($tasks);
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid task'));
        }

        $task = $this->Task->findById($id);
        if (!$task) {
            throw new NotFoundException(__('Invalid task'));
        }

        // $this->set('task', $task);

         // Check if the request is AJAX
    if($this->request->is('ajax')) {
        $this->autoRender = false; // We don't render a view in this case
        echo json_encode($task);
    } else {
        $this->set(compact('task'));
    }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Task->create();
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add the task.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid task'));
        }

        $task = $this->Task->findById($id);
        if (!$task) {
            throw new NotFoundException(__('Invalid task'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Task->id = $id;
            if ($this->Task->save($this->request->data)) {
                $this->Session->setFlash(__('The task has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update the task.'));
        }

        if (!$this->request->data) {
            $this->request->data = $task;
        }
    }

 

    public function delete($id) {
        // Load the task data
        $task = $this->Task->findById($id);

        if (!$task) {
            throw new NotFoundException(__('Invalid task'));
        }

        if ($this->request->is('post')) {
            if ($this->Task->delete($id)) {
                $this->Flash->success(__('Task deleted successfully.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Error deleting task.'));
            }
        }

        // Pass the task data to the view
        $this->set('task', $task);
    }


public function search() {
    if ($this->request->is('post')) {
        // $searchQuery = $this->request->query('search');
        $search1 = $this->request->data['Task']['search'];
        pr($search1);
        $tasks = $this->Task->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'Task.title LIKE' => "%$search1%",
                    'Task.description LIKE' => "%$search1%"
                )
            )
        ));
        $this->set(compact('tasks'));
    } else {
        $this->redirect(array('action' => 'index'));
    }
}

public function searchSuggestions() {
    $this->autoRender = false; // Disable view rendering for AJAX requests
    $this->response->type('json'); // Set response type to JSON

    $keyword = $this->request->query('search');

    // Fetch book titles based on $keyword from your database
    $this->Task->recursive = -1;
    $suggestions = $this->Task->find('list', array(
        'fields' => array('title'),
        'conditions' => array('title LIKE' => '%' . $keyword . '%'),
        'limit' => 5 // Limit the number of suggestions
    ));

    $this->response->body(json_encode(array_values($suggestions)));
    return $this->response;
}
}
?>





