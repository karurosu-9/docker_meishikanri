<?php
#session_start();
#var_dump($_POST);
#exit;
session_start();
 
if (!isset($_SESSION['count'])) {
    // キー'count'が登録されていなければ、1を設定
    $_SESSION['count'] = 1;
} else {
    //  キー'count'が登録されていれば、その値をインクリメント
    $_SESSION['count']++;
}
 
echo $_SESSION['count']."回目の訪問です。";
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
    }

    .button {
        margin-left: 220px;
    }

    span {
        color: red;
        font-weight: bold;
    }
</style>

<body>
    <?php $item = 6; ?>
    <?php require "../menu/menu.php"; ?>
    <a href="mitumori_biko.php">備考入力</a>
    <br>
    <br>
    見積確認
    <br>
    <br>
    <div class="body">
        <form action="mitumori_add_done.php">
            <table cellpadding="6">
                <tr>
                    <th>摘要</th>
                    <th>数量</th>
                    <th>単価</th>
                    <th>金額</th>
                </tr>

                <?php
                $all_total_price = 0;
                $total_price = 0;
                ?>
                <?php for ($i = 1; $i < $item; $i++) : ?>
                    <?php
                    
                    $tekiyo = htmlspecialchars($_POST['tekiyo' . $i], ENT_QUOTES, "UTF-8");
                    $tanka = htmlspecialchars($_POST['tanka' . $i], ENT_QUOTES, "UTF-8");
                    $suryo = htmlspecialchars($_POST['suryo' . $i], ENT_QUOTES, "UTF-8");
                    $kingaku = htmlspecialchars($_POST['kingaku' . $i], ENT_QUOTES, "UTF-8");

                    if(!isset($_SESSION['input_data'])){
                    $_SESSION['input_data'] = [
                    $_SESSION['tekiyo'][] = $tekiyo,
                    $_SESSION['tanka'][] = $tanka,
                    $_SESSION['suryo'][]= $suryo,
                    $_SESSION['kingaku'][] = $kingaku,
                    ];
                    var_dump($_SESSION['input_data']);
                    exit;
                    
                    }
                    ?>

                    <tr>
                        <td><?php echo $tekiyo; ?></td>

                        <td><?php echo $suryo; ?></td>

                        <td>
                            <?php
                            if (empty($tanka)) {
                                echo "";
                                continue;
                            }
                            echo number_format((int)$tanka);
                            ?>
                        </td>

                        <td>
                            <?php
                            if ($kingaku == "") {
                                echo "";
                                continue;
                            }
                            echo number_format((int)$kingaku);
                            
                            $total_price = $kingaku;

                            $all_total_price += (int)$total_price;
                            ?>
                        </td>
                    </tr>
                <?php endfor ?>
                <tr>
                    <td colspan="3">合計金額</td>
                    <td><?php echo "¥" . number_format((int)$all_total_price) . " -"; ?></td>
                </tr>
            </table>
            <br>
            <br>
            <div class="button">
                <input type="submit" value="OK">
            </div>
        </form>
    </div>
</body>

</html>


<?php
                            $biko_u = strlen($biko);
                            $limit = 45;
                            if($biko == ""){
                                echo "";
                                break;
                            }else
                            if($biko_u > $limit){
                                echo "規定文字数を超えています。";
                            }else{
                            echo $biko;
                            }
                            ?>


