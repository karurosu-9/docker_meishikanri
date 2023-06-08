<?php
try {

    $mitumori_id = $_POST['id'];

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM mitumori_list WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $value[] = $mitumori_id;
    $stmt->execute($value);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
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
        border-collapse: collapse;
        border: black solid 2px;
        white-space: nowrap;
    }

    th {
        border: black solid 1px;
        background-color: #c0c0c0;
        text-align: center
    }

    td {
        border: black solid 1px;
        text-align: center;
    }

    .corp {
        border-bottom: 2px solid black;
        width: 330px;
        padding: auto;
        flex-basis: auto;
        white-space: nowrap;
    }

    .btn {
        margin-left: 480px;
    }
</style>

<body>
    <br>
    <div class="body">
        <?php
        echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
        echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
        echo '<hr>';
        ?>
        <br>
        <br>
        備考入力<br>
        <br>
        <div class="corp">
            　<?php echo $rec['corp']; ?> 　　御中
        </div>
        <br>
        <br>
        <form action="mitumori_edit_hosoku_master.php" name="form" method="post" onsubmit="return lengthCheck()">
            <table cellpadding="2">
                <tr>
                    <th width="500px">備考</th>
                </tr>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <tr>
                        <td><input type="text" name="biko<?php echo $i; ?>" style="width:500px" value="<?php echo $rec['biko' . $i]; ?>">
                            <input type="hidden" name="tekiyo<?php echo $i; ?>" value="<?php echo $_POST["tekiyo" . $i]; ?>">
                            <input type="hidden" name="suryo<?php echo $i; ?>" value="<?php echo $_POST["suryo" . $i]; ?>">
                            <input type="hidden" name="tanka<?php echo $i; ?>" value="<?php echo $_POST["tanka" . $i]; ?>">
                            <input type="hidden" name="kingaku<?php echo $i; ?>" value="<?php echo $_POST["kingaku" . $i]; ?>">
                        </td>
                    </tr>
                <?php endfor; ?>
            </table>
            <br>
            <br>
            <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">
            <div class="btn">
                <input type="submit" value="OK">
            </div>
        </form>
        <script type="text/javascript">
            function lengthCheck() {

                function count(str) {

                    let len = 0;

                    for (let i = 0; i < str.length; i++) {
                        (str[i].match(/[ -~]/)) ? len += 1: len += 2;
                    }

                    return len;

                }



                var biko = document.form.biko1.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("1行目が規定文字数を超えています。\n" + biko);
                    return false;
                }

                var biko = document.form.biko2.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("2行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko3.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("3行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko4.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("4行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko5.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("5行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko6.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("6行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko7.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("7行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko8.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("8行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko9.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("9行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
                var biko = document.form.biko10.value;

                var limit = 30;

                if (count(biko) > limit) {
                    alert("10行目が規定文字数を超えています。\n" + biko);
                    return false;
                }
            }
        </script>
        <br>
        <br>
    </div>
</body>

</html>