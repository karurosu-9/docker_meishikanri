<?php

if (isset($_POST['print'])) {

    $mitumori_id = $_POST['id'];

    try {

        $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $date = date("Y年n月d日");

        $sql = 'UPDATE mitumori_list SET date=? WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $value[] = $date;
        $value[] = $mitumori_id;
        $stmt->execute($value);

        $dbh = null;

        header('Location:mitumori_print_master.php?id=' . $mitumori_id);
        exit;
    } catch (Exception $e) {
        $e->getMessage();
        echo "ただいま障害によりご迷惑をおかけしております。";
    }
}
?>