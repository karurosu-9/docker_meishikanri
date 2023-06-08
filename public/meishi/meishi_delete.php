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
    $corp_id = $_GET['corpid'];

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = 'root';
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT corp,title,name,postal,address,tel,fax,mobile,mail,hp FROM meishi_kanri
        WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $corp_id;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $corp = $rec['corp'];
    $title = $rec['title'];
    $name = $rec['name'];
    $postal = $rec['postal'];
    $address = $rec['address'];
    $tel = $rec['tel'];
    $fax = $rec['fax'];
    $mobile = $rec['mobile'];
    $mail = $rec['mail'];
    $hp = $rec['hp'];
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
        table {
        white-space: nowrap;
    }

    .ta1 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta2 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta3 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta4 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta5 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta6 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta7 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta8 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta9 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    }

    .ta10 {
        border-right: black dashed 1px;
        background-color: #c0c0c0;
    } 
</style>
<body>
<br>
登録削除<br>
<br>
<table border="3" style="border-collapse: collapse;">

    <tr>
        <td class="ta1">会社名</td>
        <td><?php echo $corp; ?></td>
    </tr>
    <tr>
        <td class="ta2">役職</td>
        <td><?php echo $title; ?></td>
    </tr>
    <tr>
        <td class="ta3">名前</td>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <td class="ta4">郵便番号</td>
        <td><?php echo $postal; ?></td>
    </tr>
    <tr>
        <td class="ta5">住所</td>
        <td><?php echo $address; ?></td>
    </tr>
    <tr>
        <td class="ta6">電話番号</td>
        <td><?php echo $tel; ?></td>
    </tr>
    <tr>
        <td class="ta7">FAX</td>
        <td><?php echo $fax; ?></td>
    </tr>
    <tr>
        <td class="ta8">携帯番号</td>
        <td><?php echo $mobile; ?></td>
    </tr>
    <tr>
        <td class="ta9">メールアドレス</td>
        <td><?php echo $mail; ?></td>
    </tr>
    <tr>
        <td class="ta10">ホームページ</td>
        <td><?php echo $hp; ?></td>
    </tr>
</table>
<br>
<br>
※この情報を本当に削除してもよろしいですか？<br>
<br>
<form action="meishi_delete_done.php" method="post">
    <input type="hidden" name="corpid" value="<?php echo $corp_id; ?>">
    <input type="button" onclick="location.href='meishi_list.php'" value="キャンセル">
    <input type="submit" value="削除">
</form>
<?php require "footer.php"; ?>