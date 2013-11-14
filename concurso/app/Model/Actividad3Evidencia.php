<?php

class Actividad3Evidencia extends AppModel
 { 
   var $name = 'Actividad3Evidencia';   
   var $useTable = 'actividades_3_evidencias';   
   public $order = array("Actividad3Evidencia.tipo" => "ASC");
   public $belongsTo = array(
       'Actividad3'=> array(
           'className'    => 'Actividad3',
           'foreignKey'   => 'actividades_3_id'
       )
   );
   
 }
   
?>