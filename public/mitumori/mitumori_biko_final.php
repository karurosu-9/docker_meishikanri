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
        <a href="mitumori_add_check.php">戻る</a>
        <br>
        <br>
        備考入力<br>
        <br>
        <?php $text = 10; ?>
        <form action="mitumori_add_check.php" name="form" method="post">
            <table cellpadding="6">
                <tr>
                    <th>備考</th>
                </tr>
                <tr> 
                    <td><input type="text" name="biko1" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko2" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko3" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko4" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko5" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko6" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko7" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko8" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko9" style="width:300px"></td>
                </tr>
                <tr>
                    <td><input type="text" name="biko10" style="width:300px"></td>
                </tr>
            </table>
            <br>
            <br>
            <div class="btn">
            
                    <td><input type='hidden' name='tekiyo1' value="<?php echo $_POST['tekiyo1']?>"></td>
                    <td><input type='hidden' name='tanka1' value="<?php echo $_POST['tanka1']?>" ></td>
                    <td><input type='hidden' name='suryo1' value="<?php echo $_POST['suryo1']?>" /></td>
                    <td><input type='hidden' name='kingaku1' value="<?php echo $_POST['kingaku1']?>"></td>
                    <td><input type='hidden' name='tekiyo2' value="<?php echo $_POST['tekiyo2']?>"td>
                    <td><input type='hidden' name='tanka2' value="<?php echo $_POST['tanka2']?>"></td>
                    <td><input type='hidden' name='suryo2' value="<?php echo $_POST['suryo2']?>"></td>
                    <td><input type='hidden' name='kingaku2' value="<?php echo $_POST['kingaku2']?>"></td>
                    <td><input type='hidden' name='tekiyo3' value="<?php echo $_POST['tekiyo3']?>"></td>
                    <td><input type='hidden' name='tanka3' value="<?php echo $_POST['tanka3']?>"></td>
                    <td><input type='hidden' name='suryo3' value="<?php echo $_POST['suryo3']?>"></td>
                    <td><input type='hidden' name='kingaku3' value="<?php echo $_POST['kingaku3']?>"></td>
                    <td><input type='hidden' name='tekiyo4' value="<?php echo $_POST['tekiyo4']?>"></td>
                    <td><input type='hidden' name='tanka4' value="<?php echo $_POST['tanka4']?>"></td>
                    <td><input type='hidden' name='suryo4' value="<?php echo $_POST['suryo4']?>"></td>
                    <td><input type='hidden' name='kingaku4' value="<?php echo $_POST['kingaku4']?>"></td>
                    <td><input type='hidden' name='tekiyo5' value="<?php echo $_POST['tekiyo5']?>"></td>
                    <td><input type='hidden' name='tanka5' value="<?php echo $_POST['tanka5']?>"></td>
                    <td><input type='hidden' name='suryo5' value="<?php echo $_POST['suryo5']?>"></td>
                    <td><input type='hidden' name='kingaku5' value="<?php echo $_POST['kingaku5']?>"></td>
                    <td><input type='hidden' name='tekiyo6' value="<?php echo $_POST['tekiyo6']?>"></td>
                    <td><input type='hidden' name='tanka6' value="<?php echo $_POST['tanka6']?>"></td>
                    <td><input type='hidden' name='suryo6' value="<?php echo $_POST['suryo6']?>"></td>
                    <td><input type='hidden' name='kingaku6' value="<?php echo $_POST['kingaku6']?>"></td>
                    <td><input type='hidden' name='tekiyo7' value="<?php echo $_POST['tekiyo7']?>"></td>
                    <td><input type='hidden' name='tanka7' value="<?php echo $_POST['tanka7']?>"></td>
                    <td><input type='hidden' name='suryo7' value="<?php echo $_POST['suryo7']?>"></td>
                    <td><input type='hidden' name='kingaku7' value="<?php echo $_POST['kingaku7']?>"></td>
                    <td><input type='hidden' name='tekiyo8' value="<?php echo $_POST['tekiyo8']?>"></td>
                    <td><input type='hidden' name='tanka8' value="<?php echo $_POST['tanka8']?>"></td>
                    <td><input type='hidden' name='suryo8' value="<?php echo $_POST['suryo8']?>"></td>
                    <td><input type='hidden' name='kingaku8' value="<?php echo $_POST['kingaku8']?>"></td>
                    <td><input type='hidden' name='tekiyo9' value="<?php echo $_POST['tekiyo9']?>"></td>
                    <td><input type='hidden' name='tanka9' value="<?php echo $_POST['tanka9']?>"></td>
                    <td><input type='hidden' name='suryo9' value="<?php echo $_POST['suryo9']?>"></td>
                    <td><input type='hidden' name='kingaku9' value="<?php echo $_POST['kingaku9']?>"></td>
                    <td><input type='hidden' name='tekiyo10' value="<?php echo $_POST['tekiyo10']?>"></td>
                    <td><input type='hidden' name='tanka10' value="<?php echo $_POST['tanka10']?>"></td>
                    <td><input type='hidden' name='suryo10' value="<?php echo $_POST['suryo10'];?>"></td>
                    <td><input type='hidden' name='kingaku10' value="<?php echo $_POST['kingaku10'];?>" /></td>
                </tr>
                <input type="button" value="戻る">
                <input type="submit" value="OK">
            </div>
        </form>
        <br>
        <br>
    </div>
</body>
</html>