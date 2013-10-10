<?php

abstract class IEmbedProvider {
	public $urlScheme;
	public $endpoint;
	public abstract function match($url);
	public abstract function provide($url,$format="json");
	public function __construct($urlScheme,$endpoint){
		$this->urlScheme = $urlScheme;
		$this->endpoint = $endpoint;
	}
}
?>