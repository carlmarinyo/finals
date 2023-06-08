<?php 
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
</head>
<body>
<nav class="nav-bar">
  <div class="logo">
     <img src="../assets/pnr-logo.png">
  </div>
  <div class="links">
    <a href="#home-two">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  <a href="../pages/index.php" class="logout-btn">Logout</a>
</nav>
  <header class="home-one" >
  <h1 class="username" data-aos="zoom-in"  data-aos-easing="linear"
     data-aos-duration="1500">Hello, <span><?php echo $_SESSION['name']; ?></span></h1>
  </header>
<section class="home-two" id="home-two">
</section>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<?php 
}else{
  header("Location: ../pages/index.php");
  exit();
}
?>