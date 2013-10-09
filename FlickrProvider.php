<?php

class FlickrProvider extends IEmbedProvider{
	public function __construct($url,$endpoint){
		parent::__construct($url,$endpoint);

	}

	public function match($url){

	}

	public function provide($url,$format="json"){
		
	}
}

?>