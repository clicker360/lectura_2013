<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="actividadesBoxes">
<div class="boxLeft2">
<h5>Tercer periodo de evidencias del tercer bloque <br />Del 18 de marzo al 12 de abril</h5>
<?php
echo $this->Form->create('Actividad33',array('url'=>array('controller'=>'actividades','action'=>'guarda_actividad3_3'),'ENCTYPE' => "multipart/form-data"));
if($this->data)
    echo $this->Form->input('id');
echo $this->Form->hidden('equipo_id',array('value'=>$equipo_id,'type'=>'text'));
?>
<!--autovaloracion INICIO -->

<h6><span></span> Guía para la autovaloración del trabajo realizado en torno a la lectura.</h6>
<?php 
$ths_preguntas = array('','Criterio de valoración','Excelente','Muy bien','Bien','Deficiente','No se cumpli&oacute;', 'No s&eacute; evaluarlo'); 
$valoracion = array(
    array('1','Asistencia  regular de todos los involucrados como condición de logro del proyecto.'),
    array('2','Atención comprometida del responsable en tareas encomendadas.'),
    array('3','Participación en planeación  de responsables del proyecto.'),
    array('4','Participación en difusión y apoyo de directivos escolares.'),
    array('5','articipación en el desarrollo y cumplimiento de las actividades por parte de los beneficiarios del proyecto.'),
    array('6','Participación y apoyo por parte de los padres de familia.'),
    array('7','Retroalimentación de responsables y participantes para la mejora del proyecto.'),
    array('8','Disposición a participar en futuros proyectos de lectura.'),
    
);?>
<table class="tableValoraciones2">
    <?php echo $this->Html->tableHeaders($ths_preguntas); ?>
    <?php
    $countAutovaloracion = 0;
    foreach($valoracion as $k_pregunta => $pregunta){ 
        $temp= (isset($this->data['Actividad33Autovaloracion'][$countAutovaloracion]) &&$this->data['Actividad33Autovaloracion'][$countAutovaloracion]) ? $this->Form->hidden(
                            "Actividad33Autovaloracion.$countAutovaloracion.id"
                    ) : '';         
        echo $this->Html->tableCells(array(
            $pregunta[0],
            $pregunta[1].$temp.$this->Form->hidden(
                    "Actividad33Autovaloracion.$countAutovaloracion.numero",array(
                        'value'=> $pregunta[0]
                    )),
            $this->Form->input("Actividad33Autovaloracion.$countAutovaloracion.respuesta", array(
                'type' => 'radio',
                'before' => '',
                'after' => '',
                'between' => '',
                'separator' => '</td><td>',
                'legend' => false,
                'options' => array(
                    'Excelente' => '',
                    'Muy bien' => '',
                    'Bien' => '',
                    'Deficiente' => '',
                    'No se cumpli&oacute;' => '',
                    'No s&eacute; evaluarlo' => '')
            )),            
        ));  
        $countAutovaloracion++;        
    }
    ?>
</table>
<!--autovaloracion FIN -->
<!--Libros leídos INICIO -->

<h6><span>Libros leídos</span> durante el proyecto.</h6>
<?php $ths_preguntas = array('Descripción de indicadores en materia de libros.','Libros literarios','Libros informativos'); ?>
<?php 
$preguntas_libros = array(
  array('1','Número de libros leídos por los integrantes del círculo de lectura.'), 
  array('2','Número de libros leídos por los responsables del proyecto.'), 
  array('3','Número de libros leídos por madres y padres de familia.'), 
  array('4','Número de libros leídos por otros integrantes de la comunidad.'), 
  array('5','Número de libros empleados en el proyecto que no forman parte de la biblioteca escolar o de aula.'), 
  array('6','Número aproximado de libros que conforman tu biblioteca de aula.'), 
  array('7','Número aproximado de libros que conforman la biblioteca escolar.'), 
  array('8','Número de libros leídos que ya conocía el responsable del círculo'), 
  array('9','Número de libros leídos que no conocía el responsable del círculo'), 
  array('10','Nombre del libro que más les gustó a los niños'), 
  array('11','Nombre del libro que más le gustó al responsable del círculo'), 
);
?>
<table class="tableValoraciones">
    <?php echo $this->Html->tableHeaders($ths_preguntas); ?>
    <?php
    $countLibrosLiterarios = 0;
    $countLibrosInformativos = 1;
    foreach($preguntas_libros as $k_pregunta => $pregunta){ 
        if($this->data){
            echo $this->Form->hidden("Actividad33LibroLeido.$countLibrosLiterarios.id");      
            echo $this->Form->hidden("Actividad33LibroLeido.$countLibrosInformativos.id");      
        }
        echo $this->Html->tableCells(array(
                $pregunta[1],
                $this->Form->hidden("Actividad33LibroLeido.$countLibrosLiterarios.tipo",array(
                    'value' => 'literario'
                )).$this->Form->hidden("Actividad33LibroLeido.$countLibrosLiterarios.numero",array(
                    'value' => $pregunta[0]
                )).$this->Form->input("Actividad33LibroLeido.$countLibrosLiterarios.total",array(
                    'type' => 'text',
                    'div' => false,
                    'label' => false,
                    )),
                $this->Form->hidden("Actividad33LibroLeido.$countLibrosInformativos.tipo",array(
                    'value' => 'informativo'
                )).$this->Form->hidden("Actividad33LibroLeido.$countLibrosInformativos.numero",array(
                    'value' => $pregunta[0]
                )).$this->Form->input("Actividad33LibroLeido.$countLibrosInformativos.total",array(
                    'type' => 'text',
                    'div' => false,
                    'label' => false,
                    ))
                ));   
        $countLibrosLiterarios = $countLibrosLiterarios+2;
        $countLibrosInformativos = $countLibrosInformativos+2;
    }
    ?>
</table>
<!--Libros leídos FIN -->
<!--retos INICIO -->
<h6>A partir de los avances reportados ¿Qué falta completar del proyecto?  Anota los dos<span> principales retos </span> que no pudieron atenderse en el desarrollo del proyecto:</h6>
<?php 
if(isset($this->data["Actividad33Reto"][0]["reto"]) && $this->data["Actividad33Reto"][0]["reto"])
    echo $this->Form->input("Actividad33Reto.0.id");
echo $this->Form->hidden("Actividad33Reto.0.numero",array('value'=>'1'));
echo $this->Form->textarea(
        "Actividad33Reto.0.reto",array(
            'div'=>false,
            'label'=>false, 
            'style'=>'width:200px; height:100px;',
            'onfocus' => 'if(this.value=="1. (máximo 200 caracteres)"){this.value="";}',
            'onblur' => 'if(this.value==""){this.value="1. (máximo 200 caracteres)";}',
            'maxlength' => '200',
            'value'=>(isset($this->data["Actividad33Reto"][0]["reto"]) && $this->data["Actividad33Reto"][0]["reto"]) ? $this->data["Actividad33Reto"][0]["reto"] : '1. (máximo 200 caracteres)'
        )
    );   
if(isset($this->data["Actividad33Reto"][1]["reto"]) && $this->data["Actividad33Reto"][1]["reto"])
    echo $this->Form->input("Actividad33Reto.1.id");
echo $this->Form->hidden("Actividad33Reto.1.numero",array('value'=>'2'));
echo $this->Form->textarea(
        "Actividad33Reto.1.reto",array(
            'div'=>false,
            'label'=>false, 
            'style'=>'width:200px; height:100px;',
            'onfocus' => 'if(this.value=="2. (máximo 200 caracteres)"){this.value="";}',
            'onblur' => 'if(this.value==""){this.value="2. (máximo 200 caracteres)";}',
            'maxlength' => '200',
            'value'=>(isset($this->data["Actividad33Reto"][1]["reto"]) && $this->data["Actividad33Reto"][1]["reto"]) ? $this->data["Actividad33Reto"][1]["reto"] : '2. (máximo 200 caracteres)'
        )
    );   
?>
<!--retos FIN -->
<!-- Recapitulacion acciones. INICIO-->
<h6><span>Revisa tu recapitulación</span> e identifica las 5 acciones más importantes que aseguraron el éxito del proyecto.  Relaciona cada acción con cada uno de los periodos de este bloque de la Olimpiada.</h6>
<table class="tableParticipantes">
    <?php 
    echo $this->Html->tableHeaders(array(
        '',
        'Descripción de tareas realizadas',
        'Primer periodo',
        'Segundo periodo',
        'Tercer periodo',
        ));
    for($i = 0; $i < 5; $i++){
        if(isset($this->data["Actividad33RecapitulacionAccion"][$i]) && $this->data["Actividad33RecapitulacionAccion"][$i])
            echo $this->Form->input("Actividad33RecapitulacionAccion.$i.id");
        echo $this->Html->tableCells(array(
           ($i+1),
           $this->Form->hidden(
                    "Actividad33RecapitulacionAccion.$i.numero",array(
                        'value' => ($i+1)
                        )
                    ).$this->Form->textarea(
                    "Actividad33RecapitulacionAccion.$i.accion",array(
                        'div' => false,
                        'label' => false,
                        'maxlength' => '300',
                        'style'=>''
                        )
                    ),
            $this->Form->checkbox("Actividad33RecapitulacionAccion.$i.primer_periodo"),
            $this->Form->checkbox("Actividad33RecapitulacionAccion.$i.segundo_periodo"),
            $this->Form->checkbox("Actividad33RecapitulacionAccion.$i.tercer_periodo"),
        ));
    }
    ?>
</table>
<!-- Recapitulacion acciones. FIN-->

<!--Logros lectores observados INICIO -->

<h6><span>Logros lectores observados.</span></h6>
<?php 
$ths_preguntas = array('','Criterios de valoración de logros lectores entre los destinatarios beneficiarios del proyecto','Todos','Casi todos','Algunos','Ninguno','No sabr&iacute;a evaluarlo'); 
$valoracion = array(
    array('1','Buscan nuevos libros para leer.'),
    array('2','Solicitan en préstamo libros a la biblioteca.'),
    array('3','Recomiendan a otros libros que han leído.'),
    array('4','Leen por iniciativa propia a otras personas.'),
    array('5','Distinguen los libros literarios de los libros informativos.'),
    array('6','Identifican autores favoritos.'),
    array('7','Solicitan para leer libros sobre temas específicos.'),
    array('8','Incorporan en sus conversaciones temas o expresiones de los libros leídos.'),
    array('9','Otro logro: ANOTAR (máximo 100 caracteres)'),
    array('10','Otro logro: ANOTAR (máximo 100 caracteres)'),
    
);?>
<table class="tableValoraciones2">
    <?php echo $this->Html->tableHeaders($ths_preguntas); ?>
    <?php
    $countAutovaloracion = 0;
    foreach($valoracion as $k_pregunta => $pregunta){ 
        $temp= (isset($this->data['Actividad33LogroLector'][$countAutovaloracion]) &&$this->data['Actividad33LogroLector'][$countAutovaloracion]) ? $this->Form->hidden(
                            "Actividad33LogroLector.$countAutovaloracion.id"
                    ) : '';         
        echo $this->Html->tableCells(array(
            $pregunta[0].$temp.$this->Form->hidden(
                    "Actividad33LogroLector.$countAutovaloracion.numero",array(
                        'value'=> $pregunta[0]
                    )),
            (in_array($pregunta[0],array('9','10'))) ? $this->Form->textarea(
                    "Actividad33LogroLector.$countAutovaloracion.otro_logro",array(
                        'div' => false,
                        'label' => false,
                        'onfocus' => 'if(this.value=="'.$pregunta[1].'"){this.value="";}',
                        'onblur' => 'if(this.value==""){this.value="'.$pregunta[1].'";}',
                        'maxlength' => '100',
                        'style'=>'',
                        'value' => (isset($this->data['Actividad33LogroLector'][$countAutovaloracion]['otro_logro']) && $this->data['Actividad33LogroLector'][$countAutovaloracion]['otro_logro']) ? $this->data['Actividad33LogroLector'][$countAutovaloracion]['otro_logro'] : $pregunta[1] 
                        )
                    ) : $pregunta[1] ,
            $this->Form->input("Actividad33LogroLector.$countAutovaloracion.logro", array(
                'type' => 'radio',
                'before' => '',
                'after' => '',
                'between' => '',
                'separator' => '</td><td>',
                'legend' => false,
                'options' => array(
                    'Todos' => '',
                    'Casi todos' => '',
                    'Algunos' => '',
                    'Ninguno' => '',
                    'No sabr&iacute;a evaluarlo' => '')
            )),            
        ));  
        $countAutovaloracion++;        
    }
    ?>
</table>
<!--Logros lectores observados FIN -->

<!-- Evidencias INICIO-->

<div class="inputsVarios">
<h5>Evidencias</h5>
<h6><span>Gr&aacute;ficas:</span> De 2 a 4 fotografías (tamaño máximo: 300 kb por fotografía)</h6>
<h6></h6>
<h7>De la sesión o actividad pública realizada como conclusión o cierre del proyecto. </h7>
<?php 
    $countEvidencias = 0;    
    $countEvidenciasTipo = 1;
    if($this->data){
        if(isset($this->data['Actividad33Evidencia']) && is_array($this->data['Actividad33Evidencia'])){
            foreach($this->data['Actividad33Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '1'){                    
                    echo "<div class='thumbActividades3'>";
                    echo $this->Html->image('/actividades_3_3/'.$evidencia['evidencia'],array('style'=>'width:200px;'));
                    echo $this->Form->input("Actividad33Evidencia.$countEvidencias.id",array('value'=>$evidencia['id']));
                    echo $this->Form->hidden("Actividad33Evidencia.$countEvidencias.tipo",array('value'=>'1'));
                    echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad33Evidencia.$countEvidencias.evidencia",array('value'=>$evidencia['evidencia']));
                    $countEvidencias++;
                    $countEvidenciasTipo++;                    
                    echo "</div>";
                }
            }
        }
    }
    for($i = $countEvidencias; $i <= 3; $i++){
        echo "<div class='thumbActividades3'>";
        echo $this->Form->hidden("Actividad33Evidencia.$i.tipo",array('value'=>'1'));
        echo "<br />" . $countEvidenciasTipo.') '.$this->Form->file("Actividad33Evidencia.$i.evidencia");
        $countEvidenciasTipo++;
        echo "</div>";
    }
?>
<?php 
    $countEvidencias = $i;
    $tipo_3 = false;
    $tipo_4 = false;
    if($this->data){
        if(isset($this->data['Actividad33Evidencia']) && is_array($this->data['Actividad33Evidencia'])){
            foreach($this->data['Actividad33Evidencia'] as $k_evidencia => $evidencia){
                if($evidencia['tipo'] == '3'){
                    $tipo_3 = $evidencia;
                }else if($evidencia['tipo'] == '4'){
                    $tipo_4 = $evidencia;
                }
            }
        }
    }
    
    ?>
    <h7>OPCIONAL: Un solo vídeo o audio que muestre la actividad pública realizada como conclusión o cierre el proyecto.</h7>
    <?php
    if($tipo_3)
            echo $this->Form->input("Actividad33Evidencia.$countEvidencias.id",array('value'=>$tipo_3['id']));
    echo $this->Form->hidden("Actividad33Evidencia.$countEvidencias.tipo",array('value'=>'3'));
    echo $this->Form->input("Actividad33Evidencia.$countEvidencias.evidencia",array('div'=>'false','label'=>false,'value'=>($tipo_3) ? $tipo_3['evidencia'] : ''));
    $countEvidencias++;
    ?>
    <h6><span>Escritas:</span> Una reflexión sobre el proyecto y su continuidad a partir de las experiencias y posibilidades expresadas en la prospectiva.</h6>
    <span>(Máximo 500 catacteres)</span>
    <?php
    if($tipo_4)
            echo $this->Form->input("Actividad33Evidencia.$countEvidencias.id",array('value'=>$tipo_4['id']));
    echo $this->Form->hidden("Actividad33Evidencia.$countEvidencias.tipo",array('value'=>'4'));
    echo $this->Form->textarea("Actividad33Evidencia.$countEvidencias.evidencia",array('div'=>false,'label'=>false, 'style'=>'width:200px; height:100px;','value'=>($tipo_4) ? $tipo_4['evidencia'] : ''));    
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
echo $this->Form->button('Regresar',array('class'=>'regresarListaActividades regresarEquiposActividad33 alineado botonesActividades'));
?>
</div>

<script type="text/javascript">
$(".regresarEquiposActividad33").click(function(){
    $(".equiposActividades33").show();
    $(".cargaAjaxActividades33").html('');
    return false;
})
</script>
