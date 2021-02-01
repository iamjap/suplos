<?php
include('conexion.php');
$conexion=conexion();
$id_bien=$_POST['id_bien'];

    $sql="SELECT count(*) as total FROM bienes_guardados WHERE id_bien='$id_bien'";
    $query=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($query);
    if($fila['total']>0){
        echo 0;
    }else{
        $sql2="INSERT INTO bienes_guardados (id_bien) VALUES ('$id_bien')"; 
        $query2=mysqli_query($conexion,$sql2);
       if($query2){
            echo 1;
        }else{
            echo 2;
        }
    }


?>