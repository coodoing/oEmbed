<?php

class OEmbedEntity extends IEmbedEntity{
	public $url;
	public $title;//
	public $price;
	public $currency_code;
	public $provider_name;//
	public $description;
	public $brand;
	public $product_id;
	public $availability;
	public $quantity;

}

class VideoEmbedEntity extends IEmbedEntity
{
	public $html;
	public $height;
	public $width;
}

class PhotoEmbedEntity extends IEmbedEntity
{
	public $url;
	public $height;
	public $width;
}

class RichEmbedEntity extends IEmbedEntity
{
	public $html;
	public $height;
	public $width;
}

class LinkEmbedEntity extends IEmbedEntity
{
	public $html;
}

?>