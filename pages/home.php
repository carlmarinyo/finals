<?php 
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="../styles/home.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
</head>
<body>
<nav class="nav-bar">
  <div class="logo">
    <img src="../assets/pnr-logo.png">
  </div>
  <div class="links">
    <a href="./home.php"><span>Home</span></a>
    <a href="./about.php">About</a>
    <a href="./ticket.php">Tickets</a>
  </div>
  <a href="../script/logout.php" class="logout-btn">Logout</a>
</nav>

<header class="home-one">
  <div class="container">
    <div class="advisory" data-aos="fade-right" data-aos-duration="1500">
      <h1>PNR ADVISORY: ALABANG STATION WILL BE CLOSED DUE TO AN ACCIDENT.</h1>
    </div>
  </div>
  <h1 class="username">Welcome to PNR Premium! <br><span><?php echo $_SESSION['name']; ?></span></h1>
</header> 

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
<!-- <footer class="footer">
  <div class="footer-content">
    <div class="footer-section">
      <h4>PNR Premium</h4>
      <p>&copy; 2023</p>
    </div>
    <div class="footer-section">
      <h4>Contact Us</h4>
      <p><a href="https://www.facebook.com/carljerome.marino?mibextid=LQQJ4d">Facebook</a></p>
    </div>
    <div class="footer-section">
      <h4>Careers</h4>
      <p><a href="https://meatspin.com">Meatspin</a></p>
    </div>
    <div class="footer-section">
      <h4>Feedback</h4>
      <p><a href="https://mail.google.com/alexiagailo123">Gmail</a></p>
    </div>
  </div>
  <div class="footer-content">
    <div class="footer-section">
      <h4>About GOVPH</h4>
      <p>Learn more about the government</p>
    </div>
    <div class="footer-section">
      <h4>Official Gazette</h4>
      <p><a href="https://www.officialgazette.gov.ph/lists/government-websites/">Website</a></p>
    </div>
    <div class="footer-section">
      <h4>Office of the Vice President</h4>
      <p><a href="https://www.ovp.gov.ph">Website</a></p>
    </div>
  </div>
  
</footer> -->

</html>
<?php 
} else {
  header("Location: ../pages/index.php");
  exit();
}
?>
