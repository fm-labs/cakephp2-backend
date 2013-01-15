<?php
App::uses('Folder','Utility');
App::uses('File','Utility');

class LogRotation {
	
	public $config = array();
	
	public $log = array();
	
	public function __construct($config = array()) {
		
		// load from backend config
		if (is_string($config)) {
			$alias = $config;
			$config = Configure::read('Backend.LogRotation.'.$alias);
			if (!$config)
				throw new Exception('LogRotate not configured: '.$alias);
			
		}
		
		$this->config = am(array(
			'config' => null,
			'file' => 'cron', // Log file name or full path to file
			'keep' => 3, // Number of old logs to keep
			'schedule' => 'daily', // daily, weekly, monthly
			'compress' => false, // Compress
			'compress_delay' => false, // Compress on next cycle
			'rotate_empty' => false, // Rotate even if log file is empty
			'email_to' => null, // Email log before deleting. Value must be compatible to CakeEmail::to()
		),$config);
		
	}
	
	protected function getFile($name = null, $create = false) {
		if ($name === null)
			$name = $this->config['file'];
		
		$File = new File(LOGS.DS.$name.'.log',$create);
		return $File;
	}
	
	public function rotate() {

		// do rotation
		$file = $this->config['file'];
		for ($i = $this->config['keep']; $i >= 0; $i--) {
			
			switch (true) {
				case $i == $this->config['keep']:
					//TODO send log report email before deleting
					continue;
					break;
					
				case $i > 0:
					
					$SrcFile = $this->getFile($file.'.'.$i);
					$NewFile = $this->getFile($file.'.'.($i+1), true);
					
					if (!$SrcFile->exists()) {
						$this->log[] = "Log file $file.$i does not exist";
						continue;
					}

					debug($SrcFile->size());
					if (!$this->config['rotate_empty'] && $SrcFile->size() < 1) {
						$this->log[] = "Log file $file.$i is empty";
						if (!$SrcFile->delete())
							$this->log[] = "Failed to delete file";
						continue;
					}
					
					if (!$NewFile->write($SrcFile->read()))
						throw new Exception("Failed to copy log $file.'.'.$i");
					
					if ($i == 1 && !$this->config['compress'] && $this->config['compress_delay']) {
						$this->_compress($NewFile);
					}
					
					break;
					
				case $i == 0:
					
					$SrcFile = $this->getFile();

					if (!$this->config['rotate_empty'] && $SrcFile->size() < 1) {
						$this->log[] = "Log file $file is empty";
						continue;
					}

					$NewFile = $this->getFile($file.'.'.($i+1), true);
					if (!$NewFile->write($SrcFile->read()))
						throw new Exception("Failed to copy log $file");
					
					if ($this->config['compress']) {
						$this->_compress($NewFile);
					}
					
					if (!$SrcFile->write(""))
						throw new Exception("Failed to write log $file");
					
					break;
				default:
					return false;
			}
			
		}
		
		return true;
	}
	
	protected function _compress(File $file) {
		//TODO compress file
		$this->log[] = "Compressing file. Not implemented yet!";
	}
	
}