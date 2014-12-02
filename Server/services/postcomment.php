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
		Process Parameter and Validation
	*/
	$news_id = strtolower($news_id);
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
        if(preg_match("/^[1-9][0-9]*$/", $news_id) !== 1){
		echo sprintf($xml, 'wrong news');
		return;
	}
        if(preg_match("/^.+$/", $content) !== 1){
		echo sprintf($xml, 'empty content');
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
         * Post Comments
         */
	if(strtolower(trim($region)) === "cn"){
            $conn = Propel\Runtime\Propel::getConnection('cn_topspace');
            /*
             * Checking Existance of News
             */
            $hasNews = NewsQuery::create()->findBy('NewsId', $news_id, $conn)->count() > 0;
            if(!$hasNews){
                echo sprintf($xml,'news not found');
                return;
            }
            /*
             * Generate Comment ID For Comment 
             */
            $comments = CommentQuery::create()->orderByCommentId()->findBy('NewsId', $news_id, $conn);
            $isKeyAssigned = false;
            $tempCID = 1;
            while(!$isKeyAssigned){
                foreach ($comments as $comment){
                    if($comment->getCommentId()===$tempCID){
                        $tempCID++;
                    }
                    else {
                        $isKeyAssigned = true;
                        break;
                    }
                }
            }
            /*
             * Create Comment and Save to DB
             */
            $comment = new Comment();
            $comment->setNewsId($news_id);
            $comment->setCommentId($tempCID);
            $comment->setContent($content);
            $comment->setDate(date('Y-m-d H:i:s',  time()));
            $comment->setUsername($username);
            $comment->save($conn);
            echo sprintf($xml,'success');
        }
        if(strtolower(trim($region)) === "us"){
            $conn = Propel\Runtime\Propel::getConnection('us_topspace');
            /*
             * Checking Existance of News
             */
            $hasNews = NewsQuery::create()->findBy('NewsId', $news_id, $conn)->count() > 0;
            if(!$hasNews){
                echo sprintf($xml,'news not found');
                return;
            }
            /*
             * Generate Comment ID For Comment 
             */
            $comments = CommentQuery::create()->orderByCommentId()->findBy('NewsId', $news_id, $conn);
            $isKeyAssigned = false;
            $tempCID = 1;
            while(!$isKeyAssigned){
                foreach ($comments as $comment){
                    if($comment->getCommentId()===$tempCID){
                        $tempCID++;
                    }
                    else {
                        $isKeyAssigned = true;
                        break;
                    }
                }
            }
            /*
             * Create Comment and Save to DB
             */
            $comment = new Comment();
            $comment->setNewsId($news_id);
            $comment->setCommentId($tempCID);
            $comment->setContent($content);
            $comment->setDate(date('Y-m-d H:i:s',  time()));
            $comment->setUsername($username);
            $comment->save($conn);
            echo sprintf($xml,'success');
        }

?>