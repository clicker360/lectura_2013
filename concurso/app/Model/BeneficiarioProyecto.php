<?php

class BeneficiarioProyecto extends AppModel
 {

   //public $order = 'Evidencia.numero_evidencia ASC';
   var $name = 'BeneficiarioProyecto';
   /*var $belongsTo = array('Actividad'=> array(
                                    'className'    => 'Actividad',
                                    'foreignKey'   => 'actividad_id'
                                            ));*/
   
   var $useTable = 'beneficiarios_proyecto';
 }
   
?>