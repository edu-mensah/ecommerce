let seeAllTopSellingProductsBtn = document.querySelector(
  ".see-all-top-selling-products"
);
let topSellingProductsWrapper = document.querySelector(
  ".top-selling-products-wrapper"
);

let seeAllPromotionBtn = document.querySelector(".see-all-promotion");
let seeAllAccessoriesBtn = document.querySelector(".see-all-accessories");
let seeAllPhonesTabletsBtn = document.querySelector(
  ".see-all-phones-and-tablets"
);

let promotionWrapper = document.querySelector(".promotion-wrapper");
let accessoriesWrapper = document.querySelector(".accessories-wrapper");
let phonesTabletsWrapper = document.querySelector(
  ".phones-and-tablets-wrapper"
);
//

seeAllTopSellingProductsBtn.addEventListener("click", () => {
  seeAllTopSellingProductsBtn.classList.toggle("see-all-rotate");
  topSellingProductsWrapper.classList.toggle("see-all");
});

//

seeAllPromotionBtn.addEventListener("click", () => {
  seeAllPromotionBtn.classList.toggle("see-all-rotate");
  promotionWrapper.classList.toggle("see-all");
});

seeAllAccessoriesBtn.addEventListener("click", () => {
  seeAllAccessoriesBtn.classList.toggle("see-all-rotate");
  accessoriesWrapper.classList.toggle("see-all");
});

//
seeAllPhonesTabletsBtn.addEventListener("click", () => {
  seeAllPhonesTabletsBtn.classList.toggle("see-all-rotate");
  phonesTabletsWrapper.classList.toggle("see-all");
});
