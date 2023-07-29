<?php
include_once('db.php');
//print_r($_GET);
$delete_query = 'DELETE FROM patients WHERE id = '.$_GET['patient_id'];

if($connection->query($delete_query) == true)
{
    $_SESSION['success_message'] = 'Record deleted successfully.';
    header('location:patient_list.php');
}
else{
    echo "Failed to delete record.";die();
}
?>