<?php

class Respuesta extends AppModel{

   var $name = 'Respuesta';

   public $useTable = 'respuestas';
   public $belongsTo = array(
                        'Evidencia' => array(
                                    'className'    => 'Evidencia',
                                    'foreignKey'   => 'evidencia_id'
                                            ),
                        'EquipoActividad' => array(
                                    'className'    => 'EquipoActividad',
                                    'foreignKey'   => 'equipo_actividad_id'
                                            )
       );
   }
   
?>