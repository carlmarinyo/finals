<?php
session_start(); // Start a session to store user-specific data across pages

include "../include/db_con1.php"; // Include the file for connecting to the database

// Check if the username and password have been submitted
if (isset($_POST['uname']) && isset($_POST['password'])) { 

    // Define a function to sanitize and clean the input data
    function validate($data){
        $data = trim($data); // Remove leading/trailing whitespace
        $data = stripslashes($data); // Remove backslashes
        $data = htmlspecialchars($data); // Convert special characters to HTML entities
        return $data;
    }

    $uname = validate($_POST['uname']); // Clean the provided username
    $pass = validate($_POST['password']); // Clean the provided password

    if (empty($uname)) { // Check if the username is empty
        header("Location: ../pages/index.php?error=Username is required"); // Redirect with an error message
        exit(); // Stop further execution
    } else if (empty($pass)) { // Check if the password is empty
        header("Location: ../pages/index.php?error=Password is required"); // Redirect with an error message
        exit(); // Stop further execution
    } else {
        $sql = "SELECT * FROM login WHERE user_name='$uname' AND password='$pass'"; // Construct a SQL query to fetch user credentials

        $result = mysqli_query($conn, $sql); // Execute the query

        if (mysqli_num_rows($result) === 1) { // Check if exactly one row is returned
            $row = mysqli_fetch_assoc($result); // Fetch the row data

            if ($row['user_name'] === $uname && $row['password'] === $pass) { // Check if the stored username and password match the provided values
                $_SESSION['user_name'] = $row['user_name']; // Store the username in a session variable
                $_SESSION['name'] = $row['name']; // Store the name in a session variable
                $_SESSION['id'] = $row['id']; // Store the ID in a session variable
                header("Location: ../pages/home.php"); // Redirect to the home page
                exit(); // Stop further execution
            } else {
                header("Location: ../pages/index.php?error=Incorrect user name or password"); // Redirect with an error message
                exit(); // Stop further execution
            }
        } else {
            header("Location: ../pages/index.php?error=Incorrect user name or password"); // Redirect with an error message
            exit(); // Stop further execution
        }
    }

} else {
    header("Location: ../pages/index.php?error"); // Redirect without specific error message
    exit(); // Stop further execution
}
