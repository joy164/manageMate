<?php

    //funciones para evaluar el rol del usuario o estado de sesion
    function validar_vendedor(){
        session_start();
        if(!isset($_SESSION["id"]) || $_SESSION["id_rol"] != '1'){
            header("location: /managemate/index.php");
        }
    }
    function validar_comprador(){
        session_start();
        if(!isset($_SESSION["id"]) || $_SESSION["id_rol"] != '2'){
            header("location: /managemate/index.php");
        }
    }
    function sesion_iniciada(){
        session_start();
        if(isset($_SESSION["id"])){
            header("location: /managemate/index.php");
        }
    }
    //consulta SQL de la tabla users
    function registrarCliente($conex, $nom, $apellido, $direc, $correo, $contraseña){
        $sql = "INSERT INTO users(name, LastName, address, email, password, id_rol) 
        values('$nom', '$apellido', '$direc', '$correo', '$contraseña', '2')";
        $consulta = $conex->query($sql);
        return $consulta;
    }
    function consultaUsuarioId($id, $conex){
        $sql="SELECT * FROM users WHERE id = $id";
        $consulta = $conex->query($sql);
        $datos = $consulta->fetch_array(MYSQLI_ASSOC);
        return $datos;
    }
    function consultaUsuarioCorreo($correo, $conex){
        $sql="SELECT * FROM users WHERE email = '$correo'";
        $consulta = $conex->query($sql);
        $datos = $consulta->fetch_array(MYSQLI_ASSOC);
        return $datos;
    }
    //consulta SQL de la tabla productos
    function registrarProducto($conex, $precio, $des, $marca, $nom, $foto){
        $sql="INSERT INTO productos(precio, descripcion, marca, nombre, imagen) 
        VALUES ('$precio', '$des', '$marca', '$nom', '$foto')";
        $consulta = $conex->query($sql);
        return $consulta;
    }
    function consultaProductoId($id, $conex){
        $sql="SELECT * FROM productos WHERE id = '$id'";
        $consulta = $conex->query($sql);
        $datos = $consulta->fetch_array(MYSQLI_ASSOC);
        return $datos;
    }
    function actualizarProducto($id, $conex, $nombre, $des, $marca, $precio, $foto){
        $sql="UPDATE productos SET 
        nombre = '$nombre', 
        descripcion = '$des', 
        marca = '$marca', 
        precio = '$precio', 
        imagen = '$foto'
        WHERE id ='$id'";
        $consulta = $conex->query($sql);
        return $consulta;
    }
    function eliminarProducto($id, $conex){
        $sql="DELETE FROM productos WHERE id ='$id'";
        $consulta = $conex->query($sql);
        return $consulta;
    }
?>
