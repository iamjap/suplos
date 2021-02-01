 <?php

function getTab2(){
include('conexion.php');
$conexion = conexion();

$dash="";
                          
          $dash.='<div class="colContenido" id="divmisbienes">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
          </div>';


         
          $data_b = file_get_contents("data-1.json");
          $items_b = json_decode($data_b, true);
          $arraybienes=array();
         
                $sql="select id, id_bien from bienes_guardados --";
                $result=mysqli_query($conexion, $sql);               
                while($fila=mysqli_fetch_array($result)){
                $arraybienes[]=$fila['id_bien'];
               }

    foreach ($items_b as $item) {    
     if(in_array($item['Id'],$arraybienes)){ 

        
          $dash.='<div class="BienesContenido card">
            <img src="img/home.jpg" style="float:left; padding-right: 10px;" width="240" height="240" alt="Foto de inmueble"/> <b>Direccion :</b> '.$item['Direccion'].' <br>
            <b>Ciudad :</b> '.$item['Ciudad'].' <br>
            <b>Teléfono :</b> '.$item['Telefono'].' <br> 
            <b>Código Postal :</b> '.$item['Codigo_Postal'].' <br> 
            <b>Tipo :</b> '.$item['Tipo'].' <br> 
            <b>Precio :</b> '.$item['Precio'].' <br>
            <div class="botonField">
            <input type="button" class="btn" value="Eliminar" id="EliminarButton" style="color:black;margin-top:60px;" onclick="DeleteItem('.$item['Id'].')">
          </div>         
          </div>';
     
           }   
        }
       
        $dash.='</div>';
                         
  return $dash;
}
?>  