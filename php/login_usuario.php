<?php

    session_start();

    include 'conn.php';
    
    $num_control= $_POST['num_control'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];
    $contraseña = hash('sha512', $contraseña);

    if($rol == "Alumno"){
    $validar_login = mysqli_query($conn, "SELECT * FROM usuario_registro
                    WHERE numero_control = '$num_control' AND contraseña = '$contraseña'");

                    if(mysqli_num_rows($validar_login) > 0){
                        $_SESSION ['usuario'] = $num_control;

                        header("location: ../bienvenido.php");
                        exit;
                    }else{
                        echo'
                        <script>
                        alert("Ese usuario no existe, o los datos son incorrectos");
                        window.location = "../index.php";
                        </script>
                        ';
                        exit;
                    }
                        }



    else if($rol == "Administrativo"){
    $validar_login = mysqli_query($conn, "SELECT * FROM administrativo_registro
                    WHERE numero_control = '$num_control' AND contraseña = '$contraseña'");

                    if(mysqli_num_rows($validar_login) > 0){
                        $_SESSION ['usuario'] = $num_control;

                        header("location: ../bienvenido.php");
                        exit;
                    }else{
                        echo'
                        <script>
                        alert("Ese usuario no existe, o los datos son incorrectos");
                        window.location = "../index.php";
                        </script>
                        ';
                        exit;
                    }
                        }

     else if($rol == "Docente"){
    $validar_login = mysqli_query($conn, "SELECT * FROM docente_registro
                    WHERE numero_control = '$num_control' AND contraseña = '$contraseña'");

                    if(mysqli_num_rows($validar_login) > 0){
                        $_SESSION ['usuario'] = $num_control;

                        header("location: ../bienvenido.php");
                        exit;
                    }else{
                        echo'
                        <script>
                        alert("Ese usuario no existe, o los datos son incorrectos");
                        window.location = "../index.php";
                        </script>
                        ';
                        exit;
                    }
                        }



 /*   if(mysqli_num_rows($validar_login) > 0){
        $_SESSION ['usuario'] = $num_control;

        header("location: ../bienvenido.php");
        exit;
    }else{
        echo'
        <script>
        alert("Ese usuario no existe, o los datos son incorrectos");
        window.location = "../login.php";
        </script>
        ';
        exit;
    }*/
?>