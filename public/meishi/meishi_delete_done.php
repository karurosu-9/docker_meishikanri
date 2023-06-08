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


<?php
try {
    $corp_id = $_POST['corpid'];

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM meishi_kanri WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $corp_id;
    $stmt->execute($data);

    $dbh = null;
} catch (Exception $e) {
    echo "ただいま障害によりご迷惑をおかけしております。";
    exit;
}
?>

<?php require "header.php"; ?>
<br>
登録情報を削除しました。<br>
<br>
<br>
<a href="meishi_list.php">名刺一覧へ</a><br>
<?php require "footer.php"; ?>