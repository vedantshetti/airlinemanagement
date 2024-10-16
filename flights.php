<?php 
session_start(); // Ensure the session is started
include 'admin/db_connect.php'; 

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the input values from the form
    $departure_city = $_POST['departure_airport_id']; // Use the selected airport id
    $arrival_city = $_POST['arrival_airport_id']; // Use the selected airport id
    $departure_date = $_POST['date']; // This should match the datetime format
    $trip_type = $_POST['trip'];

    // Prepare the SQL query based on the input
    // Adjusted SQL query to match the actual column names in your database
    $sql = "SELECT * FROM flights WHERE departure_city = ? AND arrival_city = ? AND DATE(departure_time) = ?";

    // Add return date condition if it's a round trip
    if ($trip_type == 2) {
        $return_date = $_POST['date_return'];
        $sql .= " AND DATE(arrival_time) = ?";
    }

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    
    // Handle binding parameters based on trip type
    if ($trip_type == 2) {
        $stmt->bind_param("sssss", $departure_city, $arrival_city, $departure_date, $return_date);
    } else {
        $stmt->bind_param("sss", $departure_city, $arrival_city, $departure_date);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are flights available
    if ($result->num_rows > 0) {
        // Display the available flights
        echo '<div class="container">';
        echo '<h2 class="mb-4">Available Flights</h2>';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="flight-details">';
            echo '<p><b>Flight ID:</b> ' . htmlspecialchars($row['id']) . '</p>';
            echo '<p><b>Flight Number:</b> ' . htmlspecialchars($row['flight_number']) . '</p>';
            echo '<p><b>From:</b> ' . htmlspecialchars($row['departure_city']) . ' <b>To:</b> ' . htmlspecialchars($row['arrival_city']) . '</p>';
            echo '<p><b>Departure Time:</b> ' . htmlspecialchars($row['departure_time']) . '</p>';
            echo '<p><b>Arrival Time:</b> ' . htmlspecialchars($row['arrival_time']) . '</p>';
            echo '<p><b>Price:</b> $' . number_format($row['price'], 2) . '</p>';
            if ($trip_type == 2) {
                echo '<p><b>Return Date:</b> ' . htmlspecialchars($return_date) . '</p>'; // Display return date
            }
            echo '</div><hr>';
        }
        echo '</div>';
    } else {
        // No flights available
        echo '<div class="container">';
        echo '<h2 class="mb-4">No Flights Available</h2>';
        echo '<p>No flights are available for the selected date and route.</p>';
        echo '</div>';
    }
} else {
    // Redirect back or show an error
    echo '<div class="container">';
    echo '<h2 class="mb-4">Invalid Request</h2>';
    echo '<p>Please use the search form to find flights.</p>';
    echo '</div>';
}
?>
