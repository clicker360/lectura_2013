<?php

class Actividad extends AppModel
 { 
   var $name = 'Actividad';
   var $hasMany = array('Evidencia'=>array(
                    'foreignKey' => 'actividad_id',
                    'dependent' => true,
                    'order' => 'Evidencia.numero_evidencia ASC'
            ));
   var $useTable = 'actividades';
   
 }
   
?>