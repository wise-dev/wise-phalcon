<?php 

function test(){
	$response = new xajaxResponse();
	$response -> script('alert("test")');
	return $response;
}
$xajax -> registerFunction("test");

?>