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
    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT id,name FROM staff_list WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
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
        padding: 10px;
    }
</style>
<body>
<br>
スタッフ一覧<br>
<br>
<br>
<br>
<br>
<br>
<button onclick="location.href='staff_add.php'">スタッフ登録</button><br>
<br>
<table border="1" style="border-collapse: collapse;" cellpadding="5">
    <tr class="table1">
        <th>ID</th>
        <th>スタッフ名</th>
    </tr>
    <?php while (true) {; ?>
        <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC); ?>
        <?php if ($rec == false) {; ?>
            <?php break; ?>
        <?php }; ?>
        <tr class="table2">
            <td><?php echo $rec['id']; ?></td>
            <td><a href="staff_disp.php?staffid=<?php echo $rec['id']; ?>"><?php echo $rec['name']; ?></a></td>
        </tr>
    <?php }; ?>
</table>
<br>
<br>
<a href="../meishi/meishi_list.php">名刺一覧へ</a>
<?php require "../meishi/footer.php"; ?>