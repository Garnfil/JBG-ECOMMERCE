// add click event for hamburger menu 
const menu = document.querySelector('.menu');
const sideMenu = document.querySelector('.side-menu');

let userNames = [];
let adminNames = [];
let productNames = [];

// for mobile menu
menu.addEventListener('click', () => {
  sideMenu.classList.toggle('active-side');
})


//each container that renders different data
function getUsers(params){
  fetch(`func/${params}.php`)
  .then(response => response.json())
  .then(datas => {
    displayUsers(datas);
    userNames = datas;
  })
}

function getProducts(params){
  fetch(`func/${params}.php`)
  .then(response => response.json())
  .then(datas => {
    displayProducts(datas);
    productNames = datas;
  })
}

function getAdmins(params){
  fetch(`func/${params}.php`)
  .then(response => response.json())
  .then(datas => {
    displayAdmins(datas);
    adminNames = datas;
  })
}

function getOrders(params){
 fetch(`func/${params}.php`)
  .then(response => response.json())
  .then(datas => {
    displayOrders(datas);
    ordersNames = datas;
  })
}

function displayUsers(datas) {
  const users = document.querySelector('.users');
  let htmlString = datas.map(data => {
    return ` <li class='data'>
              <h3 class='name'>${data[2]}</h3>
  							<a href='func/deleteData.php?action=delete_user&id=${data[1]}' class="delete"><i class="far fa-trash-alt"></i></a>
  				  </li>`;
  }).join(' ');
  users.innerHTML = htmlString;
}

function displayAdmins(datas) {
  const admins = document.querySelector('.admins');
  let htmlString = datas.map(data => {
    return `<li class='data'>
               <h3>${data[2]}</h3>
  							<a href='func/deleteData.php?action=delete_admin&id=${data[1]}' class="delete"><i class="far fa-trash-alt"></i></a>
  						</li>`;  
  }).join(' ');
  admins.innerHTML = htmlString;
}

function displayProducts(datas) {
  const products = document.querySelector('.products');
  let htmlString = datas.map(data => {
    return `<li class='data'>	
              <img src=images/${data[3]} class="product-image" />
  						<div class="product-detail">
  						  <h3>${data[2]}</h3>
  						  <h5>$ ${data[4]}</h5>
  						</div>
  						<div>
  								<a href='func/deleteData.php?action=delete_product&id=${data[0]}' class="delete"><i class="far fa-trash-alt"></i></a>
  							<a href='func/editProducts.php?action=edit_product&id=${data[0]}' class="see"><i class="far fa-eye"></i></a>
  						</div>
  					</li>`;  
  }).join(' ');
  products.innerHTML = htmlString;
}

function displayOrders(datas){
 const orders = document.querySelector('.orders');
  let htmlString = datas.map(data => {
         return `<li class="data order">
  					  <div class='orders-detail'>
  					  	<h3>${data[2]}</h3>
  					  	<h3>Total: $ ${data[6]}.00</h3>
  						</div>
  						<div class='orders-detail'>
  					  	<h3>${data[1]}</h3>
  					  	<h3>Quantity: ${data[4]}</h3>
  					  </div>
  						<div>
  						<a href='func/deleteData.php?action=delete_order&id=${data[0]}' class="delete"><i class="far fa-trash-alt"></i></a>
  							<a href='func/editOrders.php?action=edit_order&id=${data[0]}' class="see"><i class="far fa-eye"></i></a>
  						</div>
  					</li>`;  
  }).join(' ');
  orders.innerHTML = htmlString;
}

// call a fucntion for displaying data
getUsers('getUsers');
getAdmins('getAdmins');
getProducts('getProducts');
getOrders('getOrders');

const side = document.querySelectorAll('.side');
let dataContainer = document.querySelectorAll('.data-container');
let usersContainer = document.querySelector('.users-container');
let adminsContainer = document.querySelector('.admins-container');
let productsContainer = document.querySelector('.products-container');
let ordersContainer = document.querySelector('.orders-container');
let dashboard = document.querySelector('.dashboard');

function displayCon(param,e) {
   return displayDiv(param,e);
}

function displayDiv(param,e){
  console.log('click');
    for (let i = 0; i < side.length; i++) {
        side[i].classList.remove('active')
      }
      sideMenu.classList.remove('active-side');
      e.classList.add('active');
     for (let i = 0; i < dataContainer.length; i++) {
        dataContainer[i].style.display = 'none';
     }
     if (param == 'users') {
       usersContainer.style.display = 'block';
     }
     else if(param == 'dashboard') {
       dashboard.style.display = 'block';
     }
     else if(param == 'admins') {
       adminsContainer.style.display = 'block';
     }
     else if(param == 'orders') {
       ordersContainer.style.display = 'block';
     }
     else if(param == 'products') {
       productsContainer.style.display = 'block';
     }
}

//search users
 let userSearch = document.querySelector('.user-search');
 userSearch.addEventListener('keyup', e => {
   let userValue = e.target.value;
   const filteredNames = userNames.filter(dataName => {
     return dataName[2].includes(userValue);
   });
   displayUsers(filteredNames);
 });

//search admins
let adminSearch = document.querySelector('.admin-search');
adminSearch.addEventListener('keyup', e => {
   let adminValue = e.target.value;
   console.log(adminValue);
   const filteredNames = adminNames.filter(dataName => {
     return dataName[2].includes(adminValue);
   });
   displayAdmins(filteredNames);
});

//search products
let productSearch = document.querySelector('.product-search');
productSearch.addEventListener('keyup', e => {
   let productValue = e.target.value;
   const filteredNames = productNames.filter(dataName => {
     return dataName[2].includes(productValue);
   });
   displayProducts(filteredNames);
});

//search orders
let orderSearch = document.querySelector('.order-search');
orderSearch.addEventListener('keyup', e => {
   let orderValue = e.target.value;
   const filteredNames = ordersNames.filter(dataName => {
     return dataName[2].includes(orderValue);
   });
   displayOrders(filteredNames);
});

//show user form 
let addUserButton = document.querySelector('.add-user');
let addUserForm = document.querySelector('.add-user-form');
addUserButton.addEventListener('click', () => {
  addUserForm.classList.add('active-form');
});

//show admin form
let addAdminButton = document.querySelector('.add-admin');
let addAdminForm = document.querySelector('.add-admins-form');
addAdminButton.addEventListener('click', () => {
  addAdminForm.classList.add('active-form');
});

//show product form
let addProductButton = document.querySelector('.add-product');
let addProductForm = document.querySelector('.add-product-form');
addProductButton.addEventListener('click', () => {
  addProductForm.classList.add('active-form');
});

//show order form
let addOrderButton = document.querySelector('.add-order');
let addOrderForm = document.querySelector('.add-orders-form');
addOrderButton.addEventListener('click', () => {
  addOrderForm.classList.add('active-form');
});

//cancel form
let cancels = document.querySelectorAll('.cancel');
for (let i = 0; i < cancels.length; i++) {
  let form = document.querySelectorAll('.form');
  cancels[i].addEventListener('click', () => {
    addProductForm.classList.remove('active-form');
    addAdminForm.classList.remove('active-form');
    addUserForm.classList.remove('active-form');
   addOrderForm.classList.remove('active-form');
  })
}

//send form using ajax
//send user form
let addUser = document.querySelector('#add_user');
let userFormData = document.querySelector('#user-form-data');

userFormData.addEventListener('submit', e => {
  e.preventDefault();
})

addUser.addEventListener('click', () => {
  let xhttp = new XMLHttpRequest();
  xhttp.onload = () => {
    if(xhttp.readyState === XMLHttpRequest.DONE ) {
      if(xhttp.status == 200) {
        alert('success')
        addUserForm.classList.remove('active-form');
      }
    } else{
      alert('Failed');
    }
  }
  xhttp.open('POST', 'func/sendUser.php', true);
  let newform = new FormData(userFormData);
  xhttp.send(newform);
  
  setInterval(() => {
   fetch(`func/getUsers.php`)
    .then(response => response.json())
    .then(datas => {
     displayUsers(datas);
    })
  },500)
})

//send admin form
let addAdmin = document.querySelector('#add_admin');
let adminFormData = document.querySelector('#admin-form-data');

adminFormData.addEventListener('submit', e => {
  e.preventDefault();
})

addAdmin.addEventListener('click', () => {
  let xhttp = new XMLHttpRequest();
  xhttp.onload = () => {
    if(xhttp.readyState === XMLHttpRequest.DONE ) {
      if(xhttp.status == 200) {
        alert('success')
        addAdminForm.classList.remove('active-form');
      }
    } else{
      alert('Failed');
    }
  }
  xhttp.open('POST', 'func/sendAdmin.php', true);
  let newform = new FormData(adminFormData);
  xhttp.send(newform);
  
  setInterval(() => {
   fetch(`func/getAdmins.php`)
    .then(response => response.json())
    .then(datas => {
     displayAdmins(datas);
    })
  },500)
})

//send products form
let addProducts = document.querySelector('#add_products');
let productFormData = document.querySelector('#product-add-data');

productFormData.addEventListener('submit', e => {
  e.preventDefault();
})

addProducts.addEventListener('click', () => {
  let xhttp = new XMLHttpRequest();
  xhttp.onload = () => {
    if(xhttp.readyState === XMLHttpRequest.DONE ) {
      if(xhttp.status == 200) {
        alert('Success!');
        addProductForm.classList.remove('active-form');
      }
    } else{
      alert('Failed');
    }
  }
  xhttp.open('POST', 'func/sendProducts.php', true);
  let newform = new FormData(productFormData);
  xhttp.send(newform);
  
  setInterval(() => {
   fetch(`func/getProducts.php`)
    .then(response => response.json())
    .then(datas => {
     displayProducts(datas);
    })
  },500)
})

//send orders form
let addOrder = document.querySelector('#add_order');
let orderFormData = document.querySelector('#order-add-data');

orderFormData.addEventListener('submit', e => {
  e.preventDefault();
})

addOrder.addEventListener('click', () => {
  let xhttp = new XMLHttpRequest();
  xhttp.onload = () => {
    if(xhttp.readyState === XMLHttpRequest.DONE) {
      if(xhttp.status == 200) {
        alert('Success!');
        addOrderForm.classList.remove('active-form');
      }
    } else{
      alert('Failed');
    }
  }
  xhttp.open('POST', 'func/sendOrders.php', true);
  let newform = new FormData(orderFormData);
  xhttp.send(newform);
  
  setInterval(() => {
   fetch(`func/getOrders.php`)
    .then(response => response.json())
    .then(datas => {
     displayOrders(datas);
    })
  },500)
})

const inputs = document.querySelectorAll('input');

for (let i = 0; i < inputs.length; i++) {
  inputs[i].setAttribute('readonly', 'true');
}