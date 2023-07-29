<?php
include_once('db.php');
//print_r($_GET);
$delete_query = 'DELETE FROM testmonial WHERE id = '.$_GET['testnomial_id'];

if($connection->query($delete_query) == true)
{
    $_SESSION['success_message'] = 'Record deleted successfully.';
    header('location:testmonial.php');
}
else{
    echo "Failed to delete record.";die();
}
?>