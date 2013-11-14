<?php

class Actividad33 extends AppModel
 { 
   var $name = 'Actividad33';
   var $hasMany = array(
       'Actividad33Autovaloracion'=>array(
                    'foreignKey' => 'actividades_3_3_id',
                    'dependent' => true
                ),
       'Actividad33LibroLeido'=>array(
                    'foreignKey' => 'actividades_3_3_id',
                    'dependent' => true
                ),
       'Actividad33Reto'=>array(
                    'foreignKey' => 'actividades_3_3_id',
                    'dependent' => true
                ),
       'Actividad33RecapitulacionAccion'=>array(
                    'foreignKey' => 'actividades_3_3_id',
                    'dependent' => true
                ),
       'Actividad33LogroLector'=>array(
                    'foreignKey' => 'actividades_3_3_id',
                    'dependent' => true
                ),
       'Actividad33Evidencia'=>array(
                    'foreignKey' => 'actividades_3_3_id',
                    'dependent' => true
                ),
       );
   var $useTable = 'actividades_3_3';
   
 }
   
?>