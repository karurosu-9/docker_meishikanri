<?php
session_start();
unset(
    $_SESSION['tekiyo'],$_SESSION['suryo'],$_SESSION['tanka'],
    $_SESSION['kingaku']
    )
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

    .button {
        margin-left: 620px;
    }

    #clickButton {
        margin-left: 590px;
    }
</style>

<body>
    <br>
    <div class="body">
        <br>
        <br>
        <h2>見積入力</h2><br>
        <br>
        <form action="mitumori_biko.php" method="post" name="form">
            <table cellpadding="6">
                <tr>
                    <th>摘要</th>
                    <th>単価</th>
                    <th>数量</th>
                    <th>金額</th>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo1' style="width:200px"></td>
                    <td><input type='text' name='tanka1' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo1' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku1' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo2' style="width:200px"></td>
                    <td><input type='text' name='tanka2' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo2' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku2' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo3' style="width:200px"></td>
                    <td><input type='text' name='tanka3' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo3' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku3' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo4' style="width:200px"></td>
                    <td><input type='text' name='tanka4' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo4' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku4' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo5' style="width:200px"></td>
                    <td><input type='text' name='tanka5' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo5' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku5' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo6' style="width:200px"></td>
                    <td><input type='text' name='tanka6' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo6' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku6' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo7' style="width:200px"></td>
                    <td><input type='text' name='tanka7' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo7' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku7' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo8' style="width:200px"></td>
                    <td><input type='text' name='tanka8' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo8' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku8' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo9' style="width:200px"></td>
                    <td><input type='text' name='tanka9' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo9' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku9' style='width:100px' />円</td>
                </tr>
                <tr>
                    <td><input type='text' name='tekiyo10' style="width:200px"></td>
                    <td><input type='text' name='tanka10' onChange='keisan()' style='width:100px' />円</td>
                    <td><input type='text' name='suryo10' onChange='keisan()' style='width:50px' /></td>
                    <td><input type='text' name='kingaku10' style='width:100px' />円</td>
                </tr>

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

                        if(tanka == "" || suryo == ""){

                        }else
                        if(isFinite(suryo)){
                            var price = tanka * suryo;
                            document.form.kingaku3.value = price;
                        }else{
                            document.form.kingaku3.value = tanka;
                        }

                        var tanka = document.form.tanka4.value;
                        var suryo = document.form.suryo4.value;

                        if(tanka == "" || suryo == ""){

                        }else
                        if(isFinite(suryo)){
                            var price = tanka * suryo;
                            document.form.kingaku4.value = price;
                        }else{
                            document.form.kingaku4.value = tanka;
                        }

                    var tanka = document.form.tanka5.value;
                    var suryo = document.form.suryo5.value;

                    if(tanka == "" || suryo == ""){

                    }else
                    if(isFinite(suryo)){
                        var price = tanka * suryo;
                        document.form.kingaku5.value = price;
                    }else{
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
            <div class="button">
                <input type="submit" value="OK">
            </div>
        </form>

    </div>
</body>

</html>