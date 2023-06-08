<?php
try {

    $mitumori_id = $_POST['id'];

    $num=htmlspecialchars($_POST['num'],ENT_QUOTES,"UTF-8");
    $date =htmlspecialchars($_POST['date'], ENT_QUOTES,"UTF-8");
    $corp = htmlspecialchars($_POST['corp'],ENT_QUOTES,"UTF-8");
    $place=htmlspecialchars($_POST['place'],ENT_QUOTES,"UTF-8");
    $conditions=htmlspecialchars($_POST['conditions'],ENT_QUOTES,"UTF-8");
    $deadline =htmlspecialchars($_POST['deadline'],ENT_QUOTES,"UTF-8");
    $total_price=htmlspecialchars($_POST['total_price'],ENT_QUOTES,"UTF-8");

    $form_mitumori = 10;
    $form_hosoku = 7;

    $dsn='mysql:host=localhost;dbname=mitumori;charset=utf8';
    $user='root';
    $password="";
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    for($i=1;$i<=$form_mitumori;$i++){
        $tekiyo_key = "tekiyo" .$i ;
        $suryo_key = "suryo" . $i ;
        $tanka_key = "tanka" .$i;
        $kingaku_key = "kingaku" . $i;
        $biko_key = "biko" . $i;

        $column[] = $tekiyo_key . ' = ?';
        $column[] = $suryo_key . ' = ?';
        $column[] = $tanka_key . ' = ?';
        $column[] = $kingaku_key . ' = ?';
        $column[] = $biko_key . ' = ?';

        $value[] = $_POST[$tekiyo_key];
        $value[] = $_POST[$suryo_key];
        $value[] = $_POST[$tanka_key];
        $value[] = $_POST[$kingaku_key];
        $value[] = $_POST[$biko_key];
    }


    for($i=1;$i<=$form_hosoku;$i++){
        $hosoku_key = "hosoku".$i;
        $column[] = $hosoku_key . ' = ?';
        $value[] = $_POST[$hosoku_key];
    }

    $num_key = "num";
    $date_key = "date";
    $corp_key = "corp";
    $place_key = "place";
    $conditions_key = "conditions";
    $deadline_key = "deadline";
    $total_price_key = "total_price";

    $column[] = $num_key . ' = ?';
    $column[] = $date_key . ' = ?';
    $column[] = $corp_key . ' = ?';
    $column[] = $place_key . ' = ?';
    $column[] = $conditions_key . ' = ?';
    $column[] = $deadline_key . ' = ?';
    $column[] = $total_price_key . ' = ?';

    $value[] =$_POST[$num_key];
    $value[] = $_POST[$date_key];
    $value[] = $_POST[$corp_key];
    $value[] = $_POST[$place_key];
    $value[] = $_POST[$conditions_key];
    $value[] = $_POST[$deadline_key];
    $value[] = $_POST[$total_price_key];

    $column = implode(",", $column);
    $ph = implode(",", $ph);

    $sql="UPDATE mitumori_list SET ".$column." = ".$ph." WHERE id= ".$mitumori_id;
    $stmt=$dbh->prepare($sql);
    $stmt->execute($value);

    $dbh = null;

} catch (Exception $e) {
    $e->getMessage();
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
    alert("見積の更新をを完了しました。");
    location.href="mitumori_list.php";
</script>
</body>

</html>