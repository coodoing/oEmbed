<?
echo "<br>";
echo "########## Youtube Provider ##########";
echo "<br>";
require_once("YouTubeProvider.php");
$provider = new YouTubeProvider("http://*.youtube.*/","http://www.youtube.com/oembed");
$provider->provide("");

echo "<br>";
echo "########## Custom Provider ##########";
echo "<br>";
require_once("CustomProvider");



echo "<br>";
echo "########## OEmbed Provider ##########";
echo "<br>";
require_once("ProviderManager.php");
$proManager = ProviderManager::getInstance();
$provider=$proManager->provide("http://www.youtube.com/watch?v=_ujk4SJVx8E");
echo $provider;
?>