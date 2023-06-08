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

    .btn {
        margin-left: 290px;
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
        <?php $text = 10; ?>
        <form action="mitumori_hosoku_master.php" name="form" method="post" onsubmit="return lengthCheck()">
            <table cellpadding="2">
                <tr>
                    <th>備考</th>
                </tr>
                <?php for ($i = 1; $i <= $text; $i++) : ?>
                    <tr>
                        <td><input type="text" name="biko<?php echo $i; ?>" style="width:300px">
                            <?php if (isset($_POST["tekiyo" . $i])) : ?>
                                <input type="hidden" name="tekiyo<?php echo $i; ?>" value="<?php echo $_POST["tekiyo" . $i]; ?>">
                            <?php endif; ?>
                            <?php if (isset($_POST["suryo" . $i])) : ?>
                                <input type="hidden" name="suryo<?php echo $i; ?>" value="<?php echo $_POST["suryo" . $i]; ?>">
                            <?php endif; ?>
                            <?php if (isset($_POST["tanka" . $i])) : ?>
                                <input type="hidden" name="tanka<?php echo $i; ?>" value="<?php echo $_POST["tanka" . $i]; ?>">
                            <?php endif; ?>
                            <?php if (isset($_POST["tanka" . $i])) : ?>
                                <input type="hidden" name="kingaku<?php echo $i; ?>" value="<?php echo $_POST["kingaku" . $i]; ?>">
                        </td>
                    <?php endif; ?>
                    </tr>
                <?php endfor; ?>
            </table>
            <br>
            <br>
            <input type="hidden" name="corp" value="<?php echo $_POST['corp'];?>">
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