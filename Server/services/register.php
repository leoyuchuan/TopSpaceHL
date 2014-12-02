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
        require_once '../vendor/autoload.php';
        require_once '../generated-conf/config.php';
	$xml = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
	// $username = $_POST['username'];
	// $password = $_POST['password'];
	// $region = $_POST['region'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$region = $_GET['region'];

	/*
		Process Input Data
	*/
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
         * Registration Processing
         */
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            $user = UserQuery::create()->findByArray(array('Username'=>$username), $conn);
            if($user->count() > 0){
                echo sprintf($xml,'username exists');
                return;
            }
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);
            try{
                $user->save($conn);
                echo sprintf($xml,'success');
                return;
            }  catch (Exception $e){
                echo sprintf($xml,$e->getMessage());
                return;
            }
        }
        if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            $user = UserQuery::create()->findByArray(array('Username'=>$username), $conn);
            if($user->count() > 0){
                echo sprintf($xml,'username exists');
                return;
            }
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);
            try{
                $user->save($conn);
                echo sprintf($xml,'success');
                return;
            }  catch (Exception $e){
                echo sprintf($xml,$e->getMessage());
                return;
            }
        }

?>