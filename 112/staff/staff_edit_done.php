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
  $staff_name=$_POST['name'];
  $staff_pass=$_POST['pass'];

  $staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
  $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

  $dsn='mysql:dbname=shop;host=localhost;chars=UTF-8';
  $user='root';
  $password='';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql='UPDATE mst_staff SET name=?,password=? WHERE code=?';
  $stmt=$dbh->prepare($sql);
  $date[]=$staff_name;
  $date[]=$staff_pass;
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
修正しました。<br/>
<br/>
<a href="staff_list.php">戻る</a>


</body>
</html>