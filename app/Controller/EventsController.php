<?php

class EventsController extends AppController {
    public $helpers = array('Html', 'Form');
	
	public function index() {
    	$this->layout = 'bootstrap3';
		$this->set('events', $this->Event->find('all'));
	}

    public function view($id = null) {
    	$this->layout = 'bootstrap3';
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->set('event', $event);
    }
	
    public function add() {
    	$this->layout = 'bootstrap3';
        if ($this->request->is('post')) {
            $this->Event->create();
			//Convert the dates to YYYY-MM-DD format before attempting to save.
			 if (!empty($this->request->data['Event']['eventDate']) && strtotime($this->request->data['Event']['eventDate']) ){
				$this->request->data['Event']['eventDate'] = date('Y-m-d', strtotime($this->request->data['Event']['eventDate']));
			}
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash('Your event has been saved.','success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to add your event.','danger');
        }
    }
	public function edit($id = null) {
    	$this->layout = 'bootstrap3';
		if (!$id) {
			throw new NotFoundException(__('Invalid event'));
		}
	
		$event = $this->Event->findById($id);
		if (!$event) {
			throw new NotFoundException(__('Invalid event'));
		}
	
		if ($this->request->is(array('event', 'put'))) {
			$this->Event->id = $id;
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash('Your event has been updated.','success');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Unable to update your event.','danger');
		}
	
		if (!$this->request->data) {
			$this->request->data = $event;
		}
    
	}	
	  public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException('Invalid event','danger');
        }
        if ($this->Event->delete()) {
            $this->Session->setFlash('Event deleted','success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Event was not deleted','danger');
        return $this->redirect(array('action' => 'index'));
	}
	
}

?>