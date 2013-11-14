<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="actividadesBoxes">
<div class="boxLeft2">
<h5>Segundo periodo de evidencias del tercer bloque <br />Del 4 al 15 de marzo</h5>
<?php
echo $this->Form->create('Actividad32',array('url'=>array('controller'=>'actividades','action'=>'guarda_actividad3_2'),'ENCTYPE' => "multipart/form-data"));
if($this->data)
    echo $this->Form->input('id');
echo $this->Form->hidden('equipo_id',array('value'=>$equipo_id,'type'=>'text'));
?>
<!--Valoracion de impacto INICIO -->

<h6><span>Valoración impacto</span> de la lectura. En una escala del 1 al 10, donde 10 es el puntaje más alto, valora evidencias de lectura de las personas involucradas en el proyecto.</h6>
<?php 
$ths_preguntas = array('Participantes/¿Qué evidencias de lectura observamos?','Leen  cada día','Leen cada semana','Leen para otras personas','Se les escucha conversar sobre lo que leen'); 
$leen = array(
    'cada_dia',
    'cada_semana',
    'para_otros',
    'conversan'
);?>
<table class="tableValoraciones2">
    <?php echo $this->Html->tableHeaders($ths_preguntas); ?>
    <?php
    $countValoracionImpacto = 0;
    foreach($valoracion_impacto as $k_pregunta => $pregunta){        
        $leenInputs = array(
            $pregunta
        );
        foreach($leen as $k_leen => $l){
            $tempImpacto= (isset($this->data['Actividad32Impacto'][$countValoracionImpacto]) &&$this->data['Actividad32Impacto'][$countValoracionImpacto]) ? $this->Form->hidden(
                            "Actividad32Impacto.$countValoracionImpacto.id"
                    ) : ''; 
            $leenInputs[] = $tempImpacto.
                    $this->Form->hidden(
                            'Actividad32Impacto.'.$countValoracionImpacto.'.valoracion_impacto_id',
                            array(
                                'value' => $k_pregunta
                            )
                    ).$this->Form->hidden(
                            'Actividad32Impacto.'.$countValoracionImpacto.'.leen',
                            array(
                                'value' => $l
                            )
                    ).$this->Form->input(
                            'Actividad32Impacto.'.$countValoracionImpacto.'.cantidad',
                            array(
                                'type' => 'text',
                                'div'=>false,
                                'label'=>false
                                )
                            );
            $countValoracionImpacto++;
        }
        echo $this->Html->tableCells($leenInputs);        
    }
    ?>
</table>
<!--Valoracion de impacto FIN -->
<!--Preguntas de valoracion INICIO -->

<h6><span>Valoración de cambios</span> posibles en el proyecto: horario y lugar. (Contestar sólo en caso de haber realizado modificaciones en el horario y lugar de las sesiones del círculo de lectura)</h6>
<?php $ths_preguntas = array('#','Preguntas de valoración','Sí','No','Si escribiste sí'); ?>
<table class="tableValoraciones">
    <?php echo $this->Html->tableHeaders($ths_preguntas); ?>
    <?php
    foreach($preguntas_valoracion as $k_pregunta => $pregunta){
        if($this->data)
            echo $this->Form->input("Actividad32PreguntaValoracion.$k_pregunta.id");        
        $checked_si = '';
        $checked_no = '';
        if(isset($this->data['Actividad32PreguntaValoracion'][$k_pregunta]['respuesta'])){
            if($this->data['Actividad32PreguntaValoracion'][$k_pregunta]['respuesta'] == 'si')
                $checked_si = 'checked';
            else if($this->data['Actividad32PreguntaValoracion'][$k_pregunta]['respuesta'] == 'no')
                $checked_no = 'checked';
        }        
        echo $this->Html->tableCells(array(
            $pregunta['PreguntaValoracion']['numero'],
            $pregunta['PreguntaValoracion']['pregunta'],
            $this->Form->hidden(                    
                    "Actividad32PreguntaValoracion.$k_pregunta.preguntas_valoracion_id",array(
                         'value'=>$pregunta['PreguntaValoracion']['id'])).
            '<input type="radio" name="data[Actividad32PreguntaValoracion]['.$k_pregunta.'][respuesta]" id="Actividad32PreguntaValoracion'.$k_pregunta.'RespuestaSi" value="si" '.$checked_si.' />',
            '<input type="radio" name="data[Actividad32PreguntaValoracion]['.$k_pregunta.'][respuesta]" id="Actividad32PreguntaValoracion'.$k_pregunta.'RespuestaNo" value="no" '.$checked_no.' />',
            
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
                    "Actividad32PreguntaValoracion.$k_pregunta.respuesta_si",
                    array(
                        'value'=>(isset($this->data['Actividad32PreguntaValoracion'][$k_pregunta]['respuesta_si']) && $this->data['Actividad32PreguntaValoracion'][$k_pregunta]['respuesta_si'] != '') ? $this->data['Actividad32PreguntaValoracion'][$k_pregunta]['respuesta_si'] : $pregunta['PreguntaValoracion']['default'],
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
<!-- Valoración beneficios. INICIO-->
<h6><span>Valoración beneficios.</span> Describe los beneficios que obtienen los distintos participantes del proyecto.</h6>
<table class="tableParticipantes">
    <?php 
    echo $this->Html->tableHeaders(array('Participantes por tipo de participación','Beneficios'));
    foreach($valoracion_beneficios as $k_accion => $accion){
        if($this->data)
            echo $this->Form->input("Actividad32ValoracionBeneficio.$k_accion.id");
        echo $this->Html->tableCells(array(
            $accion['ValoracionBeneficio']['participante'],
            $this->Form->hidden(
                    "Actividad32ValoracionBeneficio.$k_accion.valoracion_beneficios_id",array(
                        'value' => $accion['ValoracionBeneficio']['id'],
                        'div' => false,
                        'label' => false
                        )
                    ).$this->Form->textarea(
                    "Actividad32ValoracionBeneficio.$k_accion.respuesta",array(
                        'div' => false,
                        'label' => false,
                        'style'=>'width:103% !important; height:100px;'
                        )
                    )
        ));
    }
    ?>
</table>
<!-- Valoración beneficios. FIN-->



<!-- recapitulación INICIO-->

<h6>Realiza <span>una recapitulación</span> de las acciones centrales programadas para el proyecto. Completa el siguiente cuadro a partir del cual elabores una prospectiva para atender las tareas más importantes que deban ser realizadas en las siguientes semanas para completar con éxito el proyecto.  </h6>
<table class="tableParticipantes">
    <?php 
    $acciones = array(
        'logradas' => 'Describe las acciones centrales del proyecto logradas',
        'no_logradas' =>'Acciones que no se pudieron realizar',
        'tareas_pendientes' =>'Tareas a realizar para concretar las acciones pendientes',
        );
    $accionesTh = array('');
    foreach($acciones as $k_accion => $accion){
        $accionesTh[] = $accion;
    }
    echo $this->Html->tableHeaders($accionesTh);
    $countAccion = 0;
    for($n = 1; $n <= 5; $n++){
        $accionTr = array();
        $accionTr[] = $n;
        foreach($acciones as $k_accion => $accion){
            $tempTr = (isset($this->data['Actividad32Recapitulacion'][$countAccion]) &&$this->data['Actividad32Recapitulacion'][$countAccion]) ? $this->Form->hidden(
                            "Actividad32Recapitulacion.$countAccion.id"
                    ) : ''; 
            $accionTr[] = $tempTr
                    .
                    $this->Form->hidden(
                            "Actividad32Recapitulacion.$countAccion.accion",array(
                                'value' => $k_accion
                            )
                    ).
                    $this->Form->hidden(
                            "Actividad32Recapitulacion.$countAccion.numero",array(
                                'value' => $n
                            )
                    ).
                    $this->Form->textarea(
                            "Actividad32Recapitulacion.$countAccion.respuesta",array(
                                'div' => false,
                                'label' => false,
                                //'style'=>'width:250px !important; height:100px;'
                            )
                    );
            $countAccion++;
        }
        echo $this->Html->tableCells($accionTr);
    }
    ?>
</table>
<!-- recapitulación FIN-->
<!-- Evidencias INICIO-->

<div class="inputsVarios">
<h5>Evidencias</h5>
<h6>GRÁFICAS:</h6>
<h7>A) Recursos y acciones de difusión del proyecto</h7>
<?php 
    $countEvidencias = 0;    
    $countEvidenciasTipo = 1;
    if($this->data){
        if(isset($this->data['Actividad32Evidencia']) && is_array($this->data['Actividad32Evidencia'])){
            foreach($this->data['Actividad32Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '1'){                    
                    echo "<div class='thumbActividades3'>";
                    echo $this->Html->image('/actividades_3_2/'.$evidencia['evidencia'],array('style'=>'width:200px;'));
                    echo $this->Form->input("Actividad32Evidencia.$countEvidencias.id",array('value'=>$evidencia['id']));
                    echo $this->Form->hidden("Actividad32Evidencia.$countEvidencias.tipo",array('value'=>'1'));
                    echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad32Evidencia.$countEvidencias.evidencia",array('value'=>$evidencia['evidencia']));
                    $countEvidencias++;
                    $countEvidenciasTipo++;                    
                    echo "</div>";
                }
            }
        }
    }
    for($i = $countEvidencias; $i <= 3; $i++){
        echo "<div class='thumbActividades3'>";
        echo $this->Form->hidden("Actividad32Evidencia.$i.tipo",array('value'=>'1'));
        echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad32Evidencia.$i.evidencia");
        $countEvidenciasTipo++;
        echo "</div>";
    }
?>
<h7>B) Sesión(es) de lectura</h7>
<?php
    $countEvidencias = $i;    
    $countEvidenciasTipo = 1;
    if($this->data){
        if(isset($this->data['Actividad32Evidencia']) && is_array($this->data['Actividad32Evidencia'])){
            foreach($this->data['Actividad32Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '2'){
	            echo "<div class='thumbActividades3'>";
                    echo $this->Html->image('/actividades_3_2/'.$evidencia['evidencia'],array('style'=>'width:200px;'));
                    echo $this->Form->input("Actividad32Evidencia.$countEvidencias.id",array('value'=>$evidencia['id']));
                    echo $this->Form->hidden("Actividad32Evidencia.$countEvidencias.tipo",array('value'=>'2'));
                    echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad32Evidencia.$countEvidencias.evidencia",array('value'=>$evidencia['evidencia']));
                    $countEvidencias++;
                    $countEvidenciasTipo++;
                    echo "</div>";
                }
            }
        }
    }
    for($i= $countEvidencias; $i <= 7; $i++){
        echo "<div class='thumbActividades3'>";
        echo $this->Form->hidden("Actividad32Evidencia.$i.tipo",array('value'=>'2'));
        echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad32Evidencia.$i.evidencia");
        $countEvidenciasTipo++;
        echo "</div>";
    }    
    $countEvidencias = $i;
    $tipo_3 = false;
    $tipo_4 = false;
    if($this->data){
        if(isset($this->data['Actividad32Evidencia']) && is_array($this->data['Actividad32Evidencia'])){
            foreach($this->data['Actividad32Evidencia'] as $k_evidencia => $evidencia){
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
            echo $this->Form->input("Actividad32Evidencia.$countEvidencias.id",array('value'=>$tipo_3['id']));
    echo $this->Form->hidden("Actividad32Evidencia.$countEvidencias.tipo",array('value'=>'3'));
    echo $this->Form->input("Actividad32Evidencia.$countEvidencias.evidencia",array('div'=>'false','label'=>false,'value'=>($tipo_3) ? $tipo_3['evidencia'] : ''));
    $countEvidencias++;
    ?>
    <h6>ESCRITAS: Anota un par de comentarios de la recepción del proyecto por parte de los beneficiarios</h6>
    <span>(Máximo 500 catacteres)</span>
    <?php
    if($tipo_4)
            echo $this->Form->input("Actividad32Evidencia.$countEvidencias.id",array('value'=>$tipo_4['id']));
    echo $this->Form->hidden("Actividad32Evidencia.$countEvidencias.tipo",array('value'=>'4'));
    echo $this->Form->textarea("Actividad32Evidencia.$countEvidencias.evidencia",array('div'=>false,'label'=>false, 'style'=>'width:200px; height:100px;','value'=>($tipo_4) ? $tipo_4['evidencia'] : ''));    
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
echo $this->Form->button('Regresar',array('class'=>'regresarListaActividades regresarEquiposActividad32 alineado botonesActividades'));
?>
</div>

<script type="text/javascript">
$(".regresarEquiposActividad32").click(function(){
    $(".equiposActividades32").show();
    $(".cargaAjaxActividades32").html('');
    return false;
})
</script>
