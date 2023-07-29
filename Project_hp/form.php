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
    echo "db connected successfully.<br><br><br><br>";
}

$select_sql = 'select * from student_info';

$data = $connection->query($select_sql);

//print_r($data);exit;

/*if($data->num_rows > 0)
{
    while($row = $data->fetch_assoc())
    {
        echo "<pre>";print_r($row);echo "</pre>";
    }
}
else{
    echo "No records found.";
}
die();*/

?>
<center>
<a href="add_student.php">Add</a>
<table border="1" style="left:50px;" cellspacing="15px" cellpadding="15px">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Blood Group</th>
        <th>Roll No</th>
        <th>Action</th>
    </tr>
    <?php 
    if($data->num_rows > 0)
    {
        while($row = $data->fetch_assoc())
        {
    ?>
    <tr>



        <td><?php echo $row['Stud_Id']?></td>
        <td><?=$row['Student_Name']?></td>
        <td><?=$row['Contact']?></td>
        <td><?=$row['Email_id']?></td>
        <td><?=$row['blood_grp']?></td>
        <td><?=$row['Roll_no']?></td>
        <td>
            <a href="">View</a>
            <a href="update_student.php?student_id=<?=$row['Stud_Id']?>">Update</a>
            <a href="">Delete</a>
        </td>
    </tr>
    <?php } } else { ?>
        <center>No records found.</center>
   <?php  } ?>
</table>
</center>
<?php

//      INsert Query

/*$insert_query = 'INSERT INTO disha (`name`, `rollno`) VALUES("Tejas", 258)';

//$data = $connection->query($insert_query);
if ($connection->query($insert_query) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_query . "<br>" . $connection->error;
  }
//print_r($data);*/

//      UPdate Query

/*$update_query = "UPDATE disha SET `name` = 'Sandhya Kanade' WHERE id = 2";

if($connection->query($update_query) == true)
{
    echo "Data updated successfuly";
}
else{
    echo "Failed";
}*/

//      Delete Query

/*$delete_query = 'DELETE FROM disha WHERE id = 4';

if($connection->query($delete_query) == true)
{
    echo "record deleted successfully.";
}
else
echo "failed.";*/

?>
 <?php
 exit;
include_once('data.php');
/* $city = array(
    'Maharashtra' => array(
        'Nashik',
        'Pune'),
        'Delhi' => array('New Delhi')
    );*/

//echo "<pre>";print_r($city);echo "</pre>";

#123

/*$cities = array (
    'nsk'=>'Nashik',
    'pn' => 'Pune',
    'au' => 'Aurangabad'); */
?>
<form method="post"action="2.php">

<label for="">what is your name?</label>
<input type="text"name="first_name" required/>
<br></br>

<label for="">Contact No:</label>
<input type="number"name="number"/>
<br></br>

<label for="">Gender:</label>
<input type="radio"name="gender" value="Male"/>
<label for="">Male</label>

<input type="radio"name="gender" value="Female"/>
<label for="">Female</label>
<br></br>

<label for="">City:</label>
<select name="city" id="city">
   <!--<option value="nsk">Nashik</option>
   <option value="mumbai">Mumbai</option>
   <option value="pune">Pune</option>-->
   <?php //display_cities($cities);

for($i = 0; $i < 4; $i++)
{ ?>
 <option value="<?=$cities[$i]?>"><?php echo $cities[$i]?></option>
<?php } ?>
   
   <?php /*foreach($cities as $key => $value) {

    echo '<option value="'.$key.'">'.$value.'</option>';

   }*/ ?>
</select>

<input type="submit" name="submit" value="Submit"/>

</form>

<?php

function display_cities($cities)
{
    /*foreach($cities as $key => $value) {

        echo '<option value="'.$key.'">'.$value.'</option>';
    
       }*/

       for($i = 0; $i < 4; $i++)
       {
        echo $cities[$i];
        //echo '<option value="'.$key.'">'.$value.'</option>';
       }
}

display_cities($cities); 

    //print_r($_POST);
?>
 <h1>
    <!-- <?php print_r($_POST);?> -->
    My name is <?php echo $_POST['first_name']; ?> <br>
    My contact no.is <?php echo $_POST['number']?>
    gender is <?php echo $_POST['gender']; ?> <br>
    My city is <?php echo $_POST['city']?>
</h1>