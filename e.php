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

   
    
  $idmatricula =  $_SESSION['usuario'];
 
  
  $roll = $_POST['rol'];
  $nomb = $_POST['nombre_completo'];
     
       

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
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
              <a class="nav-link" href="bienvenido.php">Perfil</a>
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
<main class="container">
  <br><br><br>
<?php
date_default_timezone_set('America/Mexico_City');
 $fecha = date('d-m-Y h:i:s');
  echo "<h4>Nombre: $nomb</h4>";
  echo "<h4>Rol: $roll</h4>";
  echo "<h4>Fecha: $fecha</h4>";
  
  ?>
  
 
  <?php
  
  if(empty($_POST['primera']) || empty($_POST['segunda']) || empty($_POST['tercera']) || empty($_POST['cuarta']) || empty($_POST['quinta']) ||
          empty($_POST['sexta']) || empty($_POST['septima']) || empty($_POST['octava']) || empty($_POST['novena']) || empty($_POST['decima']) ) {
            echo'
            <script>
            alert("Debe contestar todas las preguntas ");
            window.location = "encuesta.php";
            </script>
            ';
            exit;
	}
 

  $queryInsert = "INSERT INTO qr_registro (numero_control, nombre_completo, rol)
   VALUES ('$idmatricula', '$nomb', '$roll')";
  $ejecutar = mysqli_query($conn, $queryInsert);
    if($ejecutar){
        echo '
        <script> 
             alert("Datos enviados exitosamente");
             
        </script>
        ';
    }else{
        echo "Error: ".$queryInsert, mysqli_error($conn)."</br>";
    echo '
        <script> 
             alert("Intentele de nuevo, usuario no almacenado, ya hay uno con el mismo numero de control ");
             
        </script>
        ';
    }
   //MIS VARIABLES
   $prim = $_POST['primera'];
   $segu = $_POST['segunda']; 
   $terc = $_POST['tercera']; 
   $cuar = $_POST['cuarta'];  
   $quin = $_POST['quinta'];
   $sext = $_POST['sexta']; 
   $sept = $_POST['septima']; 
   $octa = $_POST['octava']; 
   $nove = $_POST['novena'];  
   $deci = $_POST['decima'];
   require 'phpqrcode/qrlib.php';
   $dir = 'temp/';

         if($prim == "No" && $segu == "No" && $terc == "No" && $cuar == "No" && $quin == "No" && 
          $sext == "No" && $sept == "No" && $octa == "No" && $nove == "No" && $deci == "No"){
            if(!file_exists($dir))
            mkdir($dir); //sin no existe la carpeta la crea
        
              $filename = $dir.'qr.png';
              $tamanio = 5; //tamaño de lam imagen
              $level = 'L'; 
              $frameSize = 10;
              //$cont =  "Bienvenido: ".$row["nombre_completo"];
              $contenido = "Se ha Registrado tu informacion" ;
              
              QRcode::png( $contenido, $filename, $level, $tamanio, $frameSize);
             
              echo" <div class='card' style='width: 18rem;'>";
              echo"<center><img src='media/bien.png' class='card-img-top' alt='...'>";
              echo"<div class='card-body'>";
              echo"<p class='card-text'> En este momento su situación no requiere asistencia sanitaria. 
              Recuerde seguir manteniendo las recomendaciones generales de distanciamiento social, higiene
               y protección recomendadas.</p>";
              echo"</div>";
              echo"</center></div>";
        }
        
        else if($prim == "No" && $segu == "No" && $terc == "No" && $cuar == "No" && $quin == "Si" && 
        $sext == "No" && $sept == "No" && $octa == "No" && $nove == "No" && $deci == "No"){
          if(!file_exists($dir))
          mkdir($dir); //sin no existe la carpeta la crea
      
            $filename = $dir.'qr.png';
            $tamanio = 5; //tamaño de lam imagen
            $level = 'L'; 
            $frameSize = 10;
            //$cont =  "Bienvenido: ".$row["nombre_completo"];
            $contenido = "Se ha Registrado tu informacion";
            
            QRcode::png( $contenido, $filename, $level, $tamanio, $frameSize);
           echo" <div class='card' style='width: 18rem;'>";
          echo"<img src='media/bien.png' class='card-img-top' alt='...'>";
          echo"<div class='card-body'>";
          echo"<p class='card-text'> En este momento su situación no requiere asistencia sanitaria. 
          Recuerde seguir manteniendo las recomendaciones generales de distanciamiento social, higiene
           y protección recomendadas.</p>";
          echo"</div>";
          echo"</div>";
         
        }
        
        else {
          if(!file_exists($dir))
          mkdir($dir); //sin no existe la carpeta la crea
      
            $filename = $dir.'qr.png';
            $tamanio = 5; //tamaño de lam imagen
            $level = 'L'; 
            $frameSize = 10;
            //$cont =  "Bienvenido: ".$row["nombre_completo"];
            $contenido = "Se ha Registrado tu informacin";
            
            QRcode::png( $contenido, $filename, $level, $tamanio, $frameSize);
            echo"<br><br>";
            echo"<center><div class='card' style='width: 18rem;'>";
          echo"<img src='media/cuidado.png' class='card-img-top' alt='...'>";
          echo"<div class='card-body'>";
          echo"<p class='card-text'>Usted puede presentar un caso de COVID-19, por lo tanto debe 
          permanecer en su casa durante los 14 días que dura una cuarentena evitando los contactos
           con otras personas</p>";
          echo"</div>";
          echo"</div></center>";

          
          }
	
?>


<br><br>
<center><h5>Ya puede descargar su QR y presentarlo con el personal correspondiente</h5></center>

<p></p>
<center><?php 

echo'<img src="'.$filename.'"/>'; 
?></center> 

<center><a href="temp/qr.png" download="temp/qr.png">Descargar </a></center>

</main>
</body>
</html>