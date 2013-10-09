<?php
require_once("YouTubeProvider.php");

$provider = new YouTubeProvider();
$provider->provide("");

echo "<br>";
echo "####################";
echo "<br>";

require_once("ProviderManager.php");
$proManager = ProviderManager::getInstance();
$provider=$proManager->provide("http://www.youtube.com/watch?v=_ujk4SJVx8E");
echo $provider;
?>