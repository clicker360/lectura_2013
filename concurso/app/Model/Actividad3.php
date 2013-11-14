<?php

class Actividad3 extends AppModel
 { 
   var $name = 'Actividad3';
   var $hasMany = array(
       'Actividad3PreguntaValoracion'=>array(
                    'foreignKey' => 'actividades_3_id',
                    'dependent' => true
                ),
       'Actividad3BeneficiarioProyecto'=>array(
                    'foreignKey' => 'actividades_3_id',
                    'dependent' => true
                ),
       'Actividad3AccionRealizada'=>array(
                    'foreignKey' => 'actividades_3_id',
                    'dependent' => true
                ),
       'Actividad3Evidencia'=>array(
                    'foreignKey' => 'actividades_3_id',
                    'dependent' => true
                ),
       );
   var $useTable = 'actividades_3';
   
 }
   
?>