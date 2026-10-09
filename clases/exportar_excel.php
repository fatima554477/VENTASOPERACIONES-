<?php

/**
 * Exporta la misma tabla del filtro sin alterar el flujo AJAX del controlador.
 */
define('EXPORTACION_EXCEL', true);

// Una exportación completa puede tardar más que una petición AJAX paginada.
if (function_exists('set_time_limit')) {
	set_time_limit(0);
}

$_POST['action'] = 'ajax';
$_POST['page'] = 1;
$_POST['per_page'] = 1000000;

ob_start();
require __DIR__.'/controlador_filtro.php';
$html = ob_get_clean();

if (!class_exists('DOMDocument')) {
	http_response_code(500);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'No fue posible generar el Excel: la extensión DOM de PHP no está disponible.';
	exit;
}

$documento = new DOMDocument('1.0', 'UTF-8');
libxml_use_internal_errors(true);
$documento->loadHTML('<?xml encoding="UTF-8">'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
libxml_clear_errors();

$xpath = new DOMXPath($documento);
$tablas = $xpath->query('//table[contains(concat(" ", normalize-space(@class), " "), " table-bordered ")]');
$tabla = $tablas->length ? $tablas->item(0) : null;

if ($tabla) {
	$filasEncabezado = $xpath->query('.//thead/tr', $tabla);
	$encabezado = $filasEncabezado->length ? $filasEncabezado->item(0) : null;
	$columnasExcluir = array();
	$titulosColumnas = array();
	$camposBancarios = array(
		'TIPO DE MONEDA', 'INSTITUCION FINANCIERA', 'NÚMERO DE CUENTA',
		'CUENTA CLABE', 'NÚMERO IBAN', 'NÚMERO DE CUENTA SWIFT',
		'FOTO ESTADO DE CUENTA'
	);
	$camposArchivos = array(
		'FACTURA XML', 'FACTURA PDF', 'COTIZACIÓN O REPORTE',
		'COMPROBANTE DE TRANSFERENCIA', 'ARCHIVO RELACIONADO A ESTE GASTO O EVIDENCIA DEL SERVICIO OTORGADO:',
		'COMPLEMENTOS DE PAGO (FORMATO XML)', 'COMPLEMENTOS DE PAGO (FORMATO PDF)',
		'ACUSE DE CANCELACIÓN', 'CONSTANCIA SITUACIÓN FISCAL', 'OPINION DE CUMPLIMIENTO'
	);

	if ($encabezado) {
		$celdas = $xpath->query('./th|./td', $encabezado);
		foreach ($celdas as $indice => $celda) {
			$titulo = trim(preg_replace('/\s+/u', ' ', $celda->textContent));
			$titulosColumnas[$indice] = $titulo;
			if (in_array($titulo, $camposBancarios, true)
				|| in_array($titulo, $camposArchivos, true)
				|| $titulo === '#'
				|| $titulo === '') {
				$columnasExcluir[] = $indice;
			}
		}
	}

	// Quita cualquier columna que contenga casillas, aunque su encabezado tenga texto.
	foreach ($xpath->query('.//tbody/tr', $tabla) as $fila) {
		$posicion = 0;
		foreach ($xpath->query('./th|./td', $fila) as $celda) {
			if ($xpath->query('.//input[@type="checkbox"]', $celda)->length
				&& (!isset($titulosColumnas[$posicion]) || $titulosColumnas[$posicion] !== 'SIN 46%')) {
				$columnasExcluir[] = $posicion;
			}
			$posicion += max(1, intval($celda->getAttribute('colspan')));
		}
	}
	$columnasExcluir = array_values(array_unique($columnasExcluir));

	// No se exporta la fila que contiene los controles de búsqueda.
	if ($filasEncabezado->length > 1) {
		$filaFiltros = $filasEncabezado->item(1);
		$filaFiltros->parentNode->removeChild($filaFiltros);
	}

} else {
	http_response_code(500);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'No fue posible generar el Excel: no se encontró la tabla de resultados.';
	exit;
}

// Convierte la tabla a una matriz y expande los colspan. Así los totales quedan
// debajo de su encabezado aun después de retirar columnas completas.
$filasExportar = array();
foreach ($xpath->query('.//tr', $tabla) as $fila) {
	$valores = array();
	$posicion = 0;
	foreach ($xpath->query('./th|./td', $fila) as $celda) {
		$colspan = max(1, intval($celda->getAttribute('colspan')));
		for ($i = 1; $i < $colspan; $i++) {
			$valores[] = '';
		}
		// La casilla SIN 46% se exporta como un dato legible en vez de como control HTML.
		if (isset($titulosColumnas[$posicion]) && $titulosColumnas[$posicion] === 'SIN 46%') {
			$casilla = $xpath->query('.//input[@type="checkbox"]', $celda);
			if ($casilla->length) {
				$valores[] = $casilla->item(0)->hasAttribute('checked') ? 'SI' : 'NO';
			} else {
				$valores[] = $celda->textContent;
			}
		} else {
			// En filas de totales, el texto debe quedar junto al primer importe.
			$valores[] = $celda->textContent;
		}
		$posicion += $colspan;
	}
	$filaLimpia = array();
	foreach ($valores as $indice => $valor) {
		if (!in_array($indice, $columnasExcluir, true)) {
			$filaLimpia[] = $valor;
		}
	}
	$filasExportar[] = $filaLimpia;
}

if (!class_exists('ZipArchive')) {
	http_response_code(500);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'No fue posible generar el Excel: la extensión ZIP de PHP no está disponible.';
	exit;
}

function columnaExcel($numero) {
	$nombre = '';
	while ($numero > 0) {
		$numero--;
		$nombre = chr(65 + ($numero % 26)).$nombre;
		$numero = intval($numero / 26);
	}
	return $nombre;
}

function textoCeldaExcel($texto) {
	$texto = trim(preg_replace('/\s+/u', ' ', (string)$texto));
	$texto = preg_replace('/[^\x09\x0A\x0D\x20-\x{D7FF}\x{E000}-\x{FFFD}]/u', '', $texto);
	if (function_exists('mb_substr')) {
		$texto = mb_substr($texto, 0, 32767, 'UTF-8');
	} else {
		$texto = substr($texto, 0, 32767);
	}
	return htmlspecialchars($texto, ENT_QUOTES | ENT_XML1, 'UTF-8');
}

function longitudTextoExcel($texto) {
	$texto = trim(preg_replace('/\s+/u', ' ', (string)$texto));
	return function_exists('mb_strlen') ? mb_strlen($texto, 'UTF-8') : strlen($texto);
}

// XLSX no ofrece un autoajuste calculado por el servidor. Se aproxima usando el
// contenido más largo de cada columna, con límites para evitar columnas ilegibles.
$anchosColumnas = array();
foreach ($filasExportar as $fila) {
	foreach ($fila as $indice => $valorCelda) {
		$longitud = longitudTextoExcel($valorCelda);
		$anchosColumnas[$indice] = max(isset($anchosColumnas[$indice]) ? $anchosColumnas[$indice] : 0, $longitud);
	}
}
$columnasXml = '<cols>';
foreach ($anchosColumnas as $indice => $longitud) {
	// Dos caracteres de margen; mínimo 10 y máximo 60 para textos muy extensos.
	$ancho = min(60, max(10, $longitud + 2));
	$numeroColumna = $indice + 1;
	$columnasXml .= '<col min="'.$numeroColumna.'" max="'.$numeroColumna.'" width="'.$ancho.'" bestFit="1" customWidth="1"/>';
}
$columnasXml .= '</cols>';

// Se genera un XLSX real (paquete Office Open XML), no HTML con extensión .xls.
$hoja = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$hoja .= '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'.$columnasXml.'<sheetData>';
$numeroFila = 0;
foreach ($filasExportar as $fila) {
	$numeroFila++;
	$hoja .= '<row r="'.$numeroFila.'">';
	$numeroColumna = 0;
	foreach ($fila as $valorCelda) {
		$numeroColumna++;
		$referencia = columnaExcel($numeroColumna).$numeroFila;
		$valor = textoCeldaExcel($valorCelda);
		$hoja .= '<c r="'.$referencia.'" t="inlineStr"><is><t xml:space="preserve">'.$valor.'</t></is></c>';
	}
	$hoja .= '</row>';
}
$hoja .= '</sheetData></worksheet>';

$archivoTemporal = tempnam(sys_get_temp_dir(), 'ventas_operaciones_');
$zip = new ZipArchive();
if ($archivoTemporal === false || $zip->open($archivoTemporal, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
	http_response_code(500);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'No fue posible crear el archivo temporal para la exportación.';
	exit;
}

$zip->addFromString('[Content_Types].xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/><Default Extension="xml" ContentType="application/xml"/><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/></Types>');
$zip->addFromString('_rels/.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>');
$zip->addFromString('xl/workbook.xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><sheets><sheet name="Ventas y operaciones" sheetId="1" r:id="rId1"/></sheets></workbook>');
$zip->addFromString('xl/_rels/workbook.xml.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/></Relationships>');
$zip->addFromString('xl/worksheets/sheet1.xml', $hoja);
$zip->close();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="ventas_operaciones_'.date('Y-m-d_H-i-s').'.xlsx"');
header('Content-Length: '.filesize($archivoTemporal));
header('Cache-Control: max-age=0');
readfile($archivoTemporal);
unlink($archivoTemporal);