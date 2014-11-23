<?php
/*
	Name: login.php
	Description: Input User Information & Return validation information. (Using Post)
	Input: username, password, region = {cn, us}
	Output: $validation = {verified, error_message}
	As following format
	
	<?xml version="1.0" encoding="UTF-8"?>
	<result>
		<message>$validation</message>
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
	if(preg_match("/^\S+$/", $username) !== 1){
		echo sprintf($xml, 'wrong username');
		return;
	}
	if(preg_match("/^\S+$/", $password) !== 1){
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
	$sql = 'SELECT username FROM USERS WHERE username = "%s" AND password = "%s";';
	$reuslt = $dbconn->query(sprintf($sql,$username,$password));
	$rows = $reuslt->$num_rows;

	if($rows === 1){
		echo sprintf($xml, 'verified');
		return;
	}
	else{
		echo sprintf($xml, 'Not found');
		return;
	}

?>