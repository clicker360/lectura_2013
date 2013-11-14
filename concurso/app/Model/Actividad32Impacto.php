<?php

class Actividad32Impacto extends AppModel
 { 
   var $name = 'Actividad32Impacto';   
   var $useTable = 'actividades_3_2_impacto';   
   public $order = array("Actividad32impacto.valoracion_impacto_id" => "ASC");
   public $belongsTo = array(
       'Actividad32'=> array(
           'className'    => 'Actividad32',
           'foreignKey'   => 'actividades_3_2_id'
       ),
       'ValoracionImpacto'=> array(
           'className'    => 'ValoracionImpacto',
           'foreignKey'   => 'valoracion_impacto_id'
       ),
   );
   
 }
   
?>