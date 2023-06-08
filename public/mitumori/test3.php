<?php
$text = 3;

$dsn = 'mysql:host=localhost;dbname=mitumori;charset=utf8';
$user = "root" ;
$password = "root";

$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

for($i=1;$i<=$text;$i++){
    $tekiyo_key = 'tekiyo' . $i;
    $suryo_key = 'suryo' . $i;

    $column[] = $tekiyo_key;
    $column[] = $suryo_key;

    $value[] = $_POST[$tekiyo_key];
    $value[] = $_POST[$suryo_key];

    $ph[] = '?';
    $ph[] = '?';
}

//カラム
$column = implode(',', $column);
//プレスホルダー
$ph = implode(',', $ph);

$sql="INSERT INTO mitumori_list(" . $column . ") VALUES(" . $ph . ")";

$stmt = $dbh->prepare($sql) ;
$stmt->execute($value);

?>

