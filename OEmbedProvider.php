<?php

require_once("OEmbedEntity.php");
class OEmbedProvider extends IEmbedProvider{
    private $urlRegExp;
    private $jsonEndpoint;
    private $xmlEndpoint;
    
    public function __construct($url,$endpoint){
        parent::__construct($url,$endpoint);

        $this->urlRegExp=preg_replace(array("/\*/","/\//","/\.\*\./"),array(".*","\/",".*"),$url);
        $this->urlRegExp="/".$this->urlRegExp."/";

        //echo preg_match("/\{format\}/",$endpoint);

        if (preg_match("/\{format\}/",$endpoint)){
            $this->jsonEndpoint=preg_replace("/\{format\}/","json",$endpoint);
            $this->jsonEndpoint.="?url={url}";
            $this->xmlEndpoint=preg_replace("/\{format\}/","xml",$endpoint);
            $this->xmlEndpoint.="?url={url}";
        } 
        else {
            $this->jsonEndpoint=$endpoint."?url={url}&format=json";
            $this->xmlEndpoint=$endpoint."?url={url}&format=xml";
        }
    }

    public function match($url){
        return preg_match($this->urlRegExp,$url);
    }
    
    public function provide($url,$format="json"){
        if($format=="xml"){
            return $this->provideXML($url);
        } else {
            return $this->provideJSON($url);
        }
    }

    private function provideXML($url){
        return file_get_contents(preg_replace("/\{url\}/",urlencode($url),$this->xmlEndpoint));
    }

    private function provideJSON($url){
        // echo preg_replace("/\{url\}/",urlencode($url),$this->jsonEndpoint);
        return file_get_contents(preg_replace("/\{url\}/",urlencode($url),$this->jsonEndpoint));
    }

}

?>