<?php

class Actividad33Autovaloracion extends AppModel
 { 
   var $name = 'Actividad33Autovaloracion';   
   var $useTable = 'actividades_3_3_autovaloracion';   
   public $order = array("Actividad33Autovaloracion.numero" => "ASC");
   public $belongsTo = array(
       'Actividad33'=> array(
           'className'    => 'Actividad33',
           'foreignKey'   => 'actividades_3_3_id'
       )
   );
   
 }
   
?>