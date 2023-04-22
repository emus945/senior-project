<?php
echo "First part";
$servername = "localhost";
$username = "root";
$password = "#Nancy1998";
$dbname = "george_condo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if(isset($_POST['submit'])) {
  
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $numPeople = $_POST['numPeople'];
  
  // Prepare and bind the SQL statement
  $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, date, time, numPeople ) VALUES (?, ?, ?, ?, ?, ?)");
  if($stmt === false) {
    die("Error: " . $conn->error);
}

  $stmt->bind_param("sssssi", $name, $email, $phone, $date, $time, $numPeople);

  // Execute the statement
  if ($stmt->execute() === TRUE) {
    echo "<div class='message success'>Reservation successful! It will take some time to get feedback on your booking</div>";
  } else {
    echo "<div class='message error'>Error: " . $stmt->error . "</div>";
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
else 
echo "submit wasn't set";
?>
