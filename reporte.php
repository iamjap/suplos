<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Lista.xls');
$data_b = file_get_contents("data-1.json");
$items_b = json_decode($data_b, true);
$ciudad=$_POST['ciudad'];
$tipo=$_POST['tipo'];
?>

<table border="1">
<tr>
    <th>Id</th>
    <th>Direccion</th>
    <th>Ciudad</th>
    <th>Codigo_Postal</th>
    <th>Tipo</th>
    <th>Precio</th>
</tr>
<?php
foreach ($items_b as $item) {
    if ($ciudad!='0' AND $tipo!='0') {
        //////filtar por ciudad y tipo////
        if($item['Ciudad']==$ciudad AND $item['Tipo']==$tipo){

    ?>
            <tr>    
                <td><?php echo ($item['Id']); ?> </td>
                <td><?php echo ($item['Direccion']); ?> </td>
                <td><?php echo ($item['Ciudad']); ?> </td>
                <td><?php echo ($item['Codigo_Postal']); ?> </td>
                <td><?php echo ($item['Tipo']); ?> </td>
                <td><?php echo ($item['Precio']); ?> </td>
            </tr> 
    <?php
        }
    }else if($ciudad=='0' AND $tipo!='0'){
           //////filtar por tipo solamente////
            if($item['Tipo']==$tipo){
             
?>
<tr>    
    <td><?php echo ($item['Id']); ?> </td>
    <td><?php echo ($item['Direccion']); ?> </td>
    <td><?php echo ($item['Ciudad']); ?> </td>
    <td><?php echo ($item['Codigo_Postal']); ?> </td>
    <td><?php echo ($item['Tipo']); ?> </td>
    <td><?php echo ($item['Precio']); ?> </td>
</tr> 
<?php     
                                                }

}else if($ciudad!='0' AND $tipo=='0'){
       //////filtar por ciudad solamente////
        if($item['Ciudad']==$ciudad){
          
?>
<tr>    
    <td><?php echo ($item['Id']); ?> </td>
    <td><?php echo ($item['Direccion']); ?> </td>
    <td><?php echo ($item['Ciudad']); ?> </td>
    <td><?php echo ($item['Codigo_Postal']); ?> </td>
    <td><?php echo ($item['Tipo']); ?> </td>
    <td><?php echo ($item['Precio']); ?> </td>
</tr> 
<?php     
                                                }

}else if($ciudad=='0' AND $tipo=='0'){
            //////Se muestran todos los registros////
?>
    <tr>    
    <td><?php echo ($item['Id']); ?> </td>
    <td><?php echo ($item['Direccion']); ?> </td>
    <td><?php echo ($item['Ciudad']); ?> </td>
    <td><?php echo ($item['Codigo_Postal']); ?> </td>
    <td><?php echo ($item['Tipo']); ?> </td>
    <td><?php echo ($item['Precio']); ?> </td>
</tr>
 <?php                                                     
                                    }
}
?>   
</table>
