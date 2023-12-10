<?php
      /*  $servername = "localhost";
        $servername = "127.0.0.1";
        $username = "root";
        $password =  "";
        $database = "tec_ingsodt"; */

        $servername = "localhost";
        //$servername = "127.0.0.1";
        $username = "id20634400_ignacio";
        $password =  "V=Y]o_%}?\|Ym_6i";
        $database = "id20634400_tec_ingsodt"; 


$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    echo("Conexion Fallida".mysqli_connect_error());
} 

/*$servername = "mysql-116750-0.cloudclusters.net";
        //$servername = "127.0.0.1";
        $username = "admin";
        $password =  "tR0AKCyb";
        $database = "tec_ingsodt";
        $port = "18932";

$conn = mysqli_connect($servername,$username,$password,$database,$port);

if(!$conn){
    echo("Conexion Fallida".mysqli_connect_error());
}*/



/*
if($conn){
    echo("Conexion Exitosa");
}else{
    echo("Conexion Fallida".mysqli_connect_error());
}*/
    
?>