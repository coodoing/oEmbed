<?php
abstract class IEmbedEntity
{	
    public $type;
    public $version;
    public $title;
    public $author_name;
    public $author_url;
    public $provider_name;
    public $provider_url;
    public $cache_age; 
    public $thumbnail_url;
    public $thumbnail_width;
    public $thumbnail_height;

	public function render(){
		echo "render";
	}
}
?>