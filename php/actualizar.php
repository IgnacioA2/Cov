<?php
include 'conn.php';
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


    if($_POST){
        //Mis Variables
        $idmatricula = $_SESSION['usuario'];
        
        $roll = $_POST['rol'];
        //Comentario
        //echo $nombre, $apellido, $edad;
        

        if($roll == "Alumno"){

        $nom = $_POST['nombre_completo'];
        $corr = $_POST['correo'];
        $roll = $_POST['rol'];
        $car = $_POST['carrera'];
        $sem = $_POST['semestre'];
        $contr = $_POST['contraseña'];
        $conf_cont = $_POST['conf_contraseña'];
        $tel = $_POST['telefono'];
        $direc = $_POST['direccion'];
        $contr = hash('sha512', $contr);
        $conf_cont = hash('sha512', $conf_cont);


            $queryUpdate = "UPDATE usuario_registro SET nombre_completo='$nom', correo='$corr', rol='$roll', carrera='$car', semestre='$sem', contraseña='$contr',
            telefono ='$tel', direccion = '$direc' WHERE  numero_control = '$idmatricula'";  
            
            if(!mysqli_query($conn, $queryUpdate)){
                //echo "Registro capturado </br>";
                echo "Error: ".$queryUpdate, mysqli_error($conn)."</br>";
            }
            else{
                echo "Registro Almacenado con Exito";
                echo ' 
                        <script>
                    alert("Registro Almacenado con Exito");
                    window.location = "../read.php";
                    </script>
                    ';  }
                            }

    
        if($roll == "Administrativo"){

        $nom = $_POST['nombre_completo'];
        $corr = $_POST['correo'];
        $roll = $_POST['rol'];
        $contr = $_POST['contraseña'];
        $conf_cont = $_POST['conf_contraseña'];
        $tel = $_POST['telefono'];
        $direc = $_POST['direccion'];
        $contr = hash('sha512', $contr);
        $conf_cont = hash('sha512', $conf_cont);


            $queryUpdate2 = "UPDATE administrativo_registro SET nombre_completo='$nom', correo='$corr', rol='$roll', contraseña='$contr',
            telefono ='$tel', direccion = '$direc' WHERE  numero_control = '$idmatricula'";  
            
            if(!mysqli_query($conn, $queryUpdate2)){
                //echo "Registro capturado </br>";
                echo "Error: ".$queryUpdate2, mysqli_error($conn)."</br>";
            }
            else{
                echo "Registro Almacenado con Exito";
                echo ' 
                        <script>
                    alert("Registro Almacenado con Exito");
                    window.location = "../read.php";
                    </script>
                    ';  }
                                }

        if($roll == "Docente"){

        $nom = $_POST['nombre_completo'];
        $corr = $_POST['correo'];
        $roll = $_POST['rol'];
        $contr = $_POST['contraseña'];
        $conf_cont = $_POST['conf_contraseña'];
        $tel = $_POST['telefono'];
        $direc = $_POST['direccion'];
        $contr = hash('sha512', $contr);
        $conf_cont = hash('sha512', $conf_cont);


            $queryUpdate2 = "UPDATE docente_registro SET nombre_completo='$nom', correo='$corr', rol='$roll', contraseña='$contr',
            telefono ='$tel', direccion = '$direc' WHERE  numero_control = '$idmatricula'";  
            
            if(!mysqli_query($conn, $queryUpdate2)){
                //echo "Registro capturado </br>";
                echo "Error: ".$queryUpdate2, mysqli_error($conn)."</br>";
            }
            else{
                echo "Registro Almacenado con Exito";
                echo ' 
                        <script>
                    alert("Registro Almacenado con Exito");
                    window.location = "../read.php";
                    </script>
                    ';  }
                                }

                                
    }
?>