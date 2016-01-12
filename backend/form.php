<?php 
  
  //--------------------------------------------------------------------------
  // 1) CREATE ORDER FORM TABLE IN DATABASE
  //--------------------------------------------------------------------------
  include 'DB.php';

// Create connection
$conn = new mysqli($host, $user, $pass, $databaseForm);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create new table in DDBB to store Order id and user data
$sql = "CREATE TABLE IF NOT EXISTS MarioOrtiz_sales (
  order_id varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  fullname varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  email varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  phone varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  address varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  city varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  state varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  country varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  product varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  shipping double NOT NULL,
  total double NOT NULL,
  PRIMARY KEY (order_id)
)";


  //--------------------------------------------------------------------------
  // 2) SUBMIT FORM AND POPULATE TABLE
  //--------------------------------------------------------------------------

  //Fetching Values from URL
  $orderid=$_POST['myorderid'];
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $country=$_POST['country'];
  $product=$_POST['product'];
  $shipping=$_POST['shipping'];
  $total=$_POST['total'];


  //Insert data into sales DDBB
  mysqli_query($conn,"INSERT INTO MarioOrtiz_sales (`order_id`,`fullname`,`email`,`phone`,`address`,`city`,`state`,`country`,`product`,`shipping`,`total`) 
    VALUES ('$orderid', '$fullname', '$email', '$phone', '$address', '$city', '$state', '$country', '$product', '$shipping', '$total')") or die
  (mysqli_error($conn));


  // DDBB Connection Closed
  $conn -> close(); 

  ?>


