<?php
App::uses('BackendAppController','Backend.Controller');
App::uses('Folder','Utility');
App::uses('File','Utility');

class LogViewerController extends BackendAppController {

	public function admin_index() {
		
		$logDir = LOGS;
		
		$Folder = new Folder($logDir,false);
		$logFiles = $Folder->find('.*.log');
		
		$this->set(compact('logDir','logFiles'));
	}
	
	public function admin_view($logFile = null) {
		if (!$logFile) {
			$this->Session->setFlash(__d('backend','Select a Log file'));
			$this->redirect(array('action'=>'index'));
		}
		
		$filePath = $this->_getFilePath($logFile);
		if (file_exists($filePath)) {
			$File = new File($filePath,false);
			$log = $File->read();
		} else {
			$this->Session->setFlash(__d('backend','Log file %s does not exist',$logFile));
			$log = "";
		}
		
		$this->set(compact('logFile', 'log'));
	}
	
	public function admin_clear($logFile = null) {
		if (!$logFile) {
			$this->Session->setFlash(__d('backend','Select a Log file'));
			$this->redirect(array('action'=>'index'));
		}
		
		$filePath = $this->_getFilePath($logFile);
		$File = new File($filePath,false);
		$File->write("");

		$this->Session->setFlash(__d('backend','Log file %s cleared',$logFile));
		$this->redirect(array('action'=>'index'));
	}
	
	public function admin_delete($logFile) {
		if (!$logFile) {
			$this->Session->setFlash(__d('backend','Select a Log file'));
			$this->redirect(array('action'=>'index'));
		}
		
		$filePath = $this->_getFilePath($logFile);
		if (unlink($filePath)) {
			$this->Session->setFlash(__d('backend','Log file %s deleted',$logFile));
		} else {
			$this->Session->setFlash(__d('backend','Log file %s could not be deleted',$logFile));
		}
		$this->redirect(array('action'=>'index'));
	}
	
	protected function _getFilePath($logFile) {
		return LOGS . $logFile . '.log';
	}
}