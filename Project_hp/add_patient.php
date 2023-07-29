<?php
include_once('db.php');

$select_sql = 'select * from patients';

$data = $connection->query($select_sql);
//print_r($data);
if(!empty($_POST))
{
    //print_r($_POST);
    $insert_sql = 'INSERT INTO patients (	`first_name`,	`last_name`,	`email`,	`contact_number`,	`blood_group`,	`age`,	`address`) VALUES ("'.$_POST['first_name'].'", "'.$_POST['last_name'].'", "'.$_POST['email'].'", "'.$_POST['contact_number'].'", "'.$_POST['blood_group'].'", "'.$_POST['age'].'", "'.$_POST['address'].'")';

    if ($connection->query($insert_sql) === TRUE) {
        //echo "New record created successfully";
        $_SESSION['success_message'] = "New record created successfully";
        header('Location:patient_list.php');
    } else {
        echo "Error: " . $insert_query . "<br>" . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Patient</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  </head>
  <body>
  <style>
      
      h1 {
      padding: 10px 0;
      font-size: 32px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      .main-block {
      max-width: 340px; 
      min-height: 300px; 
      padding: 10px 0;
      margin: auto;
      /*border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb;*/ 
      }
      form {
      margin: 0 30px;
      }
      .account-type, .gender {
      margin: 15px 0;
      }
      input[type=radio] {
      display: none;
      }
      label#icon {
      margin: 0;
      border-radius: 5px 0 0 5px;
      }
      label.radio {
      position: relative;
      display: inline-block;
      padding-top: 4px;
      margin-right: 20px;
      text-indent: 30px;
      overflow: visible;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #1c87c9;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 9px;
      height: 4px;
      top: 8px;
      left: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      input[type=text],input[type=email], input[type=password] {
      width: calc(100% - 59px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px; 
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9; 
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      input[type=password] {
      margin-bottom: 15px;
      }
      #icon {
      display: inline-block;
      padding: 9.3px 15px;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #1c87c9;
      color: #fff;
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #26a9e0;
      }
    </style>
    <div>
        <?php include_once('common/admin_header_bar.php');?>
        <div style="height:100%;">
            <?php include_once('common/admin_left_nav_bar.php');?>
            <div style="width:85%;height:100%;float:left;padding-top:50px;">
            <center>
                <a style="" href="patient_list.php">Patient List</a>
                <form action="" class="main-block" method="post">
                        <hr>
                        <label id="icon" for="name"><i class="fas fa-user"></i></label>
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" required/>
                        <label id="icon" for="name"><i class="fas fa-user"></i></label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required/>
                        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email" required/>

                        <label id="icon" for="name"><i class="fas fa-phone"></i></label>
                        <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" required/>

                        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
                        <input type="text" name="blood_group" id="blood_group" placeholder="Blood Group" required/>

                        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
                        <input type="text" name="age" id="age" placeholder="Age" required/>

                        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
                        <textarea name="address" id="address"></textarea>
                    
                        <hr>

                        <div class="btn-block">
                        <button type="submit" href="/">Submit</button>
                        </div>
                    </form>

                </center>
            </div>
        </div>
        <?php include_once('common/admin_footer_bar.php');?>
    </div>
  </body>
</html>