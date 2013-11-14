<?php

class Actividad3PreguntaValoracion extends AppModel
 { 
   var $name = 'Actividad3PreguntaValoracion';   
   var $useTable = 'actividades_3_preguntas_valoracion';
   public $order = array("Actividad3PreguntaValoracion.preguntas_valoracion_id" => "ASC");
   public $belongsTo = array(
       'Actividad3'=> array(
           'className'    => 'Actividad3',
           'foreignKey'   => 'actividades_3_id'
       ),
       'PreguntaValoracion'=> array(
           'className'    => 'PreguntaValoracion',
           'foreignKey'   => 'preguntas_valoracion_id'
       ),
   );
   
 }
   
?>