<?php

class FloorplansController extends AppController {
    public $helpers = array('Html', 'Form');
	
	public function index() {
    	$this->layout = 'bootstrap3';
		$this->set('floorplans', $this->Floorplan->find('all'));
	}

    public function view($id = null) {
    	$this->layout = 'bootstrap3';
        if (!$id) {
            throw new NotFoundException(__('Invalid Floor Plan'));
        }

        $floorplan = $this->Floorplan->findById($id);
        if (!$floorplan) {
            throw new NotFoundException(__('Invalid Floor Plan'));
        }
        $this->set('floorplan', $floorplan);
    }
	
    public function add() {
    	$this->layout = 'bootstrap3';
        if ($this->request->is('post')) {
            $this->Floorplan->create();
            if ($this->Floorplan->save($this->request->data)) {
                $this->Session->setFlash('Your floor plan has been saved.','success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to add your floor plan.','danger');
        }
    }
	public function edit($id = null) {
    	$this->layout = 'bootstrap3';
		if (!$id) {
			throw new NotFoundException(__('Invalid floor plan'));
		}
	
		$floorplan = $this->Floorplan->findById($id);
		if (!$floorplan) {
			throw new NotFoundException(__('Invalid floor plan'));
		}
	
		if ($this->request->is(array('floorplan', 'put'))) {
			$this->Floorplan->id = $id;
			if ($this->Floorplan->save($this->request->data)) {
				$this->Session->setFlash('Your floor plan has been updated.','success');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Unable to update your floor plan.','danger');
		}
	
		if (!$this->request->data) {
			$this->request->data = $floorplan;
		}
	}	
	
	 public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Floorplan->id = $id;
        if (!$this->Floorplan->exists()) {
            throw new NotFoundException('Invalid floor plan','danger');
        }
        if ($this->Floorplan->delete()) {
            $this->Session->setFlash('Floor plan deleted','success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Floor plan was not deleted','danger');
        return $this->redirect(array('action' => 'index'));
	}
	
}

?>