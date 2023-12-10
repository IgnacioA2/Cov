<?php

    include 'conn.php';
    //Mis Variables
 
    $numero_control = $_POST['numero_control'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];
    $contraseña = $_POST ['contraseña'];
    $conf_contraseña = $_POST['conf_contraseña'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    
    //$contraseña = hash('sha512', $conf_contraseña);
    //INSERT
    $contraseña = hash('sha512', $contraseña);
    $conf_contraseña = hash('sha512', $conf_contraseña);
    
    if($rol == "Alumno"){
        $queryInsert= "INSERT INTO usuario_registro(numero_control, nombre_completo, correo, rol, carrera, semestre, contraseña, telefono, direccion) 
        VALUES('$numero_control', '$nombre_completo', '$correo', '$rol', '$carrera', '$semestre', '$contraseña', '$telefono', '$direccion')";
    }
    else if($rol == "Administrativo"){
        $queryInsert= "INSERT INTO administrativo_registro(numero_control, nombre_completo, correo, rol,  contraseña, telefono, direccion) 
        VALUES('$numero_control', '$nombre_completo', '$correo', '$rol', '$contraseña', '$telefono', '$direccion')";
    }
    else if($rol == "Docente"){
        $queryInsert= "INSERT INTO docente_registro(numero_control, nombre_completo, correo, rol,  contraseña, telefono, direccion) 
        VALUES('$numero_control', '$nombre_completo', '$correo', '$rol', '$contraseña', '$telefono', '$direccion')";
    }
    else{
        echo'
                        <script>
                        alert("Si es profesor o administrativo No llene los campos de semestre y carrera ");
                        window.location = "../index.php";
                        </script>
                        ';
                        exit;
    }
    



   

    //Verificar que el correo no se repita
   /* $verificar_correo = mysqli_query($conn, "SELECT * FROM usuario_registro 
                                            WHERE correo = '$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
        <script>
            alert("Este correo ya esta registrado, intentalo con otro diferente");
            window.location = "../login.php";
        </script>
        ';
        exit(); //Imprime un mensaje y termina el script actual
    }*/

    //Verificar que si la contrasña se repite
     if($contraseña != $conf_contraseña){
        echo'
        <script>
            alert("Las contraseñas no coinciden");
            window.location = "../index.php";
        </script>
        '; 
        exit(); 
    } 
   

   
    $ejecutar = mysqli_query($conn, $queryInsert);
    if($ejecutar){
        echo '
        <script> 
             alert("Usuario almacenado exitosamente");
             window.location = "../index.php";
        </script>
        ';
    }else{
        echo "Error: ".$queryInsert, mysqli_error($conn)."</br>";
    echo '
        <script> 
             alert("Intentele de nuevo, usuario no almacenado, ya hay uno con el mismo numero de control ");
             window.location = "../index.php";
        </script>
        ';
    }
 
    //cerrar la conexion a la base de datos
    mysqli_close($conn);
?>

