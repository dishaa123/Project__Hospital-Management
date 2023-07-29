<?php
include_once('db.php');

$select_sql = 'select * from contact_messages';

$data = $connection->query($select_sql);
//print_r($data);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Contact Message List</title>
  </head>
  <body>
    <div class="main-block">
        <?php include_once('common/admin_header_bar.php');?>
        <div style="height:100%;background-color:green;">
            <?php include_once('common/admin_left_nav_bar.php');?>
            <div style="width:85%;height:100%;float:left;padding-top:50px;">
            <center>
                <H2>Contact Messages</H2>
                <table border="1" style="margin:25px;left:50px;" cellspacing="15px" cellpadding="15px">
                <?php if($data->num_rows > 0) { ?>

                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact No.</th> 
                        <th>Address</th>
                    </tr>
                <?php } ?>
                    <?php 
                    if($data->num_rows > 0)
                    {
                        while($row = $data->fetch_assoc())
                        {
                            //print_r($row); 
                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['first_name']?></td>
                        <td><?=$row['last_name']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['contact_number']?></td>
                        <td><?=$row['address']?></td>
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