<?php
try {

    $mitumori_id = $_GET['id'];

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

    .button {
        margin-left: 500px;
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
        <h2>見積修正</h2><br>
        <br>
        <div class="corp">
            　<?php echo $rec['corp']; ?> 　　御中
        </div>
        <br>
        <br>
        <form action="mitumori_edit_biko_master.php" method="post" name="form">
            <table cellpadding="2">
                <tr>
                    <th>摘要</th>
                    <th>単価</th>
                    <th>数量</th>
                    <th>金額</th>
                </tr>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <tr>
                        <td><input type='text' name='tekiyo<?php echo $i; ?>' style="width:200px" value="<?php echo $rec['tekiyo' . $i]; ?>"></td>
                        <td><input type='text' name='tanka<?php echo $i; ?>' onChange='keisan()' style='width:100px' value="<?php echo $rec['tanka' . $i]; ?>">円</td>
                        <td><input type='text' name='suryo<?php echo $i; ?>' onChange='keisan()' style='width:50px' value="<?php echo $rec['suryo' . $i]; ?>"></td>
                        <td><input type='text' name='kingaku<?php echo $i; ?>' style='width:100px' value="<?php echo $rec['kingaku' . $i]; ?>">円</td>
                    </tr>
                <?php endfor; ?>
                <script type='text/javascript'>
                    function keisan() {
                        var tanka = document.form.tanka1.value;
                        var suryo = document.form.suryo1.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku1.value = price;
                        } else {
                            document.form.kingaku1.value = tanka;
                        }

                        var tanka = document.form.tanka2.value;
                        var suryo = document.form.suryo2.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku2.value = price;
                        } else {
                            document.form.kingaku2.value = tanka;
                        }

                        var tanka = document.form.tanka3.value;
                        var suryo = document.form.suryo3.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku3.value = price;
                        } else {
                            document.form.kingaku3.value = tanka;
                        }

                        var tanka = document.form.tanka4.value;
                        var suryo = document.form.suryo4.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku4.value = price;
                        } else {
                            document.form.kingaku4.value = tanka;
                        }

                        var tanka = document.form.tanka5.value;
                        var suryo = document.form.suryo5.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku5.value = price;
                        } else {
                            document.form.kingaku5.value = tanka;
                        }

                        var tanka = document.form.tanka6.value;
                        var suryo = document.form.suryo6.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku6.value = price;
                        } else {
                            document.form.kingaku6.value = tanka;
                        }

                        var tanka = document.form.tanka7.value;
                        var suryo = document.form.suryo7.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku7.value = price;
                        } else {
                            document.form.kingaku7.value = tanka;
                        }

                        var tanka = document.form.tanka8.value;
                        var suryo = document.form.suryo8.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku8.value = price;
                        } else {
                            document.form.kingaku8.value = tanka;
                        }

                        var tanka = document.form.tanka9.value;
                        var suryo = document.form.suryo9.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku9.value = price;
                        } else {
                            document.form.kingaku9.value = tanka;
                        }

                        var tanka = document.form.tanka10.value;
                        var suryo = document.form.suryo10.value;

                        if (tanka == "" || suryo == "") {

                        } else
                        if (isFinite(suryo)) {
                            var price = tanka * suryo;
                            document.form.kingaku10.value = price;
                        } else {
                            document.form.kingaku10.value = tanka;
                        }
                    }
                </script>
            </table>
            <br>
            <br>
            <input type="hidden" name="id" value="<?php echo $rec['id'];?>">
            <div class="button">
                <input type="submit" value="OK">
            </div>
        </form>

    </div>
</body>

</html>