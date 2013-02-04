<?php
App::uses('Folder','Utiltity');

class BackendShell extends AppShell {
	
	public $uses = array();

	public $tasks = array('Backend.User','Backend.Cache');
	
	public function getOptionParser() {
	    $parser = parent::getOptionParser();
		$parser->description(__d('backend','Backend Console'));

		$parser->addSubcommand('cache',array(
			'help' => __('Cache Task'),
			'parser' => $this->Cache->getOptionParser()	
		));
		
		$parser->addSubcommand('user',array(
			'help' => __d('backend',"Manage backend users"),
			'parser' => $this->User->getOptionParser()
		));
	    return $parser;
	}		
	
}
?>