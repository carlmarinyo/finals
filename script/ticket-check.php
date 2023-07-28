<?php
session_start(); // Start a session to store user-specific data across pages

include "../include/db_con1.php"; // Include the file for connecting to the database

// Check if the username and password have been submitted
$connection = mysqli_connect("localhost", "username", "password", "database_name");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve station names from the database table in the correct order
$query = "SELECT station_id, station_name FROM stations";
$result = mysqli_query($connection, $query);

$stations = array();
while ($row = mysqli_fetch_assoc($result)) {
    $stations[] = $row;
}

// Close the database connection
mysqli_close($connection);

// Handle form submission and indicate success
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $startStation = $_POST['startStation'];
    $destinationStation = $_POST['destinationStation'];

    // Perform the check to prevent selecting the same station
    if ($startStation === $destinationStation) {
        echo json_encode(['error' => 'You cannot select the same station for both start and destination.']);
        exit();
    }

    // Perform any necessary operations here

    // Indicate success
    echo json_encode(['success' => true]);
    exit();
}
?>
