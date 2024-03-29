<?php
class CandidateTestsController extends AppController{
	public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add','index', 'login', 'logout');
}
	public function index(){
		$candidateTests = $this->CandidateTest->find('all');
		$this->set(array('candidateTests' => $candidateTests, '_serialize' => array('candidateTests')));
	}

	public function view($id) {
		$candidateTest = $this->CandidateTest->findById($id);
		$this->set(array('candidateTest' =>$candidateTest, '_serialize' => array('candidateTest')));
	}
	public function add() {
		if ($this->CandidateTest->save($this->request->data)) {
			$message = array('text' => _('Saved'), 'type' => 'success');
		} else  {
			$message = array('text' => _('Error'), 'type' => 'error');
		}
		$this->set(array('message' => $message, '_serialize' => array('message')));
	}

	public function edit($id) {
		$this->CandidateTest->id = $id;
		if ($this->CandidateTest->save($this->request->data)) {
			$message = array('text' => _('Saved'), 'type' => 'success');
		} else {
			$message = array('text' => _('Error'), 'type' => 'error');
		}
		$this->set(array('message' => $message, '_serialize' => array('message')));
	}

	public function delete($id) {
		if ($this->CandidateTest->delete($id)) {
			$message = array('text' => _('Deleted'), 'type' =>'success');
		} else {
			$message = array('text' => _('Error'), 'type' => 'error');
		}
		$this->set(array('message' => $message, '_serialize' =>array('message')));
	}
}
?>