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
 * Process Input Data & Get Connection Base on Region
*/
$region = strtolower($region);
if(preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $username) !== 1){
        echo sprintf($xml, 'Wrong Username');
        return;
}
if(preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $password) !== 1){
        echo sprintf($xml, 'Wrong Password');
        return;
}
if(preg_match("/^(cn)|(us)$/", $region) !== 1){
        echo sprintf($xml, 'Wrong Region');
        return;
}
$conn = Propel\Runtime\Propel::getConnection(strtolower(trim($region)).'_topspace');
/*
 * Registration Processing
 */ 
$users = UserQuery::create()->findByArray(array('Username'=>$username), $conn);
if($users->count() > 0){
    echo sprintf($xml,'User Exists');
    return;
}
$user = new User();
$user->setUsername($username);
$user->setPassword($password);
try{
    $user->save($conn);
    echo sprintf($xml,'Success');
    return;
}  catch (Exception $e){
    echo sprintf($xml,'Fail');
    return;
}
?>