<?php
/*
nombre:controladorVO.php
fecha sandor: 21/ABRIL/2024
fecha fatis : 16/04/2026
*/
?>

<?php
    if(!isset($_SESSION))
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/ventasoperaciones/class.epcinnVO.php");

$ventasoperaciones= NEW accesoclase();
$conexion = NEW colaboradores();                            
$conexion2 = new herramientas();

$hiddenVENTASOPERACIONES = isset($_POST["hiddenVENTASOPERACIONES"])?$_POST["hiddenVENTASOPERACIONES"]:"";
$borraventasoperaciones = isset($_POST["borraventasoperaciones"])?$_POST["borraventasoperaciones"]:"";
$validaDATOSBANCARIOS1 = isset($_POST["validaDATOSBANCARIOS1"])?$_POST["validaDATOSBANCARIOS1"]:"";
$ENVIARRdatosbancario1p = isset($_POST["ENVIARRdatosbancario1p"])?$_POST["ENVIARRdatosbancario1p"]:"";
$ENVIARventasoper = isset($_POST["ENVIARventasoper"])?$_POST["ENVIARventasoper"]:""; 
$borra_datos_bancario1 = isset($_POST["borra_datos_bancario1"])?$_POST["borra_datos_bancario1"]:"";
$DAbancaPRO_ENVIAR_IMAIL = isset($_POST["DAbancaPRO_ENVIAR_IMAIL"])?$_POST["DAbancaPRO_ENVIAR_IMAIL"]:"";
$borrasb = isset($_POST["borrasb"])?$_POST["borrasb"]:""; 
$borrasbdoc = isset($_POST["borrasbdoc"])?$_POST["borrasbdoc"]:"";
$busqueda = isset($_POST["busqueda"])?$_POST["busqueda"]:"";

$q = isset($_POST["q"])?$_POST["q"]:"";
if($q==true){
    $json = [];
    $json = $ventasoperaciones->buscarnumero2($q);
    echo json_encode($json);	
}

$action = isset($_POST["action"])?$_POST["action"]:"";

if($action=='ultimopago'){
    $NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:"";
    echo $resultado = $ventasoperaciones->ultimopago($NUMERO_EVENTO);
}

if($action=='ajax'){
    $NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:"";
    echo $resultado = $ventasoperaciones->buscarnombre($NUMERO_EVENTO);
}

if($action=='bitacora'){
    $idSubetufactura = isset($_POST["idSubetufactura"])?$_POST["idSubetufactura"]:"";
    $bitacora = $ventasoperaciones->Listado_bitacora_pagoproveedor_array($idSubetufactura);
    echo json_encode($bitacora);
    exit;
}

if($busqueda==true){
    $resultado = $ventasoperaciones->buscarnumero($busqueda);
    echo json_encode($resultado);
}

if($hiddenVENTASOPERACIONES == 'hiddenVENTASOPERACIONES' or $ENVIARventasoper == 'ENVIARventasoper'){            

$NUMERO_CONSECUTIVO_PROVEE = isset($_POST["NUMERO_CONSECUTIVO_PROVEE"])?$_POST["NUMERO_CONSECUTIVO_PROVEE"]:"";
$NOMBRE_COMERCIAL = isset($_POST["NOMBRE_COMERCIAL"])?$_POST["NOMBRE_COMERCIAL"]:"";
$NOMBRE_COMERCIAL23 = isset($_POST["NOMBRE_COMERCIAL23"])?$_POST["NOMBRE_COMERCIAL23"]:"";
$RAZON_SOCIAL = isset($_POST["RAZON_SOCIAL"])?$_POST["RAZON_SOCIAL"]:"";
$VIATICOSOPRO = isset($_POST["VIATICOSOPRO"])?$_POST["VIATICOSOPRO"]:"";
$RFC_PROVEEDOR = isset($_POST["RFC_PROVEEDOR"])?$_POST["RFC_PROVEEDOR"]:"";
$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"])?$_POST["NUMERO_EVENTO"]:"";
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?$_POST["NOMBRE_EVENTO"]:"";
$MOTIVO_GASTO = isset($_POST["MOTIVO_GASTO"])?$_POST["MOTIVO_GASTO"]:"";
$CONCEPTO_PROVEE = isset($_POST["CONCEPTO_PROVEE"])?$_POST["CONCEPTO_PROVEE"]:"";
$MONTO_TOTAL_COTIZACION_ADEUDO = isset($_POST["MONTO_TOTAL_COTIZACION_ADEUDO"])?$_POST["MONTO_TOTAL_COTIZACION_ADEUDO"]:"";
$MONTO_DEPOSITAR = isset($_POST["MONTO_DEPOSITAR"])?$_POST["MONTO_DEPOSITAR"]:"";
$MONTO_PROPINA = isset($_POST["MONTO_PROPINA"])?$_POST["MONTO_PROPINA"]:"";
$FECHA_AUTORIZACION_RESPONSABLE = isset($_POST["FECHA_AUTORIZACION_RESPONSABLE"])?$_POST["FECHA_AUTORIZACION_RESPONSABLE"]:"";
$FECHA_AUTORIZACION_AUDITORIA = isset($_POST["FECHA_AUTORIZACION_AUDITORIA"])?$_POST["FECHA_AUTORIZACION_AUDITORIA"]:"";
$FECHA_DE_LLENADO = isset($_POST["FECHA_DE_LLENADO"])?$_POST["FECHA_DE_LLENADO"]:"";
$MONTO_FACTURA = isset($_POST["MONTO_FACTURA"])?$_POST["MONTO_FACTURA"]:"";
$TIPO_DE_MONEDA = isset($_POST["TIPO_DE_MONEDA"])?$_POST["TIPO_DE_MONEDA"]:"";
$PFORMADE_PAGO = isset($_POST["PFORMADE_PAGO"])?$_POST["PFORMADE_PAGO"]:"";
$FECHA_DE_PAGO = isset($_POST["FECHA_DE_PAGO"])?$_POST["FECHA_DE_PAGO"]:"";
$FECHA_A_DEPOSITAR = isset($_POST["FECHA_A_DEPOSITAR"])?$_POST["FECHA_A_DEPOSITAR"]:"";
$STATUS_DE_PAGO = isset($_POST["STATUS_DE_PAGO"])?$_POST["STATUS_DE_PAGO"]:"";
$BANCO_ORIGEN = isset($_POST["BANCO_ORIGEN"])?$_POST["BANCO_ORIGEN"]:"";
$MONTO_DEPOSITADO = isset($_POST["MONTO_DEPOSITADO"])?$_POST["MONTO_DEPOSITADO"]:"";
$CLASIFICACION_GENERAL = isset($_POST["CLASIFICACION_GENERAL"])?$_POST["CLASIFICACION_GENERAL"]:"";
$CLASIFICACION_ESPECIFICA = isset($_POST["CLASIFICACION_ESPECIFICA"])?$_POST["CLASIFICACION_ESPECIFICA"]:"";
$PLACAS_VEHICULO = isset($_POST["PLACAS_VEHICULO"])?$_POST["PLACAS_VEHICULO"]:"";
$MONTO_DE_COMISION = isset($_POST["MONTO_DE_COMISION"])?$_POST["MONTO_DE_COMISION"]:"";
$POLIZA_NUMERO = isset($_POST["POLIZA_NUMERO"])?$_POST["POLIZA_NUMERO"]:"";
$NOMBRE_DEL_EJECUTIVO = isset($_POST["NOMBRE_DEL_EJECUTIVO"])?$_POST["NOMBRE_DEL_EJECUTIVO"]:"";
$NOMBRE_DEL_AYUDO = isset($_POST["NOMBRE_DEL_AYUDO"])?$_POST["NOMBRE_DEL_AYUDO"]:"";
$OBSERVACIONES_1 = isset($_POST["OBSERVACIONES_1"])?$_POST["OBSERVACIONES_1"]:"";
$hiddenVENTASOPERACIONES = isset($_POST["hiddenVENTASOPERACIONES"])?$_POST["hiddenVENTASOPERACIONES"]:""; 
$IPventasoperar = isset($_POST["IPventasoperar"])?$_POST["IPventasoperar"]:""; 
$TIPO_CAMBIOP = isset($_POST["TIPO_CAMBIOP"])?$_POST["TIPO_CAMBIOP"]:"";
$TOTAL_ENPESOS = isset($_POST["TOTAL_ENPESOS"])?$_POST["TOTAL_ENPESOS"]:"";
$IMPUESTO_HOSPEDAJE = isset($_POST["IMPUESTO_HOSPEDAJE"])?$_POST["IMPUESTO_HOSPEDAJE"]:"";
$IVA = isset($_POST["IVA"])?$_POST["IVA"]:"";
$TImpuestosRetenidosIVA = isset($_POST["TImpuestosRetenidosIVA"])?$_POST["TImpuestosRetenidosIVA"]:"";
$TImpuestosRetenidosISR = isset($_POST["TImpuestosRetenidosISR"])?$_POST["TImpuestosRetenidosISR"]:"";
$descuentos = isset($_POST["descuentos"])?$_POST["descuentos"]:"";
$FechaTimbrado = isset($_POST["FechaTimbrado"])?$_POST["FechaTimbrado"]:""; 
$tipoDeComprobante = isset($_POST["tipoDeComprobante"])?$_POST["tipoDeComprobante"]:""; 
$metodoDePago = isset($_POST["metodoDePago"])?$_POST["metodoDePago"]:""; 
$formaDePago = isset($_POST["formaDePago"])?$_POST["formaDePago"]:""; 
$condicionesDePago = isset($_POST["condicionesDePago"])?$_POST["condicionesDePago"]:""; 
$subTotal = isset($_POST["subTotal"])?$_POST["subTotal"]:""; 
$TipoCambio = isset($_POST["TipoCambio"])?$_POST["TipoCambio"]:""; 
$Moneda = isset($_POST["Moneda"])?$_POST["Moneda"]:""; 
$total = isset($_POST["total"])?$_POST["total"]:""; 
$serie = isset($_POST["serie"])?$_POST["serie"]:""; 
$folio = isset($_POST["folio"])?$_POST["folio"]:""; 
$LugarExpedicion = isset($_POST["LugarExpedicion"])?$_POST["LugarExpedicion"]:""; 
$rfcE = isset($_POST["rfcE"])?$_POST["rfcE"]:"";
$nombreE = isset($_POST["nombreE"])?$_POST["nombreE"]:""; 
$regimenE = isset($_POST["regimenE"])?$_POST["regimenE"]:""; 
$rfcR = isset($_POST["rfcR"])?$_POST["rfcR"]:""; 
$nombreR = isset($_POST["nombreR"])?$_POST["nombreR"]:""; 
$UsoCFDI = isset($_POST["UsoCFDI"])?$_POST["UsoCFDI"]:""; 
$DomicilioFiscalReceptor = isset($_POST["DomicilioFiscalReceptor"])?$_POST["DomicilioFiscalReceptor"]:""; 
$RegimenFiscalReceptor = isset($_POST["RegimenFiscalReceptor"])?$_POST["RegimenFiscalReceptor"]:""; 
$UUID = isset($_POST["UUID"])?$_POST["UUID"]:""; 
$TImpuestosRetenidos = isset($_POST["TImpuestosRetenidos"])?$_POST["TImpuestosRetenidos"]:""; 
$TImpuestosTrasladados = isset($_POST["TImpuestosTrasladados"])?$_POST["TImpuestosTrasladados"]:"";
$TuaTotalCargos = isset($_POST["TuaTotalCargos"])?$_POST["TuaTotalCargos"]:"";
$TUA = isset($_POST["TUA"])?$_POST["TUA"]:"";
$Descuento = isset($_POST["Descuento"])?$_POST["Descuento"]:"";
$Propina = isset($_POST["Propina"])?$_POST["Propina"]:"";
$actualiza = isset($_POST["actualiza"])?trim($_POST["actualiza"]):"";

    if($NOMBRE_COMERCIAL == '' and $NOMBRE_COMERCIAL23 != ''){
        $NOMBRE_COMERCIAL = $NOMBRE_COMERCIAL23;
    }

if($NOMBRE_COMERCIAL == "" OR $NUMERO_EVENTO == "" OR $FECHA_DE_PAGO == ""){
    echo "<P style='color:red; font-size:23px;'>FAVOR DE LLENAR CAMPOS OBLIGATORIOS</p>";   
}else{	
    echo $ventasoperaciones->ventasyoperacionesP ($NUMERO_CONSECUTIVO_PROVEE , $NOMBRE_COMERCIAL , $RAZON_SOCIAL ,$VIATICOSOPRO, $RFC_PROVEEDOR , $NUMERO_EVENTO ,$NOMBRE_EVENTO, $MOTIVO_GASTO , $CONCEPTO_PROVEE , $MONTO_TOTAL_COTIZACION_ADEUDO , $MONTO_DEPOSITAR , $MONTO_PROPINA , $FECHA_AUTORIZACION_RESPONSABLE , $FECHA_AUTORIZACION_AUDITORIA , $FECHA_DE_LLENADO , $MONTO_FACTURA , $TIPO_DE_MONEDA ,$PFORMADE_PAGO, $FECHA_DE_PAGO , $FECHA_A_DEPOSITAR , $STATUS_DE_PAGO , $BANCO_ORIGEN , $MONTO_DEPOSITADO , $CLASIFICACION_GENERAL , $CLASIFICACION_ESPECIFICA , $PLACAS_VEHICULO , $MONTO_DE_COMISION , $POLIZA_NUMERO , $NOMBRE_DEL_EJECUTIVO ,$NOMBRE_DEL_AYUDO, $OBSERVACIONES_1, $TIPO_CAMBIOP,  $TOTAL_ENPESOS,$IMPUESTO_HOSPEDAJE,$TImpuestosRetenidosIVA,$TImpuestosRetenidosISR,$descuentos,$IVA,  $ENVIARventasoper,$hiddenVENTASOPERACIONES,$IPventasoperar,
    $FechaTimbrado, $tipoDeComprobante, 
        $metodoDePago, $formaDePago, $condicionesDePago, $subTotal, 
        $TipoCambio, $Moneda, $total, $serie, 
        $folio, $LugarExpedicion, $rfcE, $nombreE, 
        $regimenE, $rfcR, $nombreR, $UsoCFDI, 
        $DomicilioFiscalReceptor, $RegimenFiscalReceptor, $UUID, $TImpuestosRetenidos, 
        $TImpuestosTrasladados, $TuaTotalCargos, $Descuento,$Propina, $TUA,$actualiza  );
}

}	
elseif($borraventasoperaciones == 'borraventasoperaciones'){
    $borra_id_VO = isset($_POST["borra_id_VO"])?$_POST["borra_id_VO"]:"";   
    echo  $ventasoperaciones->borraventasoperaciones($borra_id_VO);
}

elseif($borrasbdoc =='borrasbdoc'){
    $borra_id_sb = isset($_POST["borra_id_sb"])?$_POST["borra_id_sb"]:"";   
    echo  $ventasoperaciones->delete_subefacturadocto2($borra_id_sb);
}


// ══════════════════════════════════════════════════════════════════════════
// HELPER: detectar uploads válidos de forma centralizada
// ══════════════════════════════════════════════════════════════════════════
$hasUpload = static function($field) {
    return isset($_FILES[$field])
        && is_array($_FILES[$field])
        && isset($_FILES[$field]['error'])
        && intval($_FILES[$field]['error']) === UPLOAD_ERR_OK
        && isset($_FILES[$field]['name'])
        && trim((string)$_FILES[$field]['name']) !== '';
};

$subidaFacturaXML          = $hasUpload('ADJUNTAR_FACTURA_XML');
$subidaFacturaPDF          = $hasUpload('ADJUNTAR_FACTURA_PDF');
$subidaCotizacion          = $hasUpload('ADJUNTAR_COTIZACION');
$subidaTransfer            = $hasUpload('CONPROBANTE_TRANSFERENCIA');
$subidaArchivo1            = $hasUpload('ADJUNTAR_ARCHIVO_1');
$subidaCompPagoPDF         = $hasUpload('COMPLEMENTOS_PAGO_PDF');
$subidaCompPagoXML         = $hasUpload('COMPLEMENTOS_PAGO_XML');
$subidaCancelPDF           = $hasUpload('CANCELACIONES_PDF');
$subidaCancelXML           = $hasUpload('CANCELACIONES_XML');
$subidaFactComPDF          = $hasUpload('ADJUNTAR_FACTURA_DE_COMISION_PDF');
$subidaFactComXML          = $hasUpload('ADJUNTAR_FACTURA_COMISION_XML');   // ojo: nombre original del controlador VO
$subidaCalculoComision     = $hasUpload('CALCULO_DE_COMISION');
$subidaComprobanteDevol    = $hasUpload('COMPROBANTE_DE_DEVOLUCION');
$subidaNotaCredito         = $hasUpload('NOTA_DE_CREDITO_COMPRA');

$hayAlgunaSubida = (
    $subidaFacturaXML || $subidaFacturaPDF || $subidaCotizacion  || $subidaTransfer   ||
    $subidaArchivo1   || $subidaCompPagoPDF || $subidaCompPagoXML || $subidaCancelPDF  ||
    $subidaCancelXML  || $subidaFactComPDF  || $subidaFactComXML  || $subidaCalculoComision ||
    $subidaComprobanteDevol || $subidaNotaCredito
);


// ══════════════════════════════════════════════════════════════════════════
// VALIDACIONES GLOBALES DE ARCHIVOS
// Aplican a TODOS los campos antes de cualquier procesamiento
// ══════════════════════════════════════════════════════════════════════════

// ── Archivos vacíos (0 bytes) ─────────────────────────────────────────────
foreach ($_FILES as $campo => $datos) {
    if (isset($datos['error']) && intval($datos['error']) === UPLOAD_ERR_OK) {
        if (isset($datos['size']) && intval($datos['size']) === 0) {
            echo 'VACIO^^' . $campo;
            exit;
        }
    }
}

// ── Archivos sin extensión ────────────────────────────────────────────────
foreach ($_FILES as $campo => $datos) {
    if (isset($datos['error']) && intval($datos['error']) === UPLOAD_ERR_OK) {
        $nombreArchivo = isset($datos['name']) ? $datos['name'] : '';
        $partes = explode('.', $nombreArchivo);
        if (count($partes) < 2 || trim(end($partes)) === '') {
            echo 'SIN_EXTENSION^^' . $campo;
            exit;
        }
    }
}

// ── Formato estricto para XML y PDF de factura ────────────────────────────
if ($subidaFacturaXML &&
    strtolower(pathinfo($_FILES['ADJUNTAR_FACTURA_XML']['name'], PATHINFO_EXTENSION)) !== 'xml') {
    echo '4';
    exit;
}

if ($subidaFacturaPDF &&
    strtolower(pathinfo($_FILES['ADJUNTAR_FACTURA_PDF']['name'], PATHINFO_EXTENSION)) !== 'pdf') {
    echo '4';
    exit;
}


// ── Funciones de validación del receptor ─────────────────────────────────
if(!function_exists('normalizarTextoEmpresaVO')){
    function normalizarTextoEmpresaVO($texto){
        $texto = mb_strtoupper(trim((string)$texto), 'UTF-8');
        $texto = preg_replace('/\s+/', ' ', $texto);
        return $texto;
    }
}

if(!function_exists('receptorCorporativoValidoVO')){
    function receptorCorporativoValidoVO($nombreReceptor){
        $nombreReceptor = isset($nombreReceptor) ? trim((string)$nombreReceptor) : '';
        if($nombreReceptor === '') return true;
        $empresasCorporativo = array(
            normalizarTextoEmpresaVO('EVENTOS PROMOCIONES Y CONVENCIONES'),
            normalizarTextoEmpresaVO('INNOVA CONGRESOS Y CONVENCIONES'),
            normalizarTextoEmpresaVO('EVENTOS 520')
        );
        return in_array(normalizarTextoEmpresaVO($nombreReceptor), $empresasCorporativo);
    }
}


// ══════════════════════════════════════════════════════════════════════════
// PRE-CARGA DEL XML TEMPORAL
// ══════════════════════════════════════════════════════════════════════════

$ADJUNTAR_FACTURA_XML2 = '';
$regreso               = [];
$idwebc                = '';

if ($subidaFacturaXML) {

    $ADJUNTAR_FACTURA_XML2 = $ventasoperaciones->solocargartemp('ADJUNTAR_FACTURA_XML');

    // ── Interceptar errores de solocargartemp ─────────────────────────────
    if ($ADJUNTAR_FACTURA_XML2 === 'VACIO') {
        echo 'VACIO^^ADJUNTAR_FACTURA_XML';
        exit;
    }
    if ($ADJUNTAR_FACTURA_XML2 === 'SIN_EXTENSION') {
        echo 'SIN_EXTENSION^^ADJUNTAR_FACTURA_XML';
        exit;
    }
    if ($ADJUNTAR_FACTURA_XML2 === 'ERROR_SUBIDA') {
        echo 'ERROR_SUBIDA^^ADJUNTAR_FACTURA_XML';
        exit;
    }
    if ($ADJUNTAR_FACTURA_XML2 === '1' || $ADJUNTAR_FACTURA_XML2 === '2') {
        echo '4';
        exit;
    }
    // ─────────────────────────────────────────────────────────────────────

    $url    = __ROOT1__ . '/includes/archivos/' . $ADJUNTAR_FACTURA_XML2;
    $regreso = $conexion2->lectorxml($url);

    // ── XML vacío o sin UUID ──────────────────────────────────────────────
    if (empty($regreso) || !isset($regreso['UUID']) || trim($regreso['UUID']) === '') {
        echo '5^^';
        UNLINK($url);
        $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML2);
        exit;
    }

    // ── Receptor no válido ────────────────────────────────────────────────
    $nombreReceptor = isset($regreso['nombreR']) ? $regreso['nombreR'] : '';
    if (!receptorCorporativoValidoVO($nombreReceptor)) {
        echo '6^^' . $nombreReceptor;
        UNLINK($url);
        $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML2);
        exit;
    }

    $rfcE   = $regreso['rfcE'];
    $nombreE = $regreso['nombreE'];
    $conn   = $conexion->db();

    if ($ventasoperaciones->verificar_rfc($conn, $rfcE) != '') {
        $idwebc = $ventasoperaciones->verificar_rfc($conn, $rfcE);
    } elseif ($ventasoperaciones->verificar_usuario($conn, $nombreE) != '') {
        $idwebc = $ventasoperaciones->verificar_usuario($conn, $nombreE);
    } elseif (isset($_SESSION["idPROV"]) && $_SESSION["idPROV"] != '') {
        $idwebc = $_SESSION["idPROV"];
    } else {
        $idwebc = 1;
    }

    $_SESSION["idPROV"] = $idwebc;
}

// ── $idPROV seguro siempre ────────────────────────────────────────────────
$idwebc    = isset($idwebc) ? $idwebc : '';
$idPROV    = (isset($_SESSION["idPROV"]) && $_SESSION["idPROV"] != '')
             ? $_SESSION["idPROV"]
             : (!empty($idwebc) ? $idwebc : 1);
$IPventasoperar = isset($_POST["IPventasoperar"]) ? $_POST["IPventasoperar"] : "";


// ══════════════════════════════════════════════════════════════════════════
// BLOQUE 1: Subida con IPventasoperar (registro existente)
// ══════════════════════════════════════════════════════════════════════════

if ($IPventasoperar != '' && $hayAlgunaSubida) {

    foreach ($_FILES AS $ETQIETA => $VALOR) {

        $errorArchivo          = isset($VALOR['error'])  ? intval($VALOR['error'])  : 1;
        $nombreArchivoOriginal = isset($VALOR['name'])   ? $VALOR['name']           : '';
        $idem1                 = isset($_SESSION['idem']) ? $_SESSION['idem']       : '';

        if ($errorArchivo !== UPLOAD_ERR_OK || $nombreArchivoOriginal == '') { continue; }

        // ── Validar vacío ──────────────────────────────────────────────────
        if (isset($VALOR['size']) && intval($VALOR['size']) === 0) {
            echo 'VACIO^^' . $ETQIETA;
            exit;
        }

        // ── Validar extensión ──────────────────────────────────────────────
        $partesNombre = explode('.', $nombreArchivoOriginal);
        if (count($partesNombre) < 2 || trim(end($partesNombre)) === '') {
            echo 'SIN_EXTENSION^^' . $ETQIETA;
            exit;
        }

        // ── PDF de factura ─────────────────────────────────────────────────
        if ($ETQIETA == 'ADJUNTAR_FACTURA_PDF') {
            $ADJUNTAR_FACTURA_PDF = $ventasoperaciones->solocargartemp('ADJUNTAR_FACTURA_PDF');

            if ($ADJUNTAR_FACTURA_PDF === 'VACIO') {
                echo 'VACIO^^ADJUNTAR_FACTURA_PDF'; exit;
            }
            if ($ADJUNTAR_FACTURA_PDF === 'SIN_EXTENSION') {
                echo 'SIN_EXTENSION^^ADJUNTAR_FACTURA_PDF'; exit;
            }
            if ($ADJUNTAR_FACTURA_PDF === 'ERROR_SUBIDA') {
                echo 'ERROR_SUBIDA^^ADJUNTAR_FACTURA_PDF'; exit;
            }
            if ($ADJUNTAR_FACTURA_PDF === '1' || $ADJUNTAR_FACTURA_PDF === '2') {
                echo $ADJUNTAR_FACTURA_PDF; continue;
            }

            $ventasoperaciones->reemplazarAdjuntoFacturaUnico('ADJUNTAR_FACTURA_PDF', $IPventasoperar, $idPROV, $ADJUNTAR_FACTURA_PDF, $idem1);
            echo $ADJUNTAR_FACTURA_PDF;
            continue;
        }

        // ── XML de factura ─────────────────────────────────────────────────
        if ($ETQIETA == 'ADJUNTAR_FACTURA_XML' && $subidaFacturaXML) {

            $ADJUNTAR_FACTURA_XML = $ADJUNTAR_FACTURA_XML2;
            $ventasoperaciones->reemplazarAdjuntoFacturaUnico('ADJUNTAR_FACTURA_XML', $IPventasoperar, $idPROV, $ADJUNTAR_FACTURA_XML, $idem1);
            $ventasoperaciones->delete_02XML($IPventasoperar);

            $url = __ROOT1__ . '/includes/archivos/' . $ADJUNTAR_FACTURA_XML;
            if (file_exists($url)) {
                $regreso = $conexion2->lectorxml($url);

                if (empty($regreso) || !isset($regreso['UUID']) || trim($regreso['UUID']) === '') {
                    echo '5^^';
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);
                    continue;
                }

                $nombreReceptor = isset($regreso['nombreR']) ? $regreso['nombreR'] : '';
                if (!receptorCorporativoValidoVO($nombreReceptor)) {
                    echo '6^^' . $nombreReceptor;
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);
                    continue;
                }

                $resultado = $ventasoperaciones->VALIDA02XMLUUID($regreso['UUID']);

                if ($resultado == 'S') {
                    echo $ADJUNTAR_FACTURA_XML . '^^' . $regreso['UUID'];
                    ob_start();
                    $ventasoperaciones->guardarxmlDB2($IPventasoperar, $idPROV, '02XML', $url);
                    ob_end_clean();

                } elseif (strpos($resultado, '3^^') === 0) {
                    $datosDuplicado  = explode('^^', $resultado);
                    $numeroSolicitud = isset($datosDuplicado[1]) ? $datosDuplicado[1] : '';
                    $numeroEvento    = isset($datosDuplicado[2]) ? $datosDuplicado[2] : '';
                    echo '3^^' . $numeroSolicitud . '^^' . $numeroEvento;
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);

                } elseif (strpos($resultado, '7^^^') === 0) {
                    $numeroGasto = str_replace('7^^^', '', $resultado);
                    echo '7^^^' . $numeroGasto;
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);

                } else {
                    echo '3^^';
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);
                }
            }
            continue;
        }

        // ── Resto de campos (cotización, comprobantes, etc.) ───────────────
        $resultadoCarga = $conexion->cargar($ETQIETA, '02SUBETUFACTURADOCTOS', '6', $IPventasoperar, 'si', $IPventasoperar);

        if ($resultadoCarga === 'VACIO') {
            echo 'VACIO^^' . $ETQIETA; exit;
        }
        if ($resultadoCarga === 'SIN_EXTENSION') {
            echo 'SIN_EXTENSION^^' . $ETQIETA; exit;
        }
        if ($resultadoCarga === 'ERROR_SUBIDA') {
            echo 'ERROR_SUBIDA^^' . $ETQIETA; exit;
        }

        echo $resultadoCarga;
    }

} elseif ($IPventasoperar == '') {
    // sin IPventasoperar — lo maneja el bloque 2
}


// ══════════════════════════════════════════════════════════════════════════
// BLOQUE 2: Subida sin IPventasoperar (registro nuevo)
// ══════════════════════════════════════════════════════════════════════════

if ($IPventasoperar == '' && $hiddenVENTASOPERACIONES != 'hiddenVENTASOPERACIONES' && $hayAlgunaSubida) {

    // ── Garantizar idem1 e idPROV válidos ─────────────────────────────────
    $idem1  = (isset($_SESSION['idem']) && $_SESSION['idem'] != '') ? $_SESSION['idem'] : 1;
    $idPROV = $idem1;
    $_SESSION["idPROV"] = $idem1;
    // ─────────────────────────────────────────────────────────────────────

    foreach ($_FILES AS $ETQIETA => $VALOR) {

        $errorArchivo          = isset($VALOR['error'])  ? intval($VALOR['error'])  : 1;
        $nombreArchivoOriginal = isset($VALOR['name'])   ? $VALOR['name']           : '';

        if ($errorArchivo !== UPLOAD_ERR_OK || $nombreArchivoOriginal == '') { continue; }

        if ($subidaFacturaXML) {
            $ADJUNTAR_FACTURA_XML = $conexion->sologuardar6_usuario($ETQIETA, $ADJUNTAR_FACTURA_XML2, '02SUBETUFACTURADOCTOS', $idPROV, $IPventasoperar, $idem1, 'xml');
        } else {
            // ── Interceptar errores de cargar() para campos no-XML ────────
            $resultadoCarga2 = $conexion->cargar($ETQIETA, '02SUBETUFACTURADOCTOS', '8', $idem1, 'si', '', $idem1);

            if ($resultadoCarga2 === 'VACIO') {
                echo 'VACIO^^' . $ETQIETA; exit;
            }
            if ($resultadoCarga2 === 'SIN_EXTENSION') {
                echo 'SIN_EXTENSION^^' . $ETQIETA; exit;
            }
            if ($resultadoCarga2 === 'ERROR_SUBIDA') {
                echo 'ERROR_SUBIDA^^' . $ETQIETA; exit;
            }

            $ADJUNTAR_FACTURA_XML = $resultadoCarga2;
        }

        if ($subidaFacturaXML) {
            $url = __ROOT1__ . '/includes/archivos/' . $ADJUNTAR_FACTURA_XML;
            if (file_exists($url)) {
                $regreso = $conexion2->lectorxml($url);

                if (empty($regreso) || !isset($regreso['UUID']) || trim($regreso['UUID']) === '') {
                    echo '5^^';
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);
                    continue;
                }

                $nombreReceptor = isset($regreso['nombreR']) ? $regreso['nombreR'] : '';
                if (!receptorCorporativoValidoVO($nombreReceptor)) {
                    echo '6^^' . $nombreReceptor;
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);
                    continue;
                }

                $resultado = $ventasoperaciones->VALIDA02XMLUUID($regreso['UUID']);

                if ($resultado == 'S') {
                    echo $ADJUNTAR_FACTURA_XML;

                } elseif (strpos($resultado, '3^^') === 0) {
                    $datosDuplicado  = explode('^^', $resultado);
                    $numeroSolicitud = isset($datosDuplicado[1]) ? $datosDuplicado[1] : '';
                    $numeroEvento    = isset($datosDuplicado[2]) ? $datosDuplicado[2] : '';
                    echo '3^^' . $numeroSolicitud . '^^' . $numeroEvento;
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);

                } elseif (strpos($resultado, '7^^^') === 0) {
                    $numeroGasto = str_replace('7^^^', '', $resultado);
                    echo '7^^^' . $numeroGasto;
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);

                } else {
                    echo '3^^';
                    UNLINK($url);
                    $ventasoperaciones->delete_subefactura2nombre($ADJUNTAR_FACTURA_XML);
                }
            }
        } else {
            echo $ADJUNTAR_FACTURA_XML;
        }
    }
}
