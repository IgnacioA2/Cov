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
    $roll = $_POST['rol'];
    
if($roll == "Alumno"){
    $queryDelete = "DELETE FROM usuario_registro WHERE numero_control = '$idmatricula'";

                echo "Registro Eliminado con Exito";
                mysqli_query($conn, $queryDelete);
                echo ' 
                <script>
                    alert("Debes iniciar sesión");
                    window.location = "index.php";
                </script>
            ';
            session_destroy(); //destruye cualquier sesion que exista
            die(); //el copdigo de abajo no se ejecute
} 

else if($roll == "Administrativo"){
    $queryDelete = "DELETE FROM administrativo_registro WHERE numero_control = '$idmatricula'";

                echo "Registro Eliminado con Exito";
                mysqli_query($conn, $queryDelete);
                echo ' 
                <script>
                    alert("Debes iniciar sesión");
                    window.location = "index.php";
                </script>
            ';
            session_destroy(); //destruye cualquier sesion que exista
            die(); //el copdigo de abajo no se ejecute
}

else if($roll == "Docente"){
    $queryDelete = "DELETE FROM docente_registro WHERE numero_control = '$idmatricula'";

                    echo "Registro Eliminado con Exito";
                    mysqli_query($conn, $queryDelete);
                    echo ' 
                    <script>
                        alert("Debes iniciar sesión");
                        window.location = "index.php";
                    </script>
                ';
                session_destroy(); //destruye cualquier sesion que exista
                die(); //el copdigo de abajo no se ejecute
}

  

?>