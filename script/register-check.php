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
        echo '<script>alert("Username is required, please try again."); window.location.href = "../pages/index.php";</script>';
        exit();
    } else if (empty($pass)) { // Check if the password is empty
        echo '<script>alert("Password is required, please try again."); window.location.href = "../pages/index.php";</script>'; 
        exit();
    } else if (empty($name)) { // Check if the name is empty
        echo '<script>alert("Name is required, please try again."); window.location.href = "../pages/index.php";</script>'; 
        exit();
    }else {
        
        $sql = "SELECT * FROM login WHERE user_name='$uname' "; // Check if the username already exists in the database
        $result = mysqli_query($conn, $sql); // Execute the query

        if (mysqli_num_rows($result) > 0) { // Check if any rows are returned
            echo '<script>alert("The username is already taken, please try again."); window.location.href = "../pages/index.php";</script>'; // 
            exit();
        } else {
            $sql2 = "INSERT INTO login(user_name, password, name) VALUES ('$uname', '$pass', '$name')"; // Insert new user into the database
            $result2 = mysqli_query($conn, $sql2); //

            if ($result2) { // Check if the insertion was successful
                echo '<script>alert("Account Created! You can now login."); window.location.href = "../pages/index.php";</script>'; // Display 
                exit();
            } else {
                echo '<script>alert("Unknown error occurred"); window.location.href = "../pages/index.php";</script>'; 
                exit();
            }
        }
    }
} else {
    echo '<script>alert("Unknown error occurred"); window.location.href = "../pages/index.php";</script>'; // Display JavaScript alert and redirect
    exit();
}

