<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
    	$this->layout = 'bootstrap3';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
    	$this->layout = 'bootstrap3';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved','success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
    	$this->layout = 'bootstrap3';
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved','success');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('The user could not be saved. Please, try again.','danger');
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
		
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user','danger');
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('User deleted','success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('User was not deleted','danger');
        return $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
    	$this->layout = 'bootstrap3';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}
	
	public function logout() {
    	$this->layout = 'bootstrap3';
		return $this->redirect($this->Auth->logout());
	}
}

?>