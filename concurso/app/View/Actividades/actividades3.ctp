<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="actividadesBoxes">
<div class="boxLeft2">
<h5>Primer periodo de evidencias de la tercera etapa de la Olimpiada de Lectura <br />Del 18 de febrero al 1 de marzo</h5>
<?php
echo $this->Form->create('Actividad3',array('url'=>array('controller'=>'actividades','action'=>'guarda_actividad3'),'ENCTYPE' => "multipart/form-data"));
if($this->data)
    echo $this->Form->input('id');
echo $this->Form->hidden('equipo_id',array('value'=>$equipo_id,'type'=>'text'));
?>
<!--Preguntas de valoracion INICIO -->

<h6><span>¿Hubo cambios en el proyecto?</span> Marca la opción correspondiente y completa la información conforme se indica.</h6>
<?php $ths_preguntas = array('#','Preguntas de valoración','Sí','No','Si escribiste sí'); ?>
<table class="tableValoraciones">
    <?php echo $this->Html->tableHeaders($ths_preguntas); ?>
    <?php
    foreach($preguntas_valoracion as $k_pregunta => $pregunta){
        if($this->data)
            echo $this->Form->input("Actividad3PreguntaValoracion.$k_pregunta.id");        
        $checked_si = '';
        $checked_no = '';
        if(isset($this->data['Actividad3PreguntaValoracion'][$k_pregunta]['respuesta'])){
            if($this->data['Actividad3PreguntaValoracion'][$k_pregunta]['respuesta'] == 'si')
                $checked_si = 'checked';
            else if($this->data['Actividad3PreguntaValoracion'][$k_pregunta]['respuesta'] == 'no')
                $checked_no = 'checked';
        }        
        echo $this->Html->tableCells(array(
            $pregunta['PreguntaValoracion']['numero'],
            $pregunta['PreguntaValoracion']['pregunta'],
            $this->Form->hidden(                    
                    "Actividad3PreguntaValoracion.$k_pregunta.preguntas_valoracion_id",array(
                         'value'=>$pregunta['PreguntaValoracion']['id'])).
            '<input type="radio" name="data[Actividad3PreguntaValoracion]['.$k_pregunta.'][respuesta]" id="Actividad3PreguntaValoracion'.$k_pregunta.'RespuestaSi" value="si" '.$checked_si.' />',
            '<input type="radio" name="data[Actividad3PreguntaValoracion]['.$k_pregunta.'][respuesta]" id="Actividad3PreguntaValoracion'.$k_pregunta.'RespuestaNo" value="no" '.$checked_no.' />',
            
            /*$this->Form->radio(
                                 "Actividad3PreguntaValoracion.$k_pregunta.respuesta",array(
                                    'si' => '',
                                    'no' => ''
                                    ),array(
                                        'legend' => false,
                                        'label'=>false,
                                        'div'=>false
                                        )
                                )            */
            $this->Form->textarea(
                    "Actividad3PreguntaValoracion.$k_pregunta.respuesta_si",
                    array(
                        'value'=>(isset($this->data['Actividad3PreguntaValoracion'][$k_pregunta]['respuesta_si']) && $this->data['Actividad3PreguntaValoracion'][$k_pregunta]['respuesta_si'] != '') ? $this->data['Actividad3PreguntaValoracion'][$k_pregunta]['respuesta_si'] : $pregunta['PreguntaValoracion']['default'],
                        'div'=>false,
                        'label'=>false,
                        'style'=>'width:200px; height:100px;',
                        'OnFocus'   => 'if(this.value=="' . $pregunta['PreguntaValoracion']['default'] . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . $pregunta['PreguntaValoracion']['default'] . '";}'
                        )
                    )
        ));
    }
    ?>
</table>
<!--Preguntas de valoracion FIN -->
<!-- Beneficiarios del proyecto. INICIO-->
<h6><span>Beneficiarios del proyecto.</span> Anotar el número de participantes del proyecto</h6>
<table class="edadesRangos">
    <?php 
    $ths_beneficiarios = array('');
    $tipos_beneficiarios = array('Comunidad Escolar','Comunidad Extraescolar');
    foreach($beneficiarios as $k_beneficiario => $beneficiario){
        $ths_beneficiarios[] = $beneficiario['BeneficiarioProyecto']['rango'];
    }
    echo $this->Html->tableHeaders($ths_beneficiarios);
    foreach($tipos_beneficiarios as  $k_tipo => $tipo){
        $beneficiarioTr = array($tipo);
        foreach($beneficiarios as $k_beneficiario => $beneficiario){            
        $countBeneficiario = ($k_tipo) ?  $k_beneficiario+count($beneficiarios) : $k_beneficiario;
        if($this->data)
            echo $this->Form->input("Actividad3BeneficiarioProyecto.$countBeneficiario.id");
            $beneficiarioTr[] = 
                        $this->Form->hidden(
                    "Actividad3BeneficiarioProyecto.$countBeneficiario.beneficiarios_proyecto_id",array(
                        'value' => $beneficiario['BeneficiarioProyecto']['id'],
                        'div' => false,
                        'label' => false
                    )).$this->Form->hidden(
                    "Actividad3BeneficiarioProyecto.$countBeneficiario.tipo",array(
                        'value' => $tipo,
                        'div' => false,
                        'label' => false
                    )).$this->Form->input(
                    "Actividad3BeneficiarioProyecto.$countBeneficiario.total",array(
                        'type'=>'text',
                        'div' => false,
                        'label' => false,
                        'maxLength' =>'3'
                    ));            
        }
        echo $this->Html->tableCells($beneficiarioTr);
    }
    ?>
</table>
<!-- Beneficiarios del proyecto. FIN-->
<!-- Acciones realizadas INICIO-->
<h6><span>Acciones realizadas.</span> Nombra o describe los productos o logros obtenidos hasta ahora por los participantes centrales.</h6>
<table class="tableParticipantes">
    <?php 
    foreach($acciones as $k_accion => $accion){
        if($this->data)
            echo $this->Form->input("Actividad3AccionRealizada.$k_accion.id");
        echo $this->Html->tableCells(array(
            $accion['ParticipanteAccion']['participante'],
            $this->Form->hidden(
                    "Actividad3AccionRealizada.$k_accion.participante_acciones_id",array(
                        'value' => $accion['ParticipanteAccion']['id'],
                        'div' => false,
                        'label' => false
                        )
                    ).$this->Form->textarea(
                    "Actividad3AccionRealizada.$k_accion.respuesta",array(
                        'div' => false,
                        'label' => false,
                        'style'=>'width:103% !important; height:100px;'
                        )
                    )
        ));
    }
    ?>
</table>
<!-- Acciones realizadas FIN-->

<!-- Evidencias INICIO-->

<div class="inputsVarios">
<h5>Evidencias</h5>
<h6>GRÁFICAS:</h6>
<h7>A) Recursos y acciones de difusión del proyecto</h7>
<?php 
    $countEvidencias = 0;    
    $countEvidenciasTipo = 1;
    if($this->data){
        if(isset($this->data['Actividad3Evidencia']) && is_array($this->data['Actividad3Evidencia'])){
            foreach($this->data['Actividad3Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '1'){                    
                    echo "<div class='thumbActividades3'>";
                    echo $this->Html->image('/actividades_3/'.$evidencia['evidencia'],array('style'=>'width:200px;'));
                    echo $this->Form->input("Actividad3Evidencia.$countEvidencias.id",array('value'=>$evidencia['id']));
                    echo $this->Form->hidden("Actividad3Evidencia.$countEvidencias.tipo",array('value'=>'1'));
                    echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad3Evidencia.$countEvidencias.evidencia",array('value'=>$evidencia['evidencia']));
                    $countEvidencias++;
                    $countEvidenciasTipo++;                    
                    echo "</div>";
                }
            }
        }
    }
    for($i = $countEvidencias; $i <= 3; $i++){
        echo "<div class='thumbActividades3'>";
        echo $this->Form->hidden("Actividad3Evidencia.$i.tipo",array('value'=>'1'));
        echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad3Evidencia.$i.evidencia");
        $countEvidenciasTipo++;
        echo "</div>";
    }
?>
<h7>B) Sesión(es) de lectura</h7>
<?php
    $countEvidencias = $i;    
    $countEvidenciasTipo = 1;
    if($this->data){
        if(isset($this->data['Actividad3Evidencia']) && is_array($this->data['Actividad3Evidencia'])){
            foreach($this->data['Actividad3Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '2'){
	            echo "<div class='thumbActividades3'>";
                    echo $this->Html->image('/actividades_3/'.$evidencia['evidencia'],array('style'=>'width:200px;'));
                    echo $this->Form->input("Actividad3Evidencia.$countEvidencias.id",array('value'=>$evidencia['id']));
                    echo $this->Form->hidden("Actividad3Evidencia.$countEvidencias.tipo",array('value'=>'2'));
                    echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad3Evidencia.$countEvidencias.evidencia",array('value'=>$evidencia['evidencia']));
                    $countEvidencias++;
                    $countEvidenciasTipo++;
                    echo "</div>";
                }
            }
        }
    }
    for($i= $countEvidencias; $i <= 7; $i++){
        echo "<div class='thumbActividades3'>";
        echo $this->Form->hidden("Actividad3Evidencia.$i.tipo",array('value'=>'2'));
        echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad3Evidencia.$i.evidencia");
        $countEvidenciasTipo++;
        echo "</div>";
    }    
    $countEvidencias = $i;
    $tipo_3 = false;
    $tipo_4 = false;
    if($this->data){
        if(isset($this->data['Actividad3Evidencia']) && is_array($this->data['Actividad3Evidencia'])){
            foreach($this->data['Actividad3Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '3'){
                    $tipo_3 = $evidencia;
                }else if($evidencia['tipo'] == '4'){
                    $tipo_4 = $evidencia;
                }
            }
        }
    }
    
    ?>
    <h7>OPCIONAL: Máximo un video o un audio que muestre las acciones de esta etapa.</h7>
    <?php
    if($tipo_3)
            echo $this->Form->input("Actividad3Evidencia.$countEvidencias.id",array('value'=>$tipo_3['id']));
    echo $this->Form->hidden("Actividad3Evidencia.$countEvidencias.tipo",array('value'=>'3'));
    echo $this->Form->input("Actividad3Evidencia.$countEvidencias.evidencia",array('div'=>'false','label'=>false,'value'=>($tipo_3) ? $tipo_3['evidencia'] : ''));
    $countEvidencias++;
    ?>
    <h6>ESCRITAS: Anota un par de comentarios de la recepción del proyecto por parte de los beneficiarios</h6>
    <span>(Máximo 500 catacteres)</span>
    <?php
    if($tipo_4)
            echo $this->Form->input("Actividad3Evidencia.$countEvidencias.id",array('value'=>$tipo_4['id']));
    echo $this->Form->hidden("Actividad3Evidencia.$countEvidencias.tipo",array('value'=>'4'));
    echo $this->Form->textarea("Actividad3Evidencia.$countEvidencias.evidencia",array('div'=>false,'label'=>false, 'style'=>'width:200px; height:100px;','value'=>($tipo_4) ? $tipo_4['evidencia'] : ''));    
?>
</div>
<!-- Evidencias FIN-->
</div>
<div class="boxRight2"></div>
<div class="submit">
<?php 
    echo $this->Form->end('Guardar', array('class'=>'botonesActividades'));
?>
</div>

<div class="return">
<?php
echo $this->Form->button('Regresar',array('class'=>'regresarListaActividades regresarEquiposActividad3 alineado botonesActividades'));
?>
</div>

<script type="text/javascript">
$(".regresarEquiposActividad3").click(function(){
    $(".equiposActividades3").show();
    $(".cargaAjaxActividades3").html('');
    return false;
})
</script>
