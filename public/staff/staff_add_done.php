<?php

session_start();
session_regenerate_id(true);

echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
echo '<hr>';

if (isset($_SESSION['login']) == false) {
    echo "ログインされていません。<br>";
    echo "<br>";
    echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit;
} else {
    echo "『 ";
    echo $_SESSION['staff_name'];
    echo " 』";
    echo "さんログイン中<br>";
    echo "<br>";
}
?>

<?php require "../meishi/header.php"; ?>

<?php

try {
    $staff_name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
    $staff_pass = htmlentities($_POST['pass'], ENT_QUOTES, "UTF-8");

    $staff_pass_mb = mb_convert_kana($staff_pass, "a");

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO staff_list (name,password) VALUES(?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass_mb;
    $stmt->execute($data);

    $dbh = null;

    echo "<br>";
    echo "スタッフに" . $staff_name . "さんを登録しました。";
    echo '<br>';
    echo '<br>';
    echo '<a href="staff_list.php">スタッフ一覧へ</a>';
} catch (Exception $e) {
    echo "ただいま障害によりご迷惑をおかけしております。";
    exit;
}
?>

<?php require "../meishi/footer.php"; ?>