let seeAllTopSellingProductsBtn = document.querySelector(
  ".see-all-top-selling-products"
);

// getting wrappers(containers)
let topSellingProductsWrapper = document.querySelector(
  ".top-selling-products-wrapper"
);
let promotionWrapper = document.querySelector(".promotion-wrapper");
let accessoriesWrapper = document.querySelector(".accessories-wrapper");
let electronicsWrapper = document.querySelector(".electronics-wrapper");
let phonesTabletsWrapper = document.querySelector(
  ".phones-and-tablets-wrapper"
);

// getting elements for click events
let seeAllPromotionBtn = document.querySelector(".see-all-promotion");
let seeAllAccessoriesBtn = document.querySelector(".see-all-accessories");
let seeAllElectronicsBtn = document.querySelector(".see-all-electronics");
let seeAllPhonesTabletsBtn = document.querySelector(
  ".see-all-phones-and-tablets"
);

//Event Listeners

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

seeAllElectronicsBtn.addEventListener("click", () => {
  seeAllElectronicsBtn.classList.toggle("see-all-rotate");
  electronicsWrapper.classList.toggle("see-all");
});
