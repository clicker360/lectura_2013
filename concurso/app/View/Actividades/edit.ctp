<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$options_etapa = array(
    1 => 1,
    2 => 2,
);
?>
<div style="float:left; width: 25%;">
    <?php
    echo $this->Form->create('Actividad',array('url'=>'/admin/actividades/save'));
    echo $this->Form->input('Actividad.id',array('label'=>false));
    echo $this->Form->input('Actividad.numero',array('type'=>'text','label'=>'Número de actividad: ','style'=>'width:262px;'));
    echo $this->Form->input('Actividad.titulo',array('type'=>'text','label'=>'Titulo de actividad: ','style'=>'width:262px;'));
    echo $this->Form->input('Actividad.objetivo',array('label'=>'Objetivo: ','style'=>'width:262px; height:100px;'));
    echo $this->Form->input('Actividad.etapa',array('label'=>'Etapa: ','id'=>'select_etapa','options'=>$options_etapa));
    echo $this->Form->input('Actividad.actividad',array('label'=>'Actividad: ','style'=>'width:262px; height:100px;'));
    echo $this->Form->input('Actividad.recuerden_que',array('label'=>'Recuerden que: ','style'=>'width:262px; height:100px;'));
    echo $this->Form->input('Actividad.tipo',array('label'=>'Tipo: ','style'=>'width:262px;','options'=>array('informativo'=>'Informativo','literario'=>'Literario')));
    ?>
</div>
<?php
for($i = 0; $i <= count($this->data['Evidencia']) - 1; $i++){
    ?>
    <div style="float:left; width: 25%;">
        <?php
        echo "<h3>Evidencia ".($i+1)."</h3>";
        echo $this->Form->input("Evidencia.$i.id",array('label'=>false));
        echo $this->Form->input("Evidencia.$i.actividad_id",array('type'=>'hidden','label'=>false));
        echo $this->Form->input("Evidencia.$i.pregunta",array('label'=>'Pregunta: ','style'=>'width:262px; height:100px;'));
        echo $this->Form->input("Evidencia.$i.tipo",array('label'=>'Tipo de campo: ','style'=>'width:262px;','options'=>array(''=>'Selecciona','texto'=>'Texto','textarea'=>'Textarea','imagen'=>'Imagen','video'=>'Video')));
        echo $this->Form->input("Evidencia.$i.maximo",array('label'=>'Máximo permitido: ','style'=>'width:120px;'));
        echo $this->Form->input("Evidencia.$i.maximo_tipo",array('label'=>false,'options'=>array('caracteres'=>'Caracteres','palabras'=>'Palabras'),'style'=>'width:125px;'));
        echo $this->Form->hidden("Evidencia.$i.numero_evidencia",array('value'=>($i+1)));
        ?>
    </div>
    <?php
}
?>
<div style="float: left; clear: both;">
<?php
echo $this->Form->end('Guardar');
?>
</div>