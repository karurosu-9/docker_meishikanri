<?php
session_start();
if (isset($_POST['submit'])) {
    $tekiyo = htmlspecialchars($_POST['tekiyo' . $i], ENT_QUOTES, "UTF-8");
    $tanka = htmlspecialchars($_POST['tanka' . $i], ENT_QUOTES, "UTF-8");
    $suryo = htmlspecialchars($_POST['suryo' . $i], ENT_QUOTES, "UTF-8");
    $kingaku = htmlspecialchars($_POST['kingaku' . $i], ENT_QUOTES, "UTF-8");

    $_SESSION['tekiyo'.$i] = $tekiyo;
    $_SESSION['tanka'.$i] = $tanka;
    $_SESSION['suryo'.$i] = $suryo;
    $_SESSION['kingaku'.$i] = $kingaku;
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

    .btn {
        margin-left: 290px;
    }
</style>

<body>
    <br>
    <div class="body">
        <?php require "../menu/menu.php";?>
        <br>
        <br>
        備考入力<br>
        <br>
        <?php $text = 10; ?>
        <form action="" name="form">
        <table cellpadding="6">
            <tr>
                <th>備考</th>
            </tr>

            <?php for ($i = 0; $i < $text; $i++) : ?>
                <tr>
                    <td><input type="text" name="bikou[<?php echo $i;?>]" oninput="characterCheck()" pattern="[^\x01-\x7E]{15}" style="width:300px"></td>
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
    function characterCheck(name){    
      const name_text = "bikou";

      var name_num = replace(name_text, "");

      var text_val = document.form[name_text+name_num].value;

      if(text_val.match(/^[^\x01-\x7E\uFF61-\uFF9F]+${15}/)){

      }else{
        text_val.match(/^[\x20-\x7e]*${30}/);
      }
      
    }
</script>
</html>