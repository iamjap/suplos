<?php
include('conexion.php');
$conexion=conexion();
$id_bien=$_POST['id_bien'];

        $sql2="DELETE FROM bienes_guardados WHERE id_bien = $id_bien";
        $query2=mysqli_query($conexion,$sql2);
       if($query2){
            echo 1;
        }else{
            echo 2;
        }
   
?>