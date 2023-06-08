<?php

try {

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    if ($page > 1) {
        $start = ($page * 10) - 10;
    } else {
        $start = 0;
    }

    $sql = "SELECT * FROM mitumori_list ORDER BY date DESC LIMIT {$start} , 10";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT COUNT(*) id FROM mitumori_list ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $page_num = $stmt->fetchColumn();

    $pagination = ceil($page_num / 10);

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
<style>
    .body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 550px;
    }

    table {
        border: black solid 2px;
        border-collapse: collapse;
        white-space: nowrap;
    }

    th {
        border: black solid 2px;
        text-align: center;
        background-color: #a9a9a9;

    }

    td {
        border: black solid 2px;
        text-align: center;
    }

    span {
        color: red;
        font-weight: bold;
    }

    .button {
        margin-left: 160px;
    }

    .button2 {
        margin-left: 20px;
    }
</style>

<body>
    <div class="body">

        <?php
        echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
        echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
        echo '<hr>';
        ?>
        <br>
        <br>
        見積一覧<br>
        <br>
        <br>
        <table cellpadding="2">
            <tr>
                <th>伝票番号</th>
                <th>社名</th>
                <th>日付</th>
                <th></th>
            </tr>
            <?php foreach ($rec as $val) : ?>
                <tr>
                    <td><a href="mitumori_disp_master.php?id=<?php echo $val['id']; ?>"><?php echo $val['num']; ?></a></td>
                    <td><?php echo $val['corp']; ?></td>
                    <td><?php echo $val['date']; ?></td>
                    <form action="mitumori_print_branch_master.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $val['id']?>">
                    <td><input type="submit" name="print" value="印刷"></td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <?php for ($x = 1; $x <= $pagination; $x++) : ?>
            <?php if ($x == $page) : ?>
                <?php echo $page . ' '; ?>
            <?php else : ?>
                <a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <br>
        <br>
    </div>
    </div>
</body>

</html>