// add click event for hamburger menu 
const menu = document.querySelector('.menu');
const headContainer = document.querySelector('.head-container');

menu.addEventListener('click', () => {
  headContainer.classList.toggle('active-side');
})
//for search query
let productNames = [];

//fetch products
function getProducts(){
  fetch(`func/getProducts.php`)
  .then(response => response.json())
  .then(datas => {
    displayProducts(datas);
    productNames = datas;
  })
}

function displayProducts(datas){
  const productContent = document.querySelector('.product-content');
  let product = datas.map(data => {
    return `<li class="product">
						<img src='images/${data[3]}' alt="">
						<div class="product-info">
							<div>
								<h5>${data[2]}</h5>
								<h6>$ ${data[4]}</h6>
							</div>
								<button class="buy-now"><a href='action/buy.php?id=${data[0]}'>Buy Now</a></button>
								<button class="add-cart"><a href='action/addCart.php?id=${data[0]}'>Cart</a></button>
						</div>
					</li>`
  }).join(' ');
  productContent.innerHTML = product;
}
getProducts();

let productSearch = document.querySelector('.search');
productSearch.addEventListener('keyup', e => {
   let productValue = e.target.value;
   const filteredNames = productNames.filter(dataName => {
     return dataName[2].toLowerCase().includes(productValue.toLowerCase());
   });
   displayProducts(filteredNames);
});

function onCategories(num,e){
  const boxes = document.querySelectorAll('.box');
  for (let i = 0; i < boxes.length; i++) {
    boxes[i].classList.remove('active-box');
  }
  e.classList.add('active-box');
  const filteredCategories = productNames.filter(dataCategorie => {
    return dataCategorie[1].includes(num);
  })
  displayProducts(filteredCategories);
}
