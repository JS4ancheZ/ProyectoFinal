<?php
    session_start();
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");    

    if(isset($_POST['nombre']))       $nombre = $_POST['nombre']; 
    if(isset($_POST['horario']))      $horario = $_POST['horario']; 
    if(isset($_POST['docente']))      $docente = $_POST['docente']; 
    if(isset($_POST['descripcion']))  $descripcion = $_POST['descripcion']; 

    $conexion = new Database;  
    $result = $conexion->CrearMateria($nombre,$horario,$docente,$descripcion);

    header("Location: ".ROOT."modulos/materias/materias.php?mensaje=".$result);

?>