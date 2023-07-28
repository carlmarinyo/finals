<?php
session_start();
if (!isset($_SESSION['name']) || !isset($_SESSION['user_name'])) {
    header("Location: ../pages/index.php");
    exit();
}

if (isset($_SESSION['startStation']) && isset($_SESSION['destinationStation']) && isset($_SESSION['ticketID'])) {
    // Access the selected start station, destination station, ticket ID, user ID, and name
    $startStation = $_SESSION['startStation'];
    $destinationStation = $_SESSION['destinationStation'];
    $ticketID = $_SESSION['ticketID'];
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
  
   
} else {

    header("Location: ./ticket.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ticket Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../styles/preview.css">
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
   
        <div class="ticket-wrapper">
            <div class="ticket-section1">
                <h1>PNR PREMIUM TICKET</h1>
            </div>
            <div class="ticket-section2">
                <div class="two-icon">

                </div>
                <div class="two-info">
                <h1>Name: <br><span><?php echo $name; ?></span></h1>
                <h1>User ID: <br><span><?php echo $id; ?></span></h1>
                <h1>Ticket ID: <br><span><?php echo $ticketID; ?></span></h1>
                <h1>Start Station: <br><span><?php echo $startStation; ?></span></h1>
                <h1>Destination Station: <span><br><?php echo $destinationStation; ?></span></h1>
                
            
            </div>
            
    </div>
   







            

</body>
</html>
