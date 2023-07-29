<?php
$server = 'localhost';
$username = "root";
$password = "";
$db = 'student';

$connection = new mysqli($server, $username, $password, $db);

if($connection->connect_error)
{
    echo "Error found";die();
}
else{
    //echo "db connected successfully.<br><br><br><br>";
}

if(!empty($_POST))
{
    //echo "<pre>";print_R($_POST);echo "</pre>";die();
    $insert_sql = 'INSERT INTO student_info (`Student_Name`,`Email_id`, `Contact`, `Age`, `blood_grp`, `Roll_no`) VALUES ("'.$_POST['name'].'", "'.$_POST['email'].'", "'.$_POST['contact'].'", "'.$_POST['age'].'", "'.$_POST['bloodgroup'].'", "'.$_POST['roll_number'].'")';

if ($connection->query($insert_sql) === TRUE) {
    //echo "New record created successfully";
    header('Location:tejas.php');
  } else {
    echo "Error: " . $insert_query . "<br>" . $connection->error;
  }


}


//include_once('add_student.php');
/* $bloodgroup = array(
    'bloodgroup' => array(
        'B+'
        'A+'
        'AB+'
        'AB-'
        'O+' 
    );*/

//echo "<pre>";print_r($blood grp);echo "</pre>";

#123

/*$bloodgroup = array (
    'AB+'=>'AB+',
    'AB-' => 'AB-',
    'A+' => 'A+',
    'B+' => 'B+',
    'O+'=> 'O+'); */
?>

<form method="post"action="">

<label for="">Student_name:</label>
<input type="text"name="name" placeholder="--Enter your Name--" required/>
<br></br>

<label for="">Contact No:</label>
<input type="number"name="contact"placeholder="--contact No--"/>
<br></br>

<label for="">Roll_no:</label>
<input type="number"name="roll_number" placeholder="--Enter your roll no--"/>
<br></br>

<label for="">email:</label>
<input type="email"name="email" placeholder="--Enter your email--"/>
<br></br>

<label for="">Age:</label>
<input type="number"name="age"/>
<br></br>

<label for="">bloodgroup:</label>
<select name="bloodgroup">
    <option value="">--SELECT--</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="A+">A+</option>
    <option value="B-">B+</option>  
    <option value="O+">O+</option>

</select>
<br><br> 
<input type="submit" name="submit" value="Submit"/>

</form>
<?php>