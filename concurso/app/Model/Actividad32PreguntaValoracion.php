<?php

class Actividad32PreguntaValoracion extends AppModel
 { 
   var $name = 'Actividad32PreguntaValoracion';   
   var $useTable = 'actividades_3_2_preguntas_valoracion';
   public $order = array("Actividad32PreguntaValoracion.preguntas_valoracion_id" => "ASC");
   public $belongsTo = array(
       'Actividad32'=> array(
           'className'    => 'Actividad32',
           'foreignKey'   => 'actividades_3_2_id'
       ),
       'PreguntaValoracion'=> array(
           'className'    => 'PreguntaValoracion',
           'foreignKey'   => 'preguntas_valoracion_id'
       ),
   );
   
 }
   
?>