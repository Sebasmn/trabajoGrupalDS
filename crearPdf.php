<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba



 $html=file_get_contents_curl("http://localhost:8080/repositorio1/trabajoGrupalDS/misDatospdf.php");


 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
//$pdf->stream('reportePdf.pdf');
//$pdf->stream('my.pdf',array('Attachment'=>0))
$rutaGuardado = "C:/xampp/htdocs/Repositorio1/trabajoGrupalDS/documentos/doc";
$output = $pdf->output();
file_put_contents( $rutaGuardado."ejemplo3.pdf", $output);

function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}