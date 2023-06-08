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

<?php require "header.php"; ?>
<?php

try {
    $corp = htmlspecialchars($_POST['corp'], ENT_QUOTES, "UTF-8");
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, "UTF-8");
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
    $postal = htmlspecialchars($_POST['postal'], ENT_QUOTES, "UTF-8");
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, "UTF-8");
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
    $fax = htmlspecialchars($_POST['fax'], ENT_QUOTES, "UTF-8");
    $mobile = htmlspecialchars($_POST['mobile'], ENT_QUOTES, "UTF-8");
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, "UTF-8");
    $hp = htmlspecialchars($_POST['hp'], ENT_QUOTES, "UTF-8");

    $postal_mb = mb_convert_kana($postal, "a");
    $tel_mb = mb_convert_kana($tel, "a");
    $fax_mb = mb_convert_kana($fax, "a");
    $mobile_mb = mb_convert_kana($mobile, "a");
    $mail_mb = mb_convert_kana($mail, "a");
    $hp_mb = mb_convert_kana($hp, "a");

    $okflag = true;

    if (empty($corp)) {
        echo "会社名：<br>";
        echo "会社名を入力してください。<br>";
        echo "<br>";
        $okflag = false;
    } else {
        echo "会社名：<br>";
        echo $corp . "<br>";
        echo "<br>";
    }


    if (!empty($title)) {
        echo "役職：<br>";
        echo $title . "<br>";
        echo "<br>";
    }

    if (empty($name)) {
        echo "名前：<br>";
        echo "名前を入力してください。<br>";
        echo "<br>";
        echo $okflag = false;
    } else {
        echo "名前：<br>";
        echo $name . "<br>";
        echo "<br>";
    }


    if (preg_match('/^[0-9]{7}+$/', $postal_mb) == 0) {
        echo "郵便番号：<br>";
        echo "郵便番号を正しい数字で入力してください。<br>";
        echo "<br>";
        $okflag = false;
    } else {
        preg_match("/(.{3})(.{4})/", $postal_mb, $match);
        $newpost = $match[1] . "-" . $match[2];
        echo "郵便番号：<br>";
        echo "〒" . $newpost . "<br>";
        echo "<br>";
    }


    if (empty($address)) {
        echo "住所：<br>";
        echo "住所を入力してください。<br>";
        echo "<br>";
        $okflag = false;
    } else {
        echo "住所：<br>";
        echo $address . "<br>";
        echo "<br>";
    }


    if (preg_match('/^[0-9]{10}+$/', $tel_mb) == 0) {
        echo "電話番号：<br>";
        echo "正しい数字で入力してください。<br>";
        echo "<br>";
        $okflag = false;
    } else {
        preg_match('/(.{3})(.{3})(.{4})/', $tel_mb, $match);
        $new_tel = $match[1] . "-" . $match[2] . "-" . $match[3];
        echo "電話番号：<br>";
        echo $new_tel . "<br>";
        echo "<br>";
    }


    if (!empty($fax_mb)) {
        if (preg_match('/^[0-9]{10}+$/', $fax_mb) == 0) {
            echo "FAX：<br>";
            echo "ＦＡＸ番号を正しい数字で入力してください。<br>";
            echo "<br>";
            $okflag = false;
        } else {
            preg_match('/(.{3})(.{3})(.{4})/', $fax_mb, $match);
            $new_fax = $match[1] . "-" . $match[2] . "-" . $match[3];
            echo "FAX：<br>";
            echo $new_fax . "<br>";
            echo "<br>";
        }
    }


    if (!empty($mobile_mb)) {
        if (preg_match('/^[0-9]{11}+$/', $mobile_mb) == 0) {
            echo "携帯番号：<br>";
            echo "携帯番号を正しい数字で入力してください。<br>";
            echo "<br>";
            $okflag = false;
        } else {
            preg_match('/(.{3})(.{4})(.{4})/', $mobile_mb, $match);
            $new_mobile = $match[1] . "-" . $match[2] . "-" . $match[3];
            echo "携帯番号：<br>";
            echo $new_mobile . "<br>";
            echo "<br>";
        }
    }


    if (!empty($mail_mb)) {
        if (preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/', $mail_mb) == 0) {
            echo "メールアドレス：<br>";
            echo "メールアドレスを正しく入力してください。<br>";
            echo "<br>";
            $okflag = false;
        } else {
            echo "メールアドレス：<br>";
            echo $mail_mb . "<br>";
            echo "<br>";
        }
    }


    if (!empty($hp_mb)) {
        echo "HPアドレス：<br>";
        echo $hp_mb . "<br>";
        echo "<br>";
    }

    if ($okflag == true) {
        echo '<form action="meishi_add_done.php" method="post">';
        echo '<input type="hidden" name="corp" value="' . $corp . '">';
        echo '<input type="hidden" name="title" value="' . $title . '">';
        echo '<input type="hidden" name="name" value="' . $name . '">';
        echo '<input type="hidden" name="postal" value="' . $newpost . '">';
        echo '<input type="hidden" name="address" value="' . $address . '">';
        echo '<input type="hidden" name="tel" value="' . $new_tel . '">';
        echo '<input type="hidden" name="fax" value="' . $new_fax . '">';
        echo '<input type="hidden" name="mobile" value="' . $new_mobile . '">';
        echo '<input type="hidden" name="mail" value="' . $mail_mb . '">';
        echo '<input type="hidden" name="hp" value="' . $hp_mb . '">';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '<input type="submit" value="登録">';
        echo '</form>';
    } else {
        echo '<form>';
        echo '<input type="button" onclick="history.back()" value="戻る">';
        echo '</form>';
    }
} catch (Exception $e) {
    echo "ただいま障害により大変ご迷惑をおかけしております。";
    exit;
}
?>
<?php require "footer.php"; ?>