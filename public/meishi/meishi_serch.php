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

<?php

$keyword = htmlspecialchars($_POST['keyword'], ENT_QUOTES, "UTF-8");

$dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM meishi_kanri WHERE corp like ?';
$stmt = $dbh->prepare($sql);
$data[] = '%' . $keyword . '%';
$stmt->execute($data);

$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($keyword)) {
  echo "検索結果：<br>";
  echo "会社名を入力してください。<br>";
  echo "<br>";
  echo "<br>";
  echo '<a href="meishi_list.php">戻る</a>';
  exit;
}


if (empty($rec)) {
  echo "一致する会社がありませんでした。<br>";
  echo "<br>";
  echo '<a href="meishi_list.php">戻る</a><br>';
  echo "<br>";
  exit;
}

?>

<!DOCTYPE htm>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>meishi_kanri</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="style.css">
</head>
<style>
  table {
    white-space: nowrap;
  }

  .table1 {
    border-top: black solid 4px;
    border-left: black solid 4px;
    border-right: black solid 4px;
    background-color: #c0c0c0;
  }

  .table2 {
    border-top: black dashed 4px;
    border-right: black solid 4px;
    border-left: black solid 4px;
    border-bottom: black solid 4px;
  }
</style>

<body>
  <br>
  <br>
  検索結果　一覧<br>
  <br>
  <br>
  <br>
  <table border="3" cellpadding="10" style="border-collapse: collapse;" cellpadding="5">
    <tr class="table1">
      <th>会社名</th>
      <th>名前</th>
      <th>住所</th>
      <th>電話番号</th>
      <th>FAX</th>
      <th>携帯番号</th>
    </tr>
    <?php while (true) {; ?>
      <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC); ?>
      <?php if ($rec == false) {; ?>
        <?php break; ?>
      <?php }; ?>
      <tr class="table2">
        <td><?php echo $rec['corp']; ?></td>
        <td><?php echo $rec['name']; ?></td>
        <td><?php echo $rec['address']; ?></td>
        <td><?php echo $rec['tel']; ?></td>
        <td><?php echo $rec['fax']; ?></td>
        <td><?php echo $rec['mobile']; ?></td>
      </tr>
    <?php }; ?>
  </table>
  <br>
  <br>
  <a href="meishi_list.php">名刺一覧へ</a><br>
  <br>
  <?php require "footer.php"; ?>