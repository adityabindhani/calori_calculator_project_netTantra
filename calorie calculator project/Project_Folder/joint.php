<?php

$conn = mysqli_connect('localhost','root','','aditya_database') or die("Connection Failed");

// $query = "select cit.date , cit.User_Name , cit.Total_Calorie_Intake , cit.Target_Calorie_Intake , cit.	Target_Acheived_Intake ,cbt.Total_Calorie_Burned , cbt.Target_Calorie_Burned , cbt.Target_Acheived_Burned from calorie_intake_table cit , calorie_burned_table cbt where cit.User_Name=cbt.User_Name ";

$query = "select * from intake_calorie inner join burned_calorie on intake_calorie.User_Name=burned_calorie.User_Name ";

$result = mysqli_query($conn,$query);


                //   require_once('joint.php');


?>