<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mitumori</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
if(isset($_POST)){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $title=$_POST['title'];

    unset($_SESSION['id'], $_SESSION['name'], $_SESSION['title']);
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['title'] =$title;
}
?>

<form aciton="test3.php" method="post">
    <input type="text" name="id">
    <input type ="text" name="name">
    <input type="text" name="title">
    <input type="submit" value="OK">
</form>

<a href="test3.php">リンク</a>

<?php echo $_SESSION['id'];?>
<?php echo $_SESSION['name'];?>
<?php echo $_SESSION['title'];?>
</body>

</html>