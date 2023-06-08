<?php

if(isset($_POST['id'])){
    $mitumori_id = $_POST['id'];
    header('Location:mitumori_edit_update_print_master.php?id='.$mitumori_id);
    exit;
}

?>