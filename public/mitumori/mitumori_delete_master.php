<?php


$mitumori_id = $_GET['id'];

$dsn='mysql:host=db;dbname=meishi_kanri;charset=utf8';
$user="root";
$password="root";
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM mitumori_list WHERE id = ?';
$stmt=$dbh->prepare($sql);
$value[] = $mitumori_id;
$stmt->execute($value);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mitumori</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script>
        alert("見積を1件削除しました。");
        location.href="mitumori_list_master.php";
    </script>
</body>

</html>