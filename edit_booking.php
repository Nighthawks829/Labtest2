<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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



    $sql = "SELECT * FROM Booking WHERE id='" . $_GET['id'] . "' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $name = $row["name"];
        $date = $row["date"];
        $time = $row["time"];
        $category = $row["category"];
    }
    ?>
    <form action="edit_booking_action.php" method="post" id="bookForm" style="margin-bottom: 30px;">
        <input type="text" id="id" name="id" value="<?= $_GET['id'] ?>" hidden>

        <table border="1">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <?php
                    echo "<input type='text' id='name' name='name' required value='$name'>"
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Date
                </td>
                <td>
                    <?php
                    echo "<input type='date' id='date' name='date' required value='$date'>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Time
                </td>
                <td>
                    <?php
                    echo "<input type='time' id='time' name='time' required value='$time'>";
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    Category
                </td>
                <td>
                    <select name="category" required>
                        <option value="" <?php echo ($category == '') ? 'selected'
                                                : ''; ?> disabled>Select Program</option>
                        <option <?php echo ($category  == 1) ?
                                    'selected' : ''; ?> value=1>Tennis</option>
                        <option <?php echo ($category  == 2) ?
                                    'selected' : ''; ?> value=2>Football</option>
                        <option <?php echo ($category  == 3) ?
                                    'selected' : ''; ?> value=3>Volleyball</option>
                    </select>
                </td>
            </tr>
        </table>
        <input class="submit" type="submit" value="Submit" name="B1">
    </form>
</body>

</html>