<?php
/*
	Servers Information
	CN located in China
	US located in US
*/
$serverCN = "";
$usernameCN = "";
$passwordCN = "";
$dbnameCN = "";
$serverUS = "mysql.leowrd.com";	
$usernameUS = "admintopspace";
$passwordUS = "adminadmin";
$dbnameUS = "topspacehl";

if(strtolower(trim($region)) === "cn")
	return new mysqli($serverCN, $usernameCN, $passwordCN, $dbnameCN);
if(strtolower(trim($region)) === "us")
	return new mysqli($serverUS, $usernameUS, $passwordUS, $dbnameUS);
return null;

?>