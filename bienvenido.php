<?php 
    include 'php/conn.php';
    session_start(); //inicializando la sesion
   
    if(!isset($_SESSION['usuario'])){ //si no existe la variable de seion usuario ejcuta el sig cod
        echo ' 
            <script>
                alert("Debes iniciar sesión");
                window.location = "login.php";
            </script>
        '; //al no encontrar sesion se ejecuta el codigo de arriba
        //window.location - redirigamen a la pagina de login
        session_destroy(); //destruye cualquier sesion que exista
        die(); //el copdigo de abajo no se ejecute

    }
   
   /* $result = mysqli_query($conn, $querySQL);
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    }*/
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
  <title>BIENVENIDO...</title>
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
              <a class="nav-link" href="read.php">Perfil</a>
        </form>
        </ul>

        
      </form>
        <form class="d-flex" role="search">
              <a class="nav-link" href="php/cerrar_sesion.php">Cerrar sesión </a>
        </form>
        <br>
      </div>
  </div>
</nav>
<br>
<main class="container">
  <br><br><br>
  
  <h4><strong>Bienvenido: <?php 
  if($row){
    echo $row['nombre_completo'];
  }
  else if($row2){
    echo $row2['nombre_completo'];
  }
  else if($row3){
    echo $row3['nombre_completo'];
  }
 
  
  ?></strong></h4>
  <br>

  <div class="iconos container overflow-hidden text-center">
    
      <div class="row row-cols-2" id="row1">
        <div class="col col1"> <div><br></div>  
            <a class="ico-fa" href="read.php">
            <i class="fa-solid fa-gear fa-spin fa-2xl"></i>
            <a class="icon-gear" href=""></a>
            </a><p><br><strong>Perfil</strong></p>
        </div>
        <div class="col">  <div><br></div> 
            <a class="ico-fa" href="update.php"> 
            <i class="fa-solid fa-regular fa-pen-to-square fa-fade fa-2xl"></i>
            </a><p><br><strong>Actualizar</strong></p>
        </div>
        <div class="col">
            <a class="ico-fa" href="qr.php">
            <i class="fa-solid fa-eye fa-2xl"></i>
            </a><p><br><strong>Información</strong></p>
        </div>
        <div class="col">
            <a class="ico-fa" href="encuesta.php"> 
            <i class="fa-solid fa-square-poll-horizontal fa-beat fa-2xl" ></i> 
            </a><p><br><strong>Encuesta</strong></p>
        </div>
        <div class="col">
            <a class="ico-fa" href="" data-bs-toggle="modal" data-bs-target="#exampleModal"> 
            <i class="fa-solid fa-trash-can fa-fade fa-2xl"></i>
            </a><p><br><strong>Delete account</strong></p>
        </div>

        <form action="delete.php" method="POST" class="formulario__login">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMINAR CUENTA</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <div class="modal-body">
                              <?php 
                                    if($row){
                                      
                                      echo"<select name='rol' id='rol' class='form-select' 
                                      style= 'background: #F2F2F2;' required>";
                                      echo"<option value='Alumno'>Alumno: </option>";                                      
                                      echo"</select>";
                                      echo $row['nombre_completo'];
                                    }
                                    else if($row2){
                                     
                                      echo"<select name='rol' id='rol' class='form-select' 
                                      style= 'background: #F2F2F2;' required>";
                                      echo"<option value='Administrativo'>Administrativo: </option>";                                     
                                      echo"</select>";
                                      echo $row2['nombre_completo'];
                                    }   
                                    else if($row3){
                                      echo"<form action='delete.php' method='POST' class='formulario__login'>";
                                      echo"<label for='rol'></label></label>";
                                      echo"<select name='rol' id='rol' class='form-select' 
                                      style= 'background: #F2F2F2;' required>";
                                      echo"<option value='Docente'>Docente: </option>";
                                      echo"</select>";
                                      echo $row3['nombre_completo'];
                                    }        
                              ?>
                si esto ocurre se elminara toda tu información ¿Quieres continuar con la eliminación de tu cuenta?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" >Acepto</button>
              </div>
            </div>
          </div>
        </div>
        </form>

      </div>
  </div>

  <br>

</main>
<div class="social">
  <ul>
    <li><a href="https://www.facebook.com/TecAjalpan/" class="icon-facebook" target="_blank" ><i class="fa-brands fa-facebook fa-sm" style="color: #fff;"></i></a></li>
    <li><a href="https://www.youtube.com/channel/UCSMzEmEsWBEI3Tt1ppXPXFQ" class="icon-youtube" target="_blank"><i class="fa-brands fa-youtube fa-sm"></i></a></li>
    <li><a href="https://twitter.com/tec_de_ajalpan" class="icon-twitter" target="_blank"><i class="fa-brands fa-twitter fa-sm"></i></a></li>
    <li><a href="https://www.instagram.com/camaleon.itssna/?hl=es" class="icon-instagram" target="_blank"><i class="fa-brands fa-instagram fa-sm"></i></a></li>
  </ul>
</div>


<!--<script>
function ConfirmDemo() {
    //Ingresamos un mensaje
    var mensaje = confirm("¿Estas seguro de que quuieres eliminar tu cuenta?");
    //Verificamos si el usuario acepto el mensaje
    if (mensaje) {
    alert("¡Gracias por confirmar!");
   
    }
    //Verificamos si el usuario denegó el mensaje
    else {
    alert("¡Haz denegado el mensaje!");
    }
}
</script>-->
</body>

</html>