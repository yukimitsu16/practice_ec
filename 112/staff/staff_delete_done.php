<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print'ログインされていません';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br/>';
    print '<br/>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

try
{
  $staff_code=$_POST['code'];

  $dsn='mysql:dbname=shop;host=localhost;chars=UTF-8';
  $user='root';
  $password='';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql='DELETE FROM mst1_staff WHERE code=?';
  $stmt=$dbh->prepare($sql);
  $date[]=$staff_code;
  $stmt->execute($date);

  $dbh=null;

}
catch(Exception $e)
{
  print'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}

?>
削除しました。<br/>
<br/>
<a href="staff_list.php">戻る</a>


</body>
</html>