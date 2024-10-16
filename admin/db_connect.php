<?php 

// Create a connection to MySQL database
$conn = new mysqli('localhost', 'root', 'Pigu123456@$', 'flight_booking_db');

// Check connection
if ($conn->connect_error) {
    die("Could not connect to MySQL: " . $conn->connect_error);
}

// Connection successful
echo "Connected successfully";

// You can now proceed with your queries here...

?>
