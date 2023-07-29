<?php
include_once('db.php');
//print_r($_GET);
$delete_query = 'DELETE FROM services WHERE id = '.$_GET['service_id'];

if($connection->query($delete_query) == true)
{
    $_SESSION['success_message'] = 'Record deleted successfully.';
    header('location:service_list.php');
}
else{
    echo "Failed to delete record.";die();
}
?>