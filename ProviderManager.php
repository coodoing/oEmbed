<?php
//require_once("OEmbedProvider.php");
class ProviderManager{
	private $providers;
	private static $_instance;
	
	private function __construct(){
		$this->providers=array();
		if(file_exists("config.xml")){
			$xml = simplexml_load_file("config.xml");
		}
		else
			$xml = null;		
		//echo json_encode($xml);

		foreach($xml->provider as $provider){
			if(isset($provider->class) && isset($provider->endpoint)){
				$this->register(new OEmbedProvider($provider->url,$provider->endpoint));
			} 
			else {
			    $classname="".$provider->class; 
		    	$reflection = new ReflectionClass($classname); 
		    	$this->register($reflection->newInstance($provider)); 
		    }
		}

		//echo json_encode($this->providers);
	}
	
	static function getInstance(){
		if(!isset($_instance) || $_instance==null){
			$_instance = new ProviderManager();
		}
		return $_instance;
	}
	
	public function register($provider){
		$this->providers[]=$provider;
	}

	public function provide($url,$format="json"){		
		foreach ($this->providers as $provider){
		  	if ($provider->match($url)){
		      return $provider->provide($url,$format);
		    }
	    }
	  return null;
	}
}
?>