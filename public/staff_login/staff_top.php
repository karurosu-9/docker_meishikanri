<?php
session_start();
session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>出納帳---トップページ画面</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 450px;
    }

    span {
        margin: 250px;
        padding: 100px;
        border: 2px solid #da4033;
        border-radius: 8px;
        position: relative;
    }

    span::before {
        background-color: #fff;
        color: #da4033;
        content: "マスター管理";
        font-weight: bold;
        position: absolute;
        padding: 0 20px;
        left: 10px;
        top: -10px;
    }

    .box {
        margin: 2em 0;
        background: #c0c0c0;
    }

    .box .box-title {
        font-size: 1.2em;
        background: #808080;
        padding: 4px;
        text-align: center;
        color: #FFF;
        font-weight: bold;
        letter-spacing: 0.05em;
    }

    .box p {
        padding: 15px 20px;
        margin: 0;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    h1 {
        margin-bottom: 0;
    }
</style>

<body>
    <div class="body">
        <?php

        echo '<a href="../staff_login/staff_logout.php">ログアウト</a>';
        echo '<hr>';

        if (isset($_SESSION['login']) == false) {
            echo "ログインされていません。<br>";
            echo "<br>";
            echo '<a href="staff_login.php">ログイン画面へ</a>';
            exit;
        } else {
            echo "【";
            echo $_SESSION['staff_name'];
            echo "】";
            echo "さん、ログイン中";
            echo "<br>";
        }

        ?>

        <br>
        <br>
        <h1>トップメニュー</h1><br>

        <div class="box">
            <div class="box-title">メニュー</div>
            <p><a href="../meishi/meishi_list.php">名刺一覧</a></p>
            <p><a href="../staff/staff_list.php">スタッフ一覧</a></p>
            <p><a href="../mitumori/mitumori_list_master.php">見積一覧</a></p>
            <p><a href="../mitumori/mitumori_add_master.php">見積入力</a></p>
        </div>


    </div>
    <br>
    <br>
</body>

</html>