<?php
include_once('db.php');

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

<div class="content">
    <div style="margin-bottom:50px;">
        <h1>Contact Us</h1> 
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
     <div style="clear:both;margin-bottom:25px;"></div>

    <?php include_once('common/footer.php');?>
 </div>
</body>
</html>