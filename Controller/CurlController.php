<?php
#CakePlugin::load('Tools');
CakePlugin::load('Curl');
App::uses('Curl','Curl.Lib');
//App::uses('CurlOptions','Curl.Lib');

class CurlController extends BackendAppController {

	public $uses = array('Backend.CurlRequest');
	
	public function admin_request() {

		$Curl = new Curl();

		if(!empty($this->request->data)) {
			$r =& $this->request->data['CurlRequest'];
			#debug($this->request->data);
			#$Curl->setProxy($r)

			$_proxyEnabled = false;
			foreach ($r as $key => $val) {

				if (is_numeric($key))
					continue;

				switch($key):
				case "url":
					$Curl->url($val); break;
				case "method":
					$Curl->method($val); break;
				case "postvar":
					//@todo: check if curl method is set to POST
					if (!is_array($this->request->data['CurlRequest']['postval'])) {
						$this->Session->setFlash(__d('curl',"Postdata not set"));
						break;
					}
					$_postData = array_combine($val,$this->request->data['CurlRequest']['postval']);
					if (!empty($_postData)) {
						$Curl->setPostData($_postData);
					}
					break;
				case "proxy_enabled":
					$_proxyEnabled = $val; break;
				default:
					//set proxy settings only if $_proxyEnabled is TRUE
					if (preg_match("/^proxy/i",$key) && !$_proxyEnabled)
						break;

					$Curl->setOpt(constant("CURLOPT_".strtoupper($key)), $val);
					break;

				endswitch;
			}

			//set options
			if (isset($this->request->data['CurlOptions'])):
				foreach ($this->request->data['CurlOption'] as $curlOption) {
					if (empty($curlOption['value']))
						continue;
	
					$Curl->setOpt($Curl->setOpt(constant("CURLOPT_".strtoupper($curlOption['name'])), $curlOption['value']));
				}
			endif;

			//set postvars
			if (isset($this->request->data['CurlVar'])):
				$postVars = array();
				foreach ($this->request->data['CurlVar'] as $curlVar){
	
				}
			endif;


			$Curl->execute();
			$response = $Curl->response();

			$this->set(compact('response','Curl'));
		}

		$curl_options = CurlOptions::getList();
		$this->set(compact('curl_options'));

	}

	public function admin_response() {

		$this->layout = "empty";
		$this->response->type('text');
	}

	public function redirect1() {
		$this->redirect(array('action'=>'response'));
	}
}
?>