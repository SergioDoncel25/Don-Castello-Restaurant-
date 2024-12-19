<?php

//Conectar con base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";

//Se crea la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificacion de la conexion
if ($conn->connect_error){
    die("Falla en la conexión" . $conn->connect_error);
}

//Verificación de envios datos formulario
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);
    
    //Consulta de la base de datos
    $sql = "INSERT INTO contacto (nombreUsuario, emailUsuario, celularUsuario, mensajeUsuario) VALUES('$nombre', '$correo', '$telefono', '$mensaje')";
    
    //Ejecucion de la consulta
    if ($conn->query($sql) == true){
        header("location: contacto.html?status = success");
    }
    else{
        header("location: contacto.html?status = error");
    }
    
    //cierre de la conexión
    $conn->close();
}
?>
