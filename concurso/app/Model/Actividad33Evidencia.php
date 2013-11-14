<?php

class Actividad33Evidencia extends AppModel
 { 
   var $name = 'Actividad33Evidencia';   
   var $useTable = 'actividades_3_3_evidencias';   
   public $order = array("Actividad33Evidencia.tipo" => "ASC");
   public $belongsTo = array(
       'Actividad33'=> array(
           'className'    => 'Actividad33',
           'foreignKey'   => 'actividades_3_3_id'
       )
   );
   
 }
   
?>