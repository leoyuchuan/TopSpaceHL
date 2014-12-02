<?php
/*
	Name: team.php
	Description: Fetch team Information From Database. (Using Post)
	Input: o(peration)={all, byid} ,region = {cn, us} , team_id
	Output: XML File
	
	if o == all
            <?xml version="1.0" encoding="UTF-8"?>
            <result>
                <team>
                    <team_id>$news_id</team_id>
                    <name>$title</name>
                </team>
                .
                .
                .
            </result>
        if o == byid
            <?xml version="1.0" encoding="UTF-8"?>
            <result>
                <team>
                    <team_id>$news_id</team_id>
                    <name>$title</name>
                </team>
            </result>
*/	
	require_once '../vendor/autoload.php';
        require_once '../generated-conf/config.php';
	$xmlmessage = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
        $xml = '<?xml version="1.0" encoding="UTF-8"?><result>%s</result>';
	$xmlall = '<team><team_id>%d</team_id><name>%s</name></team>';
        $output = '';
	
        /*
         * Fetch Input Data
         */
        // $operation = $_POST['o'];
	// $region = $_POST['region'];
        // $news_id = $_POST['news_id'];
	$operation = $_GET['o'];
	$region = $_GET['region'];
        $team_id = $_GET['team_id'];

	/*
	    Input Data Processing
	*/
	$operation = trim(strtolower($operation));
	$region = trim(strtolower($region));
	if(preg_match("/^(all)|(byid)$/", $operation) !== 1){
            echo sprintf($xmlmessage, 'wrong operation');
            return;
	}
	if(preg_match("/^(cn)|(us)$/", $region) !== 1){
            echo sprintf($xmlmessage, 'wrong region');
            return;
	}
        if($operation==='byid'&&preg_match("/^[1-9][0-9]*$/", $team_id)!==1){
            echo sprintf($xmlmessage, 'wrong team id');
            return;
        }
        
        /*
         * Fetching New From Database Based on Operation Request
         */
	if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            if($operation==='all'){
                $teams = TeamQuery::create()->find($conn);
                if($teams->count()===0){
                    echo sprintf($xmlmessage, 'no team found');
                    return;
                }
                foreach($teams as $team){
                    $id = $team->getTeamId();
                    $name = $team->getName();
                    $output.=sprintf($xmlall, $id, $name);
                }
                echo sprintf($xml,$output);
                return;
            }
            if($operation==='byid'){
                $teams = TeamQuery::create()->findBy('TeamId', $team_id, $conn);
                if($teams->count()===0){
                    echo sprintf($xmlmessage, 'no team found');
                    return;
                }
                $team = $teams->getFirst();
                $id = $team->getTeamId();
                $name = $team->getName();
                $output.=sprintf($xmlall, $id, $name);
                echo sprintf($xml,$output);
                return;
            }
        }
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            if($operation==='all'){
                $teams = TeamQuery::create()->find($conn);
                if($teams->count()===0){
                    echo sprintf($xmlmessage, 'no team found');
                    return;
                }
                foreach($teams as $team){
                    $id = $team->getTeamId();
                    $name = $team->getName();
                    $output.=sprintf($xmlall, $id, $name);
                }
                echo sprintf($xml,$output);
                return;
            }
            if($operation==='byid'){
                $teams = TeamQuery::create()->findBy('TeamId', $team_id, $conn);
                if($teams->count()===0){
                    echo sprintf($xmlmessage, 'no team found');
                    return;
                }
                $team = $teams->getFirst();
                $id = $team->getTeamId();
                $name = $team->getName();
                $output.=sprintf($xmlall, $id, $name);
                echo sprintf($xml,$output);
                return;
            }
        }

?>