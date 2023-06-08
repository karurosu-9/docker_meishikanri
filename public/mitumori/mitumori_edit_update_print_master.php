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
    var_dump($e);
    exit;
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
        width: 1050px;
        font-family: "ＭＳ Ｐ明朝";
    }

    .print-button {
        margin-left: 1000px;
    }

    table {
        border-collapse: collapse;
        border: black solid 2px;
        margin-top: 5px;
        padding: 0px;
    }

    th {
        border: black solid 2px;
        background-color: #c0c0c0;
        text-align: center;
        font-size: 15px;
        padding: 0px;
    }

    td {
        border: black solid 1px;
        border-right: black solid 2px;
        padding: 0px;
        text-align: center;
        font-size: 15px;
        white-space: nowrap;
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
        margin-top: 10px;
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
        border-bottom: black solid 1px;
        text-align: center;
        padding: auto;
        font-size: 16px;
    }

    .num {
        border-bottom: black solid 1px;
        margin-left: 200px;
        font-size: 16px;
    }

    .corp {
        border-bottom: 1px solid black;
        width: 330px;
        padding: auto;
        flex-basis: auto;
        white-space: nowrap;
        font-size: 19px;
        margin-top: -15px;
    }

    .language {
        margin-top: 20px;
    }

    .place {
        border-bottom: 1px solid black;
        width: 300px;
        font-size: 15px;
        margin-bottom: 5px;
    }

    .place-span {
        margin-left: 110px;
    }

    .goukei {
        font-size: 20px;
        font-weight: bold;
        border-bottom: 2px solid black;
        width: 300px;
        margin-top: 25px;
        padding: 0px;
    }

    .price {
        margin-left: 50px;
        font-size: 20px;
    }


    .mycorp {
        position: relative;
        margin-left: 400px;
        margin-top: 13px;
        font-size: 15px;
    }

    .postal {
        margin-right: 10px;
    }

    .corp_name {
        font-size: 17px;
        letter-spacing: 3px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    .tel {
        margin-right: 20px;
    }

    .image {
        position: absolute;
        margin-left: 800px;
    }

    .total_price {
        border-top: solid 2px black;
        border-right: solid 2px black;
    }

    .none {
        border-top: solid 2px black;
    }

    .all_total_price {
        border-top: solid 2px black;
        border-right: solid 2px black;
    }

    .hosoku {
        font-size: 18px;
    }

    .tekiyo {
        letter-spacing: 120px;
        text-indent: 120px;
    }

    .suryo {
        letter-spacing: 10px;
        text-indent: 10px;
    }

    .tanka {
        letter-spacing: 10px;
        text-indent: 10px;
    }

    .kingaku {
        letter-spacing: 20px;
        text-indent: 20px;
    }

    .biko {
        letter-spacing: 50px;
        text-indent: 50px;
    }

    .total_price {
        letter-spacing: 100px;
        text-indent: 100px;
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
        <?php
        echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
        echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
        echo '<hr>';
        ?>
        <div class="print-button">
            <input type="button" name="print2" onclick="window.print();" value="印刷"><br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="title">御見積書</div>
    <br>
    <div class="group">
        <div class="date">
            <?php

            echo $rec['date'];
            ?>
        </div>
        <div class="num">
            No. <?php echo $rec['num']; ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="corp">
        　<?php echo $rec['corp']; ?> 　　御中
    </div>
    <div class="language">
        下記の通り御見積申し上げます。<br>
    </div>
    <br>
    <div class="group2">
        <div class="condition">
            <div class="place">
                受渡場所<span class="place-span"><?php echo $row['place']; ?></span>
            </div>
            <div class="place">
                取引条件<span class="place-span"><?php echo $row['conditions']; ?></span>
            </div>
            <div class="place">
                見積有効期限<span class="place-span"><?php echo $row['deadline'] ?></span>
            </div>
            <div class="goukei">
                税抜合計金額<span class="price"><?php echo "￥" . number_format((int)$rec['total_price']) . " -"; ?></span>
            </div>
        </div>
        <div class="image">
            <image src="アスカプランニング角印.png" width="75px" height="75px">
        </div>
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
    <script>
        function delete_check() {
            if (key_value == "delete") {
                let msg = confirm('この情報を削除してもよろしいですか?');
                return msg;
            }
        }
    </script>
    <form action="mitumori_branch.php" method="post" onsubmit="return delete_check();">
        <table>
            <tr>
                <th width="620px" class="tekiyo">摘要</th>
                <th width="80px" class="suryo">数量</th>
                <th width="80px" class="tanka">単価</th>
                <th width="120px" class="kingaku">金額</th>
                <th width="180px" class="biko">備考</th>
            </tr>
            <?php

            $all_total_price = 0;
            $total_price = 0;
            ?>
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <?php

                $tekiyo = $rec["tekiyo" . $i];
                $tanka = $rec['tanka' . $i];
                $suryo = $rec['suryo' . $i];
                $kingaku = $rec['kingaku' . $i];
                $biko = $rec['biko' . $i];

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

                    <td padding="0px">
                        <?php
                        if (empty($kingaku)) {
                            echo "";
                            continue;
                        } else {

                            echo number_format((int)$kingaku) . " -";

                            $total_price = $kingaku;

                            $all_total_price += (int)$total_price;
                        }
                        ?>
                    </td>
                    <td style="border:none;">
                        <?php
                        if (empty($biko)) {
                            echo "";
                            break;
                        } else {
                            echo $biko;
                        } ?>
                    </td>
                </tr>
            <?php endfor; ?>
            <div>
                <tr>
                    <td colspan="1" class="total_price">合計</td>
                    <td class="none"></td>
                    <td class="none"></td>
                    <td class="all_total_price"><?php echo "¥" . number_format((int)$all_total_price) . " -"; ?></td>
                </tr>
            </div>
        </table>
        <?php for ($i = 1; $i <= 7; $i++) : ?>
            <?php $hosoku = $rec['hosoku' . $i]; ?>
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
        <div class="no_print">
            <br>
            <br>
            <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">
            <div class="button">
                <input type="submit" name="edit" value="編集" onclick="key_value='edit'">
                <input type="submit" name="delete" value="削除" onclick="key_value='delete'">
                <input type="hidden" name="key" value="">
            </div>
    </form>
    <br>
    </div>
</body>

</html>