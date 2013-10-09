<?php
// autoload function
function __autoload($class){
	if(file_exists($filename = $class."php"))
		require_once($filename);
}

?>