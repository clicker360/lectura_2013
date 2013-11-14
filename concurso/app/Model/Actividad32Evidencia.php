<?php

class Actividad32Evidencia extends AppModel
 { 
   var $name = 'Actividad32Evidencia';   
   var $useTable = 'actividades_3_2_evidencias';   
   public $order = array("Actividad32Evidencia.tipo" => "ASC");
   public $belongsTo = array(
       'Actividad32'=> array(
           'className'    => 'Actividad32',
           'foreignKey'   => 'actividades_3_2_id'
       )
   );
   
 }
   
?>