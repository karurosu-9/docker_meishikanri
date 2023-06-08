<?php require "../meishi/header.php"; ?>
<br>
スタッフログイン<br>
<br>
<br>
<form action="staff_login_check.php" method="post">
    <table>
        <tr>
            <td>スタッフの名前</td>
            <td><input type="text" name="name" style="width:150px"></td>
        </tr>
        <tr>
            <td>パスワード</td>
            <td><input type="password" name="pass" style="width:150px"></td>
        </tr>
    </table>
    <br>
    <br>
    <input type="submit" value="ログイン">
</form>
<br>
<br>
<?php require "../meishi/footer.php"; ?>