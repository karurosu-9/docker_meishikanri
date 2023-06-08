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
    $data[] = $mitumori_id;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);



    $sql = 'SELECT * FROM my_corp WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

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
    body {
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
        text-align: center;
    }

    td {
        border: black solid 1px;
        padding: 10px;
        text-align: center;
        padding: 5px;
    }

    .corp {
        border-bottom: 2px solid black;
        width: 330px;
        padding: auto;
        flex-basis: auto;
        white-space: nowrap;
    }

    .button {
        margin-left: 450px;
    }
</style>

<body>
    <?php
    echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
    echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
    echo '<hr>';
    ?>
    <br>
    <br>
    見積確認
    <br>
    <br>
    <br>
    <div class="corp">
        　<?php echo $rec['corp']; ?> 　　御中
    </div>
    <form action="mitumori_edit_done_master.php" method="post" onsubmit="return mitumoriCheck()">
        <br>
        <br>
        <table cellpadding="2">
            <tr>
                <th width="500px">摘要</th>
                <th>数量</th>
                <th>単価</th>
                <th>金額</th>
                <th width="700px">備考</th>
            </tr>
            <?php
            $total_price = 0;
            $all_total_price = 0;
            ?>
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <?php

                $tekiyo = htmlspecialchars($_POST["tekiyo" . $i], ENT_QUOTES, "UTF-8");
                $tanka = htmlspecialchars($_POST['tanka' . $i], ENT_QUOTES, "UTF-8");
                $suryo = htmlspecialchars($_POST['suryo' . $i], ENT_QUOTES, "UTF-8");
                $kingaku = htmlspecialchars($_POST['kingaku' . $i], ENT_QUOTES, "UTF-8");
                $biko = htmlspecialchars($_POST['biko' . $i], ENT_QUOTES, "UTF-8");

                ?>

                <tr>
                    <td>
                        <?php
                        if ($tekiyo == "") {
                            break;
                        }
                        echo $tekiyo;
                        ?>
                    </td>

                    <td>
                        <?php

                        echo $suryo; ?>
                    </td>

                    <td>
                        <?php
                        if (empty($tanka)) {
                            echo "";
                            continue;
                        } else {
                            echo number_format((int)$tanka);
                        } ?>
                    </td>

                    <td>
                        <?php
                        if (empty($kingaku)) {
                            echo "";
                            continue;
                        } else {

                            echo number_format((int)$kingaku);

                            $total_price = $kingaku;

                            $all_total_price += (int)$total_price;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if (empty($biko)) {
                            echo "";
                            continue;
                        } else {
                            echo $biko;
                        } ?>
                    </td>
                </tr>
            <?php endfor; ?>
            <tr>
                <td colspan="4">合計金額</td>
                <td><?php echo "¥" . number_format((int)$all_total_price) . " -"; ?></td>
            </tr>
        </table>
        <?php for ($i = 1; $i <= 7; $i++) : ?>
            <?php $hosoku = htmlspecialchars($_POST['hosoku' . $i], ENT_QUOTES, "UTF-8"); ?>
            <div class="hosoku">
                <?php
                if (empty($hosoku)) {
                    break;
                } else {
                    echo $hosoku;
                }
                ?>
            </div>
        <?php endfor; ?>
        </div>
        <br>
        <br>
        <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <input type="hidden" name="tekiyo<?php echo $i; ?>" value="<?php echo $_POST['tekiyo' . $i]; ?>">
                <input type="hidden" name="suryo<?php echo $i; ?>" value="<?php echo $_POST['suryo' . $i]; ?>">
                <input type="hidden" name="tanka<?php echo $i; ?>" value="<?php echo $_POST['tanka' . $i]; ?>">
                <input type="hidden" name="kingaku<?php echo $i; ?>" value="<?php echo $_POST['kingaku' . $i]; ?>">
                <input type="hidden" name="biko<?php echo $i; ?>" value="<?php echo $_POST['biko' . $i]; ?>">
            <?php endfor; ?>
            <?php for ($i = 1; $i <= 7; $i++) : ?>
                <input type="hidden" name="hosoku<?php echo $i; ?>" value="<?php echo $_POST['hosoku' . $i]; ?>">
            <?php endfor; ?>
            <input type="hidden" name="goukei" value="<?php echo $all_total_price; ?>">
            <div class="button">
                <input type="submit" value="OK">
                <input type="button" onclick="history.back()" value="BACK">
            </div>
    </form>
</body>
</html>