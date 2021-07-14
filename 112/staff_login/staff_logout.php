
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>農園</title>
</head>
<?php include('../include/nav.php');?>
<link rel="stylesheet" href="../css/etc.css">
<header>
<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>
</header>
<article>

<body>

ログアウトしました。<br />
<br />
<a href="../staff_login/staff_login.html">ログイン画面へ</a><br/>
<a href="../shop/shop_list.php">ecトップへ</a>
</article>
<?php include('../include/footer.php');?>
</body>
</html>