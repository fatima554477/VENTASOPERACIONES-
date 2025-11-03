<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorVO.php";

//$conexion = NEW accesoclase();
$queryVISTAPREV = $ventasoperaciones->Listado_ventasoperaciones2($identioficador);

?>
<div id="actualizatabla">
<?php
   while($row = mysqli_fetch_array($queryVISTAPREV))
    {
		
		$row2xml = $ventasoperaciones->busca_02XML($row['id']);
		
$SOLICITADO = "";$APROBADO = "";$PAGADO = "";$PAGADO = "";
    if($row['STATUS_DE_PAGO']=="SOLICITADO"){$SOLICITADO = "selected";}
elseif($row['STATUS_DE_PAGO']=="APROBADO"){$APROBADO = "selected";}
elseif($row['STATUS_DE_PAGO']=="PAGADO"){$PAGADO = "selected";}
elseif($row['STATUS_DE_PAGO']=="RECHAZADO"){$RECHAZADO = "selected";}

$STATUS_DE_PAGO = '<select required="" name="STATUS_DE_PAGO"> 
<option selected="">SELECCIONA UNA OPCION</option>
<option style="background:#d9f9fa" value="SOLICITADO" '.$SOLICITADO.'>SOLICITADO</option>
<option style="background:#e1f5de" value="APROBADO" '.$APROBADO.'>APROBADO</option>
<option style="background:#f5deee" value="PAGADO" '.$PAGADO.'>PAGADO</option>
<option style="background:#f5f4de" value="RECHAZADO" '.$RECHAZADO.'>RECHAZADO</option>
</select>';
		

	$queryVISTAPREV = $ventasoperaciones->Listado_subefacturaDOCTOS($row['id']);		
	while($rowDOCTOS = mysqli_fetch_array($queryVISTAPREV))
	{

		
		
	//}



        if($rowDOCTOS["ADJUNTAR_FACTURA_PDF"]!=""){$ADJUNTAR_FACTURA_PDF .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["ADJUNTAR_FACTURA_PDF"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$ADJUNTAR_FACTURA_PDF = "";
			
		}
        
        
        if($rowDOCTOS["ADJUNTAR_FACTURA_XML"]!=""){$ADJUNTAR_FACTURA_XML .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["ADJUNTAR_FACTURA_XML"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$ADJUNTAR_FACTURA_XML = "";
			
		}

         
        if($rowDOCTOS["ADJUNTAR_COTIZACION"]!=""){$ADJUNTAR_COTIZACION .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["ADJUNTAR_COTIZACION"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$ADJUNTAR_COTIZACION = "";
			
		}
        
        if($rowDOCTOS["CONPROBANTE_TRANSFERENCIA"]!=""){$CONPROBANTE_TRANSFERENCIA =  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["CONPROBANTE_TRANSFERENCIA"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$CONPROBANTE_TRANSFERENCIA = "";
			
		}
        
        if($rowDOCTOS["FOTO_ESTADO_PROVEE"]!=""){$FOTO_ESTADO_PROVEE .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["FOTO_ESTADO_PROVEE"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$FOTO_ESTADO_PROVEE = "";
			
		}
        
        if($rowDOCTOS["COMPLEMENTOS_PAGO_PDF"]!=""){$COMPLEMENTOS_PAGO_PDF .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["COMPLEMENTOS_PAGO_PDF"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$COMPLEMENTOS_PAGO_PDF = "";
			
		}
        

        if($rowDOCTOS["COMPLEMENTOS_PAGO_XML"]!=""){$COMPLEMENTOS_PAGO_XML .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["COMPLEMENTOS_PAGO_XML"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$COMPLEMENTOS_PAGO_XML = "";
			
		}

        if($rowDOCTOS["CANCELACIONES_PDF"]!=""){$CANCELACIONES_PDF .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["CANCELACIONES_PDF"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$CANCELACIONES_PDF = "";
			
		}

        if($rowDOCTOS["CANCELACIONES_XML"]!=""){$CANCELACIONES_XML .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["CANCELACIONES_XML"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$CANCELACIONES_XML = "";
			
		}

        
        if($rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_PDF"]!=""){$ADJUNTAR_FACTURA_DE_COMISION_PDF .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_PDF"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$ADJUNTAR_FACTURA_DE_COMISION_PDF = "";
			
		}

        if($rowDOCTOS["ADJUNTAR_ARCHIVO_1"]!=""){$ADJUNTAR_ARCHIVO_1 .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["ADJUNTAR_ARCHIVO_1"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$ADJUNTAR_ARCHIVO_1 = "";
			
		}
        
        if($rowDOCTOS["CALCULO_DE_COMISION"]!=""){$CALCULO_DE_COMISION .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["CALCULO_DE_COMISION"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$CALCULO_DE_COMISION = "";
			
		}

        if($rowDOCTOS["COMPROBANTE_DE_DEVOLUCION"]!=""){$COMPROBANTE_DE_DEVOLUCION .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["COMPROBANTE_DE_DEVOLUCION"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$COMPROBANTE_DE_DEVOLUCION = "";
			
		}

        if($rowDOCTOS["NOTA_DE_CREDITO_COMPRA"]!=""){$NOTA_DE_CREDITO_COMPRA .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["NOTA_DE_CREDITO_COMPRA"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$NOTA_DE_CREDITO_COMPRA = "";
			
		}

      
        if($rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_XML"]!=""){$ADJUNTAR_FACTURA_DE_COMISION_XML .=  "<a target='_blank' href='includes/archivos/".$rowDOCTOS["ADJUNTAR_FACTURA_DE_COMISION_XML"]."'>Visualizar!</a>"." <span id='".$rowDOCTOS['id']."' class='view_dataSBborrar2' style='cursor:pointer;color:blue;'>Borrar!</span> <span > ".$rowDOCTOS['fechaingreso']."</span>".'<br/>'; 
		}	else{
			
			//$ADJUNTAR_FACTURA_DE_COMISION_XML = "";
			
		}

}


?>
</div>
<?php


 $output .= '<div id="respuestaser"></div><form  id="ListadoPAGOPROVEE"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
 
if($row2xml["Version"]=='no' or $row2xml["Version"]==''){

$campos_xml = '

<!--aqui empieza la lectura BD a XML-->
<!--aqui empieza la lectura BD a XML-->
<!--aqui empieza la lectura BD a XML-->
<!--aqui empieza la lectura BD a XML-->
<!--aqui empieza la lectura BD a XML-->

<tr style="background: #fbf696">
<td width="30%"><label>NOMBRE RECEPTOR</label></td>
<td width="70%"><input type="text" name="nombreR" value="'.$row2xml["nombreR"].'"></td>
</tr>
<tr style="background: #fbf696">
<td width="30%"><label>RFC RECEPTOR</label></td>
<td width="70%"><input type="text" name="rfcR" value="'.$row2xml["rfcR"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>REGÍMEN FISCAL</label></td>
<td width="70%"><input type="text" name="regimenE" value="'.$row2xml["regimenE"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>UUID</label></td>
<td width="70%"><input type="text" name="UUID" value="'.$row2xml["UUID"].'"></td>
</tr>
<tr style="background: #fbf696">
<td width="30%"><label>FOLIO</label></td>
<td width="70%"><input type="text" name="folio" value="'.$row2xml["folio"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>SERIE</label></td>
<td width="70%"><input type="text" name="serie" value="'.$row2xml["serie"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>CLAVE DE UNIDAD</label></td>
<td width="70%"><input type="text" name="ClaveUnidadConcepto" value="'.$row2xml["ClaveUnidadConcepto"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>CANTIDAD</label></td>
<td width="70%"><input type="text" name="CantidadConcepto" value="'.$row2xml["CantidadConcepto"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>CLAVE DE PRODUCTO O SERVICIO</label></td>
<td width="70%"><input type="text" name="ClaveProdServConcepto" value="'.$row2xml["ClaveProdServConcepto"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>DESCRIPCIÓN</label></td>
<td width="70%"><input type="text" name="DescripcionConcepto" value="'.$row2xml["DescripcionConcepto"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>MONEDA</label></td>
<td width="70%"><input type="text" name="MonedaF" value="'.$row2xml["MonedaF"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>TIPO DE CAMBIO</label></td>
<td width="70%"><input type="text" name="TipoCambio" value="'.$row2xml["TipoCambio"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>USO DE CFDI</label></td>
<td width="70%"><input type="text" name="UsoCFDI" value="'.$row2xml["UsoCFDI"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>METODO DE PAGO</label></td>
<td width="70%"><input type="text" name="metodoDePago" value="'.$row2xml["metodoDePago"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>CONDICIONES DE PAGO</label></td>
<td width="70%"><input type="text" name="condicionesDePago" value="'.$row2xml["condicionesDePago"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>TIPO DE COMPROBANTE</label></td>
<td width="70%"><input type="text" name="tipoDeComprobante" value="'.$row2xml["tipoDeComprobante"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>VERSIÓN</label></td>
<td width="70%">NO</td>
</tr>
<input type="hidden" name="actualiza" value="true">
<tr style="background: #fbf696">
<td width="30%"><label>FECHA DE TIMBRADO</label></td>
<td width="70%"><input type="text" name="fechaTimbrado" value="'.$row2xml["fechaTimbrado"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>SUBTOTAL</label></td>
<td width="70%"><input type="text" name="subTotal" value="'.$row2xml["subTotal"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>SERVICIO, PROPINA,ISH Y SANAMIENTO</label></td>
<td width="70%"><input type="text" name="propina" value="'.$row2xml["propina"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>DESCUENTO</label></td>
<td width="70%"><input type="text" name="DESCUENTO" value="'.$row2xml["DESCUENTO"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>TOTAL DE IMPUESTOS TRANSLADADOS</label></td>
<td width="70%"><input type="text" name="TImpuestosTrasladados" value="'.$row2xml["TImpuestosTrasladados"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>TOTAL</label></td>
<td width="70%"><input type="text" name="totalf" value="'.$row2xml["totalf"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>TUA</label></td>
<td width="70%"><input type="text" name="TUA" value="'.$row2xml["TUA"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>TUA TOTAL CARGOS:</label></td>
<td width="70%"><input type="text" name="TuaTotalCargos" value="'.$row2xml["TuaTotalCargos"].'"></td>
</tr>

<tr style="background: #fbf696">
<td width="30%"><label>% POR FALTA DE FACTURA</label></td>
<td width="70%"><input type="text" name="PorfaltaDeFactura" value="'.$row2xml["PorfaltaDeFactura"].'"></td>
</tr>




<tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA:</label></td>
<td width="70%"><input  type=»text» readonly=»readonly» name="FECHA_DE_LLENADO" value="'.$row2xml["FECHA_DE_LLENADO"].'"></td>
</tr>

'; 
 
 
	}else{
	$campos_xml = '';
	}
 
 
 
 
 
 
 
 
     $output .= '

 <tr>

<td width="30%"><label>ADJUNTAR FACTURA (FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_FACTURA_PDF\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_PDF" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_FACTURA_PDF\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_FACTURA_PDF"] .' " required /></p>
<input type="file" name="ADJUNTAR_FACTURA_PDF" id="nono"/>
<div id="2ADJUNTAR_FACTURA_PDF">
'.$ADJUNTAR_FACTURA_PDF.'
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR FACTURA (FORMATO XML)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_FACTURA_XML\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_FACTURA_XML" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_FACTURA_XML\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_FACTURA_XML"] .' " required /></p>
<input type="file" name="ADJUNTAR_FACTURA_XML" id="nono"/>
<div id="2ADJUNTAR_FACTURA_XML">
'.$ADJUNTAR_FACTURA_XML.'
</tr> 

<tr>
<td width="30%"><label>NÚMERO CONSECUTIVO DE PAGO A PROVEEDORES</label></td>
<td width="70%"><input type="text" name="NUMERO_CONSECUTIVO_PROVEE" value="'.$row["NUMERO_CONSECUTIVO_PROVEE"].'"></td>
</tr>
<tr> 
<td width="30%"><label>PAGO A PROVEEDOR O VIATICO</label></td>
<td width="70%"><input type="text" name="VIATICOSOPRO" value="'.$row["VIATICOSOPRO"].'"></td>
</tr>
<tr>
<td width="30%"><label>NOMBRE COMERCIAL</label></td>
<td width="70%"><input type="text" name="NOMBRE_COMERCIAL" value="'.$row["NOMBRE_COMERCIAL"].'"></td>
</tr> 

<tr>
<td width="30%"><label>RAZÓN SOCIAL</label></td>
<td width="70%"><input type="text" name="RAZON_SOCIAL" value="'.$row["RAZON_SOCIAL"].'"></td>
</tr>

<tr>
<td width="30%"><label>RFC DEL PROVEEDOR</label></td>
<td width="70%"><input type="text" name="RFC_PROVEEDOR" value="'.$row["RFC_PROVEEDOR"].'"></td>
</tr> 

<tr>
<td width="30%"><label>No. DE EVENTO</label></td>
<td width="70%"><input type="text" name="NUMERO_EVENTO" value="'.$row["NUMERO_EVENTO"].'"></td>
</tr> 


<tr>
<td width="30%"><label>NOMBRE DEL EVENTO</label></td>
<td width="70%"><input type="text" name="NOMBRE_EVENTO" value="'.$row["NOMBRE_EVENTO"].'"></td>
</tr> 

<tr>
<td width="30%"><label>MOTIVO DEL GASTO</label></td>
<td width="70%"><input type="text" name="MOTIVO_GASTO" value="'.$row["MOTIVO_GASTO"].'"></td>
</tr> 
<tr>
<td width="30%"><label>CONCEPTO DE LA FACTURA</label></td>
<td width="70%"><input type="text" name="CONCEPTO_PROVEE" value="'.$row["CONCEPTO_PROVEE"].'"></td>
</tr> 

<tr>
<td width="30%"><label>MONTO TOTAL DE LA COTIZACIÓN O DEL ADEUDO</label></td>
<td width="70%"><input type="text" name="MONTO_TOTAL_COTIZACION_ADEUDO" value="'.$row["MONTO_TOTAL_COTIZACION_ADEUDO"].'"></td>
</tr> 

<tr style="background: #c3f5d9">
<td width="30%"><label>MONTO DE LA FACTURA</label></td>
<td width="70%"><input type="text" name="MONTO_FACTURA" value="'.$row["MONTO_FACTURA"].'"></td>
</tr>

<tr>
<td width="30%"><label>MONTO DE LA PROPINA O SERVICIO NO INCLUIDO EN LA FACTURA</label></td>
<td width="70%"><input type="text" name="MONTO_PROPINA" value="'.$row["MONTO_PROPINA"].'"></td>
</tr> 

<tr>
<td width="30%"><label>MONTO A DEPOSITAR</label></td>
<td width="70%"><input type="text" name="MONTO_DEPOSITAR" value="'.$row["MONTO_DEPOSITAR"].'"></td>
</tr> 

<tr>
<td width="30%"><label>TIPO DE MONEDA O DIVISA</label></td>
<td width="70%"><input type="text" name="TIPO_DE_MONEDA" value="'.$row["TIPO_DE_MONEDA"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DE PROGRAMACIÓN DE PAGO</label></td>
<td width="70%"><input type="text" name="FECHA_DE_PAGO" value="'.$row["FECHA_DE_PAGO"].'"></td>
</tr> 

<tr>
<td width="30%"><label>FECHA DE PAGO</label></td>
<td width="70%"><input type="text" name="FECHA_A_DEPOSITAR" value="'.$row["FECHA_A_DEPOSITAR"].'"></td>
</tr> 
<tr style="background: #c3f5d9">
<td width="30%"><label>STATUS DE PAGO</label></td>
<td width="70%">'.$STATUS_DE_PAGO .'</td>
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR COTIZACIÓN O REPORTE: (CUAQUIER FORMATO)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_COTIZACION\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_COTIZACION" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_COTIZACION\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_COTIZACION"] .' " required /></p>
<input type="file" name="ADJUNTAR_COTIZACION" id="nono"/>
<div id="2ADJUNTAR_COTIZACION">
'.$ADJUNTAR_COTIZACION.'
</tr> 

<tr>
<td width="30%"><label>ADJUNTAR COMPROBANTE DE TRANSFERENCIA: (FORMATO PDF)</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'CONPROBANTE_TRANSFERENCIA\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="CONPROBANTE_TRANSFERENCIA" type="text" onkeydown="return false" onclick="file_explorer2(\'CONPROBANTE_TRANSFERENCIA\');" style="width:250px;" VALUE="'.$row["CONPROBANTE_TRANSFERENCIA"] .' " required /></p>
<input type="file" name="CONPROBANTE_TRANSFERENCIA" id="nono"/>
<div id="2CONPROBANTE_TRANSFERENCIA">
'.$CONPROBANTE_TRANSFERENCIA.'
</tr> 




<tr>

<td width="30%"><label> ADJUNTAR COMPROBANTE DE DEVOLUCIÓN DE DINERO A EPC</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'COMPROBANTE_DE_DEVOLUCION\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="COMPROBANTE_DE_DEVOLUCION" type="text" onkeydown="return false" onclick="file_explorer2(\'COMPROBANTE_DE_DEVOLUCION\');" style="width:250px;" VALUE="'.$row["COMPROBANTE_DE_DEVOLUCION"] .' " required /></p>
<input type="file" name="COMPROBANTE_DE_DEVOLUCION" id="nono"/>
<div id="3COMPROBANTE_DE_DEVOLUCION">
'.$COMPROBANTE_DE_DEVOLUCION.'
</tr>




<td width="30%"><label>NOMBRE DEL EJECUTIVO QUE REALIZÓ LA COMPRA</label></td>
<td width="70%"><input type="text" name="NOMBRE_DEL_EJECUTIVO" value="'.$row["NOMBRE_DEL_EJECUTIVO"].'"></td>
</tr>

<tr style="background: #ee5330">

<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_1" value="'.$row["OBSERVACIONES_1"].'"></td>
</tr>

<tr>
<td width="30%"><label>ADJUNTAR ARCHIVO RELACIONADO A ESTE GASTO</label></td>
<td width="70%">	<div id="drop_file_zone" ondrop="upload_file2(event,\'ADJUNTAR_ARCHIVO_1\')" ondragover="return false" style="width:300px;">
<p>Suelta aquí o busca tu archivo</p>
<p><input class="form-control form-control-sm" id="ADJUNTAR_ARCHIVO_1" type="text" onkeydown="return false" onclick="file_explorer2(\'ADJUNTAR_ARCHIVO_1\');" style="width:250px;" VALUE="'.$row["ADJUNTAR_ARCHIVO_1"] .' " required /></p>
<input type="file" name="ADJUNTAR_ARCHIVO_1" id="nono"/>
<div id="3ADJUNTAR_ARCHIVO_1">
'.$ADJUNTAR_ARCHIVO_1.'
</tr>
<tr><td colspan=2>
<table id="reseteaxml" style="width:100%;">'.$campos_xml.'</table>
</td></tr>
<tr>
	
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%"><button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickVO">GUARDAR11</button>
			
			<input type="hidden" value="ENVIARventasoper"  name="ENVIARventasoper"/>
			<input type="hidden" value="'.$row["id"].'"  name="IPventasoperar" id="IPventasoperar"/>
			</td>  
        </tr>

     ';
    }
    $output .= '</table></div>

	</form>';
    echo $output;
}

?>

<script>
	var fileobj;
	function upload_file2(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload2(fileobj,name);
	}
	 
	function file_explorer2(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload2(fileobj,name);
	    };
	}

	function ajax_file_upload2(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IPventasoperar",  $("#IPventasoperar").val());
	        $.ajax({
	            type: 'POST',
                url:"ventasoperaciones/controladorVO.php",
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#3'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#respuestaser').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {

if($.trim(response) == 2 ){

$('#3'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}
else if($.trim(response) == 3 ){
$('#3'+nombre).html('<p style="color:red;">UUID PREVIAMENTE CARGADO.</p>');
//$('#'+nombre).val("");
}
else{
	
		var result = response.split('^^');
		$('#'+nombre).val(result[1]);
		$('#3'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(result[0])+'">Visualizar!</a>');

		if(result[1].length>1){
			$('#respuestaser').html('<p style="color:green;font-size:25px;font-weight: bolder;">XML CORRECTAMENTE CARGADO CON EL UUID:<br> '+result[1]+'</p>');
			$('#reseteaxml').remove(); 
		}
		
/*$('#'+nombre).val(response);
$('#3'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');*/
}

	            }
	        });
	    }
	}
    $(document).ready(function(){


$("#clickVO").click(function(){
	
   $.ajax({  
    url:"ventasoperaciones/controladorVO.php",
    method:"POST",  
    data:$('#ListadoPAGOPROVEE').serialize(),

    beforeSend:function(){  
    $('#respuestaser').html('cargando'); 
    }, 	
	
    success:function(data){
	
		if($.trim(data)=='Ingresado' || $.trim(data)=='Actualizado'){
				
			$('#dataModal').modal('hide');
				$.getScript(load(1));
			//$("#resetSB").load(location.href + " #resetSB");
	$("#results").load("ventasoperaciones/fetch_pagesVO.php");			
			$("#respuestaser").html("<span id='ACTUALIZADO' >"+data+"</span>");

			}else{
				
			$("#respuestaser").html(data);
			
		}
    }  
   });
   
});

		});
		
	</script>