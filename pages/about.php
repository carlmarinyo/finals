<?php 
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>About</title>
  <link rel="stylesheet" type="text/css" href="../styles/home.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
</head>
<body>
<nav class="nav-bar">
  <div class="logo">
    <img src="../assets/pnr-logo.png">
  </div>
  <div class="links">
  <a href="./home.php">Home</a>
    <a href="./about.php"><span>About</span></a>
    <a href="./ticket.php">Tickets</a>
  </div>
  <a href="../script/logout.php" class="logout-btn">Logout</a>
</nav>
<section class="home-two" id="home-two">

<div class="wrapper-two">
<div class="wrapper-box" data-aos="flip-left" data-aos-duration="1800">
  <div class="box-inside">
  <h1>What is PNR?</h1>
  <p>The Philippine National Railways or PNR is a state-owned railway company in the Philippines which operates one commuter rail service between Metro Manila and Laguna, and local services between Sipocot, Naga and Legazpi in the Bicol Region. It is an attached agency of the Department of Transportation.</p>
</div>
 
</div>
<div class="wrapper-box" data-aos="flip-left" data-aos-duration="1800" data-aos-delay="300">
<div class="box-inside">
  <h1>History of PNR</h1>
  <p>PNR officially began operations on November 24, 1892 as the Ferrocarril de Manila-Dagupan, during the Spanish colonial period, and later becoming the Manila Railroad Company (MRR) during the American colonial period. It became the Philippine National Railways on June 20, 1964 by virtue of Republic Act No. 4156.</p>
</div>
</div>
<div class="wrapper-box" data-aos="flip-left" data-aos-duration="1800" data-aos-delay="600">
<div class="box-inside">
  <h1>About PNR Premium</h1>
  <p>  PNR PREMIUM introduces a new and improved user-friendly and intuitive ticketing system as we are passionate about connecting people with their desired destinations, whether for business or leisure travel. Our platform offers comprehensive features to ensure your railway ticketing experience is efficient and hassle-free.</p>

</div>
</div>
</div>
</section>



<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<?php 
} else {
  header("Location: ../pages/index.php");
  exit();
}
?>
