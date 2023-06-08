<?php

if(isset($_POST['edit'])){
    $disp_id = $_POST['id'];
    header('Location:mitumori_edit_master.php?id='.$disp_id);
    exit;
}

if(isset($_POST['delete'])){
    $disp_id=$_POST['id'];
    header('Location:mitumori_delete_master.php?id='.$disp_id);
    exit;
}
?>