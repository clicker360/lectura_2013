<?php

class Actividad33LogroLector extends AppModel
 { 
   var $name = 'Actividad33LogroLector';   
   var $useTable = 'actividades_3_3_logros_lectores';   
   public $order = array("Actividad33LogroLector.numero" => "ASC");
   public $belongsTo = array(
       'Actividad33'=> array(
           'className'    => 'Actividad33',
           'foreignKey'   => 'actividades_3_3_id'
       )
   );
   
 }
   
?>