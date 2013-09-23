<?php
App::uses('BackendAppController','Backend.Controller');
App::uses('Folder','Utility');
App::uses('File','Utility');

class LogViewerController extends BackendAppController {

	public $logDir = LOGS;
	
	public $permissions = array(
		'admin_index' => '*',
		'admin_view' => '*',
		'admin_add' => array('admin','logmanager'),
		'admin_edit' => array('admin','logmanager'),
		'admin_delete' => array('admin','logmanager'),
		'admin_clear' => array('admin','logmanager'),
		'admin_rotate' => array('admin','logmanager'),
	);
	

	protected function _getFilePath($logFile) {
	
		$path = realpath($this->logDir . $logFile);
	
		if (!$path)
			return false;
	
		if (!preg_match('/^'.preg_quote($this->logDir,'/').'/', $path))
			return false;
		
		return $path;
	}	
	
	public function admin_index() {
		
		$logDir = $this->logDir;
		
		$Folder = new Folder($logDir,false);
		$logfiles = $Folder->find('.*.log(\.[0-9])?',true);
		
		$files = array();
		foreach($logfiles as $logfile) {
			$F = new File($logDir.$logfile);
			
			$file = array(
				'name' => $logfile,
				//'dir' => $logDir,
				'size' => $F->size(),
				'last_modified' => $F->lastChange(),
				'last_access' => $F->lastAccess(),	
			);
			array_push($files,$file);
		}
		
		$this->set(compact('files'));
	}
	
	public function admin_view($logFile = null) {
		if (!$logFile) {
			$this->Session->setFlash(__d('backend','No logfile selected'),'error');
			$this->redirect(array('action'=>'index'));
		}
		
		$filePath = $this->_getFilePath($logFile);
		if (!$filePath || !file_exists($filePath)) {
			$this->Session->setFlash(__d('backend','Logfile %s not found',$logFile),'error');
			return $this->redirect(array('action'=>'index'));
		}
		
		$File = new File($filePath,false);
		$log = $File->read();
		$this->set(compact('logFile', 'log'));
	}
	
	public function admin_clear($logFile = null) {
		if (!$logFile) {
			$this->Session->setFlash(__d('backend','No logfile selected'),'error');
			$this->redirect(array('action'=>'index'));
		} 
		
		$filePath = $this->_getFilePath($logFile);
		if (!$filePath) {
			$this->Session->setFlash(__d('backend','Logfile %s not found',$logFile),'error');
			return $this->redirect($this->referer(array('action'=>'index')));
		}

		$File = new File($filePath,false);
		if ($File->write("")) {
			$this->Session->setFlash(__d('backend','Logfile %s cleared',$logFile),'success');
		} else {
			$this->Session->setFlash(__d('backend','Failed to clear logfile %s',$logFile),'error');
		}
		$this->redirect(array('action'=>'index'));
	}
	
	public function admin_delete($logFile = null) {
		if (!$logFile) {
			$this->Session->setFlash(__d('backend','No logfile selected'));
			$this->redirect(array('action'=>'index'));
		}
		
		$filePath = $this->_getFilePath($logFile);
		if (unlink($filePath)) {
			$this->Session->setFlash(__d('backend','Logfile %s deleted',$logFile),'success');
		} else {
			$this->Session->setFlash(__d('backend','Logfile %s could not be deleted',$logFile),'error');
		}
		$this->redirect(array('action'=>'index'));
	}
	
	public function admin_rotate($alias = null) {
		
		App::uses('LogRotation','Backend.Log');
		$L = new LogRotation($alias);
		if ($L->rotate()) {
			$this->Session->setFlash(__('Ok'),'success');
		} else {
			$this->Session->setFlash(__('LogRotation for %s failed',$alias),'error');
		}
		
		$this->redirect($this->referer());
	}
}