<?php
try {

    $dsn='mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user='root';
    $password="root";
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    for($i=1;$i<=10;$i++){

        $tekiyo_key = "tekiyo" .$i ;
        $suryo_key = "suryo" . $i ;
        $tanka_key = "tanka" .$i;
        $kingaku_key = "kingaku" . $i;
        $biko_key = "biko" . $i;

        $column[] = $tekiyo_key;
        $column[] = $suryo_key;
        $column[] = $tanka_key;
        $column[] = $kingaku_key;
        $column[] = $biko_key;

        $value[] = htmlspecialchars($_POST[$tekiyo_key],ENT_QUOTES,"UTF-8");
        $value[] = htmlspecialchars($_POST[$suryo_key],ENT_QUOTES,"UTF-8");
        $value[] = htmlspecialchars($_POST[$tanka_key],ENT_QUOTES,"UTF-8");
        $value[] = htmlspecialchars($_POST[$kingaku_key],ENT_QUOTES,"UTF-8");
        $value[] = htmlspecialchars($_POST[$biko_key],ENT_QUOTES,"UTF-8");

        $ph[] = "?";
        $ph[] = "?";
        $ph[] = "?";
        $ph[] = "?";
        $ph[] = "?";
    }


    for($i=1;$i<=7;$i++){

        $hosoku_key = "hosoku".$i;

        $column[] = $hosoku_key;

        $value[] = htmlspecialchars($_POST[$hosoku_key],ENT_QUOTES,"UTF-8");

        

        $ph[] ="?";
    }

    $num_key = "num";
    $date_key = "date";
    $corp_key = "corp";
    $total_price_key = "total_price";

 
    $column[] = $num_key;
    $column[] = $date_key;
    $column[] = $corp_key;
    $column[] = $total_price_key;


    $value[] = htmlspecialchars($_POST[$num_key],ENT_QUOTES,"UTF-8");
    $value[] = htmlspecialchars($_POST[$date_key],ENT_QUOTES,"UTF-8");
    $value[] = htmlspecialchars($_POST[$corp_key],ENT_QUOTES,"UTF-8");
    $value[] = htmlspecialchars($_POST[$total_price_key],ENT_QUOTES,"UTF-8");
    

    $ph[] = "?";
    $ph[] = "?";
    $ph[] = "?";
    $ph[] = "?";


    $column = implode(",", $column);
    $ph = implode(",", $ph);


    $sql="INSERT INTO mitumori_list(".$column.") VALUES(".$ph.")";
    $stmt=$dbh->prepare($sql);
    $stmt->execute($value);

    $dbh = null;

} catch (Exception $e) {
    $e->getMessage();
    var_dump($e);
    exit;
    echo "ただいま障害によりご迷惑をおかけしております。";
}
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
    alert("見積の登録を完了しました。");
    location.href="mitumori_list_master.php";
</script>
</body>

</html>