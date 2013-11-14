<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_lectura.xls");
header("Pragma: no-cache");
header("Expires: 0");
header("Accept-Charset: utf-8;");

echo utf8_decode($content_for_layout);
?>
