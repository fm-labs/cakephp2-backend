<?php
class Backend {
	
	const DEFAULT_VIEW_CLASS = 'CakeLayout.CakeLayout';
	
	const DEFAULT_LAYOUT = 'Backend.backend';
	
	static public $prefixes = array('admin'=>array());
	
	static public function isValidRequest(CakeRequest $request) {
		foreach(self::$prefixes as $prefix => $config) {
			if (is_numeric($prefix)) {
				$prefix = $config;
				$config = array();
			}
			if (isset($request->params[$prefix]) && $request->params[$prefix] === true)
				return $prefix;
		}
		
		return false;
	}
	
	static public function initialize(Controller $controller, CakeRequest $request = null) {
		if (null === $request)
			$request = $controller->request;
		
		$prefix = self::isValidRequest($request);
		if ($prefix !== false) {
			$config = am(array(
				'viewClass' => self::DEFAULT_VIEW_CLASS,
				'layout' => self::DEFAULT_LAYOUT
			), self::$prefixes[$prefix]);

			$controller->layout = $config['layout'];
			$controller->viewClass = $config['viewClass'];
			
			return true;
		}
		return false;
	}
}
?>