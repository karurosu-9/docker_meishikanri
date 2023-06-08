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
<?php
try {
    $corp = htmlspecialchars($_POST['corp'], ENT_QUOTES, "UTF-8");
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, "UTF-8");
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
    $postal = htmlspecialchars($_POST['postal'], ENT_QUOTES, "UTF-8");
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, "UTF-8");
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
    $fax = htmlspecialchars($_POST['fax'], ENT_QUOTES, "UTF-8");
    $mobile = htmlspecialchars($_POST['mobile'], ENT_QUOTES, "UTF-8");
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, "UTF-8");
    $hp = htmlspecialchars($_POST['hp'], ENT_QUOTES, "UTF-8");

    $postal_mb = mb_convert_kana($postal);
    $tel_mb = mb_convert_kana($tel);
    $fax_mb = mb_convert_kana($fax);
    $mobile_mb = mb_convert_kana($mobile);
    $mail_mb = mb_convert_kana($mail);
    $hp_mb = mb_convert_kana($hp);

    $dsn = 'mysql:host=db;dbname=meishi_kanri;charset=utf8';
    $user = "root";
    $password = "root";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO meishi_kanri (corp,title,name,postal,address,tel,fax,mobile,mail,hp)
        VALUES(?,?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $corp;
    $data[] = $title;
    $data[] = $name;
    $data[] = $postal_mb;
    $data[] = $address;
    $data[] = $tel_mb;
    $data[] = $fax_mb;
    $data[] = $mobile_mb;
    $data[] = $mail_mb;
    $data[] = $hp_mb;
    $stmt->execute($data);

    $db = null;

    echo "名刺を登録しました。<br>";
    echo "<br>";
    echo "<br>";
    echo '<a href="meishi_list.php">名刺リスト一覧へ</a>';
} catch (Exception $e) {
    $e->getMessage();
    var_dump($e);
    exit;
    echo "ただいま障害によりご迷惑をおかけしております。";
}
?>
<?php require "footer.php"; ?>