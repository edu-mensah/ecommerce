let profileDetails = document.querySelector(".profile-details");
let dropDownMenu = document.querySelector(".drop-down-menu");

//

profileDetails.addEventListener("click", () => {
  dropDownMenu.classList.toggle("show-menu");
});

//

let addProductBtn = document.querySelector(".add-product-btn");
let productForm = document.querySelector("#addProduct");

//
addProductBtn.addEventListener("click", () => {
  productForm.classList.toggle("show-form");
});
