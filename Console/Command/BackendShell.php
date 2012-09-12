<?php
class BackendShell extends AppShell {
	
	public $uses = array();

	public $tasks = array('Backend.User');
	
	public function getOptionParser() {
	    $parser = parent::getOptionParser();
		$parser->description(__d('backend','Backend Console'));
	    
		$parser->addSubcommand('user',array(
			'help' => __d('backend',"Manage backend users"),
			'parser' => $this->User->getOptionParser()
		));
	    return $parser;
	}		
	
	
}
?>