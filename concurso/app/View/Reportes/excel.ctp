<?php
App::uses('PHPExcel', 'Vendor/PHPExcel');
        
$objPHPExcel = new PHPExcel();
 
$objPHPExcel->getProperties()->setCreator("Carlos Hernan Aguilar")
                             ->setLastModifiedBy("Carlos Hernan Aguilar")
                             ->setTitle("Office 2007 XLSX Test Document")
                             ->setSubject("Office 2007 XLSX Test Document")
                             ->setDescription("Ejemplo de integracion cakephp 2.x y phpExcel.")
                             ->setKeywords("office 2007 openxml php")
                             ->setCategory("Test result file");
 
 
//agregamos los datos
$i=1;
foreach ($profesores as $profesor){
  
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$i++, $profesor['Profesor']['nombre']);
}
 
$objPHPExcel->getActiveSheet()->setTitle('Ejemplo CakePHP & PHPExcel');
$objPHPExcel->setActiveSheetIndex(0);
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ejemplo.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>