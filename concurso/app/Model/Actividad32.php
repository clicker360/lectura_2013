<?php

class Actividad32 extends AppModel
 { 
   var $name = 'Actividad32';
   var $hasMany = array(
       'Actividad32PreguntaValoracion'=>array(
                    'foreignKey' => 'actividades_3_2_id',
                    'dependent' => true
                ),
       'Actividad32ValoracionBeneficio'=>array(
                    'foreignKey' => 'actividades_3_2_id',
                    'dependent' => true
                ),
       'Actividad32Recapitulacion'=>array(
                    'foreignKey' => 'actividades_3_2_id',
                    'dependent' => true
                ),
       'Actividad32Impacto'=>array(
                    'foreignKey' => 'actividades_3_2_id',
                    'dependent' => true
                ),
       'Actividad32Evidencia'=>array(
                    'foreignKey' => 'actividades_3_2_id',
                    'dependent' => true
                ),
       );
   var $useTable = 'actividades_3_2';
   
 }
   
?>