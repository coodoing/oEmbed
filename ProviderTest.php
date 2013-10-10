<?php 
include_once("autoloader/config.php");

echo "<br>";
echo "########## Youtube Provider ##########";
echo "<br>";
$provider = new YouTubeProvider("http://*.youtube.*/","http://www.youtube.com/oembed");
$provider->provide("");

echo "<br>";
echo "########## Custom Provider ##########";
echo "<br>";

$cusProvider = new CustomProvider("http://test.cn","http://test.cn/oembed");
$cusProvider->provide("");

echo "<br>";
echo "########## OEmbed Provider ##########";
echo "<br>";
$proManager = ProviderManager::getInstance();
$provider=$proManager->provide("http://www.youtube.com/watch?v=_ujk4SJVx8E");
var_dump($provider) ;
?>