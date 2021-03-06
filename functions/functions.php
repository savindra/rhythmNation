<?php
ob_start();
if(session_status() == PHP_SESSION_NONE){
	session_start(); 
}
function getPage($dir, $filename, $default = false){
	
	$root = $_SERVER['DOCUMENT_ROOT'] . 'WebCwk/';
	$path = $dir;
	//echo $path . '/' . $filename . '.php';
	if(is_dir($path)){
		
		if(file_exists($path . '/' . $filename . '.php')){
			include $path . '/' . $filename . '.php';
			return true;
		}
		
		if(file_exists($path . '/' . $filename . '.html')){
			include $path . '/' . $filename . '.html';
			return true;
		}
		
		if($default){
			
			if(file_exists($path . '/' . $default . '.php')){
				include $path . '/' . $default . '.php';
				return true;
			}
			
			if(file_exists($path . '/' . $default . '.html')){
				include $path . '/' . $default . '.html';
				return true;
			}
			
		}
		
	}
	return false;
	
}
//================
//Form Handling
//================


?>