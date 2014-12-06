
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
<wb:login-button type="3,2" onlogin="login" onlogout="logout">Login</wb:login-button>
</i><div id="connect"> with SSN</div></div>
<div id="mainlogin">
<div id="or">or</div>
<h1>Log in with awesome new thing</h1>
<form action="../Services/login.php" method="get">
<input type="text" placeholder="username or email" value="" required name="username">
<input type="password" placeholder="password" value="" required name="password">
<input type="text" name="region" value="Region:us/cn">
<button type="submit"><i class="fa fa-arrow-right"></i></button>
</form>
<div id="note"><a href="#">Forgot your password?</a></div>

<script>
function login(o){
	alert("Welcome, " + o.screen_name);
	window.location="http://helmos.com.cn/wplproj/weibo.php";
	// redirect here...
}
function logout(){
	alert('logout');
}
</script>
</div>
</div>


</body>

</html>