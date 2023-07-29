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

//print_r($_GET);

if(!empty($_POST))
{
    //print_r($_POST);die();

    
   

    $update_sql = "update student_info SET `Student_Name` = '".$_POST['name']."' where Stud_Id = ".$_GET['student_id'];

    if($connection->query( $update_sql) == true)
    {
        header('Location:tejas.php');
    }
    else{
        echo "update failed";die();
    }

}




$select_sql = "select * from student_info where Stud_Id = ".$_GET['student_id'];

$data = $connection->query($select_sql);

$student_data = $data->fetch_assoc();
//print_r($student_data);

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
<input type="text"name="name" placeholder="--Enter your Name--" required value="<?php echo $student_data['Student_Name']?>"/>
<br></br>

<label for="">Contact No:</label>
<input type="number"name="contact"placeholder="--contact No--" value="<?php echo $student_data['Contact']?>"/>
<br></br>

<label for="">Roll_no:</label>
<input type="number"name="roll_number" placeholder="--Enter your roll no--" value="<?php echo $student_data['Roll_no']?>"/>
<br></br>

<label for="">email:</label>
<input type="email"name="email" placeholder="--Enter your email--" value="<?php echo $student_data['Email_id']?>"/>
<br></br>

<label for="">Age:</label>
<input type="number"name="age" value="<?php echo $student_data['Age']?>"/>
<br></br>

<label for="">bloodgroup:</label>
<select name="bloodgroup">
    <option value="">--SELECT--</option>
    <option value="AB+" <?php if($student_data['blood_grp']  == 'AB+' ) { echo "selected"; }?>>AB+</option>
    <option value="AB-" <?php if($student_data['blood_grp'] == 'AB-') { echo "selected"; }?>>AB-</option>
    <option value="A+" <?php if($student_data['blood_grp'] == 'A+') { echo "selected"; }?>>A+</option>
    <option value="B+" <?php if($student_data['blood_grp'] == 'B+') { echo "selected"; }?>>B+</option>  
    <option value="O+" <?php if($student_data['blood_grp'] == 'O+') { echo "selected"; }?>>O+</option>

</select>
<br><br> 
<input type="submit" name="submit" value="Submit"/>

</form>
<?php>