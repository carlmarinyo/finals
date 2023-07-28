<?php
session_start();
include "../include/db_con1.php";

if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
    // Retrieve station names from the database
    $stationQuery = "SELECT station_name FROM stations";
    $stationResult = mysqli_query($conn, $stationQuery);
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    if (!$stationResult) {
        die("Error retrieving station names: " . mysqli_error($conn));
    }

    $stationNames = array();
    while ($stationRow = mysqli_fetch_assoc($stationResult)) {
        $stationNames[] = $stationRow['station_name'];
    }

    $_SESSION['station_names'] = $stationNames; // Store the station names in a session variable

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the selected options
        $startStation = $_POST['startStation'];
        $destinationStation = $_POST['destinationStation'];

        // Store the selected options in session variables
        $_SESSION['startStation'] = $startStation;
        $_SESSION['destinationStation'] = $destinationStation;

        // Generate a ticket ID
        $ticketID = mt_rand(100000, 999999);

        // Store the ticket ID in a session variable
        $_SESSION['ticketID'] = $ticketID;

        // Insert ticket details into the database
        $insertQuery = "INSERT INTO ticket (Ticket_ID, User_ID, start_station, destination_station, Name) 
                        VALUES ('$ticketID', '$id', '$startStation', '$destinationStation', '$name')";
        $insertResult = mysqli_query($conn, $insertQuery);
        if (!$insertResult) {
            die("Error inserting ticket details: " . mysqli_error($conn));
        }
        $_SESSION['ticketID'] = $ticketID;
        $_SESSION['startStation'] = $startStation;
        $_SESSION['destinationStation'] = $destinationStation;

        echo '<div id="loading-animation"></div>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>';
        echo '<script>document.getElementById("loading-animation").style.display = "block";</script>';
        echo '<script>lottie.loadAnimation({ container: document.getElementById("loading-animation"), path: "../assets/loading.json", renderer: "svg", loop: true, autoplay: true });</script>';

        // Delay the redirection to the confirmation page for 6 seconds (6000 milliseconds)
        echo '<script>setTimeout(function() { window.location.href = "/finals1/pages/confirmation.php"; }, 4900);</script>';
        exit();
     
    }
} else {
    header("Location: ../pages/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select a station</title>
    <link rel="stylesheet" type="text/css" href="../styles/buy.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="../script/index.js"></script>
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
        <div class="loading-container">
        <div class="ticket-wrapper">
            <div class="left-wrapper">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h1 class="heading-ticket">Starting station</h1>
                <select name="startStation" id="startStation" required>
                    <option value="" disabled selected>Select a station</option>
                    <?php
                    foreach ($_SESSION['station_names'] as $station) {
                        echo "<option value=\"$station\">$station</option>";
                    }
                    ?>
                </select>
    
                <h1 class="heading-ticket">Destination station</h1>
                <select name="destinationStation" id="destinationStation" required>
                    <option value="" disabled selected>Select a destination</option>
                    <?php
                    foreach ($_SESSION['station_names'] as $station) {
                        
                        echo "<option value=\"$station\">$station</option>";
                    }
                    ?>
                </select>
    
                <input type="submit" value="Create ticket">
            </form>
            </div>
            
            <div class="right-wrapper"></div>
        </div>
        <div id="loading-animation"></div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
        const startStationSelect = document.getElementById('startStation');
        const destinationStationSelect = document.getElementById('destinationStation');

        startStationSelect.addEventListener('change', function() {
            const selectedStation = this.value;
            for (let i = 0; i < destinationStationSelect.options.length; i++) {
                const option = destinationStationSelect.options[i];
                if (option.value === selectedStation) {
                    option.disabled = true;
                    option.style.display = 'none';
                } else {
                    option.disabled = false;
                    option.style.display = '';
                }
            }
            destinationStationSelect.value = ''; // Reset the selected destination
        });

        const loadingAnimation = lottie.loadAnimation({
            container: document.getElementById("loading-animation"),
            path: "path/to/loading-animation.json",
            renderer: "svg",
            loop: true,
            autoplay: false
        });

        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            const ticketWrapper = document.querySelector(".ticket-wrapper");
            const loadingAnimationContainer = document.getElementById("loading-animation");

            // Hide the ticket-wrapper
            ticketWrapper.style.opacity = 0;
            ticketWrapper.style.pointerEvents = "none";

            // Show the loading animation
            loadingAnimationContainer.style.display = "block";
            loadingAnimation.play();

            // Delay the redirection to the confirmation page for 6 seconds (6000 milliseconds)
            setTimeout(function() {
                // Fade out the loading animation
                loadingAnimationContainer.style.opacity = 0;
                loadingAnimationContainer.style.transition = "opacity 0.5s ease-out";

                // Redirect to the confirmation page after fading out
                setTimeout(function() {
                    window.location.href = "/finals1/pages/confirmation.php";
                }, 500); // 500ms delay for fading out

            }, 6000); // 6000ms (6 seconds) delay before fading out
        });
    </script>
</body>
</html>
