<?php

class Actividad32Recapitulacion extends AppModel
 { 
   var $name = 'Actividad32Recapitulacion';   
   var $useTable = 'actividades_3_2_recapitulacion';   
   //public $order = array("Actividad32Evidencia.tipo" => "ASC");
   public $belongsTo = array(
       'Actividad32'=> array(
           'className'    => 'Actividad32',
           'foreignKey'   => 'actividades_3_2_id'
       )
   );
   
 }
   
?>