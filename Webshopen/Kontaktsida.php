<?php
    require_once ('database.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Heroic Features - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Webshopen</a>
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
            <a class="nav-link" href="Kontaktsida.php">Contact </a>
            <a class="nav-link" href="Read_messages.php">Adminpage</a>

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr>

<form action= "#" method = "post">
<fieldset>
    <legend> Form for contact</legend>
    <label for="namn"> Name </label>
            <input type="text" name="namn"><br>
            <label for ="E-post"> Email </label>
            <input type="email" name="epost"><br>
            <p> Your messasge</p>
            <textarea name="Meddelande" cols="30" rows="5"></textarea>
            <input type="submit" name="submit"  value="Send">
            </fieldset>
    
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
$epost=$_POST['epost'];
        if (filter_var($epost, FILTER_VALIDATE_EMAIL) === false) {
          echo "Wrong email";
   }
         //Nedan sker sakerhetsopitimering av variablerna.  
        $namn =htmlspecialchars($_POST['namn']);
        $meddelande =htmlspecialchars ($_POST['Meddelande']);

        $namn=filter_var($namn, FILTER_SANITIZE_STRING);
        $meddelande = filter_var($meddelande, FILTER_SANITIZE_STRING);

        $statement = $conn->prepare("INSERT INTO 
            contact(names,email,messages )
            VALUES(:namn,:epost,:Meddelande)");
            $statement->bindValue(':namn',$namn);
            $statement->bindValue(':epost',$epost);
            $statement->bindValue(':Meddelande',$meddelande);
            $statement->execute();
            echo "Your messasge has been sent. The messasge is:<br>$meddelande.<hr>";
        }
            
        ?>
    <hr> 
    <h1> The creaters of this webpage are:</h1>
    <p> Marcus Kringberg ,marcus.kringberg@gmail.com</p>
    <p> Sharmaarke shiik,sharmaarke.shiik@gmail.com</p>
    <img src="bild_pa_Sharre.jpg" alt="bild på Sharre" width="200" height="200" id="image" onmouseover="Visa_Marcus()" onmouseout="Visa_Sharre()">

    <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Webshopen 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="move_pictures.js"></script>
</body>
</html>