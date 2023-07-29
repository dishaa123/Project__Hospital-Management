<?php 
include_once('db.php');

$service_query = "SELECT * FROM services";
$service_obj = $connection->query($service_query);

//$service_data = $service_obj->fetch_assoc();

//echo "<pre>";print_r($service_obj);die();
$testnomial_query="SELECT * FROM testmonial";
$testnomial_obj = $connection->query($testnomial_query);
$success_message = '';
$failure_message = '';
if(!empty($_POST))
{
    //echo "<pre>";print_r($_POST);die();
    $insert_query = 'INSERT INTO contact_messages (`first_name`,`last_name`,`email`, `contact_number`, `address`) VALUES ("'.$_POST['first_name'].'","'.$_POST['last_name'].'","'.$_POST['email'].'","'.$_POST['contact_number'].'","'.$_POST['address'].'")';

    if($connection->query($insert_query) == true)
    {
        $success_message = 'We have received your message. Our team will contact you soon!';
    }
    else{
        $failure_message = 'Failed to send your message. Please try after sometime.';
    }
}

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
    <div style="clear:both;"></div>
    <div class="content" style="height: 1300px;">
        <div>
            <h1>Destination for Advanced Care</h1> 
            <p>Get a Second Option From Worlds Best Doctor</p>
        </div>

        <?php if($service_obj->num_rows > 0) { ?>
        <div class="services">
            <h1>Services</h1>
        </div>

        <div class="services2">
                <?php while($service_data = $service_obj->fetch_assoc()) { ?>
                    <div class="s1">
                        <img src="images/<?=$service_data['image']?>" alt="" width="90%" height="200px">
                        <h5><?=$service_data['title']?></h5>
                        <p><?=$service_data['description']?></p>
                    </div>
                <?php } ?>
               <!--<div class="s1">
                   <img src="s5.png" alt="" width="70%">
                    <h5>X-ray</h5>
                </div>

               <div class="s2">
                  <img src="s4.png" alt="" width="70%">
                  <h5>Regular Checkup</h5>
              </div>

               <div class="3">
                  <img src="s3.png" alt="" width="70%">
                  <h5>Blood Donation</h5>
              </div>-->
         </div>
         <?php } ?>
         
         <?php if($testnomial_obj->num_rows > 0) { ?>
         <div class="test">
            <h1>Testimonials</h1>
        </div>

        <div class="test2">
        <?php while($testnomial_data = $testnomial_obj->fetch_assoc()) { ?>
            <div class="t1">
                <img src="images/<?=$testnomial_data['image']?>" alt="" width="120%" height="180px">
                 <h5><?=$testnomial_data['title']?></h5>
                 <p><?=$testnomial_data['description']?></p>
             </div>
             <?php } ?>

            <!--<div class="t2">
               <img src="test1.png" alt="" width="90%" >
               <h5></h5>
           </div> -->
      </div> 

      <?php } ?>
    <div class="Contact">
        <h1>Contact Form</h1>
    </div>
    <?php if($success_message != '') { ?>
        <div><b style="color:green;"><?=$success_message?></b></div>
    <?php } elseif($failure_message != '') { ?>
        <div><b style="color:red;"><?=$failure_message?></b></div>
    <?php } ?>

    <div class="contact2">
        <center>
            <form action="" style="width: 40%;" method="post">
                <div style="margin:25px;">
                    <label for="" style="width: 300px;float:left;margin-bottom:10px;">First Name</label><br>
                    <input type="text" name="first_name" style="width: 70%;height: 30px;border-radius: 12px;border-style: solid;border-color: #D3D3D3;" required />
                </div>
                <div style="margin:25px;">
                    <label for="" style="width: 300px;float:left;margin-bottom:10px;">Last Name</label><br>
                    <input type="text" name="last_name" style="width: 70%;height: 30px;border-radius: 12px;border-style: solid;border-color: #D3D3D3;" required />
                </div>
                <div style="margin:25px;">
                    <label for="" style="width: 300px;float:left;margin-bottom:10px;">Email</label><br>
                    <input type="email" name="email" style="width: 70%;height: 30px;border-radius: 12px;border-style: solid;border-color: #D3D3D3;" required />
                </div>
                <div style="margin:25px;">
                    <label for="" style="width: 300px;float:left;margin-bottom:10px;">Contact Number</label><br>
                    <input type="number" name="contact_number" style="width: 70%;height: 30px;border-radius: 12px;border-style: solid;border-color: #D3D3D3;" required />
                </div>
                <div style="margin:25px;">
                    <label for="" style="width: 300px;float:left;margin-bottom:10px;">Address</label><br>
                    <textarea name="address" style="width: 70%;height: 30px;border-radius: 12px;border-style: solid;border-color: #D3D3D3;"></textarea>
                </div>
                <button class="submit-btn">SUBMIT</button>
            </form>
        </center>
    </div>

    <?php include_once('common/footer.php');?>
</body>
</html>