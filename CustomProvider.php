<?php

require_once("IEmbedProvider.php");
require_once("CustomerEntity.php");
class CustomerProvider extends IEmbedProvider{
	public $jsonEndpoint;
	public function __construct($url,$endpoint){
        parent::__construct($url,$endpoint);
        $this->jsonEndpoint=$endpoint."?url={url}&format=json";
	}	

	public function match($url){

	}

	// 
	public function provide($url,$format="json"){
		return response();
	}

	// parse httprequest 
	public function parseHttpRequest($url){
		if(isset($url)&&$url !=null)
			return urldecode($url);
		return $this->jsonEndpoint;
	}	

	// reponse to the client 
	public function response(){
		$customEntity = new CustomerEntity();
		$customEntity->url = "";

		
		return  $customEntity;
	}

}
?>