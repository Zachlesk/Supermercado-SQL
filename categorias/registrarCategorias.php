<?php

if (isset($_POST['guardar'])) {
    require_once("config.php");

    $config = new Categorias();

    $config-> setNombres($_POST['nombres']);
    $config-> setDescripcion($_POST['descripcion']);
    $config-> setImagen($_POST['imagen']);

    $config-> insertData();

    echo "<script> alert('La categoria fue guardada satisfactoriamente');document.location='categorias.php'</script>";
}

?>