<?php

class EquipoDiario extends AppModel{

   var $name = 'EquipoDiario';

   public $useTable = 'equipo_diario';
   public $belongsTo = array(
                        'Equipo' => array(
                                    'className'    => 'Equipo',
                                    'foreignKey'   => 'equipo_id'
                                            ),
       );
   }
   
?>