oEmbed
======

oembed implementions

------

## User Guide

* youtube provider
```
$provider = new YouTubeProvider("http://*.youtube.*/","http://www.youtube.com/oembed");
$provider->provide("http://www.youtube.com/watch?v=_ujk4SJVx8E");
```
* custom provider
```
$cusProvider = new CustomProvider("http://test.cn","http://test.cn/oembed");
$cusProvider->provide("");
```
* provider manager
```
$proManager = ProviderManager::getInstance();
$provider=$proManager->provide("http://www.youtube.com/watch?v=_ujk4SJVx8E");
var_dump($provider) ;
```
## Reference

* php-oembed: http://code.google.com/p/php-oembed/
* oembed: http://oembed.com/
* php manuaul: http://www.php.net/manual/zh/index.php
* youtube Data API: http://gdata.youtube.com/demo/index.html
* youtube video: http://code.google.com/apis/youtube/developers_guide_protocol.html#Displaying_information_about_a_video