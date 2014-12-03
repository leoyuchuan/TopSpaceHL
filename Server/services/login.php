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
require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';
$xml = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';

/*
 * Fetch Input Data
 */
// $username = $_POST['username'];
// $password = $_POST['password'];
// $region = $_POST['region'];
$username = $_GET['username'];
$password = $_GET['password'];
$region = $_GET['region'];

/*
 *  Process Input Data & Get Connection Base on Region
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
 * Login Processing
 */
$user = UserQuery::create()->findByArray(array('Username'=>$username, 'Password'=>$password), $conn);
if($user->count() > 0){
    echo sprintf($xml,'Verified');
    return;
}
else{
    echo sprintf($xml,"Wrong Pair");
    return;
}

?>