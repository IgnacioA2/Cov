<?php
include 'php/conn.php';
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: bienvenido.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register </title>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7d4ed45581.js" crossorigin="anonymous"></script>
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">-->

</head>
<body>
<br>
     <center><img src="media/logocovid.jpg" width="200px" alt=""></center>

        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_usuario.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        
                        <input type="number" placeholder="Número de control" name="num_control" required> <br>
                        
                        <input type="password" placeholder="Contraseña" name="contraseña">
                        <br>
                        <label for="rol" style= "color: #848484;"></label>
                        <select name="rol" id="rol" class="form-select" 
                        style= "background: #F2F2F2; color: #9F9F9F;" required>
                        <option selected style= "color: #9F9F9F;">Cargo</option>
                        <option value="Alumno" style= "color: black;">Alumno</option>
                        <option value="Administrativo" style= "color: black;">Administrativo</option>
                        <option value="Docente" style= "color: black;">Docente</option>
                         
                        </select>
                        <br>
                        <!--<p><a class="text-primary" href="php/forget_password.php"><em>¿Has olvidado la contraseña?</em></a></p>-->
                         <center><button>Iniciar Sesión</button></center>
                    </form>

                    <!--REGISTRO-->
                    <form action="php/registro_usuario_bd.php" method="POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="number" placeholder="Numero de control" name="numero_control" required>
                        <input type="text" placeholder="Nombre completo"id="nombre_completo" name="nombre_completo" required>
                        <input type="email" placeholder="Correo Electronico" id="correo" name="correo" required>
                        <br> 
                        
                        <label for="rol" style= "color: #848484;"  required></label>
                        <select name="rol" id="rol" class="form-select" 
                        style= "background: #F2F2F2; color: #9F9F9F;" required>
                        <option selected style= "color: #9F9F9F;"  required>Cargo</option>
                        <option value="Alumno" style= "color: black;">Alumno</option>
                        <option value="Administrativo" style= "color: black;">Administrativo</option>
                        <option value="Docente" style= "color: black;">Docente</option>
                       
                        
                        </select>

                        

            
                <div class="row align-items-start">
                    <div class="col">
                        <label for="carrra" style= "color: #848484;"></label>
                            <select name="carrera" id="carrea" class="form-select" 
                            style= "background: #F2F2F2; color: #9F9F9F;" required>
                            <option selected style= "color: #9F9F9F;">Carrera</option>
                            <option value="Ing. Sistemas Computacionles" style= "color: black;">Ing. Sistemas Computacionles</option>
                            <option value="Ing. Administración" style= "color: black;">Ing. Administración</option>
                            <option value="Ing. Electromécanica" style= "color: black;">Ing. Electromécanica</option>
                            <option value="Ing. Industrial" style= "color: black;">Ing. Industrial</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="semestre" ></label>
                            <select name="semestre" id="semestre" class="form-select" 
                            style= "background: #F2F2F2; color: #9F9F9F;" required>
                            <option selected >Semestre</option>
                            <option value="1" style= "color: black;">1</option>
                            <option value="2" style= "color: black;">2</option>
                            <option value="3" style= "color: black;">3</option>
                            <option value="4" style= "color: black;">4</option>
                            <option value="5" style= "color: black;">5</option>
                            <option value="6" style= "color: black;">6</option>
                            <option value="7" style= "color: black;">7</option>
                            <option value="8" style= "color: black;">8</option>
                            <option value="9" style= "color: black;">9</option>
                            <option value="10" style= "color: black;">10</option>
                            <option value="11" style= "color: black;">11</option>
                        </select>
                    </div>
                </div>
           
                        
                        <input type="password" placeholder="Contraseña" id="contraseña" name="contraseña" required>
                        <input type="password" placeholder="Confirmar contraseña" id="conf_contraseña" name="conf_contraseña" required>
                        <input type="number" placeholder="Telefono" id="tel" name="telefono" required>
                        <input type="text" placeholder="Dirección"id="n" name="direccion" required>
                        <!--<br> <br>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>An example alert with an icon</div>
                        </div>-->

                        

                        <center><button type="submit"> Regístrarse</button></center>
                    </form>
                </div>
            </div>

        </main>
        
    <script src="js/code.js"></script>
   
     
</body>
</html>