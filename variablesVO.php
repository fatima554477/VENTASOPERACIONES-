<?php 


$ROWDirEmpresa = $ventasoperaciones->variable_DIRECCIONP1();

$ROWotrosp12= array('VALIDADIRECCIONEP1' =>'VALIDADIRECCIONEP1');
$direcciondeempresaporcentaje =$conexion->contadorporcentaje($ROWDirEmpresa,$ROWotrosp12);


$P_DIRECCION_FISCAL_EMPRESA = isset($ROWDirEmpresa["P_DIRECCION_FISCAL_EMPRESA"])?$ROWDirEmpresa["P_DIRECCION_FISCAL_EMPRESA"]:"";
$P_EDIFICIO_EMPRESA = isset($ROWDirEmpresa["P_EDIFICIO_EMPRESA"])?$ROWDirEmpresa["P_EDIFICIO_EMPRESA"]:"";
$P_CALLE_EMPRESA = isset($ROWDirEmpresa["P_CALLE_EMPRESA"])?$ROWDirEmpresa["P_CALLE_EMPRESA"]:"";
$P_NUMERO_EXTERIOR_EMPRESA = isset($ROWDirEmpresa["P_NUMERO_EXTERIOR_EMPRESA"])?$ROWDirEmpresa["P_NUMERO_EXTERIOR_EMPRESA"]:"";
$P_NUMERO_INTERIOR_EMPRESA = isset($ROWDirEmpresa["P_NUMERO_INTERIOR_EMPRESA"])?$ROWDirEmpresa["P_NUMERO_INTERIOR_EMPRESA"]:"";
$P_NUMERO_OFICINA_EMPRESA = isset($ROWDirEmpresa["P_NUMERO_OFICINA_EMPRESA"])?$ROWDirEmpresa["P_NUMERO_OFICINA_EMPRESA"]:"";
$P_COLONIA_EMPRESA = isset($ROWDirEmpresa["P_COLONIA_EMPRESA"])?$ROWDirEmpresa["P_COLONIA_EMPRESA"]:"";
$P_ALCALDIA_EMPRESA = isset($ROWDirEmpresa["P_ALCALDIA_EMPRESA"])?$ROWDirEmpresa["P_ALCALDIA_EMPRESA"]:"";
$P_C_P_EMPRESA = isset($ROWDirEmpresa["P_C_P_EMPRESA"])?$ROWDirEmpresa["P_C_P_EMPRESA"]:"";
$P_CIUDAD_EMPRESA = isset($ROWDirEmpresa["P_CIUDAD_EMPRESA"])?$ROWDirEmpresa["P_CIUDAD_EMPRESA"]:"";
$P_ESTADO_EMPRESA = isset($ROWDirEmpresa["P_ESTADO_EMPRESA"])?$ROWDirEmpresa["P_ESTADO_EMPRESA"]:"";
$P_PAIS_EMPRESA = isset($ROWDirEmpresa["P_PAIS_EMPRESA"])?$ROWDirEmpresa["P_PAIS_EMPRESA"]:"";
$dircasa11 = isset($ROWDirEmpresa["dircasa11"])?$ROWDirEmpresa["dircasa11"]:"";
$P_UBICACION_MAPA_1 = isset($ROWDirEmpresa["P_UBICACION_MAPA_1"])?$ROWDirEmpresa["P_UBICACION_MAPA_1"]:"";
$P_TELEFONO_1_EMPRESA = isset($ROWDirEmpresa["P_TELEFONO_1_EMPRESA"])?$ROWDirEmpresa["P_TELEFONO_1_EMPRESA"]:"";
$P_TELEFONO_2_EMPRESA = isset($ROWDirEmpresa["P_TELEFONO_2_EMPRESA"])?$ROWDirEmpresa["P_TELEFONO_2_EMPRESA"]:"";
$P_WHATSAPP_EMPRESA_1 = isset($ROWDirEmpresa["P_WHATSAPP_EMPRESA_1"])?$ROWDirEmpresa["P_WHATSAPP_EMPRESA_1"]:"";
$P_IMAIL_EMPRESA = isset($ROWDirEmpresa["P_IMAIL_EMPRESA"])?$ROWDirEmpresa["P_IMAIL_EMPRESA"]:"";
$P_PAGINA_WEB_EMPRESA = isset($ROWDirEmpresa["P_PAGINA_WEB_EMPRESA"])?$ROWDirEmpresa["P_PAGINA_WEB_EMPRESA"]:"";
$P_NOMBRE_APP_EMPRESA = isset($ROWDirEmpresa["P_NOMBRE_APP_EMPRESA"])?$ROWDirEmpresa["P_NOMBRE_APP_EMPRESA"]:"";


$numero_evento_get = isset($_GET['num_evento'])?urldecode($_GET['num_evento']):'';
if($numero_evento_get!=''){
$NOMBRE_EVENTO_get = $ventasoperaciones->buscarnombre($numero_evento_get);




}
