<?php

class Actividad33LibroLeido extends AppModel
 { 
   var $name = 'Actividad33LibroLeido';   
   var $useTable = 'actividades_3_3_libros_leidos';   
   public $order = array("Actividad33LibroLeido.numero" => "ASC");
   public $belongsTo = array(
       'Actividad33'=> array(
           'className'    => 'Actividad33',
           'foreignKey'   => 'actividades_3_3_id'
       )
   );
   
 }
   
?>