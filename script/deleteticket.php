<?php
session_start();
include "../include/db_con1.php";

if (isset($_POST['deleteTicket'])) {
    // Get the ticket ID from the submitted form
    $ticketID = $_POST['ticketID'];

    // Delete the ticket from the database
    $deleteQuery = "DELETE FROM ticket WHERE Ticket_ID = '$ticketID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Ticket deleted successfully
        $_SESSION['ticketDeletedMessage'] = "Ticket deleted successfully.";
    } else {
        // Error deleting the ticket
        $_SESSION['ticketDeletedMessage'] = "Error deleting the ticket: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the page where the deletion was performed
header("Location: ../pages/ticket-view.php");
exit();
?>
