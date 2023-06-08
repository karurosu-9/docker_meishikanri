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
        <?php require "../menu/menu.php"; ?>
        <br>
        <br>
        備考入力<br>
        <br>
        <?php $text = 10; ?>
        <form action="mitumori_add_check.php" name="form" method="post" onsubmit="return lengthCheck();">
            <table cellpadding="6">
                <tr>
                    <th>備考</th>
                </tr>
                <?php for ($i = 1; $i <= $text; $i++) : ?>
                    <tr>
                        <td><input type="text" name="biko<?php echo $i; ?>" style="width:300px">
                        <input type="hidden" name="tekiyo<?php echo $i;?>" value="<?php echo $_POST["tekiyo".$i]; ?>">
                        <input type="hidden" name="suryo<?php echo $i;?>" value="<?php echo $_POST["suryo" . $i]; ?>">
                        <input type="hidden" name="tanka<?php echo $i;?>" value="<?php echo $_POST["tanka" . $i]; ?>">
                        <input type="hidden" name="kingaku<?php echo $i;?>" value="<?php echo $_POST["kingaku" . $i]; ?>"></td>
                    </tr>
                <?php endfor; ?>
            </table>
            <br>
            <br>
            <div class="btn">
                <input type="submit" value="OK">
            </div>
        </form>
        <br>
        <br>
    </div>
</body>
<script>
    function lengthCheck(name){
        var text = 10;
        for(let i=1; i<= text; i++){
        var biko = document.form["biko[i]"].value;

       
          var msg = alert(biko);
          return msg;
        }
    }
</script>
</html>