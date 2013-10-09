<?php

class YoutubeEmbedEntity{  
   
    public $html;
    public $width;
    public $height;
    public $duration; // added by me, not part of OEmbed

    public $type;
    public $version;
    public $title;
    public $author_name;
    public $author_url;
    public $provider_name;
    public $provider_url;
    public $cache_age;
    public $description; // added by me, not part of OEmbed
    public $resource_url; // added by me, not part of OEmbed
    public $thumbnail_url;
    public $thumbnail_width;
    public $thumbnail_height;
    
    // load the defined php to render it
    public function renderClass(){
        try{
            return $this->render(get_class($this).".php");
        } 
        catch (Exception $e){
            return $this->render(get_parent_class($this).".php");
        }
    }

    public function cloneObj($object){
        foreach($object as $key=>$value){
            $this->$key=(string)$value;
        }
    }

    public function render(){
    }
}

?>