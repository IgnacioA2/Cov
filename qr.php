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
    require 'phpqrcode/qrlib.php';
$dir = 'temp/';

if(!file_exists($dir))
    mkdir($dir); //sin no existe la carpeta la crea

$filename = $dir.'qr.png';
$tamanio = 5; //tamaño de lam imagen
$level = 'L'; 
$frameSize = 10;
//$cont =  "Bienvenido: ".$row["nombre_completo"];
$contenido =  "";

QRcode::png( $contenido, $filename, $level, $tamanio, $frameSize);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BIENVENIDO...</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/7d4ed45581.js" crossorigin="anonymous"></script>
  <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">-->
  <link rel="stylesheet" href="css/style3.css"> 
</head>
<body >
   
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
<br>
<br>
<br>

<main class="container">
   <br>
<!--echo"<div class='container text-center'>";
          echo"<div class='row align-items-center'>";
          echo"<div class='col'>";
          echo"<img src='media/15.png' class='img-thumbnail' alt='...'>";
          echo'One of three columns';
          echo"</div>";
          echo"<div class='col'>";
          echo"<img src='media/lavatusmanos.png' class='img-thumbnail' alt='...'>";
          echo'One of three columns';
          echo"</div>";
          echo"<div class='col'>";
          echo"<img src='media/asegurate.png' class='img-thumbnail' alt='...'>";
          echo'One of three columns';
          echo"</div>";
          echo"</div>";
          echo"</div>";-->
<h3>Reglas básicas para el cuidado</h3>
  <div class="container text-center">
      <div class="row align-items-center">
        <div class="col">
        <img src='media/15.png' class='img-thumbnail' alt='...'>
           1
        </div>
        <div class="col">
        <img src='media/lavatusmanos.png' class='img-thumbnail' alt='...'>
            2
        </div>
        <div class="col">
        <img src='media/asegurate.png' class='img-thumbnail' alt='...'>
            3
        </div>
      </div>
  </div>



<div class="container text-center">
  <div class="row">
    <h5>Los posibles síntomas incluyen:</h5>
        <div class="col-sm-5 col-md-6">
          <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                <p class="mb-1">Fiebre o escalofríos</p>
              
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                <p class="mb-1">Tos</p>
               
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                <p class="mb-1">Dificultad para respirar</p>
         
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                <p class="mb-1">Fatiga</p>
             
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                <p class="mb-1">Dolores musculares y corporales</p>
                
              </a>
        </div>
      </div>
      <div class="col-sm-5 col-md-6">
        <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                  <p class="mb-1">Pérdida reciente del olfato o el gusto</p>

              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                  <p class="mb-1">Dolor de garganta</p>
                
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                  <p class="mb-1">Congestión o moqueo</p>
                  
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                  <p class="mb-1">Náuseas o vómitos</p>
                  
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"></h5>
                  <small class="text-body-secondary"></small>
                </div>
                  <p class="mb-1">Diarrea</p>
                
              </a>
        </div>
      </div>
  </div>
</div>

<br>
<!--
<div class="ratio ratio-16x9" >
  <iframe width="560" height="315" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
</div> -->

</main>

</body>
</html>

 
