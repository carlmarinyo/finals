
<!DOCTYPE html>
<html>
<head>
    <title>Ticket</title>
    <link rel="stylesheet" type="text/css" href="../styles/tickets.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
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
    <section class="home-two" id="home-two">
        <div class="ticket-wrapper">
            <div class="ticket-inside"></div>
            <a class="ticket-button-one" href="./ticket-view.php" >Existing tickets</a>
            <a class="ticket-button-two" href="./ticket-buy.php">Buy ticket</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

