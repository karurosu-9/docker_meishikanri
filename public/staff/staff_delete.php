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
    $staff_id = $_GET['staffid'];

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = 'root';
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM staff_list WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_id;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $staff_name = $rec['name'];
} catch (Exception $e) {
    echo "ただいま障害によりご迷惑をおかけしております。";
    exit;
}
?>

<!DOCTYPE htm>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>meishi_kanri</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="style.css">
</head>
<style>

    .table1 {
        border: black solid 2px;
        background-color: #c0c0c0;
    }

    .table2 {
        border: black solid 2px;
        background-color: #c0c0c0;
    }
</style>
<br>
スタッフ情報<br>
<br>
<br>
<br>
<table border="1" style="border-collapse: collapse;" cellpadding="5">
    <tr>
        <td class="table1">ID</td>
        <td><?php echo $staff_id; ?></td>
    </tr>
    <tr>
        <td class="table2">スタッフ名</td>
        <td><?php echo $staff_name; ?></td>
    </tr>
</table>
<br>
<br>

※この情報を本当に削除してもよろしいですか？<br>
<br>
<form action="staff_delete_done.php" method="post">
    <input type="hidden" name="staffid" value="<?php echo $staff_id; ?>">
    <input type="button" onclick="location.href='staff_list.php'" value="キャンセル">
    <input type="submit" value="削除">
</form>
<?php require "../meishi/footer.php"; ?>