// add or subtract quantity

const minusBtn = document.querySelector('.minus');
const addBtn = document.querySelector('.add');
let quantity = document.querySelector('#quantity');

let value = 1;

quantity.value = value;
minusBtn.addEventListener('click', onMinusCounter);
addBtn.addEventListener('click', onAddCounter);
	
function onMinusCounter() {
	value--;
  quantity.value = value - 0;
	
	if (quantity.value < 1 ){ 
		quantity.value = 1 ;
		value = 1;
	}
}

function  onAddCounter(){
	value++;
	quantity.value = value + 0;
}

// Go back acording to your history
const backBtn = document.querySelector('.close');
backBtn.addEventListener('click', () => window.history.back());

//send orders form
let addOrder = document.querySelector('.check-out');
let orderForm = document.querySelector('#order-form');
let totalMessage = document.querySelector('.total');
let checkoutMessage = document.querySelector('.checkout-container');

orderForm.addEventListener('submit', e => {
  e.preventDefault();
})

addOrder.addEventListener('click', () => {
let quantity = document.querySelector('#quantity');
let price = document.querySelector('#price');
let total = quantity.value * price.value;
  
  let xhttp = new XMLHttpRequest();
  xhttp.onload = () => {
    if(xhttp.readyState === XMLHttpRequest.DONE ) {
      if(xhttp.status == 200) {
        totalMessage.innerHTML = `Total: $${total}.00`;
        checkoutMessage.style.opacity = '1';
        checkoutMessage.style.pointerEvents = 'fill';
      }
    } else{
      alert('Failed');
    }
  }
  xhttp.open('POST', '../func/sendOrders.php', true);
  let newform = new FormData(orderForm);
  xhttp.send(newform);
  
})
