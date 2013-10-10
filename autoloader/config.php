<?php
// http://php.net/manual/zh/language.oop5.autoload.php
// autoload function
function __autoload_old($className) { 
    if (file_exists($className . '.php')) { 
        require_once $className . '.php'; 
        return true; 
    } 
    else{
    	throw new Exception('Class "' . $className . '" could not be autoloaded'); 
    	return false;	
    }     
} 
//spl_autoload_register('__autoload_old');

function __autoload($className){
	$directories = array(
		'',
		'autoloader/',
		'embed/',
		'custom/',
		);
	foreach($directories as $directory){
        //see if the file exsists
        if(file_exists($cls = $directory.$className.'.php')){
            require_once $cls;
            return true;
        }
    }             
}

?>