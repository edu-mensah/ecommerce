const adBarCloseBtn = document.querySelector(".ad-close-btn");
const adBarWrapper = document.querySelector(".ad-navbar-wrapper");

// Event listener
adBarCloseBtn.addEventListener("click", () => {
  adBarWrapper.classList.toggle("ad-navbar-wrapper-toggle");
  adBarCloseBtn.classList.toggle("ad-close-btn-toggle");
});

//
