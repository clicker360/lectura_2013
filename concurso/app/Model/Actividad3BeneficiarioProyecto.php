<?php

class Actividad3BeneficiarioProyecto extends AppModel
 { 
   var $name = 'Actividad3BeneficiarioProyecto';   
   var $useTable = 'actividades_3_beneficiarios_proyecto';
   public $order = array("Actividad3BeneficiarioProyecto.tipo" => "ASC","Actividad3BeneficiarioProyecto.beneficiarios_proyecto_id" => "ASC");
   public $belongsTo = array(
       'Actividad3'=> array(
           'className'    => 'Actividad3',
           'foreignKey'   => 'actividades_3_id'
       ),
       'BeneficiarioProyecto'=> array(
           'className'    => 'BeneficiarioProyecto',
           'foreignKey'   => 'beneficiarios_proyecto_id'
       ),
   );
   
 }
   
?>