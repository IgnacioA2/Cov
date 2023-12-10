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
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7d4ed45581.js" crossorigin="anonymous"></script>
  <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="css/style3.css">
    
</head>
<body > <br>

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

<main>
    <br><br><br>
<?php  
   //Registro-->
   
if($row){
    echo "<div class='iconos container d-grid gap-3 col-9 mx-auto'>";
      echo "<form action='php/actualizar.php' method='POST'  >";
                            echo "<h2>Actualizar su información</h2>";
            /*               
            echo"<div class='mb-3'> ";           
            echo"<input type='number'  class='form-control' placeholder='' id ='control' name='numero_control' disabled>"; 
            echo"</div>";*/
            echo "<div class='form-floating'>";
            echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>"; 
            echo " <label for='floatingInputGroup1'>"; echo $row["numero_control"]; echo "</label>";
            echo "</div>"; echo "<br>";

            echo"<div class='mb-3'> ";
            echo"<input type='text'  class='form-control' placeholder='Nombre completo' id='nombre_completo' name='nombre_completo' required>";
            echo"</div>";
            echo"<div class='mb-3'> ";
            echo"<input type='email'  class='form-control' placeholder='Correo Electronico' id='correo' name='correo' required>";
            echo"</div>";
            echo"<div class='mb-3'>";
              echo"<label for='rol' style= 'color: #848484;'></label>";
                              echo"<select name='rol' id='rol' class='form-select' 
                              style= 'background: #F2F2F2;' required>";
                              echo"<option value='Alumno'>Alumno</option>";
                              
                              echo"</select>";
          echo"</div>";

          echo"<div class='mb-3'>";
                
                    echo"<div class='row align-items-start'>";
                        echo"<div class='col'>";
                            
                                echo"<select name='carrera' id='carrea' class='form-select' 
                                style= 'background: #F2F2F2; ' required>";
                                echo"<option value='Ing. Sistemas Computacionles'>Ing. Sistemas Computacionles</option>";
                                echo"<option value='Ing. Administración'>Ing. Administración</option>";
                                echo"<option value='Ing. Electromécanica'>Ing. Electromécanica</option>";
                                echo"<option value='Ing. Industrial'>Ing. Industrial</option>";
                            echo"</select>";
                        echo"</div>";
                        echo"<div class='col'>";
                            
                                echo"<select name='semestre' id='semestre' class='form-select' 
                                style= 'background: #F2F2F2;' required>";
                                echo"<option value='1'>1</option>";
                                echo"<option value='2'>2</option>";
                                echo"<option value='3'>3</option>";
                                echo"<option value='4'>4</option>";
                                echo"<option value='5'>5</option>";
                                echo"<option value='6'>6</option>";
                                echo"<option value='7'>7</option>";
                                echo"<option value='8'>8</option>";
                                echo"<option value='9'>9</option>";
                                echo"<option value='10'>10</option>";
                                echo"<option value='11'>11</option>";
                                echo"</select>";
                        echo"</div>";
                        echo"</div>";
                
            echo"</div>";                

            
            echo"<div class='mb-3'>"; 
            echo"<input type='password'  class='form-control' placeholder='Contraseña' id='contraseña' name='contraseña' required>";
            echo"</div>";
            echo"<div class='mb-3'>"; 
            echo"<input type='password'  class='form-control' placeholder='Confirmar contraseña' id='conf_contraseña' name='conf_contraseña' required>";
            echo"</div>";
            echo"<div class='mb-3'>"; 
            echo"<input type='number'  class='form-control' placeholder='Telefono' id='tel' name='telefono' required>";
            echo"</div>";
            echo"<div class='mb'>"; 
            echo"<input type='text'  class='form-control' placeholder='Dirección' id='n' name='direccion' required>";
            echo"</div>";
            echo"<center><button type='submit'  > Actualizar</button></center>";
            echo"<br>";
      echo"</form>";
    echo"</div>";
}
else if($row2){
  echo "<div class='iconos container d-grid gap-3 col-9 mx-auto'>";
    echo "<form action='php/actualizar.php' method='POST'  >";
                          echo "<h2>Actualizar su información</h2>";
          /*               
          echo"<div class='mb-3'> ";           
          echo"<input type='number'  class='form-control' placeholder='' id ='control' name='numero_control' disabled>"; 
          echo"</div>";*/
          echo "<div class='form-floating'>";
          echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>"; 
          echo " <label for='floatingInputGroup1'>"; echo $row2["numero_control"]; echo "</label>";
          echo "</div>"; echo "<br>";

          echo"<div class='mb-3'> ";
          echo"<input type='text'  class='form-control' placeholder='Nombre completo' id='nombre_completo' name='nombre_completo' required>";
          echo"</div>";
          echo"<div class='mb-3'> ";
          echo"<input type='email'  class='form-control' placeholder='Correo Electronico' id='correo' name='correo' required>";
          echo"</div>";
          echo"<div class='mb-3'>";
            echo"<label for='rol' style= 'color: #848484;'></label>";
                            echo"<select name='rol' id='rol' class='form-select' 
                            style= 'background: #F2F2F2;' required>";
                            
                            echo"<option value='Administrativo'>Administrativo</option>";
                            
                            echo"</select>";
        echo"</div>";
           

          
          echo"<div class='mb-3'>"; 
          echo"<input type='password'  class='form-control' placeholder='Contraseña' id='contraseña' name='contraseña' required>";
          echo"</div>";
          echo"<div class='mb-3'>"; 
          echo"<input type='password'  class='form-control' placeholder='Confirmar contraseña' id='conf_contraseña' name='conf_contraseña' required>";
          echo"</div>";
          echo"<div class='mb-3'>"; 
          echo"<input type='number'  class='form-control' placeholder='Telefono' id='tel' name='telefono' required>";
          echo"</div>";
          echo"<div class='mb'>"; 
          echo"<input type='text'  class='form-control' placeholder='Dirección' id='n' name='direccion' required>";
          echo"</div>";
          echo"<center><button type='submit'  > Actualizar</button></center>";
          echo"<br>";
    echo"</form>";
  echo"</div>";
}
else if($row3){
  echo "<div class='iconos container d-grid gap-3 col-9 mx-auto'>";
    echo "<form action='php/actualizar.php' method='POST'  >";
                          echo "<h2>Actualizar su información</h2>";
          /*               
          echo"<div class='mb-3'> ";           
          echo"<input type='number'  class='form-control' placeholder='' id ='control' name='numero_control' disabled>"; 
          echo"</div>";*/
          echo "<div class='form-floating'>";
          echo " <input type='text' class='form-control' id='floatingInputGroup1' placeholder='Username' disabled>"; 
          echo " <label for='floatingInputGroup1'>"; echo $row3["numero_control"]; echo "</label>";
          echo "</div>"; echo "<br>";

          echo"<div class='mb-3'> ";
          echo"<input type='text'  class='form-control' placeholder='Nombre completo' id='nombre_completo' name='nombre_completo' required>";
          echo"</div>";
          echo"<div class='mb-3'> ";
          echo"<input type='email'  class='form-control' placeholder='Correo Electronico' id='correo' name='correo' required>";
          echo"</div>";
          echo"<div class='mb-3'>";
            echo"<label for='rol' style= 'color: #848484;'></label>";
                            echo"<select name='rol' id='rol' class='form-select' 
                            style= 'background: #F2F2F2;' required>";
                            
                            
                            echo"<option value='Docente'>Docente</option>";
                            
                            echo"</select>";
        echo"</div>";
           

          
          echo"<div class='mb-3'>"; 
          echo"<input type='password'  class='form-control' placeholder='Contraseña' id='contraseña' name='contraseña' required>";
          echo"</div>";
          echo"<div class='mb-3'>"; 
          echo"<input type='password'  class='form-control' placeholder='Confirmar contraseña' id='conf_contraseña' name='conf_contraseña' required>";
          echo"</div>";
          echo"<div class='mb-3'>"; 
          echo"<input type='number'  class='form-control' placeholder='Telefono' id='tel' name='telefono' required>";
          echo"</div>";
          echo"<div class='mb'>"; 
          echo"<input type='text'  class='form-control' placeholder='Dirección' id='n' name='direccion' required>";
          echo"</div>";
          echo"<center><button type='submit'  > Actualizar</button></center>";
          echo"<br>";
    echo"</form>";
  echo"</div>";
}


?>  
</main>
</body>
</html>