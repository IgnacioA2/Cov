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
<main class="container">
<br><br><br>
 
<br>
<br>

<form action="e.php" method="POST" >
    <div class="encuesta d-grid  col-9 mx-auto">
                    <h4><strong>Bienvenido: <?php  
                if($row){
                    $roww = $row['nombre_completo'];
                    echo"<label for='rol'></label></label>";              
                    echo"<select name='rol' id='rol' class='form-select' 
                    style= 'background: #F2F2F2;' required>";
                    echo"<option value='Alumno'>Alumno: </option>"; 
                    echo"<input type='text' placeholder='Nombre completo' name='nombre_completo' value=' $roww' readonly>";
                                                    
                    echo"</select>";
                    
                    
                  }
                  else if($row2){
                    $roww = $row2['nombre_completo'];
                    echo"<label for='rol'></label></label>";
                    echo"<select name='rol' id='rol' class='form-select' 
                    style= 'background: #F2F2F2;' required>";
                    echo"<option value='Administrativo'>Administrativo: </option>"; 
                    echo"<input type='text' placeholder='Nombre completo' name='nombre_completo' value=' $roww' readonly>";                                    
                    echo"</select>";
                  
                  }   
                  else if($row3){
                    $roww = $row3['nombre_completo'];
                    echo"<label for='rol'></label></label>";
                    echo"<select name='rol' id='rol' class='form-select' 
                    style= 'background: #F2F2F2;' required>";
                    echo"<option value='Docente'>Docente: </option>";
                    echo"<input type='text' placeholder='Nombre completo' name='nombre_completo' value='$roww' readonly>";
                    echo"</select>";
                    
                  } 
                
                ?></strong> </h4> 

        <center><h2>Cuestionario Preventivo de COVID-19</h2></center> 
       
        <span>1.- ¿Ha estado en contacto cercano con alguien que haya sido diagnosticado con COVID-19 en los últimos 14 dias?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="primera" id="op1" value="Si">
            <label class="form-check-label" for="op1">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="primera" id="op2" value="No">
            <label class="form-check-label" for="op2">
                No
            </label>
        </div>
  
     <br>
  
        <span>2.- ¿Usted presenta o recientemente ha tenido tos que no pueda atribuir a otra condición médica?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="segunda" id="op3" value="Si">
            <label class="form-check-label" for="op3">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="segunda" id="op4" value="No">
            <label class="form-check-label" for="op4">
                No
            </label>
        </div>
   
     <br>

        <span>3.- ¿Usted presenta o recientemente ha tenido dificultad para respirar que no pueda atribuir a otra condición médica?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tercera" id="op5" value="Si">
            <label class="form-check-label" for="op5">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tercera" id="op6" value="No" >
            <label class="form-check-label" for="op6">
                No
            </label>
        </div>
   
     <br>
   
        <span>4.- ¿Usted presenta o recientemente ha tenido fiebre (> 37,7°C) o escalofríos que no pueda atribuir a otra condición médica?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="cuarta" id="op7" value="Si">
            <label class="form-check-label" for="op7">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="cuarta" id="op8" value="No">
            <label class="form-check-label" for="op8">
                No
            </label>
        </div>
   
     <br>
    
        <span>5.- ¿Realiza alguna actividad de riesgo como trabajar en un hospital, residencia de ancianos o un establecimiento en atención al público?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="quinta" id="op9" value="Si">
            <label class="form-check-label" for="op9">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="quinta" id="op10" value="No">
            <label class="form-check-label" for="op10">
                No
            </label>
        </div>

     <br>

     <span>6.- ¿En los últimos dias, ha presentado congestión o secreción nasal?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexta" id="op11" value="Si">
            <label class="form-check-label" for="op11">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexta" id="op12" value="No">
            <label class="form-check-label" for="op12">
                No
            </label>
        </div>

        <br>

        <span>7.- ¿En los últimos dias, ha presentado dolor de garganta?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="septima" id="op13" value="Si">
            <label class="form-check-label" for="op13">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="septima" id="op14" value="No">
            <label class="form-check-label" for="op14">
                No
            </label>
        </div>

        <br>

        <span>8 .- ¿En los últimos dias, ha presentado dolor muscularo corporal?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="octava" id="op15" value="Si">
            <label class="form-check-label" for="op15">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="octava" id="op16" value="No">
            <label class="form-check-label" for="op16">
                No
            </label>
        </div>

        <br>

        <span>9.- ¿En los últimos dias, ha presentado dolor muscularo corporal?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="novena" id="op17" value="Si">
            <label class="form-check-label" for="op17">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="novena" id="op18" value="No">
            <label class="form-check-label" for="op18">
                No
            </label>
        </div>

        <br>

        <span>10.- ¿En los últimos dias, ha presentado perdida del gusto o el olfato?</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="decima" id="op19" value="Si">
            <label class="form-check-label" for="op19">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="decima" id="op20" value="No">
            <label class="form-check-label" for="op20">
                No
            </label>
        </div>

       <!-- <span>6.- ¿Presenta algunos de los siguientes sintomas?</span>
     <div class="container text-right">
        <div class="row  align-items-start" >
            <div class="col">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def" >
                    <label class="form-check-label" for="Def">
                    - Fatiga.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def" >
                    <label class="form-check-label" for="Def">
                    - Congestión o secreción nasal.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def">
                    <label class="form-check-label" for="Def">
                    - Dolor de garganta.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def" >
                    <label class="form-check-label" for="Def">
                    - Perdido reciente del gusto y olfato. 
                    </label>
                </div>

            </div>
            <div class="col">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def" >
                    <label class="form-check-label" for="Def">
                    - Diarrea.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def">
                    <label class="form-check-label" for="Def">
                    - Dolor musculares o corporales.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="Si" id="Def" >
                    <label class="form-check-label" for="Def">
                    - Nausas o vómitos.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dolor" value="No" id="ninguno">
                    <label class="form-check-label" for="ninguno">
                    No
                    </label>
                </div> -->


            
            </div>
        </div>
     </div>

    <br>

    <center>
        <button type="submit" class="btn btn-primary" >Acepto</button>
    </center> 

</form>

</main>

</body>
</html>