<?php
/*
//echo $this->Html->script(array('leeresiniciativa','jquery.simplemodal'));
 * 
 */
?>
<div class="wrapper" style="padding-bottom: 30px;">
    <div id="registro_largo">
        <?php echo $this->Form->create('Registro', array('url' => array('controller' => 'actividades', 'action' => 'guardar_registro_final'),'name' => 'formregistroescuela','id'=>'formregistroescuela')); ?>
            <?php echo $this->Form->input('Registro.equipo_id',array('type'=>'hidden','value'=>$id)); ?>
            <fieldset class="fieldset2">
                <div>
                    <?php 
                        echo $this->Session->flash(); 
                    ?>
                </div>
                <div>
                
                <div class="TitleDesc">Estimado(a) Profesor(a):</div>

<div class="SubDesc">Te comunicamos que del 11 al 15 de febrero se estará habilitado en esta plataforma el siguiente formulario de registro de Proyecto de Lectura para poder comenzar con la Etapa 3: "El círculo de lectura y la comunidad" 

El proyecto consiste en una propuesta de lectura para realizar en la comunidad escolar. Toma en cuenta que esta propuesta deberá contemplar beneficiar con libros y lectura a la mayor cantidad posible de integrantes de la comunidad escolar. Las actividades y evidencias que realizaron en la primera y segunda etapa de la Olimpiada serán el insumo básico para la elaboración y puesta en práctica de su proyecto.</div>
                
                    <div class="TitleDesc">Partimos de la siguiente definición de proyecto (Carrasco, 2002):</div>
                        <div class="SubDesc">Actividades que exigen una planeación para investigar, consultar, decidir sobre una presentación final que generalmente es pública. Pueden presentarse los resultados del proyecto frente al grupo o ante los padres de familia o docentes. Los proyectos exigen múltiples actividades que generalmente se realizan en equipo. <br />Cuando se trata de proyectos de lectura, la planeación, las actividades y los resultados se asocian precisamente a los libros y la lectura.</div>

                <div id="usuario" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['titulo']) {
                        $val_titulo = $registro_info['Registro']['titulo'];
                    } else {
                        $val_titulo = 'Título del proyecto: (máximo 100 caracteres)';
                    }
                    echo $this->Form->input('Registro.titulo', array(
                        'class'     => 'form_sin_error',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Título del proyecto: (máximo 100 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Título del proyecto: (máximo 100 caracteres)' . '";}',
                        'value'     => $val_titulo
                    ));
                    ?>
                </div>
                <div id="contraseña" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['objetivo']) {
                        $val_objetivo = $registro_info['Registro']['objetivo'];
                    } else {
                        $val_objetivo = 'Objetivo: (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.objetivo', array(
                        'class'     => 'form_sin_error',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Objetivo: (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Objetivo: (máximo 200 caracteres)' . '";}',
                        'rows'      => '5',
                        'type'      => 'text',
                        'value'     => $val_objetivo,
                    ));
                    ?>
                </div>
                <div>
                    <div class="input_textos boxLeft2">
                        Recuerde que el desarrollo completo de un objetivo de proyecto debe considerar la inclusión de los siguientes elementos: <br />
                        ¿Qué me propongo lograr? <br />
                        ¿Con quiénes participaré? ¿A quiénes beneficiaré? <br />
                        ¿En qué fichas de actividades sostendré el trabajo de lectura? <br />
                        ¿Cuándo realizaré las acciones previstas? <br />
                        ¿Con qué criterio determinaré que he logrado el impacto buscado? <br />
                    </div>
                </div>
                <h3>A partir de tu objetivo marca las acciones centrales que constituyen tu proyecto:</h3>
                <div id="checkbox">
                    <?php
                    $accion_1 = false;
                    if(isset($acciones[1]) && $acciones[1]  == '1')  {
                        $accion_1 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.1', array(
                        'checked' => $accion_1,
                        'class'   => 'form_sin_error',
                        'label'   => false
                    ));
                    ?>
                    <span class="input_textos_2">Talleres</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_2 = false;
                    if(isset($acciones[2]) && $acciones[2] == '1')  {
                        $accion_2 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.2', array(
                        'checked' => $accion_2,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Presentaciones de libros y autores</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_3 = false;
                    if(isset($acciones[3]) && $acciones[3] == '1')  {
                        $accion_3 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.3', array(
                        'checked' => $accion_3,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Una serie de sesiones de lectura en voz alta</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_4 = false;
                    if(isset($acciones[4]) && $acciones[4] == '1')  {
                        $accion_4 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.4', array(
                        'checked' => $accion_4,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Exposiciones</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_5 = false;
                    if(isset($acciones[5]) && $acciones[5] == '1')  {
                        $accion_5 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.5', array(
                        'checked' => $accion_5,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Ciclos de conferencias o de cine</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_6 = false;
                    if(isset($acciones[6]) && $acciones[6] == '1')  {
                        $accion_6 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.6', array(
                        'checked' => $accion_6,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Concursos</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_7 = false;
                    if(isset($acciones[7]) && $acciones[7] == '1')  {
                        $accion_7 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.7', array(
                        'checked' => $accion_7,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Veladas literarias</span>
                </div>
                <div id="checkbox">
                    <?php
                    $accion_8 = false;
                    if(isset($acciones[8]) && $acciones[8] == '1')  {
                        $accion_8 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.8', array(
                        'checked' => $accion_8,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                    <span class="input_textos_2">Formación de nuevos círculos de lectura</span>
                </div>
                <div id="escuela" class="boxLeft2">
                <div id="checkbox">
                    <?php
                    $accion_9 = false;
                    if(isset($acciones[9]) && $acciones[9] == '1')  {
                        $accion_9 = true;
                    }
                    echo $this->Form->checkbox('Registro.accion.9', array(
                        'checked' => $accion_9,
                        'class' => 'form_sin_error',
                        'label' => false,
                    ));
                    ?>
                </div>
                    <label for="data[Registro][accion_otro]">Otros eventos extraescolares <br ⁄>Especificar:</label>
                    <?php
                    if($registro_info['Registro']['accion_otro']) {
                        $val_escuela = $registro_info['Registro']['accion_otro'];
                    } else {
                        $val_escuela = '(máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.accion_otro', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '(máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '(máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                <h3>Destinatarios beneficiarios del proyecto:</h3>
                    <div class="input_textos">
                        ¿Quiénes son los destinatarios prioritarios del proyecto? Recuerda que además de la comunidad escolar debes considerar a integrantes de la localidad. Nombra a los destinatarios, conforme al recuadro elegido, por ejemplo: grupo de primer año, hermanitos menores de 4 años en el grupo de segundo grado, mamás, abuelos, etc. <br />Máximo 100 caracteres por recuadro.
                    </div>
                </div>
                <div id="escuela" class="boxLeft2">
                    <label for="data[Registro][v_a_0_4]">Comunidad escolar</label>
                    <?php
                    if($registro_info['Registro']['v_a_0_4']) {
                        $val_0_4 = $registro_info['Registro']['v_a_0_4'];
                    } else {
                        $val_0_4 = '0 a 4 años';
                    }
                    echo $this->Form->input('Registro.v_a_0_4', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '0 a 4 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '0 a 4 años' . '";}',
                        'value' => $val_0_4
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_a_4_5']) {
                        $val_4_5 = $registro_info['Registro']['v_a_4_5'];
                    } else {
                        $val_4_5 = '4 a 5 años';
                    }
                    echo $this->Form->input('Registro.v_a_4_5', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '4 a 5 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '4 a 5 años' . '";}',
                        'value' => $val_4_5
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_a_6_11']) {
                        $val_6_11 = $registro_info['Registro']['v_a_6_11'];
                    } else {
                        $val_6_11 = '6 a 11 años';
                    }
                    echo $this->Form->input('Registro.v_a_6_11', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '6 a 11 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '6 a 11 años' . '";}',
                        'value' => $val_6_11
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_a_12_15']) {
                        $val_12_15 = $registro_info['Registro']['v_a_12_15'];
                    } else {
                        $val_12_15 = '12 a 15 años';
                    }
                    echo $this->Form->input('Registro.v_a_12_15', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '12 a 15 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '12 a 15 años' . '";}',
                        'value' => $val_12_15
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_a_16_24']) {
                        $val_16_24 = $registro_info['Registro']['v_a_16_24'];
                    } else {
                        $val_16_24 = '16 a 24 años';
                    }
                    echo $this->Form->input('Registro.v_a_16_24', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '16 a 24 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '16 a 24 años' . '";}',
                        'value' => $val_16_24
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_a_25_60']) {
                        $val_25_60 = $registro_info['Registro']['v_a_25_60'];
                    } else {
                        $val_25_60 = '25 a 60 años';
                    }
                    echo $this->Form->input('Registro.v_a_25_60', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '25 a 60 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '25 a 60 años' . '";}',
                        'value' => $val_25_60
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_a_61']) {
                        $val_61 = $registro_info['Registro']['v_a_61'];
                    } else {
                        $val_61 = 'Mayores de 60 años';
                    }
                    echo $this->Form->input('Registro.v_a_61', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Mayores de 60 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Mayores de 60 años' . '";}',
                        'value' => $val_61
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <label for="data[Registro][v_b_0_4]">
                        Comunidad extraescolar
                    </label>
                    <?php
                    if($registro_info['Registro']['v_b_0_4']) {
                        $val_0_4 = $registro_info['Registro']['v_b_0_4'];
                    } else {
                        $val_0_4 = '0 a 4 años';
                    }
                    echo $this->Form->input('Registro.v_b_0_4', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '0 a 4 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '0 a 4 años' . '";}',
                        'value' => $val_0_4
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_b_4_5']) {
                        $val_4_5 = $registro_info['Registro']['v_b_4_5'];
                    } else {
                        $val_4_5 = '4 a 5 años';
                    }
                    echo $this->Form->input('Registro.v_b_4_5', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '4 a 5 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '4 a 5 años' . '";}',
                        'value' => $val_4_5
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_b_6_11']) {
                        $val_6_11 = $registro_info['Registro']['v_b_6_11'];
                    } else {
                        $val_6_11 = '6 a 11 años';
                    }
                    echo $this->Form->input('Registro.v_b_6_11', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '6 a 11 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '6 a 11 años' . '";}',
                        'value' => $val_6_11
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_b_12_15']) {
                        $val_12_15 = $registro_info['Registro']['v_b_12_15'];
                    } else {
                        $val_12_15 = '12 a 15 años';
                    }
                    echo $this->Form->input('Registro.v_b_12_15', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '12 a 15 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '12 a 15 años' . '";}',
                        'value' => $val_12_15
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_b_16_24']) {
                        $val_16_24 = $registro_info['Registro']['v_b_16_24'];
                    } else {
                        $val_16_24 = '16 a 24 años';
                    }
                    echo $this->Form->input('Registro.v_b_16_24', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '16 a 24 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '16 a 24 años' . '";}',
                        'value' => $val_16_24
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_b_25_60']) {
                        $val_25_60 = $registro_info['Registro']['v_b_25_60'];
                    } else {
                        $val_25_60 = '25 a 60 años';
                    }
                    echo $this->Form->input('Registro.v_b_25_60', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '25 a 60 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '25 a 60 años' . '";}',
                        'value' => $val_25_60
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['v_b_61']) {
                        $val_61 = $registro_info['Registro']['v_b_61'];
                    } else {
                        $val_61 = 'Mayores de 60 años';
                    }
                    echo $this->Form->input('Registro.v_b_61', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Mayores de 60 años' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Mayores de 60 años' . '";}',
                        'value' => $val_61
                    ));
                    ?>
                </div>
                </div>
                <div id="escuela" class="boxLeft2">
                <h3>Nombres, responsabilidades y acciones de tres participantes centrales para el cumplimiento del proyecto.</h3>
                    <label for="data[Registro][p_1_nombre]">
                        Participante 1
                    </label>
                    <?php
                    if($registro_info['Registro']['p_1_nombre']) {
                        $val_p_1_nombre = $registro_info['Registro']['p_1_nombre'];
                    } else {
                        $val_p_1_nombre = 'Nombre completo';
                    }
                    echo $this->Form->input('Registro.p_1_nombre', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '50',
                        'OnFocus' => 'if(this.value=="' . 'Nombre completo' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Nombre completo' . '";}',
                        'value' => $val_p_1_nombre
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_1_tipo']) {
                        $options_tipo_participante_activo = $registro_info['Registro']['p_1_tipo'];
                    } else {
                        $options_tipo_participante_activo = 0;
                    }
                    $options_tipo_participante = array(
                        '0' => 'Selecciona Tipo :',
                        '1' => 'Estudiante',
                        '2' => 'Profesor',
                        '3' => 'Directivo',
                        '4' => 'Madre o padre de familia',
                        '5' => 'Otro integrante de la comunidad'
                    );
                    echo $this->Form->input('Registro.p_1_tipo', array(
                        'options' => $options_tipo_participante,
                        'selected' => $options_tipo_participante_activo ,
                        'class' => 'form_sin_error',
                        'maxlength' => '50',
                        'empty' => false,
                        'label' => false,
                    ));
                    ?>
                </div>
		<div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_1_resp_central']) {
                        $val_p_1_resp_central = $registro_info['Registro']['p_1_resp_central'];
                    } else {
                        $val_p_1_resp_central = 'Responsabilidad central';
                    }
                    echo $this->Form->input('Registro.p_1_resp_central', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Responsabilidad central' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Responsabilidad central' . '";}',
                        'value' => $val_p_1_resp_central
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_1_realiza_tarea']) {
                        $p_1_realiza_tarea = $registro_info['Registro']['p_1_realiza_tarea'];
                    } else {
                        $p_1_realiza_tarea = '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)';
                    }
                    echo $this->Form->input('Registro.p_1_realiza_tarea', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '200',
                        'OnFocus' => 'if(this.value=="' . '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)' . '";}',
                        'rows'       => '4',
                        'value' => $p_1_realiza_tarea
                    ));
                    ?>
                </div>


                <div id="escuela" class="boxLeft2">
                    <label for="data[Registro][accion_1_ai]">Acciones necesarias (Mínimo 2 acciones. Máximo 100 caracteres)</label>
                    <?php
                    if($registro_info['Registro']['accion_1_ai']) {
                        $val_escuela = $registro_info['Registro']['accion_1_ai'];
                    } else {
                        $val_escuela = 'Antes de iniciar: planeación';
                    }
                    echo $this->Form->input('Registro.accion_1_ai', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Antes de iniciar: planeación' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Antes de iniciar: planeación' . '";}',
                        'rows'       => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_1_ar']) {
                        $val_escuela = $registro_info['Registro']['accion_1_ar'];
                    } else {
                        $val_escuela = 'Antes de realizar: difusión';
                    }
                    echo $this->Form->input('Registro.accion_1_ar', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Antes de realizar: difusión' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Antes de realizar: difusión' . '";}',
                        'rows'       => '4',
                        'value' => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_1_du']) {
                        $val_escuela = $registro_info['Registro']['accion_1_du'];
                    } else {
                        $val_escuela = 'Durante el proyecto';
                    }
                    echo $this->Form->input('Registro.accion_1_du', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Durante el proyecto' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Durante el proyecto' . '";}',
                        'rows'       => '4',
                        'value' => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_1_de']) {
                        $val_escuela = $registro_info['Registro']['accion_1_de'];
                    } else {
                        $val_escuela = 'Después del proyecto';
                    }
                    echo $this->Form->input('Registro.accion_1_de', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Después del proyecto' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Después del proyecto' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                <label for="data[Registro][p_2_nombre]">
                        Participante 2
                </label>
                    <?php
                    if($registro_info['Registro']['p_2_nombre']) {
                        $val_p_1_nombre = $registro_info['Registro']['p_2_nombre'];
                    } else {
                        $val_p_1_nombre = 'Nombre completo';
                    }
                    echo $this->Form->input('Registro.p_2_nombre', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Nombre completo' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Nombre completo' . '";}',
                        'value' => $val_p_1_nombre
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_2_tipo']) {
                        $options_tipo_participante_activo = $registro_info['Registro']['p_2_tipo'];
                    } else {
                        $options_tipo_participante_activo = 0;
                    }
                    $options_tipo_participante = array(
                        '0' => 'Selecciona Tipo :',
                        '1' => 'Estudiante',
                        '2' => 'Profesor',
                        '3' => 'Directivo',
                        '4' => 'Madre o padre de familia',
                        '5' => 'Otro integrante de la comunidad'
                    );
                    echo $this->Form->input('Registro.p_2_tipo', array(
                        'options' => $options_tipo_participante,
                        'selected' => $options_tipo_participante_activo,
                        'class' => 'form_sin_error',
                        'empty' => false,
                        'label' => false,
                    ));
                    ?>
                </div>
		<div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_2_resp_central']) {
                        $val_p_2_resp_central = $registro_info['Registro']['p_2_resp_central'];
                    } else {
                        $val_p_2_resp_central = 'Responsabilidad central';
                    }
                    echo $this->Form->input('Registro.p_2_resp_central', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Responsabilidad central' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Responsabilidad central' . '";}',
                        'value' => $val_p_2_resp_central
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_2_realiza_tarea']) {
                        $p_2_realiza_tarea = $registro_info['Registro']['p_2_realiza_tarea'];
                    } else {
                        $p_2_realiza_tarea = '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)';
                    }
                    echo $this->Form->input('Registro.p_2_realiza_tarea', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '500',
                        'OnFocus' => 'if(this.value=="' . '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)' . '";}',
                        'rows'       => '4',
                        'value' => $p_2_realiza_tarea
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">

                                <label for="data[Registro][accion_2_ai]">
                        Acciones necesarias (Mínimo 2 acciones. Máximo 100 caracteres)</label>                    <?php
                    if($registro_info['Registro']['accion_2_ai']) {
                        $val_escuela = $registro_info['Registro']['accion_2_ai'];
                    } else {
                        $val_escuela = 'Antes de iniciar: planeación';
                    }
                    echo $this->Form->input('Registro.accion_2_ai', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Antes de iniciar: planeación' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Antes de iniciar: planeación' . '";}',
                        'rows'       => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_2_ar']) {
                        $val_escuela = $registro_info['Registro']['accion_2_ar'];
                    } else {
                        $val_escuela = 'Antes de realizar: difusión';
                    }
                    echo $this->Form->input('Registro.accion_2_ar', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Antes de realizar: difusión' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Antes de realizar: difusión' . '";}',
                        'rows'       => '4',
                        'value' => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_2_du']) {
                        $val_escuela = $registro_info['Registro']['accion_2_du'];
                    } else {
                        $val_escuela = 'Durante el proyecto';
                    }
                    echo $this->Form->input('Registro.accion_2_du', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Durante el proyecto' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Durante el proyecto' . '";}',
                        'rows'       => '4',
                        'value' => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_2_de']) {
                        $val_escuela = $registro_info['Registro']['accion_2_de'];
                    } else {
                        $val_escuela = 'Después del proyecto';
                    }
                    echo $this->Form->input('Registro.accion_2_de', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Después del proyecto' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Después del proyecto' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                <label for="data[Registro][p_3_nombre]">Participante 3</label>
                    <?php
                    if($registro_info['Registro']['p_3_nombre']) {
                        $val_p_1_nombre = $registro_info['Registro']['p_3_nombre'];
                    } else {
                        $val_p_1_nombre = 'Nombre completo';
                    }
                    echo $this->Form->input('Registro.p_3_nombre', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Nombre completo' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Nombre completo' . '";}',
                        'value' => $val_p_1_nombre
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_3_tipo']) {
                        $options_tipo_participante_activo = $registro_info['Registro']['p_3_tipo'];
                    } else {
                        $options_tipo_participante_activo = 0;
                    }
                    $options_tipo_participante = array(
                        '0' => 'Selecciona Tipo :',
                        '1' => 'Estudiante',
                        '2' => 'Profesor',
                        '3' => 'Directivo',
                        '4' => 'Madre o padre de familia',
                        '5' => 'Otro integrante de la comunidad'
                    );
                    echo $this->Form->input('Registro.p_3_tipo',  array(
                        'options' => $options_tipo_participante,
                        'selected' => $options_tipo_participante_activo,
                        'class' => 'form_sin_error',
                        'empty' => false,
                        'label' => false,
                    ));
                    ?>
                </div>
		<div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_3_resp_central']) {
                        $val_p_3_resp_central = $registro_info['Registro']['p_3_resp_central'];
                    } else {
                        $val_p_3_resp_central = 'Responsabilidad central';
                    }
                    echo $this->Form->input('Registro.p_3_resp_central', array(
                        'class' => 'form_sin_error',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Responsabilidad central' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Responsabilidad central' . '";}',
                        'value' => $val_p_3_resp_central
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['p_3_realiza_tarea']) {
                        $p_3_realiza_tarea = $registro_info['Registro']['p_3_realiza_tarea'];
                    } else {
                        $p_3_realiza_tarea = '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)';
                    }
                    echo $this->Form->input('Registro.p_3_realiza_tarea', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . '¿Cómo sabremos si están realizando bien su tarea?  (acciones, nivel de participación, desempeño, compromiso, etc.)' . '";}',
                        'rows'       => '4',
                        'value' => $p_3_realiza_tarea
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">

                    <label for="data[Registro][accion_3_ai]">Acciones necesarias (Mínimo 2 acciones. Máximo 100 caracteres)</label>
                    <?php
                    if($registro_info['Registro']['accion_3_ai']) {
                        $val_escuela = $registro_info['Registro']['accion_3_ai'];
                    } else {
                        $val_escuela = 'Antes de iniciar: planeación';
                    }
                    echo $this->Form->input('Registro.accion_3_ai', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Antes de iniciar: planeación' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Antes de iniciar: planeación' . '";}',
                        'rows'       => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_3_ar']) {
                        $val_escuela = $registro_info['Registro']['accion_3_ar'];
                    } else {
                        $val_escuela = 'Antes de realizar: difusión';
                    }
                    echo $this->Form->input('Registro.accion_3_ar', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Antes de realizar: difusión' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Antes de realizar: difusión' . '";}',
                        'rows'       => '4',
                        'value' => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_3_du']) {
                        $val_escuela = $registro_info['Registro']['accion_3_du'];
                    } else {
                        $val_escuela = 'Durante el proyecto';
                    }
                    echo $this->Form->input('Registro.accion_3_du', array(
                        'class' => 'form_sin_error big_text',
                        'label' => false,
                        'maxlength' => '100',
                        'OnFocus' => 'if(this.value=="' . 'Durante el proyecto' . '"){this.value="";}',
                        'OnBlur'  => 'if(this.value==""){this.value="' . 'Durante el proyecto' . '";}',
                        'rows'       => '4',
                        'value' => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['accion_3_de']) {
                        $val_escuela = $registro_info['Registro']['accion_3_de'];
                    } else {
                        $val_escuela = 'Después del proyecto';
                    }
                    echo $this->Form->input('Registro.accion_3_de', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '100',
                        'OnFocus'   => 'if(this.value=="' . 'Después del proyecto' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Después del proyecto' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                        <h3>Preparación previa y consideraciones necesarias</h3>              
                
                <label for="data[Registro][fichas_1]">Datos bibliográficos completos de la obra elegida
                        A. Elige dos fichas informativas o literarias de la Guía de Lectura (que aún no hayas realizado en las etapas previas de esta Olimpiada) que te sirvan para el desarrollo del proyecto.</label>
                        <h3><a href="../wp-content/downloads/9_guia_completa.pdf" target="_BLANK"><span>DESCARGA AQUÍ</span> EL DOCUMENTO CON TODAS LAS ACTIVIDADES PARA QUE PUEDAS ELEGIR CON LAS QUE QUIERES TRABAJAR</a></h3>
                    <?php
                    if($registro_info['Registro']['fichas_1']) {
                        $options_fichas_activo = $registro_info['Registro']['fichas_1'];
                    } else {
                        $options_fichas_activo = 0;
                    }

                    $options_fichas1 = array(
                        '0' => 'Selecciona ficha 1:',
                        'Actividad 1: Libros para observar y buscar: Esconde y encuentra',
                        'Actividad 2: Libros para leer de principio a fin: Narrativas que informan. ¿Les leo un cuento?',
                        'Actividad 3: Libros para leer a cachitos: obras temáticas',
                        'Actividad 4: Libros para crear: Leer para planear experimentos',
                        'Actividad 5: Libros para crear: Explorar y leer libros de juegos.',
                        'Actividad 6: Libros que preguntan y responden: ¡Los libros lo saben!',
                        'Actividad 7: Libros para conocer a otros: Desde distintos ángulos a otros lugares, personas y situaciones.',
                        'Actividad 8: Libros para reconocerme: Biografías y canciones',
                        'Actividad 9: Libros para hacerte experto en un tema: Leo con mi nombre',
                        'Actividad 10: Libros para hacerte experto en un tema: Escucha y crea',
                        'Actividad 11: Libros para activarte: Instrucciones para realizar una actividad',
                        'Actividad 12: Libros para observar y buscar: Cuéntame un cuadro',
                        'Actividad 13: Libros para leer a cachitos: obras temáticas',
                        'Actividad 14: Libros para crear: Leer para planear experimentos',
                        'Actividad 15: Libros para crear: Instrucciones para cocinar',
                        'Actividad 16: Libros que invitan a otras lecturas: Especializarse en un tema',
                        'Actividad 17: Libros que invitan a otras lecturas: Entrevisto al que sabe',
                        'Actividad 18: Libros que invitan a otras lecturas: Discuto el libro',
                        'Actividad 19: Libros que preguntan y responden: Jugar y calcular en mi entorno',
                        'Actividad 20: Libros para conocer a otros: Una mirada a otros lugares y personas',
                        'Actividad 21: Libros para hacerte experto en un tema: Lectura en el zoológico',
                        'Actividad 22: Libros para hacerte experto en un tema: Exploradores',
                        'Actividad 23: Libros para activarte: ¡Dímelo con mímica!',
                        'Actividad 24: Libros para leer completos (novela corta): ¿Y por qué crees tú que…?',
                        'Actividad 25: Libros para leer completos (novela corta): ¿Y si…?',
                        'Actividad 26: Libros para leer completos (Cuentos): ¿Qué piensan los personajes?',
                        'Actividad 27: Libros para leer completos (Álbum ilustrado): Palabra e imagen',
                        'Actividad 28: Libros para susurrar (Poesía de autor): Susurradores de poemas',
                        'Actividad 29: Libros para susurrar (Poesía popular): El rey de chocolate con nariz de cacahuate',
                        'Actividad 30: Libros para leer por capítulos (Clásicos): Viejos conocidos',
                        'Actividad 31: Libros para crear y representar (Teatro): Radioteatros',
                        'Actividad 32: Libros que hablan de otras voces (Mitos y leyendas): Dicen por ahí',
                        'Actividad 33: Libros para conocer a un autor: ¿Qué conocemos de…?',
                        'Actividad 34: Novela gráfica: Como veo leo',
                        'Actividad 35: Libros en los que las niñas y los niños son protagonistas: Cadena de lectura',
                        'Actividad 36: Libros en los que las niñas y los niños son protagonistas: Historias compartidas',
                        'Actividad 37: Libros de Misterio y Terror: ¡A que te asustas!',
                        'Actividad 38: Libros de Misterio y Terror: Reseñario de miedo'
                    );
                    echo $this->Form->input('Registro.fichas_1', array(
                        'options' => $options_fichas1,
                        'selected' => $options_fichas_activo,
                        'class' => 'form_sin_error',
                        'empty' => false,
                        'label' => false,
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['fichas_2']) {
                        $options_fichas_activo = $registro_info['Registro']['fichas_2'];
                    } else {
                        $options_fichas_activo = 0;
                    }
                $options_fichas2 = array(
                        '0' => 'Selecciona ficha 2:',
                        'Actividad 1: Libros para observar y buscar: Esconde y encuentra',
                        'Actividad 2: Libros para leer de principio a fin: Narrativas que informan. ¿Les leo un cuento?',
                        'Actividad 3: Libros para leer a cachitos: obras temáticas',
                        'Actividad 4: Libros para crear: Leer para planear experimentos',
                        'Actividad 5: Libros para crear: Explorar y leer libros de juegos.',
                        'Actividad 6: Libros que preguntan y responden: ¡Los libros lo saben!',
                        'Actividad 7: Libros para conocer a otros: Desde distintos ángulos a otros lugares, personas y situaciones.',
                        'Actividad 8: Libros para reconocerme: Biografías y canciones',
                        'Actividad 9: Libros para hacerte experto en un tema: Leo con mi nombre',
                        'Actividad 10: Libros para hacerte experto en un tema: Escucha y crea',
                        'Actividad 11: Libros para activarte: Instrucciones para realizar una actividad',
                        'Actividad 12: Libros para observar y buscar: Cuéntame un cuadro',
                        'Actividad 13: Libros para leer a cachitos: obras temáticas',
                        'Actividad 14: Libros para crear: Leer para planear experimentos',
                        'Actividad 15: Libros para crear: Instrucciones para cocinar',
                        'Actividad 16: Libros que invitan a otras lecturas: Especializarse en un tema',
                        'Actividad 17: Libros que invitan a otras lecturas: Entrevisto al que sabe',
                        'Actividad 18: Libros que invitan a otras lecturas: Discuto el libro',
                        'Actividad 19: Libros que preguntan y responden: Jugar y calcular en mi entorno',
                        'Actividad 20: Libros para conocer a otros: Una mirada a otros lugares y personas',
                        'Actividad 21: Libros para hacerte experto en un tema: Lectura en el zoológico',
                        'Actividad 22: Libros para hacerte experto en un tema: Exploradores',
                        'Actividad 23: Libros para activarte: ¡Dímelo con mímica!',
                        'Actividad 24: Libros para leer completos (novela corta): ¿Y por qué crees tú que…?',
                        'Actividad 25: Libros para leer completos (novela corta): ¿Y si…?',
                        'Actividad 26: Libros para leer completos (Cuentos): ¿Qué piensan los personajes?',
                        'Actividad 27: Libros para leer completos (Álbum ilustrado): Palabra e imagen',
                        'Actividad 28: Libros para susurrar (Poesía de autor): Susurradores de poemas',
                        'Actividad 29: Libros para susurrar (Poesía popular): El rey de chocolate con nariz de cacahuate',
                        'Actividad 30: Libros para leer por capítulos (Clásicos): Viejos conocidos',
                        'Actividad 31: Libros para crear y representar (Teatro): Radioteatros',
                        'Actividad 32: Libros que hablan de otras voces (Mitos y leyendas): Dicen por ahí',
                        'Actividad 33: Libros para conocer a un autor: ¿Qué conocemos de…?',
                        'Actividad 34: Novela gráfica: Como veo leo',
                        'Actividad 35: Libros en los que las niñas y los niños son protagonistas: Cadena de lectura',
                        'Actividad 36: Libros en los que las niñas y los niños son protagonistas: Historias compartidas',
                        'Actividad 37: Libros de Misterio y Terror: ¡A que te asustas!',
                        'Actividad 38: Libros de Misterio y Terror: Reseñario de miedo'
                    );
                    echo $this->Form->input('Registro.fichas_2', array(
                        'options' => $options_fichas2,
                        'selected' => $options_fichas_activo,
                        'class' => 'form_sin_error',
                        'empty' => false,
                        'label' => false,
                        'type' => 'select'
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2"><h3>B. Dos libros de tu biblioteca que sean básicos para el desarrollo del proyecto.<br />
                                                <a href="../wp-content/downloads/2_Lista_de_libros_recomendados.pdf" target="_BLANK"><span>DESCARGA AQUÍ</span> LA LISTA DE LIBROS RECOMENDADOS</a></h3>
                    <label for="data[Registro][bibliografia_1]">Datos bibliográficos completos de la obra elegida
                    </label>
                    <?php
                    if($registro_info['Registro']['bibliografia_1']) {
                        $val_bibliografia = $registro_info['Registro']['bibliografia_1'];
                    } else {
                        $val_bibliografia = 'Datos bibliográficos 1';
                    }
                    echo $this->Form->input('Registro.bibliografia_1', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Datos bibliográficos 1' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Datos bibliográficos 1' . '";}',
                        'rows'      => '4',
                        'value'     => $val_bibliografia
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['bibliografia_2']) {
                        $val_bibliografia = $registro_info['Registro']['bibliografia_2'];
                    } else {
                        $val_bibliografia = 'Datos bibliográficos 2';
                    }
                    echo $this->Form->input('Registro.bibliografia_2', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Datos bibliográficos 2' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Datos bibliográficos 2' . '";}',
                        'rows'      => '4',
                        'value'     => $val_bibliografia
                    ));
                    ?>
                </div>
                <div>
                <div id="escuela" class="boxLeft2">
                <h3>C. Enlistar el  lugar o los lugares seleccionado(s) para realizar el proyecto.</h3>
                    <label for="data[Registro][escuela_lugar_nombre]">En la escuela</label>
                    <?php
                    if($registro_info['Registro']['escuela_lugar_nombre']) {
                        $val_nombrar_lugar = $registro_info['Registro']['escuela_lugar_nombre'];
                    } else {
                        $val_nombrar_lugar = 'Nombrar (salón, cancha, auditorio, parque, etc.)';
                    }
                    echo $this->Form->input('Registro.escuela_lugar_nombre', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Nombrar (salón, cancha, auditorio, parque, etc.)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Nombrar (salón, cancha, auditorio, parque, etc.)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_nombrar_lugar
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['escuela_lugar_describir']) {
                        $val_nombrar_describir = $registro_info['Registro']['escuela_lugar_describir'];
                    } else {
                        $val_nombrar_describir = 'Describir';
                    }
                    echo $this->Form->input('Registro.escuela_lugar_describir', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Describir' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Describir' . '";}',
                        'rows'      => '4',
                        'value'     => $val_nombrar_describir
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <label for="data[Registro][fuera_lugar_nombre]">Fuera de la escuela</label>
                    <?php
                    if($registro_info['Registro']['fuera_lugar_nombre']) {
                        $val_nombrar_lugar = $registro_info['Registro']['fuera_lugar_nombre'];
                    } else {
                        $val_nombrar_lugar = 'Nombrar (salón, cancha, auditorio, parque, etc.)';
                    }
                    echo $this->Form->input('Registro.fuera_lugar_nombre', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Nombrar (salón, cancha, auditorio, parque, etc.)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Nombrar (salón, cancha, auditorio, parque, etc.)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_nombrar_lugar
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['fuera_lugar_describir']) {
                        $val_nombrar_describir = $registro_info['Registro']['fuera_lugar_describir'];
                    } else {
                        $val_nombrar_describir = 'Describir';
                    }
                    echo $this->Form->input('Registro.fuera_lugar_describir', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . 'Describir' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . 'Describir' . '";}',
                        'rows'      => '4',
                        'value'     => $val_nombrar_describir
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                <h3>D. Restricciones o limitaciones que será necesario superar para el éxito del proyecto.</h3>
                    <label for="data[Registro][restriccion_1]">Enunciar dos: </label>
                    <?php
                    if($registro_info['Registro']['restriccion_1']) {
                        $val_dr_1 = $registro_info['Registro']['restriccion_1'];
                    } else {
                        $val_dr_1 = '1. (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.restriccion_1', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '1. (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '1. (máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_dr_1
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['restriccion_2']) {
                        $val_dr_2 = $registro_info['Registro']['restriccion_2'];
                    } else {
                        $val_dr_2 = '2. (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.restriccion_2', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '2. (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '2. (máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_dr_2
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                <h3>E. ¿Cómo sabrás que el proyecto ha tenido éxito?</h3>

                    <label for="data[Registro][exito_1]">Anota dos aspectos que lo demuestren (número de participantes, interés demostrado, apoyos logrados, etc.):</label>
                    <?php
                    if($registro_info['Registro']['exito_1']) {
                        $val_escuela = $registro_info['Registro']['exito_1'];
                    } else {
                        $val_escuela = '1. (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.exito_1', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '1. (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '1. (máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['exito_2']) {
                        $val_escuela = $registro_info['Registro']['exito_2'];
                    } else {
                        $val_escuela = '2. (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.exito_2', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '2. (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '2. (máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>

                <div id="escuela" class="boxLeft2">
                <h3>F. Prospectiva: ¿Qué sucederá después del proyecto? O ¿Cómo lograrás la continuidad del proyecto para que los participantes sigan leyendo?</h3>
                <label for="data[Registro][prospectiva_1]">Menciona dos posibilidades:</label>
                    <?php
                    if($registro_info['Registro']['prospectiva_1']) {
                        $val_escuela = $registro_info['Registro']['prospectiva_1'];
                    } else {
                        $val_escuela = '1. (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.prospectiva_1', array(
                        'class'     => 'form_sin_error big_text',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '1. (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '1. (máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>
                <div id="escuela" class="boxLeft2">
                    <?php
                    if($registro_info['Registro']['prospectiva_2']) {
                        $val_escuela = $registro_info['Registro']['prospectiva_2'];
                    } else {
                        $val_escuela = '2. (máximo 200 caracteres)';
                    }
                    echo $this->Form->input('Registro.prospectiva_2', array(
                        'class'     => 'form_sin_error big_text ',
                        'label'     => false,
                        'maxlength' => '200',
                        'OnFocus'   => 'if(this.value=="' . '2. (máximo 200 caracteres)' . '"){this.value="";}',
                        'OnBlur'    => 'if(this.value==""){this.value="' . '2. (máximo 200 caracteres)' . '";}',
                        'rows'      => '4',
                        'value'     => $val_escuela
                    ));
                    ?>
                </div>     
            </fieldset>
        <?php echo $this->Form->end('Guardar', array('class'=>'botonesActividades')); ?>
       <div class="return"><?php echo $this->Form->button('Regresar',array('class'=>' regresarEquiposRegistros regresarListaActividades alineado botonesActividades'))?></div>
    </div>
</div>
<div class="boxRight">
</div>
<div style="display:none;" class="respuesta" id="respuesta"></div>

        

<script type="text/javascript">
$(".regresarEquiposRegistros").click(function(){
    $(".equiposRegistro").show();
    $(".cargaAjaxRegistro").html('');
    return false;
})
</script>
