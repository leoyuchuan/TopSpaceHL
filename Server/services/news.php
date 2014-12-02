<?php
/*
	Name: news.php
	Description: Fetch news Information From Database. (Using Post)
	Input: o(peration)={all, title, id, byid} ,region = {cn, us} , news_id
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

	if o == id
                <?xml version="1.0" encoding="UTF-8"?>
		<result>
			<news>
				<news_id>$news_id</news_id>
			</news>
			.
			.
			.
		</result>
        if o == byid
                <?xml version="1.0" encoding="UTF-8"?>
                <result>
			<news>
				<news_id>$news_id</news_id>
				<title>$title</title>
				<content>$content</content>
				<date>$date</date>
			</news>
		</result>
*/	
	require_once '../vendor/autoload.php';
        require_once '../generated-conf/config.php';
	$xmlmessage = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
        $xml = '<?xml version="1.0" encoding="UTF-8"?><result>%s</result>';
	$xmlall = '<news><news_id>%d</news_id><title>%s</title><content>%s</content><date>%s</date></news>';
	$xmltitle = '<news><news_id>%d</news_id><title>%s</title><date>%s</date></news>';
	$xmlid = '<news><news_id>%d</news_id></news>';
        $output = '';
	
        /*
         * Fetch Input Data
         */
        // $operation = $_POST['o'];
	// $region = $_POST['region'];
        // $news_id = $_POST['news_id'];
	$operation = $_GET['o'];
	$region = $_GET['region'];
        $news_id = $_GET['news_id'];

	/*
	    Input Data Processing
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
        if($operation==='byid'&&preg_match("/^[1-9][0-9]*$/", $news_id) !== 1){
		echo sprintf($xmlmessage, 'wrong parameter');
		return;
	}
        
        
        /*
         * Fetching New From Database Based on Operation Request
         */
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