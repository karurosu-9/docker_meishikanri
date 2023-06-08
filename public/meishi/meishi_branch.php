<?php

if (isset($_POST['delete'])) {
    $corp_id = $_POST['corpid'];
    header('Location:meishi_delete.php?corpid=' . $corp_id);
    exit;
}
?>