<?php

class Actividad32ValoracionBeneficio extends AppModel
 { 
   var $name = 'Actividad32ValoracionBeneficio';   
   var $useTable = 'actividades_3_2_valoracion_beneficios';
   public $order = array("Actividad32ValoracionBeneficio.valoracion_beneficios_id" => "ASC");
   public $belongsTo = array(
       'Actividad32'=> array(
           'className'    => 'Actividad32',
           'foreignKey'   => 'actividades_3_2_id'
       ),
       'ValoracionBeneficio'=> array(
           'className'    => 'ValoracionBeneficio',
           'foreignKey'   => 'valoracion_beneficios_id'
       ),
   );
   
 }
   
?>