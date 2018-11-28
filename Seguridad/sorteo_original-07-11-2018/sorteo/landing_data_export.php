<?php

require_once(dirname(__FILE__) . "/inc/Exportdataexcel.php");
require_once(dirname(__FILE__) . "/inc/conexion.php");
require_once(dirname(__FILE__) . "/inc/funciones.php");
require_once(dirname(__FILE__) . "/inc/funciones_ex.php");
require_once(dirname(__FILE__) . "/config.php");



$xls_exporter = new ExportDataTSV('browser', 'data_landing_' . date('y_m_d') . '.csv');

$xls_exporter->initialize();

//$xls_export_header = array('No', 'Cliente', 'Fecha albarán', 'Dirección', 'Localidad', 'CP', 'F.pago', 'Total', 'Imp. Pagado', 'Pagado', 'Logística', 'Facturado');
$xls_export_header = array('Email','Nombre','Pais','Fecha','Ganador?');

$xls_exporter->addRow($xls_export_header);

$query_participantes_hoy2 = $db->prepare("SELECT * FROM lottery_emails WHERE id_lottery=? order by date_add desc"); //date_add >= ? AND date_add <= ? AND 
$query_participantes_hoy2->execute(array($id_sorteo,));
$dparticipantes_hoy = $query_participantes_hoy2->fetchAll(PDO::FETCH_ASSOC);

$i = 0;

foreach ($dparticipantes_hoy as $elp) {
        $i++;
        //$alb_data = $this->venta->get($efac->id);
        $xls_export_body = array($elp["email"], $elp["nombre"], $elp["pais"], $elp["date_add"], $elp["winner"] == 1 ? "Si" : "No");
        $xls_exporter->addRow($xls_export_body);
}


//print_r($data['ventas']);

$xls_exporter->finalize();