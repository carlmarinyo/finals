<!DOCTYPE html>
<html>
<head>
    <title>Login and Register</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
    <div class="bg-image"> </div>
    <div class="login-box">
     <!-- Button that toggles between login and register form -->
            <div class="button-container">
                <button id="login-btn" class="active">Login</button>
                <button id="register-btn">Register</button>
            </div>
        

        <div class="login-inside" id="login-form">
            <!-- Login form -->
            <form action="../script/login.php" method="post">
                <h2>Login</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="form-group">
                         <!-- Gets the username input -->
                    <label for="uname">Username</label>
                    <input type="text" id="uname" name="uname"autocomplete="off">
                </div>
                <div class="form-group">
                     <!-- Gets the password input -->
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off">
                </div>
                 <!-- Submits the username and password to be checked in login.php -->
                <button class=login-button type="submit">Login</button>
            </form>
        
        </div>

        <div class="login-inside" id="register-form" style="display: none;" data-aos="fade-up">
            <!-- Register form -->
           
                <form action="../script/register-check.php" method="post">
                <h2 data-aos="fade-up">Register</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <!-- Asks you to input your desired name to be put on the database -->
                <label class="reg-label" for="uname">Name</label>
                <div class="input-with-icon">
                <?php if (isset($_GET['name'])) { ?>

                    <input type="text" 
                           id="name" 
                           name="name"
                           autocomplete="off" 
                           value="<?php echo $_GET['name']; ?>">
                          
                <?php }else{ ?>
                    
                    <input type="text" 
                           id="name" 
                           autocomplete="off"
                           name="name">
                <?php }?>
                <i class="fa-sharp fa-solid fa-user"></i>
                </div>
                <!-- Asks you to input your desired username to be put on the database -->
                <label class="reg-label" for="uname">Username</label>
                <div class="input-with-icon">
                <?php if (isset($_GET['uname'])) { ?>
                    <input type="text" 
                           id="uname" 
                           name="uname"
                           autocomplete="off" 
                           value="<?php echo $_GET['uname']; ?>">
                <?php }else{ ?>
                    <input type="text" 
                           id="uname"
                           autocomplete="off" 
                           name="uname">
                <?php }?>
                <i class="fa-solid fa-envelope"></i>
                </div>
                <!-- Asks you to input your desired password to be put on the database -->
                <label class="reg-label" for="password">Password</label>
<div class="input-with-icon">
    <?php if (isset($_GET['password'])) { ?>
        <input type="password" 
               id="password" 
               name="password" 
               value="<?php echo $_GET['password']; ?>">
               <?php } else { ?>
                  <input type="password" id="reg-password" name="password">
               <?php } ?>
               <i class="fa-solid fa fa-lock"></i>
            </div>
            <button class="register-button" type="submit">Register</button>
         </form>
      </div>
      <div class="pnr-image"></div>
   </div>
    <script src="https://kit.fontawesome.com/719558b868.js" crossorigin="anonymous"></script>
    <script src="../script/index.js"></script>
</body>
</html>
