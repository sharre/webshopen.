<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<body>
<div class="container">

<!-- Jumbotron Header -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Webshoppen</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="Kontaktsida.php">Contact</a>
            <a class="nav-link" href="Read_messages.php">Adminpage</a>

          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Page Features -->
<div class="row text-center">
</div>
<!-- /.row -->
</div>
<!-- /.container -->
<br>
<hr>

<?php
require_once ('arrays.php');
require_once ('database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_from_form = $_POST['name'];
$email = $_POST['Email'];
$adress =$_POST['adress'];
$phone_number = $_POST['phone_number'];
$product_id = $_POST['product_id'];
    
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
              echo "Wrong email";
              die;}
            
              //Nedan sker sakerhetsopitimering av variablerna.  
            $name_from_form =htmlspecialchars($_POST['name']);
            $phone_number =htmlspecialchars ($_POST['phone_number']);
            $adress = htmlspecialchars($_POST['adress']);

            $name_from_form=filter_var($name_from_form, FILTER_SANITIZE_STRING);
            $phone_number=filter_var($phone_number, FILTER_SANITIZE_STRING);
            $adress=filter_var($adress, FILTER_SANITIZE_STRING);
    }
if(empty($name_from_form)){
    
    $name_error = "A name must be filled in to send data ";
    echo $name_error;
    die;}

    if(empty($email)){
       
        $email_error = "An emailadress must be filled in to send data";
        echo $email_error;
        die;}
        if(empty($adress)){
            $adress_error = "An adress must be filled in to send data";
            echo $adress_error;
            die;}

            if(empty($phone_number)){
                $phone_number_error = "A phone number must be filled in to send data";
                echo $phone_number_error;
                die;}

$store_of_costumers = $conn->prepare("INSERT INTO customers(names,email,addresses,phone)
VALUES('$name_from_form','$email','$adress','$phone_number')");
$store_of_costumers->execute();
$customers_id = $conn->lastInsertId();
$store_of_order=  $conn->prepare("INSERT INTO orders(product_id,customer_id)
VALUES('$product_id','$customers_id')");
$store_of_order->execute();
$order_id= $conn->lastInsertId();
echo " Hi $name_from_form<br>The order of your product is completed. Your order number is $order_id.<br> Your order is been deliverd to $adress  ";

?>
<br>
<br>
<hr>
<footer class="py-5 bg-dark">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Webshopen 2021</p>
</div>
<!-- /.container -->
</footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>