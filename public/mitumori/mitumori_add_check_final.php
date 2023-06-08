<?php 
#var_dump($_POST);
#exit;
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
                     $all_total_price = 0;
                     $total_price = 0;

                    $tekiyo1 = htmlspecialchars($_POST['tekiyo1'], ENT_QUOTES, "UTF-8");
                    $tanka1 = htmlspecialchars($_POST['tanka1'], ENT_QUOTES, "UTF-8");
                    $suryo1 = htmlspecialchars($_POST['suryo1'], ENT_QUOTES, "UTF-8");
                    $kingaku1 = htmlspecialchars($_POST['kingaku1'], ENT_QUOTES, "UTF-8");
                    $biko1 = htmlspecialchars($_POST['biko1'], ENT_QUOTES, "UTF-8");
                    $tekiyo2 = htmlspecialchars($_POST['tekiyo2'], ENT_QUOTES, "UTF-8");
                    $tanka2 = htmlspecialchars($_POST['tanka2'], ENT_QUOTES, "UTF-8");
                    $suryo2 = htmlspecialchars($_POST['suryo2'], ENT_QUOTES, "UTF-8");
                    $kingaku2 = htmlspecialchars($_POST['kingaku2'], ENT_QUOTES, "UTF-8");
                    $biko2 = htmlspecialchars($_POST['biko2'], ENT_QUOTES, "UTF-8");
                    $tekiyo3 = htmlspecialchars($_POST['tekiyo3'], ENT_QUOTES, "UTF-8");
                    $tanka3 = htmlspecialchars($_POST['tanka3'], ENT_QUOTES, "UTF-8");
                    $suryo3 = htmlspecialchars($_POST['suryo3'], ENT_QUOTES, "UTF-8");
                    $kingaku3 = htmlspecialchars($_POST['kingaku3'], ENT_QUOTES, "UTF-8");
                    $biko3 = htmlspecialchars($_POST['biko3'], ENT_QUOTES, "UTF-8");
                    $tekiyo4 = htmlspecialchars($_POST['tekiyo4'], ENT_QUOTES, "UTF-8");
                    $tanka4 = htmlspecialchars($_POST['tanka4'], ENT_QUOTES, "UTF-8");
                    $suryo4 = htmlspecialchars($_POST['suryo4'], ENT_QUOTES, "UTF-8");
                    $kingaku4 = htmlspecialchars($_POST['kingaku4'], ENT_QUOTES, "UTF-8");
                    $biko4 = htmlspecialchars($_POST['biko4'], ENT_QUOTES, "UTF-8");
                    $tekiyo5 = htmlspecialchars($_POST['tekiyo5'], ENT_QUOTES, "UTF-8");
                    $tanka5 = htmlspecialchars($_POST['tanka5'], ENT_QUOTES, "UTF-8");
                    $suryo5 = htmlspecialchars($_POST['suryo5'], ENT_QUOTES, "UTF-8");
                    $kingaku5 = htmlspecialchars($_POST['kingaku5'], ENT_QUOTES, "UTF-8");
                    $biko5 = htmlspecialchars($_POST['biko5'], ENT_QUOTES, "UTF-8");
                    $tekiyo6 = htmlspecialchars($_POST['tekiyo6'], ENT_QUOTES, "UTF-8");
                    $tanka6 = htmlspecialchars($_POST['tanka6'], ENT_QUOTES, "UTF-8");
                    $suryo6 = htmlspecialchars($_POST['suryo6'], ENT_QUOTES, "UTF-8");
                    $kingaku6 = htmlspecialchars($_POST['kingaku6'], ENT_QUOTES, "UTF-8");
                    $biko6 = htmlspecialchars($_POST['biko6'], ENT_QUOTES, "UTF-8");
                    $tekiyo7 = htmlspecialchars($_POST['tekiyo7'], ENT_QUOTES, "UTF-8");
                    $tanka7 = htmlspecialchars($_POST['tanka7'], ENT_QUOTES, "UTF-8");
                    $suryo7 = htmlspecialchars($_POST['suryo7'], ENT_QUOTES, "UTF-8");
                    $kingaku7 = htmlspecialchars($_POST['kingaku7'], ENT_QUOTES, "UTF-8");
                    $biko7 = htmlspecialchars($_POST['biko7'], ENT_QUOTES, "UTF-8");
                    $tekiyo8 = htmlspecialchars($_POST['tekiyo8'], ENT_QUOTES, "UTF-8");
                    $tanka8 = htmlspecialchars($_POST['tanka8'], ENT_QUOTES, "UTF-8");
                    $suryo8 = htmlspecialchars($_POST['suryo8'], ENT_QUOTES, "UTF-8");
                    $kingaku8 = htmlspecialchars($_POST['kingaku8'], ENT_QUOTES, "UTF-8");
                    $biko8 = htmlspecialchars($_POST['biko8'], ENT_QUOTES, "UTF-8");
                    $tekiyo9 = htmlspecialchars($_POST['tekiyo9'], ENT_QUOTES, "UTF-8");
                    $tanka9 = htmlspecialchars($_POST['tanka9'], ENT_QUOTES, "UTF-8");
                    $suryo9 = htmlspecialchars($_POST['suryo9'], ENT_QUOTES, "UTF-8");
                    $kingaku9 = htmlspecialchars($_POST['kingaku9'], ENT_QUOTES, "UTF-8");
                    $biko9 = htmlspecialchars($_POST['biko9'], ENT_QUOTES, "UTF-8");
                    $tekiyo10 = htmlspecialchars($_POST['tekiyo10'], ENT_QUOTES, "UTF-8");
                    $tanka10 = htmlspecialchars($_POST['tanka10'], ENT_QUOTES, "UTF-8");
                    $suryo10 = htmlspecialchars($_POST['suryo10'], ENT_QUOTES, "UTF-8");
                    $kingaku10 = htmlspecialchars($_POST['kingaku10'], ENT_QUOTES, "UTF-8");
                    $biko10 = htmlspecialchars($_POST['biko10'], ENT_QUOTES, "UTF-8");
                    ?>
                    <tr>
                        <td><?php echo $tekiyo1 ;?></td>
                        <td><?php echo $tanka1 ;?></td>
                        <td><?php echo $suryo1 ;?></td>
                        <td><?php 
                        
                        echo $kingaku1 ;
                        $total_price = $kingaku1;
                        $all_total_price += $total_price;

                        ?></td>
                        <td><?php echo $biko1 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo2 ;?></td>
                        <td><?php echo $tanka2 ;?></td>
                        <td><?php echo $suryo2 ;?></td>
                        <td><?php 
                        
                        echo $kingaku2 ;
                        $total_price = $kingaku2;
                        $all_total_price += $total_price;

                        ?></td>
                        <td><?php echo $biko2 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo3 ;?></td>
                        <td><?php echo $tanka3 ;?></td>
                        <td><?php echo $suryo3 ;?></td>
                        <td><?php 
                        
                        echo $kingaku3 ;
                        $total_price = $kingaku3;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko3 ;?></td>
                    </tr>
                    <tr>
                       <td><?php echo $tekiyo4 ;?></td>
                        <td><?php echo $tanka4 ;?></td>
                        <td><?php echo $suryo4 ;?></td>
                        <td><?php 
                        
                        echo $kingaku4 ;
                        $total_price = $kingaku4;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko4 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo5 ;?></td>
                        <td><?php echo $tanka5 ;?></td>
                        <td><?php echo $suryo5 ;?></td>
                        <td><?php 
                        
                        echo $kingaku5 ;
                        $total_price = $kingaku5;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko5 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo6 ;?></td>
                        <td><?php echo $tanka6 ;?></td>
                        <td><?php echo $suryo6 ;?></td>
                        <td><?php 
                        
                        echo $kingaku6 ;
                        $total_price = $kingaku6 ;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko6 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo7 ;?></td>
                        <td><?php echo $tanka7 ;?></td>
                        <td><?php echo $suryo7 ;?></td>
                        <td><?php 
                        
                        echo $kingaku7 ;
                        $total_price = $kingaku7;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko7 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo8 ;?></td>
                        <td><?php echo $tanka8 ;?></td>
                        <td><?php echo $suryo8 ;?></td>
                        <td><?php 
                        
                        echo $kingaku8 ;
                        $total_price = $kingaku8;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko8 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo9 ;?></td>
                        <td><?php echo $tanka9 ;?></td>
                        <td><?php echo $suryo9 ;?></td>
                        <td><?php 
                        
                        echo $kingaku9 ;
                        $total_price = $kingaku9;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko9 ;?></td>
                    </tr>
                    <tr>
                        <td><?php echo $tekiyo10 ;?></td>
                        <td><?php echo $tanka10 ;?></td>
                        <td><?php echo $suryo10 ;?></td>
                        <td><?php 
                        
                        echo $kingaku10 ;
                        $total_price = $kingaku10;
                        (int)$all_total_price += (int)$total_price;

                        ?></td>
                        <td><?php echo $biko10 ;?></td>
                    </tr>
                   
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