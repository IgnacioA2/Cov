<?php 
include 'php/conn.php';
    session_start(); //inicializando la sesion
    
    if(!isset($_SESSION['usuario'])){ //si no existe la variable de seion usuario ejcuta el sig cod
        echo ' 
            <script>
                alert("Debes iniciar sesión");
                window.location = "index.php";
            </script>
        '; //al no encontrar sesion se ejecuta el codigo de arriba
        //window.location - redirigamen a la pagina de login
        session_destroy(); //destruye cualquier sesion que exista
        die(); //el copdigo de abajo no se ejecute

    }
    $idmatricula =  $_SESSION['usuario'];
   
    $querySQL = "SELECT * FROM usuario_registro WHERE numero_control = '$idmatricula'";
    $result = $conn->query($querySQL);
    $row = $result->fetch_assoc();

    $querySQL2 = "SELECT * FROM administrativo_registro WHERE numero_control = '$idmatricula'";
    $result2 = $conn->query($querySQL2);
    $row2 = $result2->fetch_assoc();

    $querySQL3 = "SELECT * FROM docente_registro WHERE numero_control = '$idmatricula'";
    $result3 = $conn->query($querySQL3);
    $row3 = $result3->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7d4ed45581.js" crossorigin="anonymous"></script>
  <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" >
  <div class="container-fluid">
        <img src="media/logocovid.jpg" alt="" href="media/logocovid.jpg" width="120px" height="60px">
      <button class="navbar-toggler" style="background-color: rgba(205, 37, 37, 0.822);" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
        <form class="d-flex" role="search">
              <a class="nav-link" href="bienvenido.php">Inicio</a>
        </form>
        </ul>
        <form class="d-flex" role="search">
              <a class="nav-link" href="php/cerrar_sesion.php">Cerrar sesión </a>
        </form>
        <br>
      </div>
  </div>
</nav>

<main class='container'>
    <br><br><br>
    <h2 style="color: #1B396A"><center>PERFIL</center></h2>
<?php
   echo"</br>";
    
   if($row){
    echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-id-card fa-lg' style='color: #0e65fb;'></i> Número de control: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["numero_control"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-user fa-lg' style='color: #0e65fb;'></i> Nombre completo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["nombre_completo"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-envelope fa-lg' style='color: #0e65fb;'></i> Correo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["correo"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-building fa-lg' style='color: #0e65fb;'></i> Cargo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["rol"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-graduation-cap fa-lg' style='color: #0e65fb;'></i> Carrera: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["carrera"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-rectangle-list fa-lg' style='color: #0e65fb;'></i> Semestre: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["semestre"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       /*echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-unlock-keyhole fa-lg' style='color: #0e65fb;'></i> Contraseña: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["conf"]; echo "</label>";
       echo "</div>";
       echo "</div>";*/
       
       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-mobile-screen-button fa-lg' style='color: #0e65fb;'></i>
       Telefono: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["telefono"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-location-arrow fa-lg' style='color: #0e65fb;'></i>
        Dirección: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["direccion"]; echo "</label>";
       echo "</div>";
       echo "</div>";
   }

   if($row2){
    echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-id-card fa-lg' style='color: #0e65fb;'></i> Número de control: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>"; 
       echo " <label for='floatingInputGroup1'>"; echo $row2["numero_control"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-user fa-lg' style='color: #0e65fb;'></i> Nombre completo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row2["nombre_completo"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-envelope fa-lg' style='color: #0e65fb;'></i> Correo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row2["correo"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-building fa-lg' style='color: #0e65fb;'></i> Cargo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row2["rol"]; echo "</label>";
       echo "</div>";
       echo "</div>";

      

       /*echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-unlock-keyhole fa-lg' style='color: #0e65fb;'></i> Contraseña: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["conf"]; echo "</label>";
       echo "</div>";
       echo "</div>";*/
       
       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-mobile-screen-button fa-lg' style='color: #0e65fb;'></i>
       Telefono: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row2["telefono"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-location-arrow fa-lg' style='color: #0e65fb;'></i>
        Dirección: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row2["direccion"]; echo "</label>";
       echo "</div>";
       echo "</div>";
   }
   
   if($row3){
    echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-id-card fa-lg' style='color: #0e65fb;'></i> Número de control: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>"; 
       echo " <label for='floatingInputGroup1'>"; echo $row3["numero_control"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-user fa-lg' style='color: #0e65fb;'></i> Nombre completo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row3["nombre_completo"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-envelope fa-lg' style='color: #0e65fb;'></i> Correo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row3["correo"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-regular fa-building fa-lg' style='color: #0e65fb;'></i> Cargo: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row3["rol"]; echo "</label>";
       echo "</div>";
       echo "</div>";

      

       /*echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-unlock-keyhole fa-lg' style='color: #0e65fb;'></i> Contraseña: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row["conf"]; echo "</label>";
       echo "</div>";
       echo "</div>";*/
       
       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-mobile-screen-button fa-lg' style='color: #0e65fb;'></i>
       Telefono: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row3["telefono"]; echo "</label>";
       echo "</div>";
       echo "</div>";

       echo "<div class='input-group mb-3'>";
       echo "<span class='input-group-text'><em><strong>
       <i class='fa-solid fa-location-arrow fa-lg' style='color: #0e65fb;'></i>
        Dirección: </strong></em></span>";
       echo "<div class='form-floating'>";
       echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>";
       echo " <label for='floatingInputGroup1'>"; echo $row3["direccion"]; echo "</label>";
       echo "</div>";
       echo "</div>";
   }
   
   ?>
   
<br> <br> <br> <br> 
</main>
<br> <br> 
</body>
</html>