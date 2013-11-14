<?php

class EquipoActividad extends AppModel{

   var $name = 'EquipoActividad';

   public $useTable = 'equipo_actividades';
   public $hasMany = array('Respuesta'=>array(
                                'className' => 'Respuesta',
                                'foreignKey' => 'equipo_actividades_id',
                                'dependent' => true
                            )
       );
   public $belongsTo = array(
                        'Equipo' => array(
                                    'className'    => 'Equipo',
                                    'foreignKey'   => 'equipo_id'
                                            ),
                        'Actividad' => array(
                                    'className'    => 'Actividad',
                                    'foreignKey'   => 'actividad_id'
                                            )
       );
   }
   
?>