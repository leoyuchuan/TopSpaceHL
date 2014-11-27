<?php
/*
	Name: register.php
	Description: Input User Information & Return registration information. (Using Post)
	Input: username, password, region = {cn, us}, ...
	Output: $message = {success, error_message}
	As following format
	
	<?xml version="1.0" encoding="UTF-8"?>
	<result>
		<message>$message</message>
	</result>
*/	

	$xml = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
	// $username = $_POST['username'];
	// $password = $_POST['password'];
	// $region = $_POST['region'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$region = $_GET['region'];

	/*
		Convert username & region to lower case
		Validate username & password & region are correctly formatted
	*/
	$username = strtolower($username);
	$region = strtolower($region);
	if(preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $username) !== 1){
		echo sprintf($xml, 'wrong username');
		return;
	}
	if(preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $password) !== 1){
		echo sprintf($xml, 'wrong password');
		return;
	}
	if(preg_match("/^(cn)|(us)$/", $region) !== 1){
		echo sprintf($xml, 'wrong region');
		return;
	}

	/*
		Connect to Database
	*/
	$dbconn = include "dbconn.php";
	if($dbconn === null){
		echo sprintf($xml, 'cannot connect to db');
		return;
	}

	/*
		SQL Statement & execution Reuslts
	*/
	$sql = 'INSERT INTO USERS(username, password) VALUES ("%s", "%s");';
	$reuslt = $dbconn->query(sprintf($sql,$username,$password));

	if($result === true){
		echo sprintf($xml, 'success');
		return;
	}
	else{
		echo sprintf($xml, 'failed');
		return;
	}

?>