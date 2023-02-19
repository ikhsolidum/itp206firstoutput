<?php
include 'pdb.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($conn, $sql);
if (!$result) {
  echo "Error: " . mysqli_error($conn);
}
else {
  $row = mysqli_fetch_assoc($result);
}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if ($stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id=?")) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', description='$description', price=$price WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header('Location: pindex.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
      h1{
        color: white;
      }
      label {
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
<div style="padding-left:670px">
    <h1>Edit Product</h1>
</div>

<div style="padding-left:680px">
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        
        <label>Description:</label><br>
        <textarea name="description"><?php echo $row['description']; ?></textarea><br>
       
        <label>Price:</label><br>
        <input type="number" name="price" value="<?php echo $row['price']; ?>"><br><br>
        <input type="submit" value="Save">
</div>
    </form>
</body>
</html>