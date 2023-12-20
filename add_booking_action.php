<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servernme = "localhost";
$username = "root";
$password = "";
$dbname = "sport_booking";

// Create connection
$conn = mysqli_connect($servernme, $username, $password, $dbname);

// Check connection
if (!$conn) {
    // echo "<script>alert('Cannot Connect to database');</script>";
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST['time'];
    $category = $_POST['category'];

    $sql = "INSERT INTO Booking(name,date,time,category) VALUES ('$name','$date','$time',$category)";

    $status = update_DbTable($conn, $sql);

    if ($status) {
        echo "Form data updated successfully";
        echo "<a href=\"index.php\">Back</a>";
    } else {
        echo "Sorry, there was an error uploading your data";
        echo "<a href=\"index.php\">Back</a>";
    }
}
mysqli_close($conn);

// Function to insert data to database table
function update_DbTable($conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {

        return false;
    }
}
