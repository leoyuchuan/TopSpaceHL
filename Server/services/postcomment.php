<?php
/*
	Name: postcomment.php
	Description: insert comments into Database (Using Post)
	Input: region = {cn, us} , news_id, content, username, password
	Output: XML File
	
        <?xml version="1.0" encoding="UTF-8"?>
	<result>
		<message>$validation</message>
	</result>
*/	
	require_once '../vendor/autoload.php';
        require_once '../generated-conf/config.php';

	$xml = '<?xml version="1.0" encoding="UTF-8"?><result><message>%s</message></result>';
        $output = '';
	// $region = $_POST['region'];
        // $news_id = $_POST['news_id'];
        //$content = $_POST['content'];
        //$username = $_POST['username'];
        //$password = $_POST['password'];
	$region = $_GET['region'];
        $news_id = $_GET['news_id'];
        $content = $_GET['content'];
        $username = $_GET['username'];
        $password = $_GET['password'];

	/*
		Process Parameter and Validate them
	*/
	$news_id = strtolower($news_id);
	$region = strtolower($region);
        $username = strtolower($username);
        $password = strtolower($password);
        
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
        if(preg_match("/^[1-9][0-9]*$/", $news_id) !== 1){
		echo sprintf($xmlmessage, 'wrong news');
		return;
	}
        
        /*
         * Verify Login Information
         */
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            $user = UserQuery::create()->findByArray(array('Username'=>$username, 'Password'=>$password), $conn);
            if($user->count() > 0){
                ;
            }
            else{
                echo sprintf($xml,"user not found");
                return;
            }
        }
        if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            $user = UserQuery::create()->findByArray(array('Username'=>$username, 'Password'=>$password), $conn);
            if($user->count() > 0){
                ;
            }
            else{
                echo sprintf($xml,"user not found");
                return;
            }
        }
        
        
        /*
         * Post Comments
         */
	if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            $hasNews = NewsQuery::create()->findBy('NewsId', $news_id, $conn)->count() > 0;
            if(!$hasNews){
                echo sprintf($xml,'news not found');
                return;
            }
            $comments = CommentQuery::create()->findBy('NewsId', $news_id, $conn);
            $tempCID = 0;
            
            $comment = new Comment();
            $comment->setNewsId($news_id);
            
        }
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            $comments = CommentQuery::create()->findBy('NewsId', intval($news_id), $conn);
            foreach ($comments as $comment){
                $id = $comment->getNewsId();
                $com_id = $comment->getCommentId();
                $content = $comment->getContent();
                $date = $comment->getDate()->format('Y-m-d H:i:s');
                $username = $comment->getUsername();
                $output.=sprintf($xmlcomment,$id,$com_id,$content,$date,$username);
            }
            echo sprintf($xml,$output);
        }

?>