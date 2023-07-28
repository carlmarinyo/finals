<?php
session_start();
include "../include/db_con1.php";

if (!isset($_SESSION['name']) || !isset($_SESSION['user_name'])) {
    header("Location: ../pages/index.php");
    exit();
}

if (isset($_SESSION['user_name'])) {

    $id = $_SESSION['id'];

 
    $userName = $_SESSION['name'];

   
    $ticketDeletedMessage = "";
    if (isset($_POST['deleteTicket'])) {
       
        $ticketID = $_POST['ticketID'];

    
        $deleteQuery = "DELETE FROM ticket WHERE Ticket_ID = '$ticketID'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
       
            $ticketDeletedMessage = "Ticket deleted successfully.";
        } else {
            // Error deleting the ticket
            $ticketDeletedMessage = "Error deleting the ticket: " . mysqli_error($conn);
        }
    }

    // Retrieve the user's tickets from the database
    $query = "SELECT * FROM ticket WHERE Name = '$userName'";
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Display the tickets section regardless of whether tickets are found or not
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>User Tickets</title>
            <link rel="stylesheet" type="text/css" href="../styles/ticket-list.css">
        </head>
        <body>
    <nav class="nav-bar">
        <div class="logo">
            <img src="../assets/pnr-logo.png">
        </div>
        <div class="links">
            <a href="./home.php">Home</a>
            <a href="./about.php">About</a>
            <a href="./ticket.php"><span>Tickets</span></a>
        </div>
        <a href="../script/logout.php" class="logout-btn">Logout</a>
    </nav>
    <section class="ticket-section"> 
        <div class="ticket-outside">
            <h1 class="tickets">Your Tickets</h1>
         
        </div>
        <div class="ticket-wrapper">
            <?php
            // Display the JavaScript alert for the ticket deletion message
            if (!empty($ticketDeletedMessage)) {
                echo "<script>alert('$ticketDeletedMessage');</script>";
            }
            // Check if any tickets were found
            if (mysqli_num_rows($result) > 0) {
                // Display each ticket
                while ($row = mysqli_fetch_assoc($result)) {
                    $ticketID = $row['Ticket_ID'];
                    $startStation = $row['start_station'];
                    $destinationStation = $row['destination_station'];
                    $name = $row['Name'];
                    // Display ticket information
echo "<div class='ticket-info'>";
echo "<p>Name: $name</p>";
echo "<p>User ID: $id</p>";
echo "<p>Ticket ID: $ticketID</p>";
echo "<p>Start Station: $startStation</p>";
echo "<p>Destination Station: $destinationStation</p>";

echo "<form method='post'>";
echo "<input type='hidden' name='ticketID' value='$ticketID'>";
echo "<button type='submit' name='deleteTicket' class='delete-button'>Delete Ticket</button>";
echo "</form>";
echo "</div>";


                }
            } else {
                // No tickets found for the user
                echo "<h1 class='error-one'>No tickets found</h1>";
                echo "<h1 class='error'><a href='ticket-buy.php'>Create your ticket</a></h1>";
              
            }
            ?>
        </div>
    </section>
</body>
        </html>
        <?php
    } else {
        // Error executing the query
        echo "Error executing the query: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to the ticket selection page if session variable is not set
    header("Location: ./ticket.php");
    exit();
}
?>
