<?php include '../classes/Adminlogin.php'; ?>
<!--creating object for adminLogin.php class-->
<?php 
$al=new Adminlogin();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$adminUser=$_POST['adminUser'];
	$adminPass=md5($_POST['adminPass']);

	$loginchk=$al->adminLogin($adminUser,$adminPass);
}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action=""accept-charset="utf8mb4_general_ci" method="post">
			<h1>Admin Login</h1>
			<!--admin_login-->
			<?php 

			if(isset($loginchk)){
				echo $loginchk;
			}

			?>
			<div>
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">www.facebook.com</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>