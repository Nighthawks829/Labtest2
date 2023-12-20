<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Test 2</title>
</head>


<body>

    <h1>UMS Sport Complex</h1>

    <h2>Facility Booking</h2>

    <form action="add_booking_action.php" method="post" id="bookForm" style="margin-bottom: 30px;">
        <table border="1">
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" id="name" name="name" required>
                </td>
            </tr>
            <tr>
                <td>
                    Date
                </td>
                <td>
                    <input type="date" id="date" name="date" required>
                </td>
            </tr>
            <tr>
                <td>
                    Time
                </td>
                <td>
                    <input type="time" id="time" name="time" required>
                </td>
            </tr>

            <tr>
                <td>
                    Category
                </td>
                <td>
                    <select name="category" required>
                        <option value="">&nbsp;</option>
                        <option value="1">Tennis</option>
                        <option value="2">Football</option>
                        <option value="3">Volleyball</option>
                    </select>
                </td>
            </tr>
        </table>
        <input class="submit" type="submit" value="Submit" name="B1">
    </form>

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

    $sql = "SELECT * FROM Booking";
    $result = mysqli_query($conn, $sql);

    ?>

    <table border="1">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Facility</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $numRow = 1;
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["time"] . "</td>";
                if ($row['category'] == 1) {
                    echo "<td>Tennis</td>";
                } else if ($row['category'] == 2) {
                    echo "<td>Football</td>";
                } else if ($row['category'] == 3) {
                    echo "<td>Volleyball</td>";
                }
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>";
                echo "<a href=\"edit_booking.php?id=" . $row["id"] . "\">Edit</a>";
                echo "&nbsp;&nbsp";
                echo '<a href="delete_booking_action.php?id=' . $row["id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                echo "</td>";
                $numRow = $numRow + 1;
            }
        } else {
            echo '<tr><td colspan="6">0 results</td></tr>';
        }
        ?>

    </table>


</body>

</html>