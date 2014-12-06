<?php
require_once './phpscript/checklogin.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TopSpaceHL:Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            body {
                padding-top: 70px;
                /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="home.php">News</a>
                        </li>
                        <li>
                            <a href="scoreboard.php">Scoreboard</a>
                        </li>
                        <li>
                            <a href="subscribe.php">Subscribe Control</a>
                        </li>
                        <li>
                            <a href="team.php">Team</a>
                        </li>
                        <li>
                            <a href="comments.php">Comments</a>
                        </li>
                        <li>
                            <a href="./phpscript/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <h1><?php
                        require_once 'HTTP/Request2.php';
                        session_start();
                        $region = $_SESSION['region'];
                        $news_id = $_GET['nid'];
                        if (preg_match("/^[1-9][0-9]*$/", $news_id) != 1)
                            echo "<script>window.location='home.php'</script>";
                        $r = new Http_Request2('http://www.webserver' . rand(1, 2) . '.com/news.php');
                        $r->setMethod(HTTP_Request2::METHOD_POST);
                        $r->addPostParameter(array('o' => 'byid', 'news_id' => $news_id, 'region' => $region));
                        try {
                            $body = $r->send()->getBody();
                            if (preg_match("/^.*<message>.*$/", $body) > 0)
                                echo "<script>window.location='home.php'</script>";
                            $xml = simplexml_load_string($body);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }
                        $new = $xml->news[0];
                        $id = (string)$new->news_id[0];
                        $date = $new->date[0];
                        $title = $new->title[0];
                        $content = $new->content[0];
//                        echo "<div><span>$id</span><span>$title</span><span>$date</span></div>";
                        echo "id:$id | title:$title | date:$date<br/>$content</br>";
                        echo "<br/><br/>";
                        echo "<a href='./phpscript/subprocess.php?nid=$id'>subscribe</a>    ";
                        echo "<br/><br/>";
                        $r = new Http_Request2('http://www.webserver' . rand(1, 2) . '.com/viewcomment.php');
                        $r->setMethod(HTTP_Request2::METHOD_POST);
                        $r->addPostParameter(array('news_id' => $id, 'region' => $region));
                        try {
                            $body = $r->send()->getBody();
                            $xml = simplexml_load_string($body);
                        } catch (Exception $ex) {
                            echo $ex->getMessage();
                        }
                        foreach($xml->comment as $comment){
                            $uname = $comment->username;
                            $content = $comment->content;
                            echo "$uname: $content<br/>";
                        }
                        ?></h1>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
