<?php

$file = "food_data.json";

$data = file_get_contents($file);

$array = json_decode($data , true);

$User_Name = $_POST['name-input'];
$food = $_POST['food-select'];
$quantity = $_POST['quantity-input'];

$Target_Calorie_Intake = 1000;

foreach($array as $value)
{
    if($food == $value['food'])
    {
        $Total_Calorie_Intake = ($value['Calories'])*($quantity);

        $Target_Acheived_Intake = (($Total_Calorie_Intake)/($Target_Calorie_Intake))*100;
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
    $query = "update intake_calorie set Total_Calorie_Intake='$Total_Calorie_Intake' ,Target_Acheived_Intake='$Target_Acheived_Intake' where User_Name='$User_Name' ";

    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo "<script>alert('Data updated')</script>";
    }
    else
    {
        echo "failed to update";
    }

}

?>