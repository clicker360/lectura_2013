<?php

class Actividad33Reto extends AppModel
 { 
   var $name = 'Actividad33Reto';   
   var $useTable = 'actividades_3_3_retos';   
   public $order = array("Actividad33Reto.numero" => "ASC");
   public $belongsTo = array(
       'Actividad33'=> array(
           'className'    => 'Actividad33',
           'foreignKey'   => 'actividades_3_3_id'
       )
   );
   
 }
   
?>