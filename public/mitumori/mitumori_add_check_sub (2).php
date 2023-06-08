<?php #var_dump($_POST); exit;?>
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
        margin-left: 360px;
    }

    span {
        color: red;
        font-weight: bold;
    }
</style>

<body>
    <?php require "../menu/menu.php"; ?>

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
                    <th>備考</th>
                </tr>
                <?php
                $item = 10;
                $text = 7;
                $all_total_price = 0;
                $total_price = 0;
                ?>
                <?php for ($i = 1; $i <= $item; $i++) : ?>
                    <?php

                    $tekiyo = htmlspecialchars($_POST["tekiyo".$i], ENT_QUOTES, "UTF-8");
                    $tanka = htmlspecialchars($_POST['tanka' . $i], ENT_QUOTES, "UTF-8");
                    $suryo = htmlspecialchars($_POST['suryo' . $i], ENT_QUOTES, "UTF-8");
                    $kingaku = htmlspecialchars($_POST['kingaku' . $i], ENT_QUOTES, "UTF-8");
                    $biko = htmlspecialchars($_POST['biko'.$i], ENT_QUOTES, "UTF-8");

                    ?>

                    <tr>
                        <td>
                            <?php 
                            if($tekiyo == ""){
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
                            if(empty($tanka)){
                                echo "";
                                continue;
                            }else{
                            echo number_format((int)$tanka);
                            } ?>
                        </td>

                        <td>
                            <?php
                            if(empty($kingaku)){
                                echo "";
                                continue;
                            }else{
                            
                            echo number_format((int)$kingaku);

                            $total_price = $kingaku;

                            $all_total_price += (int)$total_price;

                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            if(empty($biko)){
                                echo "";
                                continue;
                            }else{
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
            <?php for($i=1;$i<=$text;$i++):?>
                <?php $hosoku = htmlspecialchars($_POST['hosoku'.$i],ENT_QUOTES,"UTF-8"); ?>
                <div class="hosoku">
                    <?php
                    if(empty($hosoku)){
                        break;
                    }else{
                    echo $hosoku;
                    }
                    ?>
                </div>
            <?php endfor;?>
            </div>
            <br>
            <br>
            <div class="button">
                <input type="submit" value="OK">
                <input type="button" onclick="history.back()" value="BACK">
            </div>
        </form>
    </div>
</body>

</html>