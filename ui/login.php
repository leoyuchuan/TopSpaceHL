<html xmlns:wb="http://open.weibo.com/wb">
    <html>
        <head>
            <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2337125943" type="text/javascript" charset="utf-8"></script>
            <meta charset="UTF-8">
            <title>TopSpaceHL!</title>
            <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        </head>
        <body>
            <div id="loginform">

                <div id="facebook"><i class="fa fa-facebook">
                        <wb:login-button type="3,2" onlogin="loginwb" onlogout="logoutwb">Login</wb:login-button>
                    </i><div id="connect"> with SNS</div></div>
                <div id="mainlogin">
                    <div id="or">or</div>
                    <h1>Log in with awesome new thing</h1>
                    <form action="javascript:void(0);" method="POST">
                        <input type="text" placeholder="username" value="" required name="username">
                        <input type="password" placeholder="password" value="" required name="password">
                        <input type="text" name="region" value="us">
                        <button type="submit" onclick="login()"><i class="fa fa-arrow-right"></i></button>
                    </form>
                    <div id="note"><a href="#">Forgot your password?</a></div>
                    <script>
                        function loginwb(o) {
                            alert("Welcome, " + o.screen_name);
                            window.location = "http://helmos.com.cn/wplproj/weibo.php";
                            // redirect here...
                        }
                        function logoutwb() {
                            alert('logout');
                        }
                        function login() {
                            var inputs = document.getElementsByTagName('input');
                            var username = inputs[0].value;
                            var password = inputs[1].value;
                            var region = inputs[2].value;
                            if (username.trim() === "") {
//                                alert('username fail');
                                return;
                            }
                            if (password.trim() === "") {
//                                alert('password fail');
                                return;
                            }
                            if (region.trim() !== "cn" && region.trim() !== "us") {
//                                alert('region fail');
                                return;
                            }
                            var xmlhttp;
                            if (window.XMLHttpRequest)
                            {// code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            }
                            else
                            {// code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            } 
                            xmlhttp.onreadystatechange = function ()
                            {
                                loginProcess(xmlhttp.responseText);
                                return;
                            };
                            xmlhttp.open("POST", "./phpscript/loginprocess.php", true);
                            var params = "username=" + username.trim() + "&password=" + password.trim() + "&region=" + region.trim();
                            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//                            xmlhttp.setRequestHeader("Accept-Encoding","gzip,deflat");
                            xmlhttp.send(params);
                        }

                        function loginProcess(message) {
                            if(message.trim() == 'okay'){
                                window.location="./home.php";
                            }
                        }
                    </script>

                </div>
            </div>


        </body>

    </html>