<?php
include('connect.php');
if(isset($_POST['Registrar'])){
    $nombre=mysqli_real_escape_string($con,$_POST['Nombre']);
    $correo=mysqli_real_escape_string($con,$_POST['Correo']);
    $usuario=mysqli_real_escape_string($con,$_POST['Usuario']);
    $clave=mysqli_real_escape_string($con,$_POST['Clave']);
    $claveEncriptada=sha1($clave);

    //hacer una consulta para mirar si ya existe el usuario
    $consultaUsuario="SELECT idUsuario FROM usuarios WHERE usuario='$usuario'";
    $continuar=$con->query($consultaUsuario);
    //recorrido por todas las filas
    $filas=$continuar->num_rows;
    if (filas>0) {
        echo
            "<script>
                alert('El usuario ya existe')
                windows.location='../views/register.html'
            </script>";
    }
    else{
        //insertar el usuario
        $nuevoUsuario="INSERT INTO usuarios(nombre,correo,usuario,clave) VALUE('$nombre','$correo','$usuario','$claveEncriptada') ";
        $continuarUsuario=$con->query($nuevoUsuario);
        if($continuarUsuario>0) {
            echo
            "<script>
                alert('Usuario registrado con exito')
                windows.location='../views/login.html'
            </script>";
        }
        else{
            "<script>
                alert('Error al registrarse')
                windows.location='../views/register.html'
            </script>";
        }
    }
}

?>