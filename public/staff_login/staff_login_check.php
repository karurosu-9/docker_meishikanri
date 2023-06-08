<?php
session_start();
session_regenerate_id(true);

require "../meishi/header.php";

?>

<?php
try {
    $staff_name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
    $staff_pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, "UTF-8");

    $staff_pass_mb = mb_convert_kana($staff_pass, "a");

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT id, name FROM staff_list WHERE name=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass_mb;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec == false) {
        echo "名前もしくはパスワードが間違っています。<br>";
        echo '<a href="staff_login.php">戻る</a>';
    } else {
        $_SESSION['login'] = 0;
        $_SESSION['staff_id'] = $rec['id'];
        $_SESSION['staff_name'] = $staff_name;
        echo "ログインしました。<br>";
        echo '<br>';
        echo '<a href="staff_top.php">トップメニューへ</a>';
        exit;
    }
} catch (Exception $e) {
    $e->getMessage();
    #var_dump($e);
    #exit;
    echo "ただいま障害によりご迷惑をおかけしております。";
    exit;
}
?>

<?php require "../meishi/header.php"; ?>