<?php
App::uses('Folder','Utility');
App::uses('File','Utility');

class LogRotation {
	
	protected $_config = array();
	
	
	public function __construct($config = array()) {
		
		// load from backend config
		if (is_string($config)) {
			$alias = $config;
			$config = Configure::read('Backend.LogRotation.'.$alias);
			if (!$config)
				throw new Exception('LogRotate not configured: '.$alias);
			
		}
		
		$this->_config = am(array(
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
			$name = $this->_config['file'];
		
		$File = new File(LOGS.DS.$name.'.log',$create);
		return $File;
	}
	
	public function rotate() {

		// do rotation
		$file = $this->_config['file'];
		for ($i = $this->_config['keep']; $i >= 0; $i--) {
			
			switch (true) {
				case $i == $this->_config['keep']:
					//remove
					break;
				case $i > 0:
					
					$SrcFile = $this->getFile($file.'.'.$i);
					if (!$SrcFile->exists()) {
						debug("Log file $file.$i does not exist");
						continue;
					}
					
					$NewFile = $this->getFile($file.'.'.$i, true);
					if (!$NewFile->write($SrcFile->read()))
						throw new Exception("Failed to copy log $file.'.'.$i");
					
					break;
				case $i == 0:
					
					$SrcFile = $this->getFile();
					if (!$SrcFile->write(""))
						throw new Exception("Failed to write log $file");
					
					break;
				default:
					return false;
			}
		}
		
		return true;
	}
	
}