<?php
// app/Controller/BooksController.php
class BooksController extends AppController {
    public $name = 'Books';

    public function index() {
        $this->set('books', $this->Book->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash('Book has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add book.');
            }
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid book'));
        }

        $book = $this->Book->findById($id);
        if (!$book) {
            throw new NotFoundException(__('Invalid book'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Book->id = $id;
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash('Book has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update book.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $book;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Book->delete($id)) {
            $this->Session->setFlash('Book has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
}
?>