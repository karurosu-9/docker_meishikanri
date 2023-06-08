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

<?php require "header.php"; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>meishi_kanri</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
</head>
<style>
    .p-postal-code {
        margin-bottom: 5px;
    }
</style>

<body>
    <br>
    名刺登録<br>
    <br>
    <br>
    <form action="meishi_add_check.php" method="post">
        <table>
            <tr>
                <td>会社名</td>
                <td><input type="text" name="corp" style="width:200px"></td>
            </tr>
            <tr>
                <td>役職</td>
                <td><input type="text" name="title" style="width:200px"></td>
            </tr>
            <tr>
                <td>名前</td>
                <td><input type="text" name="name" style="width:200px"></td>
            </tr>
            <tr>
                <td>
                    郵便番号<br>
                    住所<br>
                </td>
                <td>
                    <div class="h-adr">
                        <span class="p-country-name" style="display:none;">Japan</span>
                        <input type="text" class="p-postal-code" size="7" name="postal" maxlength="7" style="width:200px"><br>
                        <input type="text" class="p-region p-locality p-street-address p-extended-address" name="address" style="width:200px" />
                    </div>
                </td>
            </tr>
            <tr>
            <tr>
                <td>電話番号</td>
                <td><input type="text" name="tel" style="width:200px"></td>
            </tr>
            <tr>
                <td>FAX</td>
                <td><input type="text" name="fax" style="width:200px"></td>
            </tr>
            <tr>
                <td>携帯番号</td>
                <td><input type="text" name="mobile" style="width:200px"></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="mail" style="width:200px"></td>
            </tr>
            <tr>
                <td>HP</td>
                <td><input type="text" name="hp" style="width:200px"></td>
            </tr>
        </table>
        <br>
        <br>
        <input type="submit" value="確定">
    </form>
    <br>
    <br>
    <br>
    <a href="meishi_list.php">名刺一覧へ戻る</a>
    <?php require "footer.php"; ?>