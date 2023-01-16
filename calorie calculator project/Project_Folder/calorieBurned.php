<?php

$file = "activity_data.json";

$data = file_get_contents($file);

$array = json_decode($data , true);

$date = $_POST['date'];
$User_Name = $_POST['name'];
$activity = $_POST['activity'];
$step = $_POST['step'];

$Target_Calorie_Burned = 800;

foreach($array as $value)
{
    if($activity == $value['activity'])
    {
        $Total_Calorie_Burned = ($value['calorie-burned'])*($step);

        $Target_Acheived_Burned = (($Total_Calorie_Burned)/($Target_Calorie_Burned))*100;
    }
}

$conn = new mysqli('localhost','root','','aditya_database');

if($conn->connect_error)
{
    echo "$conn->connect_error";
    die("connection failed : " . $conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into burned_calorie(date,User_Name,Total_Calorie_Burned,Target_Calorie_Burned,Target_Acheived_Burned) values(?,?,?,?,?)");

    $stmt->bind_param("ssiii", $date,$User_Name,$Total_Calorie_Burned,$Target_Calorie_Burned,$Target_Acheived_Burned);

    $stmt->execute();
    header('location:submitted.html');
    $stmt->close();
    $conn->close();

}

?>