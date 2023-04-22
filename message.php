<?php
$servername = "localhost";
$username = "root";
$password = "#Nancy1998";
$dbname = "george_condo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $query = "SELECT status FROM reservations WHERE name = '$name'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
        echo "Your reservation status is: $status";
    } else {
        echo "No reservation found for the name $name";
    }
}

mysqli_close($conn);
?>

<html>
<body>

<form method="post">
    <label for="name">Enter your name:</label>
    <input type="text" id="name" name="name"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
