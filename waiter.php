<!DOCTYPE html>
<html>
<head>
	<title>Check Reservation Status</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Check Reservation Status</h1>
		<form method="post" action="waiter.php">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<button type="submit" name="submit">Check Status</button>
		</form>

		<?php
		// Check if form is submitted
		if(isset($_POST['submit'])) {

			// Connect to database
			$servername = "localhost";
			$username = "root";
			$password = "#Nancy1998";
			$dbname = "george_condo";
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Get the name from the form data
			$name = $_POST['name'];

			// Prepare and bind the SQL statement
			$stmt = $conn->prepare("SELECT * FROM reservations WHERE name = ?");
			$stmt->bind_param("s", $name);

			// Execute the statement
			$stmt->execute();

			// Store the result
			$result = $stmt->get_result();

			// Check if there is a matching record in the database
			if ($result->num_rows > 0) {
				// Output the reservation details
				$row = $result->fetch_assoc();
				echo "<h2>Reservation Found</h2>";
				echo "<p>Name: " . $row['name'] . "</p>";
				echo "<p>Email: " . $row['email'] . "</p>";
				echo "<p>Phone: " . $row['phone'] . "</p>";
				echo "<p>Date: " . $row['date'] . "</p>";
				echo "<p>Time: " . $row['time'] . "</p>";
				echo "<p>Number of People: " . $row['numPeople'] . "</p>";
			} else {
				// Output message if there is no matching record in the database
				echo "<h2>No Reservation Found</h2>";
			}

			// Close statement and connection
			$stmt->close();
			$conn->close();
		}
		?>
	</div>
</body>
</html>
