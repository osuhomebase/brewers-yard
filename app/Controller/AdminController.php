<?php
// app/Controller/UsersController.php
class AdminController extends AppController {
	// allow admin/index without logging in
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    public function index() {
    	$this->layout = 'bootstrap3';
		if(loggedIn())
		{
			$this->set('authUser', $this->Auth->user());	
		}
    }
	public function login(){
		
	}

}

?>