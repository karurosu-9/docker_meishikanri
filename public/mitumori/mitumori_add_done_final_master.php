<?php
try {

    $corp = htmlspecialchars($_POST['corp'], ENT_QUOTES, "UTF-8");

    $dsn = 'mysql:host=localhost;dbname=mitumori;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = 'SELECT * FROM corp_list WHERE corp=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $corp;
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
        width: 1000px;
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
        padding: 5px;
        text-align: center;
    }

    .title {
        font-size: 25px;
    }

    .group {
        display: flex;
        margin-left: 300px;
    }

    .group2 {
        display: flex;
    }

    .group3 {
        display: flex;
    }

    .group4 {
        display: flex;
    }

    .date {
        width: 140px;
        padding: 0px;
        margin-left: 250px;
        border-bottom: black solid 2px;
        text-align: center;
        padding: auto;
    }

    .num {
        border-bottom: black solid 2px;
        margin-left: 200px;
    }

    .corp {
        border-bottom: 2px solid black;
        width: 330px;
        padding: auto;
        flex-basis: auto;
        white-space: nowrap;
    }

    .place {
        border-bottom: 2px solid black;
        width: 300px;
    }

    .place-span {
        margin-left: 110px;
    }

    .goukei {
        font-size: 23px;
        border-bottom: 4px solid black;
        width: 350px;
    }

    .price {
        margin-left: 90px;
    }


    .mycorp {
        position: relative;
        margin-left: 280px;
        margin-top:12px;
    }

    .postal {
        margin-right: 50px;
    }

    .corp_name {
        font-size: 19px;

    }

    .tel {
        margin-right: 50px;
    }

    .image{
        position: absolute;
        margin-left:750px; 
    }


    .button {
        margin-left: 900px;
    }

    @media print {
        .page {
            width: 172mm;
            height: 251mm;
            margin-top: 190px;
            margin-left: 35px;
            page-break-after: always;
        }

        .page:last-child {
            page-break-after: auto;
        }

        .no_print {
            display: none;
        }

    }
</style>

<body>
    <div class="no_print">
        <?php require "../menu/menu.php"; ?>
    </div>
    <br>
    <br>
    <div class="title">御見積書</div>
    <br>
    <div class="group">
        <div class="date">
            <?php
            $Y = date('Y');
            $n = date('n');
            $d = date('d');
            echo $Y . "年" . $n . "月" . $d . "日";
            ?>
        </div>
        <div class="num">
             No. <?php echo $_SESSION['count']; ?>
        </div>
    </div>
    <br>
    <br>
    <div class="corp">
        　<?php echo $rec['corp']; ?> 　　御中
    </div>
    <br>
    下記の通り御見積申し上げます。<br>
    <br>
    <div class="group2">
        <div class="condition">
            <div class="place">
                受渡場所<span class="place-span"><?php echo $rec['place']; ?></span>
            </div>
            <div class="place">
                取引条件<span class="place-span"><?php echo $rec['conditions']; ?></span>
            </div>
            <div class="place">
                見積有効期限<span class="place-span"><?php echo $rec['deadline'] ?></span>
            </div>
            <br>
            <div class="goukei">
                税抜合計金額<span class="price"><?php echo "￥" . number_format((int)$_POST['goukei']) . " -"; ?></span>
            </div>
        </div>
        <div class="image"><image src="アスカプランニング角印.png" width="100px" height="100px"></div>
        <div class="mycorp">
            <div class="group3">
                <div class="postal">
                    <?php
                    $postal = $row['postal'];
                    preg_match("/(.{3})(.{4})/", $postal, $match);
                    $postal_new = $match[1] . "-" . $match[2];
                    echo "〒" . $postal_new;
                    ?>
                </div>
                <div class="address">
                    <?php echo $row['address']; ?>
                </div>
            </div>
            <div class="corp_name">
                <?php
                echo $row['corp'];
                ?>
            </div> 
            <div class="group4">
                <div class="tel">
                    <?php
                    $tel = $row['tel'];
                    preg_match("/(.{3})(.{3})(.{4})/", $tel, $match);
                    $tel_new = "TEL " . $match[1] . "-" . $match[2] . "-" . $match[3];
                    echo $tel_new;
                    ?>
                </div>
                <div class="fax">
                    <?php
                    $fax = $row['fax'];
                    preg_match("/(.{3})(.{3})(.{4})/", $fax, $match);
                    $fax_new = "FAX " . $match[1] . "-" . $match[2] . "-" . $match[3];
                    echo $fax_new;
                    ?>
                </div>
            </div>
        </div>
    </div>
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
        $form_mitumori = 10;
        $form_hosoku = 7;
        $all_total_price = 0;
        $total_price = 0;
        ?>
        <?php for ($i = 1; $i <= $form_mitumori; $i++) : ?>
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
    <?php for ($i = 1; $i <= $form_hosoku; $i++) : ?>
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
</body>

</html>