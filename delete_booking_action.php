<?PHP
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


//this action is called when the Delete link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $sql = "DELETE FROM Booking WHERE id=" . $id;

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully<br>";
        echo "<a href=\"index.php\">Back</a>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
        echo "<a href=\"index.php\">Back</a>";
    }
}
mysqli_close($conn);
