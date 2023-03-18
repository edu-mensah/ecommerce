let signUpWrapper = document.querySelector(".signup-wrapper");
let signInWrapper = document.querySelector(".signin-wrapper");
let signupBtn = document.querySelector(".signup-close-btn");
let signinBtn = document.querySelector(".signin-close-btn");
let signupButton = document.querySelector(".signup-btn");
let signinButton = document.querySelector(".signin-btn");

// event listener
signupBtn.addEventListener("click", () => {
  signUpWrapper.classList.toggle("signup-wrapper-toggle");
});

signinBtn.addEventListener("click", () => {
  signInWrapper.classList.toggle("signin-wrapper-toggle");
});
signupButton.addEventListener("click", () => {
  signUpWrapper.classList.toggle("signup-wrapper-toggle");
});

signinButton.addEventListener("click", () => {
  signInWrapper.classList.toggle("signin-wrapper-toggle");
});
