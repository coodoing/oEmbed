<?php
//require_once("IEmbedProvider.php");
//require_once("CustomEntity.php");
class CustomProvider{// extends IEmbedProvider{
	public $jsonEndpoint;
	public function __construct($url,$endpoint){
        //parent::__construct($url,$endpoint);
        $this->jsonEndpoint=$endpoint."?url={url}&format=json";
	}	

	// TODO preg_match($pattern,$url)
	public function match($url){
		return true;
	}

	public function provide($url,$format="json"){
		return $this->response($url);
	}

	// parse httprequest:jsonEndpoint 
	private function parseHttpRequest($url){
		if(isset($url)&&$url !=null){
			if($this->match($url))
				return urldecode($url);
			else{
				throw new IllegalException();
				return;
			}
		}
		
	}	

	// reponse to the client 
	public function response($url){		
		$customEntity = new CustomEntity();
		$customEntity->url = "http://test.cn";
		$customEntity->title = "test";
		$customEntity->price = "0.0";
		$customEntity->currency_code = "$";
		$customEntity->provider_name = "Custom Provider";
		$customEntity->description = "Little Description";
		$customEntity->brand = "Ord";
		$customEntity->product_id = "XXX";
		$customEntity->availability = "true";
		$customEntity->quantity = "0";

		echo json_encode($customEntity);
		return  ($customEntity);
	}

}
?>