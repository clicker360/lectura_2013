<?php

class Actividad33RecapitulacionAccion extends AppModel
 { 
   var $name = 'Actividad33RecapitulacionAccion';   
   var $useTable = 'actividades_3_3_recapitulacion_acciones';   
   public $order = array("Actividad33RecapitulacionAccion.numero" => "ASC");
   public $belongsTo = array(
       'Actividad33'=> array(
           'className'    => 'Actividad33',
           'foreignKey'   => 'actividades_3_3_id'
       )
   );
   
 }
   
?>