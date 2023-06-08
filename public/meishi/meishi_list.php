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

try {
    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT id,corp,title,name,postal,address,tel,fax,mobile,mail,hp FROM meishi_kanri
     WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
} catch (Exception $e) {
    $e->getMessage();
    echo "ただいま障害によりご迷惑をおかけしております。";
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
    table {
        white-space: nowrap;
    }

    .table1 {
        border-top: black solid 5px;
        border-bottom: black solid 1px;
        border-left: black solid 5px;
        border-right: black solid 5px;
        background-color: #c0c0c0;
    }

    .table2 {
        border-bottom: black dashed 3px;
        border-left: black solid 5px;
        border-right: black solid 5px;
        background-color: #c0c0c0;
    }


    .table3 {

        border-left: black solid 5px;
        border-right: solid 5px;
    }

    .table4 {
        border-bottom: black solid 5px;
        border-left: black solid 5px;
        border-right: black solid 5px;
        border-top: black solid 1px;
    }
</style>

<body>
    <br>
    検索<br>
    <form action="meishi_serch.php" method="post">
        <input type="text" name="keyword" style="width:150px">
        <input type="submit" value="検索">
    </form>
    <br>
    <br>
    <br>
    名刺一覧<br>
    <br>
    <br>
    <button onclick="location.href='meishi_add.php'">名刺登録</button><br>
    <br>
    <table border="1" rules="cols" style="border-collapse: collapse;" cellpadding="10">
        <tr class="table1">
            <th>会社名</th>
            <th>電話番号</th>
            <th colspan="4">HP</th>
        </tr>
        <tr class="table2">
            <th>住所</th>
            <th>FAX</th>
            <th>役職</th>
            <th>名前</th>
            <th>携帯番号</th>
            <th>メールアドレス</th>
        </tr>
        <?php while (true) {; ?>
            <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC); ?>
            <?php if ($rec == false) {; ?>
                <?php break; ?>
            <?php }; ?>
            <tr class="table3">
                <td><a href="meishi_disp.php?corpid=<?php echo $rec['id']; ?>"><?php echo $rec['corp']; ?></a></td>
                <td><?php echo $rec['tel'] ?></td>
                <td colspan="4"><?php echo $rec['hp']; ?></td>
            </tr>
            <tr class="table4">
                <td><?php echo $rec['address']; ?></td>
                <td><?php echo $rec['fax']; ?></td>
                <td><?php echo $rec['title']; ?></td>
                <td><?php echo $rec['name']; ?></td>
                <td><?php echo $rec['mobile']; ?></td>
                <td><?php echo $rec['mail'];?></td>
            </tr>
        <?php }; ?>
    </table>
    <br>
    <br>
    <a href='../staff_login/staff_top.php'>トップメニューへ</a><br>
    <br>
    <br>
    <?php require "footer.php"; ?>