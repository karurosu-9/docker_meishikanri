<?php
try {
    $dsn = 'mysql:host=localhost;dbname=mitumori;charset=utf8';
    $user = "root";
    $password = "";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT distinct corp FROM corp_list WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $e->getMessage();
    echo "ただいま障害によりご迷惑をおかけしております。";
}
?>

<!DOCTYPE htm>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mitumori</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>

</style>

<body>
    <br>
    <h2>見積書</h2>
    <br>
    <br>
    会社の選択をしてください。<br>
    <form action="mitumori_add_check.php" method="post">
    <select name="corp_name">
        <?php
        foreach ($rec as $val) {
            echo '<option value="' . $val['corp'] . '">' . $val['corp'] . '</option>';
        }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="OK">
    </form>
</body>

</html>