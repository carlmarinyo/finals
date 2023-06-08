<?php
session_start(); 

include "../include/db_con1.php"; 

// Check if the username, password, and name have been submitted
if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name'])) { 

    //cleans the input data by removing unnecessary characters or formatting  
    function validate($data){
        $data = trim($data); 
        $data = stripslashes($data); 
        $data = htmlspecialchars($data); 
        return $data;
    }

   //cleans the input data by removing unnecessary characters or formatting  
    $uname = validate($_POST['uname']); 
    $pass = validate($_POST['password']); 
    $name = validate($_POST['name']); 

    $user_data = 'uname=' . $uname . '&name=' . $name; // Prepare user data for redirection

    if (empty($uname)) { // Check if the username is empty
        header("Location: ../pages/index.php?error=User Name is required&$user_data"); // Redirect with an error message
        exit();
    } else if (empty($pass)) { // Check if the password is empty
        header("Location: ../pages/index.php?error=Password is required&$user_data"); // Redirect with an error message
        exit();
    } else if (empty($name)) { // Check if the name is empty
        header("Location: ../pages/index.php?error=Name is required&$user_data"); // Redirect with an error message
        exit(); 
    } else {
        
        $sql = "SELECT * FROM login WHERE user_name='$uname' "; // Check if the username already exists in the database
        $result = mysqli_query($conn, $sql); // Execute the query

        if (mysqli_num_rows($result) > 0) { // Check if any rows are returned
            header("Location: ../pages/index.php?error=The username is already taken&$user_data"); // Redirect with an error message
            exit(); 
        } else {
            $sql2 = "INSERT INTO login(user_name, password, name) VALUES ('$uname', '$pass', '$name')"; // Insert new user into the database
            $result2 = mysqli_query($conn, $sql2); // Execute the query

            if($result2) { // Check if the insertion was successful
                header("Location: ../pages/index.php?success=Registration successful. You can now log in!&$user_data"); // Redirect with a success message
                exit(); 
            } else {
                header("Location: ../pages/index.php?error=unknown error occured&$user_data"); // Redirect with an error message
                exit(); 
            }
        }
    }
} else {
    header("Location: ../pages/index.php?error"); // Redirect without specific error message
    exit(); 
}
