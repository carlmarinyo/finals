const loginBtn = document.getElementById("login-btn");
const registerBtn = document.getElementById("register-btn");
const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");
const pnrImage = document.querySelector(".pnr-image");


/* 
Makes the login form visible, while hiding the register form. It also updates the styling and properties of various elements on the page, such as setting background colors, opacity, and background images.
*/
function toggleLoginForm() {
  loginBtn.classList.add("active");
  registerBtn.classList.remove("active");
  registerForm.style.opacity = "0";
  setTimeout(() => {
    registerForm.style.display = "none";
    loginForm.style.display = "block";
  }, 500); 
  loginForm.style.opacity = "1";
  pnrImage.style.order = "2";
  loginBtn.style.backgroundColor = "rgb(25, 30, 66)";
  registerBtn.style.backgroundColor = "";
  pnrImage.style.backgroundImage = "url('../assets/pnr-image.jpg')";
}


// Same function as the toggleLoginForm but instead shows the register form, while hiding the login form. 

function toggleRegisterForm() {
  registerBtn.classList.add("active");
  loginBtn.classList.remove("active");
  loginForm.style.opacity = "0";
  setTimeout(() => {
    loginForm.style.display = "none";
    registerForm.style.display = "block";
  }, 500);
  registerForm.style.opacity = "1";
  pnrImage.style.order = "1";
  registerBtn.style.backgroundColor = "rgb(25, 30, 66)";
  loginBtn.style.backgroundColor = "";
  pnrImage.style.backgroundImage = "url('../assets/pnr-image2.jpg')";
}

// Show login form by default 
toggleLoginForm();
loginBtn.addEventListener("click", toggleLoginForm);
registerBtn.addEventListener("click", toggleRegisterForm);