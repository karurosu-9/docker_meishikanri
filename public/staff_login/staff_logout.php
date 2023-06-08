<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()]) == true) {
    setcookie(session_name(), "", time() - 4200, '/');
}
session_destroy();
?>

<?php require "../meishi/header.php"; ?>
ログアウトしました。<br>
<br>
<a href="staff_login.php">ログイン画面へ</a><br>
<?php require "../meishi/footer.php"; ?>