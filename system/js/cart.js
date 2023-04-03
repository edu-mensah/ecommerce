// //
let cartToggle = document.querySelector(".cart");
let cartWrapepr = document.querySelector(".cart-icon-wrapper");

cartWrapepr.addEventListener("click", () => {
  cartToggle.classList.toggle("show-cart");
});
