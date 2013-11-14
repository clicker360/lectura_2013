<?php

class Evidencia extends AppModel
 {

   public $order = 'Evidencia.numero_evidencia ASC';
   var $name = 'Evidencia';
   var $belongsTo = array('Actividad'=> array(
                                    'className'    => 'Actividad',
                                    'foreignKey'   => 'actividad_id'
                                            ));
   
   var $useTable = 'evidencias';
 }
   
?>