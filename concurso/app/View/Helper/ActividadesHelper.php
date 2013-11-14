<?php

class ActividadesHelper extends AppHelper {
    var $helpers = array('Html','Session','Form','Js');
    var $types = array(
        'texto' => 'text',
        'textarea' => 'textarea',
        'imagen' => 'file',
        'video' => 'text'
    );

    function createInput($params, $edit){
        $input = '';
        $input .= $this->Form->hidden('Respuesta.'.($params['numero']-1).'.id');
        $input .= $this->Form->hidden('Respuesta.'.($params['numero']-1).'.equipo_actividades_id');
        $input .= $this->Form->hidden('Respuesta.'.($params['numero']-1).'.evidencia_id',array('value'=>$params['evidencia_id']));
        $classes = 'validate';
        if($edit == true && $params['type'] == 'imagen')
            $classes = '';
        $input .= $this->Form->input('Respuesta.'.($params['numero']-1).'.value',array('type'=>$this->types[$params['type']],'label'=>$params['numero'].'.- '.$params['label'],'class'=>$classes));
        $input .= "<div class='error_".($params['numero']-1)." error' ></div>";
        return $input;
        
    }

}
?>
