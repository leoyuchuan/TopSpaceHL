<?php
/*
	Name: subscribe.php
	Description: Subscribe By Team Or By News; Get News By User Subscription; Unsubscribe By team_id or all. (Using Post)
	Input: o(peration)={get, gets, subt, subn, un, unall} ,region = {cn, us} , news_id, team_id, username, password  //gets = get short version, subt = sub by team, subn = sub by news
	Output: XML File
        
        For subt(n), un, unall:
            <?xml version="1.0" encoding="UTF-8"?>
            <result>
                <message>$message</message>
            </result>
        For get:
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
        For gets:
            <?xml version="1.0" encoding="UTF-8"?>
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
*/	
	require_once '../vendor/autoload.php';
        require_once '../generated-conf/config.php';
	$xmlmessage = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
        $xml = '<?xml version="1.0" encoding="UTF-8"?><result>%s</result>';
	$xmlall = '<news><news_id>%d</news_id><title>%s</title><content>%s</content><date>%s</date></news>';
	$xmlshort = '<news><news_id>%d</news_id><title>%s</title><date>%s</date></news>';
        $output = '';
	
        /*
         * Fetch Input Data
         */
        // $operation = $_POST['o'];
	// $region = $_POST['region'];
        // $username = $_POST['username'];
        // $password = $_POST['password'];
        
	$operation = $_GET['o'];
	$region = $_GET['region'];
        $username = $_GET['username'];
        $password = $_GET['password'];

	/*
         * Process Input Data
         */
	$operation = strtolower($operation);
	$region = strtolower($region);
	if(preg_match("/^(all)|(title)|(id)|(byid)$/", $operation) !== 1){
		echo sprintf($xmlmessage, 'wrong operation');
		return;
	}
	if(preg_match("/^(cn)|(us)$/", $region) !== 1){
		echo sprintf($xmlmessage, 'wrong region');
		return;
	}
        if(preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $username) !== 1){
		echo sprintf($xml, 'wrong username');
		return;
	}
	if(preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $password) !== 1){
		echo sprintf($xml, 'wrong password');
		return;
	}
        
        /*
         * Verify Login Information
         */
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            $user = UserQuery::create()->findByArray(array('Username'=>$username, 'Password'=>$password), $conn);
            if($user->count() === 0){
                echo sprintf($xml,"user not found");
                return;
            }
        }
        if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            $user = UserQuery::create()->findByArray(array('Username'=>$username, 'Password'=>$password), $conn);
            if($user->count() === 0){
                echo sprintf($xml,"user not found");
                return;
            }
        }
        
        /*
         * SubScribe By team_id
         */
        if($operation === 'subt'){
            //$team_id = $_POST['team_id'];
            $team_id = $_GET['team_id'];
            
            
            
        }
        
        
        
        

	if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            if($operation==="all"){
                $news = NewsQuery::create()->find($conn);
                foreach ($news as $new){
                    $id = $new->getNewsId();
                    $title = $new->getTitle();
                    $content = $new->getContent();
                    $date = $new->getDate()->format('Y-m-d H:i:s');
                    $output.=sprintf($xmlall, $id, $title, $content, $date);
                }
                echo sprintf($xml,$output);
            }else if($operation==="title"){
                $news = NewsQuery::create()->find($conn);
                foreach ($news as $new){
                    $id = $new->getNewsId();
                    $title = $new->getTitle();
                    $date = $new->getDate()->format('Y-m-d H:i:s');
                    $output.=sprintf($xmltitle, $id,$title,$date);
                }
                echo sprintf($xml,$output);
            }else if($operation==="id"){
                $news = NewsQuery::create()->find($conn);
                foreach ($news as $new){
                    $id = $new->getNewsId();
                    $output.=sprintf($xmlid, $id);
                }
                echo sprintf($xml,$output);
            }else if ($operation==="byid") {
                $news = NewsQuery::create()->findPk(intval($news_id),$conn);
                if($news!==NULL){
                    $id = $news->getNewsId();
                    $title = $news->getTitle();
                    $content = $news->getContent();
                    $date = $news->getDate()->format('Y-m-d H:i:s');
                    $output.=sprintf($xmlall, $id, $title, $content, $date);
                    echo sprintf($xml,$output);
                }else{
                    echo sprintf($xmlmessage,"empty result");
                }
            }
        }
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            if($operation==="all"){
                $news = NewsQuery::create()->find($conn);
                foreach ($news as $new){
                    $id = $new->getNewsId();
                    $title = $new->getTitle();
                    $content = $new->getContent();
                    $date = $new->getDate()->format('Y-m-d H:i:s');
                    $output.=sprintf($xmlall, $id,$title,$content,$date);
                }
                echo sprintf($xml,$output);
            }else if($operation==="title"){
                $news = NewsQuery::create()->find($conn);
                foreach ($news as $new){
                    $id = $new->getNewsId();
                    $title = $new->getTitle();
                    $date = $new->getDate()->format('Y-m-d H:i:s');
                    $output.=sprintf($xmltitle, $id,$title,$date);
                }
                echo sprintf($xml,$output);
            }else if($operation==="id"){
                 $news = NewsQuery::create()->find($conn);
                foreach ($news as $new){
                    $id = $new->getNewsId();
                    $output.=sprintf($xmlid, $id);
                }
                echo sprintf($xml,$output);
            }else if ($operation==="byid") {
                $news = NewsQuery::create()->findPk(intval($news_id),$conn);
                if($news!==NULL){
                    $id = $news->getNewsId();
                    $title = $news->getTitle();
                    $content = $news->getContent();
                    $date = $news->getDate()->format('Y-m-d H:i:s');
                    $output.=sprintf($xmlall, $id, $title, $content, $date);
                    echo sprintf($xml,$output);
                }else{
                    echo sprintf($xmlmessage,"empty result");
                }
            }
        }

?>