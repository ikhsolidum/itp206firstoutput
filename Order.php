<html>
    <head>
      <title>Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
          table {
            color: white;
          }
          h1 {
            color: white;
          }
          body {
  background-image: url('homebackground.png');
}
          body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: brown;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
            </style>
    </head>
    
    <body>
    <div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="products.php">Products</a>
  <a href="order.php">Order</a>

  <a href="Logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<div style="padding-left:850px">
<h1>Input Orders</h1>
</div>


<div style="padding-left:800px">
<table border="2">
  <form method="POST" action="orders.php">
    <tr>
      <td><label for="name">Name:</label></td>
      <td><input type="text" id="username" name="name" value=""></td>
    </tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input type="text" id="email" name="email" value=""></td>
    </tr>
    <tr>
      <td><label for="product">Product ID:</label></td>
      <td><input type="text" id="product" name="productid" value=""></td>
    </tr>
    <tr>
      <td><label for="quantity">Quantity:</label></td>
      <td><input type="text" id="quantity" name="quantity" value=""></td>
      
    </tr>
    
    <tr>
    <td colspan="2"><input type="submit" value="Submit"></td>
    </tr>
  </form>
  
</table>

      
   
</div>

    </body>
    
</html>
