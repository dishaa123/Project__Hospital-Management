<?php
include_once('db.php');

$service_query = "SELECT * FROM services";
$service_obj = $connection->query($service_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css"  rel="stylesheet" >
    
</head>
<body class="body-class">
    
<?php include_once('common/header.php');?>

<div class="content">
        <div style="margin-bottom:50px;">
            <h1>Services</h1> 
        </div>

        <div class="services2">
            <?php while($service_data = $service_obj->fetch_assoc()) { ?>
                <div class="s1">
                    <img src="images/<?=$service_data['image']?>" alt="" width="70%" height="200px">
                    <h5><?=$service_data['title']?></h5>
                    <p><?=$service_data['description']?></p>
                </div>
            <?php } ?>
        </div>
     <div style="clear:both;margin-bottom:25px;"></div>

    <?php include_once('common/footer.php');?>
 </div>
</body>
</html>