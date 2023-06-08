<?php
session_start();
session_regenerate_id(true);

echo '<a href="../staff_login/staff_top.php">トップページ　</a>';
echo '<a href="../staff_login/staff_logout.php">ログアウト　</a>';
echo '<hr>';


if (isset($_SESSION['login']) == false) {
    echo "ログインされていません。<br>";
    echo "<br>";
    echo '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit;
} else {
    echo "『 ";
    echo $_SESSION['staff_name'];
    echo " 』";
    echo "さんログイン中<br>";
    echo "<br>";
}
?>

<?php require "../meishi/header.php"; ?>
<br>
スタッフ登録<br>
<br>
<br>
<form action="staff_add_check.php" method="post">
    <table>
        <tr>
            <td>名前</td>
            <td><input type="text" name="name" style="width:150px"></td>
        </tr>
        <tr>
            <td>パスワード</td>
            <td><input type="password" name="pass" style="width:150px"></td>
        </tr>
        <tr>
            <td>確認用パスワード</td>
            <td><input type="password" name="pass2" style="width:150px"></td>
        </tr>
    </table>
    <br>
    <br>
    <input type="submit" value="OK">
</form>
<br>
<br>
<a href="staff_list.php">スタッフ一覧へ</a>
<?php require "../meishi/footer.php"; ?>