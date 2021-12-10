// add click event for hamburger menu 
const menu = document.querySelector('.menu');
const headContainer = document.querySelector('.head-container');
let h = null;
menu.addEventListener('click', () => {
  headContainer.classList.toggle('active-side');
})

function getCarts(){
  fetch('func/getCarts.php')
  .then(response => response.json())
  .then(datas => {
    displayCarts(datas);
    h = datas;
  })
}

function displayCarts(datas){
  const displayContent = document.querySelector('.cart-content');
  let cart = datas.map(data => {
    return `<li class="cart-con">
				<div class="cart-info">
					<img src='images/${data[4]}' alt="">
					<div>
						<h3>${data[3]}</h3>
						<h3>Quantity: ${data[6]}</h3>
						<h3>Size: ${data[7]}</h3>
					</div>
				</div>
				<h2>Total: $${data[8]}.00</h2>
				<div class="cart-buttons">
					<a class="buy-now" href="action/buy.php?id=${data[2]}">Buy Now</a>
					<a class="del-cart" href="func/deleteData.php?action=delete_cart&id=${data[0]}">Remove</a>
				</div>
			</li>`;
  }).join(' ');
  displayContent.innerHTML = cart;
}

getCarts();