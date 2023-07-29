<?php
include_once('db.php');

$select_query = "SELECT * FROM testmonial";

$testmonial_data = $connection->query($select_query);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Teatmonial List</title>
  </head>
  <body>
    <div class="main-block">
        <?php include_once('common/admin_header_bar.php');?>
        <div style="height:100%;background-color:green;">
            <?php include_once('common/admin_left_nav_bar.php');?>
            <div style="width:85%;height:100%;float:left;padding-top:50px;">
            <center>
                <?php if(strlen($_SESSION['success_message']) > 0) { ?>
                    <b><?=$_SESSION['success_message']?></b></br></br>
                <?php $_SESSION['success_message'] = ''; } ?>
                
                <a style="margin-top: 25px;" href="add_testmonial.php">Add Testnomial</a>
                <table border="1" style="margin:25px;left:50px;" cellspacing="15px" cellpadding="15px">
                <?php if($testmonial_data->num_rows > 0) { ?>

                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                <?php } ?>
                    <?php 
                    if($testmonial_data->num_rows > 0)
                    {
                        while($row = $testmonial_data->fetch_assoc())
                        {
                            //print_r($row);
                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['title']?></td>
                        <td><img height="50px" src="images/<?=$row['image']?>"/></td>
                        <td><?=$row['description']?></td>
                        <td>
                            
                            <a href="update_testnomial.php?testnomial_id=<?php echo $row['id']?>">Update</a>
                            <a href="delete_testnomial.php?testnomial_id=<?php echo $row['id']?>">Delete</a>
                        </td>
                    </tr>
                    <?php } } else { ?>
                        <center style="padding:25px;">No records found.</center>
                <?php  } ?>
                </table>
                </center>
            </div>
        </div>
        <?php include_once('common/admin_footer_bar.php');?>
    </div>
  </body>
</html>