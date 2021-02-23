<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
</head>
<body>
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
  <hr>


<?php
    require_once ('database.php');
    $id = $_GET['id'];
    $show_product = "SELECT * FROM  products WHERE product_id=:product_id";
    $statement=$conn->prepare($show_product);
    $statement->bindValue(':product_id', $id);
    $statement->execute();
    $product= $statement->fetchall();
    foreach($product as $key => $value){
      echo "<br>";
        echo $value['name'];
        echo"<br>";
        echo $value['description'];
        echo"<br>";

        echo $value['price']."kr";
    echo "<br>";
  } 

    ?>
<form action="Lagra_bestallning.php" method="post">
        <fieldset>
            <legend> Order form</legend>
            <label for="name"> Name </label>
            <input type="text" name="name"><br>
            <label for="Email"> Email </label>
            <input type="text" name="Email" > <br>
            <lable for="adress"> Adress </label>
            <input type="text" name="adress"><br>
            <label for="phone_number"> Phone number </label>
            
            <input type="text" name="phone_number"><br>
            <input type="hidden" name="product_id" value="<?php echo $id?>">
            <input type="submit" name="submit" id="button" value="Send order">
        </fieldset>
    </form>
    <hr>
    <!-- Footer -->
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