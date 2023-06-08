<?php

if (isset($_POST['delete'])) {
    $staff_id = $_POST['staffid'];
    header('Location:staff_delete.php?staffid=' . $staff_id);
    exit;
}
?>