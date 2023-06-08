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
    $staff_pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, "UTF-8");
    $staff_pass2 = htmlspecialchars($_POST['pass2'], ENT_QUOTES, "UTF-8");

    $staff_pass_mb = mb_convert_kana($staff_pass, "a");
    $staff_pass2_mb = mb_convert_kana($staff_pass2, "a");

    $okflag = true;

    if (empty($staff_name)) {
        echo "名前：<br>";
        echo "名前を入力してください。<br>";
        echo "<br>";
        $okflag = false;
    } else {
        echo "名前：<br>";
        echo $staff_name . "<br>";
        echo "<br>";
    }

    if (empty($staff_pass_mb)) {
        echo "パスワード：<br>";
        echo "パスワードを入力してください。<br>";
        echo "<br>";
        $okflag = false;
    }


    if ($staff_pass_mb != $staff_pass2_mb) {
        echo "パスワード：<br>";
        echo "パスワードが一致しません。<br>";
        echo "<br>";
        $okflag = false;
    }

    if (!empty($staff_pass_mb && $staff_pass2_mb)) {
        if (preg_match('/^[0-9a-z]{2,10}+$/', $staff_pass_mb, $staff_pass2_mb) == 0) {
            echo "パスワード：<br>";
            echo "パスワードを正しく入力してください。<br>";
            echo "<br>";
            $okflag = false;
        }
    }

    if ($okflag == false) {
        echo '<form>';
        echo '<a href="staff_add.php">戻る</a>';
        echo '</form>';
    } else {
        echo '<form action="staff_add_done.php" method="post">';
        echo '<input type="hidden" name="name" value="' . $staff_name . '">';
        echo '<input type="hidden" name="pass" value="' . $staff_pass_mb . '">';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '<input type="submit" value="OK">';
        echo '</form>';
    }
} catch (Exception $e) {
    echo "ただいま障害によりご迷惑をおかけしております。";
}
?>

<?php require "../meishi/footer.php"; ?>