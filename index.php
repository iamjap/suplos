<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
<?php
include('tab2.php');
?>
</head>

<body>
  

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="0" selected>Elige una ciudad</option>
                    <?php
          $datac = file_get_contents("data-1.json");
          $ciudades = json_decode($datac, true);
      
    foreach ($ciudades as $ciudad) {
      $variable[] =$ciudad['Ciudad'];
    }
    $result = array_unique($variable);
         
    foreach ($result as $resultlist) {
         $value_ciudad =str_replace(' ', '', $resultlist);
        echo '<option value="'.$value_ciudad.'">'.$resultlist.'</option>';
    }
?>
            </select>
          </div>

          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="0" selected>Elige un tipo</option>
                        <?php
          $datat = file_get_contents("data-1.json");
          $tipos = json_decode($datat, true);

    foreach ($tipos as $tipo) {
      $valuelista[] = $tipo['Tipo'];
      }
          $result_tipo = array_unique($valuelista);
          foreach ($result_tipo as $tipolist) {
          $value_tipo =str_replace(' ', '', $tipolist);  
      echo '<option value="'.$value_tipo.'">'.$tipolist.'</option>';
          }
        ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="button" class="btn white" value="Buscar" id="submitButton" onclick="FiltrarBienes()">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reportes</a></li>
      </ul>
      <div id="tabs-1" style="width: 135%;">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" id="ResultadosBus" style="justify-content: center;display: none;">
            <h5 id="id_ResBusqueda">Resultados de la búsqueda:</h5>
            <div class="divider"></div>  
            <div class="botonField" style="margin-top:25px;">      
            <input type="button" class="btn white" value="Mostrar todo" id="resetButton" onclick="ResetBusqueda();">
          </div>
        </div>

          <?php
          $data = file_get_contents("data-1.json");
          $items = json_decode($data, true);
    foreach ($items as $item) { 
      $clase_ciudad =str_replace(' ', '', $item['Ciudad']);   
      $clase_tipo =str_replace(' ', '', $item['Tipo']);   
      ?>  
          <div class="BienesContenido card <?php echo $clase_ciudad," ",$clase_tipo; ?>">
            <img src="img/home.jpg" style="float:left; padding-right: 10px;" width="240" height="240" alt="Foto de inmueble"/> <b>Direccion :</b> <?php echo ($item['Direccion']); ?> <br>
            <b>Ciudad :</b> <?php echo ($item['Ciudad']); ?> <br>
            <b>Teléfono :</b> <?php echo ($item['Telefono']); ?> <br> 
            <b>Código Postal :</b> <?php echo ($item['Codigo_Postal']); ?><br> 
            <b>Tipo :</b> <?php echo ($item['Tipo']); ?> <br> 
            <b>Precio :</b> <?php echo ($item['Precio']); ?> <br>
            <div class="botonField">
            <input type="button" class="btn" value="Guardar" id="GuardarButton" style="color:white;margin-top:60px;" onclick="SaveItem(<?php echo $item['Id']; ?>)">
          </div>         
          </div>
     <?php
             
        }
      ?>  

        </div>
      </div>
      
      <div id="tabs-2" style="width: 135%;">
        <?php
         echo getTab2();
        ?>   
      </div>

      <div id="tabs-3" style="width: 135%;">
           <div class="colContenido" id="divGenerarExcel">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Exportar reporte:</h5>
            <div class="divider"></div>
              <h5 style="text-align:center;">Filtros</h5>
              <div >
      <form action="reporte.php" method="post" id="formularioreport">
        <div class="filtrosContenido">
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="0" selected>Elige una ciudad</option>
                    <?php
          $datac = file_get_contents("data-1.json");
          $ciudades = json_decode($datac, true);
      
    foreach ($ciudades as $ciudad) {
      $variable[] =$ciudad[Ciudad];
    }
    $result = array_unique($variable);
         
    foreach ($result as $resultlist) {
        echo '<option value="'.$resultlist.'">'.$resultlist.'</option>';
    }
?>
            </select>
          </div>

          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="0" selected>Elige un tipo</option>
                        <?php
          $datat = file_get_contents("data-1.json");
          $tipos = json_decode($datat, true);

    foreach ($tipos as $tipo) {
      $valuelista[] = $tipo[Tipo];
      }
          $result_tipo = array_unique($valuelista);
          foreach ($result_tipo as $tipolist) {
      echo '<option value="'.$tipolist.'">'.$tipolist.'</option>';
          }
        ?>
            </select>
          </div>      
          <div class="botonField">
            <input type="submit" class="btn white" value="Generar Excel" id="GEButton">
          </div>
        </div>
  
          </form>
          </div>

          
 
                  
        
   

        </div>  
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
