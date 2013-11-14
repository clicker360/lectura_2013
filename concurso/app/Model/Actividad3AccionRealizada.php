<?php

class Actividad3AccionRealizada extends AppModel
 { 
   var $name = 'Actividad3AccionRealizada';   
   var $useTable = 'actividades_3_acciones_realizadas';   
   public $order = array("Actividad3AccionRealizada.participante_acciones_id" => "ASC");
   public $belongsTo = array(
       'Actividad3'=> array(
           'className'    => 'Actividad3',
           'foreignKey'   => 'actividades_3_id'
       ),
       'ParticipanteAccion'=> array(
           'className'    => 'ParticipanteAccion',
           'foreignKey'   => 'participante_acciones_id'
       ),
   );
   
 }
   
?>