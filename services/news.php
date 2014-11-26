<?php
/*
	Name: news.php
	Description: Fetch news Information From Database. (Using Post)
	Input: o(peration)={all, title, id} ,region = {cn, us}
	Output: XML File
	
	if o == all
		<?xml version="1.0" encoding="UTF-8"?>
		<result>
			<news>
				<news_id>$news_id</news_id>
				<title>$title</title>
				<content>$content</content>
				<date>$date</date>
			</news>
			.
			.
			.
		</result>

	if o == title
		<result>
			<news>
				<news_id>$news_id</news_id>
				<title>$title</title>
				<date>$date</date>
			</news>
			.
			.
			.
		</result>

	if o == id
		<result>
			<news>
				<news_id>$news_id</news_id>
			</news>
			.
			.
			.
		</result>
*/	
	$xmlmessage = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
	$xmlall = '<?xml version="1.0" encoding="UTF-8"?><result><news><news_id>%d</news_id><title>%s</title><content>%s</content><date>%s</date></news></result>';
	$xmltitle = '<?xml version="1.0" encoding="UTF-8"?><result><news><news_id>%d</news_id><title>%s</title><date>%s</date></news></result>';
	$xmlid = '<?xml version="1.0" encoding="UTF-8"?><result><news><news_id>%d</news_id></news></result>';
	// $operation = $_POST['o'];
	// $region = $_POST['region'];
	$operation = $_GET['o'];
	$region = $_GET['region'];

	/*
		Convert username & region to lower case
		Validate username & password & region are correctly formatted
	*/
	$operation = strtolower($operation);
	$region = strtolower($region);
	if(preg_match("/^(all)|(title)|(id)$/", $operation) !== 1){
		echo sprintf($xmlmessage, 'wrong operation');
		return;
	}
	if(preg_match("/^(cn)|(us)$/", $region) !== 1){
		echo sprintf($xmlmessage, 'wrong region');
		return;
	}

	/*
		Connect to Database
	*/
	$dbconn = include "dbconn.php";
	if($dbconn === null){
		echo sprintf($xmlmessage, 'cannot connect to db');
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