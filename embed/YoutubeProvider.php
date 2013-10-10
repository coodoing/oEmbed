<?php
//require_once("IEmbedProvider.php");
//require_once("YoutubeEmbedEntity.php");
class YouTubeProvider extends IEmbedProvider {
    public function __construct($url,$endpoint){
        parent::__construct($url,$endpoint);
    }

    public function match($url){
        return preg_match('/youtube.com\/watch\?v=([\w-]+)/',$url);
    }

    public function provide($url,$format="json"){
        if($format=="xml"){
            return $this->provideXML($url);
        } 
        else if($format=="object"){
            return $this->provideObject($url);
        } 
        else if($format=="serialized"){
            return $this->provideSerialized($url);
        } 
        else{
            return $this->provideJSON($url);
        }
    }

    private function provideJSON($url){
        var_dump($this->getEmbed($url));
        return json_encode($this->getEmbed($url));
    }    

    // http://www.youtube.com/oembed?url=http%3A//www.youtube.com/watch?v%3D-UUx10KOWIE&format=xml
    private function provideXML($url){
        $string="";
        foreach($this->getEmbed($url) as $key=>$value){
            if(isset($value) && $value!="") 
                $string.="  <".$key.">".$value."</".$key.">\n";
        }
        $string="<oembed>\n".$string."</oembed>";
        return $string;
    }

    private function provideObject($url){
        return $this->getEmbed($url);
    }

    private function provideSerialized($url){
        return serialize($this->getEmbed($url));
    }

    public function getEmbed($url){
        # the url is not empty
        if(preg_match("/(www.)?youtube.com\/watch\?v=([\w-]+)/",$url,$matches)){
            $video_id=$matches[2];
        }

        //$video_id = "_ujk4SJVx8E"; // to specify the video

        $youtubeEntity = new YoutubeEmbedEntity();
        $youtubeEntity->type='video';
        $youtubeEntity->version='2.0';
        $youtubeEntity->provider_name="Youtube";
        $youtubeEntity->provider_url="http://youtube.com";
        $youtubeEntity->resource_url=$url;
        $xml = new DOMDocument;

        # http://gdata.youtube.com/demo/index.html
        # http://code.google.com/apis/youtube/developers_guide_protocol.html#Displaying_information_about_a_video
        # get youtube videos
        if(@($xml->load('http://gdata.youtube.com/feeds/api/videos/'.$video_id))) { 
            $guid = $xml->getElementsByTagName("guid")->item(0)->nodeValue;
            $youtubeEntity->title =$xml->getElementsByTagName("title")->item(0)->nodeValue;
            $youtubeEntity->description =$xml->getElementsByTagNameNS("*","description")->item(0)->nodeValue;
            $youtubeEntity->author_name =$xml->getElementsByTagName("author")->item(0)->getElementsByTagName("name")->item(0)->nodeValue;
            $youtubeEntity->author_url =$xml->getElementsByTagName("author")->item(0)->getElementsByTagName("uri")->item(0)->nodeValue;
            $youtubeEntity->thumbnail_url =$xml->getElementsByTagNameNS("*","thumbnail")->item(0)->getAttribute("url");
            $youtubeEntity->thumbnail_width =$xml->getElementsByTagNameNS("*","thumbnail")->item(0)->getAttribute("width");
            $youtubeEntity->thumbnail_height =$xml->getElementsByTagNameNS("*","thumbnail")->item(0)->getAttribute("height");
            $med_content_url=$xml->getElementsByTagNameNS("http://search.yahoo.com/mrss/","content")->item(0)->getAttribute("url");
            $youtubeEntity->html= 
                '<object width="425" height="350">'."\n".
                ' <param name="movie" value="'.$med_content_url.'"></param>'."\n".
                ' <embed src="'.$med_content_url.'"'. 
                '  type="application/x-shockwave-flash" width="425" height="350">'."\n".
                ' </embed>'."\n".
                '</object>'; 
            $youtubeEntity->width="425";
            $youtubeEntity->height="350"; 
            return $youtubeEntity;
        } 
        else 
            throw new Exception("resolve error");
        }   
}

?>