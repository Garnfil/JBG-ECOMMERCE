<?php 
session_start();
include 'inc/length.php';

if ($_SESSION['username'] == '') {
  header('location: admin-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>JBG - ADMIN</title>
  <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  
  <div class="wrapper">
  	
  	<div class="menu">
  	  <div class="line"></div>
  	  <div class="line"></div>
  	  <div class="line"></div>
  	</div>
  	
  		<!-- SIDE MENU -->
  		<div class="side-menu">
  			<div class="profile">
  				<h6><?php echo $_SESSION['username'] ?></h6>
  				<div class="circle"></div>
  			</div>
  			<div class="side-buttons">
  				<button class="side active" onclick="displayCon('dashboard',this)">Dashboard</button>
  				<button class="side" onclick="displayCon('users',this)">Users</button>
  				<button class="side" onclick="displayCon('admins',this)">Admins</button>
  				<button class="side" onclick="displayCon('orders',this)">Orders</button>
  				<button class="side" onclick="displayCon('products',this)">Products</button>
  				<button class="side logout"><a href="inc/config.php?action=logout">Logout</a></button>
  			</div>
  		</div>
  		
  		<!-- DASHBOARD -->
  		<div class="dashboard data-container">
  			<div class="dashboard-content">
  				<div class="dash">
  					<div>
  						<h1>Users</h1>
  						<h2><?php echo $users_length ?></h2>
  					</div>
  				</div>
  				<div class="dash">
  					<div>
  						<h1>Admins</h1>
  						<h2><?php echo $admins_length ?></h2>
  					</div>
  				</div>
  				<div class="dash">
  					<div>
  						<h1>Orders</h1>
  						<h2><?php echo $orders_length ?></h2>
  					</div>
  				</div>
  				<div class="dash">
  					<div>
  						<h1>Products</h1>
  						<h2><?php echo $products_length ?></h2>
  					</div>
  				</div>
  			</div>
  			<div id="graph"></div>
  		</div>
  		<!-- DASHBOARD -->
  		
  		<!-- USERS -->
  		<div class="data-container users-container">
  			
  		 <div class="form add-user-form">
  				<div class="user-form">
  					<h2>Add User</h2>
  					<form action='' id="user-form-data">
  						<input type="text" name="fullname" id="fname" placeholder="Fullname..." required>
  						<input type="email" name="email" id="email" placeholder="Email..." required>
  						<input type="password" name="password" placeholder="Password..." id="password" required>
  						<button class="submit-form" id="add_user" type="submit">Submit</button>
  						<button type="button" class="cancel">Cancel</button>
  					</form>
  				</div>
  			</div>  
  			
  			<div class="data-head users-head">
  				<h1>All users</h1>
  				<button class="add-data add-user">Add User</button>
  			</div>
  			<div class="data-content users-content">
  				<div class="search-div">
  					<input class="search user-search" placeholder="Search..." type="text">
  					<button class="search-btn"><i class="fas fa-search"></i></button>
  				</div>
  				<ul class="datas users">
  			</ul>
  		</div>
  	</div>
  		<!-- USERS -->
  		
  		<!-- ADMINS -->
  		<div class="data-container admins-container">
  			
  			<div class="form add-admins-form">
  				<div class="user-form">
  					<h2>Add Admin</h2>
  					<form id="admin-form-data">
  						<input type="text" name="user_name" id="fname" placeholder="Username..." required>
  						<input type="email" name="email" id="email" placeholder="Email..." required>
  						<input type="password" name="password" placeholder="Password..." id="password" required>
  						<button class="submit-form" id="add_admin" type="submit">Submit</button>
  						<button type="button" class="cancel">Cancel</button>
  					</form>
  				</div>
  			</div>
  			
  			<div class="data-head admins-head">
  				<h1>All admins</h1>
  				<button class="add-data add-admin">Add admin</button>
  			</div>
  			<div class="data-content admin-content">
  				<div class="search-div">
  					<input class="search admin-search" placeholder="Search..." type="text">
  					<button class="search-btn"><i class="fas fa-search"></i></button>
  				</div>
  				<ul class="datas admins">
  				</ul>
  			</div>
  		</div>
  		
  		<!-- ADMINS -->
  		
  		<!-- ORDERS -->
  		<div class="data-container orders-container">
  			
  			<!-- ADD ORDER FORM -->
  			<div class="form add-orders-form">
  				<div class="orders-form">
  					<h2>Add order</h2>
  					<form id="order-add-data">
  						<input type="text" name="item_name" id="item_name" placeholder="Item Name..." required>
  						<input type="radio" class="radio" name="size" value="S"/>
  						<label>S</label>
  						<input type="radio" class="radio" name="size" value="M" />
  						<label>M</label>
  						<input type="radio" class="radio" name="size" value="L" />
  						<label>L</label>
  						<input type="text" name="quantity" id="quantity" placeholder="Quantity" required>
  						<input type="text" name="price" id="price" placeholder="Price..." required>
  						<input type="text" name="product_id" id="product_id" placeholder="Product ID..." required>
  						<input type="text" name="customer_id" id="customer_id" placeholder="Customer ID..." required>
  						<input type="text" name="customer_name" id="customer_name" placeholder="Customer's Name..." required>
  						<input type="text" name="customer_address" id="customer_address" placeholder="Customer Address.." required>
  						<input type="text" name="phone" id="phone" placeholder="Contact Number..." required>
  							<div>
  						<button class="submit-form" id="add_order" type="submit">Submit</button>
  						<button type="button" class="cancel">Cancel</button>
  						</div>
  					</form>
  				</div>
  		  </div>
  			<!-- ADD ORDER FORM -->
  			
  			<div class="data-head orders-head">
  				<h1>All orders</h1>
  				<button class="add-data add-order">Add orders</button>
  			</div>
  			<div class="data-content orders-content">
  				<div class="search-div">
  					<input class="search order-search" placeholder="Search..." type="text">
  					<button class="search-btn"><i class="fas fa-search"></i></button>
  				</div>
  				<ul class="datas orders">
  				</ul>
  			</div>
  		</div>
  		<!-- ORDERS -->
  		
  		<!-- PRODUCTS -->
  		<div class="data-container products-container">
  				
  				<!-- ADD PRODUCTS -->
  				<div class="form add-product-form">
  					<div class="orders-form">
  					<h2>Add products</h2>
  					<form action="func/sendProducts.php" id="product-add-data" enctype="multipart/form-data">
  						<input type="text" name="add_product_name" id="add_product_name" placeholder="Products Name...">
  						<input type="text" name="add_product_id" id="add_product_id" placeholder="Product ID...">
  						<input type="file" name="add_product_image" id="add_product_image" placeholder="Add Image...">
  						<input type="text" name="add_product_price" id="add_product_price" placeholder="Price..." />
  						<button class="submit-form" name="add_products" id="add_products" type="submit">Submit</button>
  						<button type="button" class="cancel">Cancel</button>
  					</form>
  				</div>
  				</div>
  				<!-- ADD PRODUCTS -->
  				
  			<div class="data-head products-head">
  				<h1>All products</h1>
  				<button class="add-data add-product">Add products</button>
  			</div>
  			<div class="data-content products-content">
  				<div class="search-div">
  					<input class="search product-search" placeholder="Search..." type="text">
  					<button class="search-btn"><i class="fas fa-search"></i></button>
  				</div>
  				<ul class="datas products">
  				</ul>
  			</div>
  		</div>
  		<!-- PRODUCTS -->
    </div>
    
  <script src="js/main.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total'],
          ['Products',     <?php echo $products_length ?>],
          ['Orders',      <?php echo $orders_length ?>],
          ['Users',       <?php echo $users_length ?>],
        ]);

        var options = {
          title: 'Total Percentage',
          is3D: true,
          backgroundColor: {fill:'transparent'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('graph'));
        chart.draw(data, options);
      }
    </script>
</body>
</html>
