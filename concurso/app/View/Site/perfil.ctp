
<div class="formD">                
    <div class="right maswW tab arribap" id="mis_datos">
        <div class="mensaje"> ¡Hola,  <?php echo $this->data['Profesor']['nombre']; ?>! / <?php echo $this->Html->link('Cerrar sesión', $this->Html->url('/cerrar_sesion', true)); ?></div>
        <div class="mi_perfil">
            <div class="ul_perfil">                            
                <ul class="info_perfil">
                    <li><span>Nombre:</span> <?php echo $this->data['Profesor']['nombre']; ?></li>
                    <li><span>Correo Electrónico:</span> <?php echo $this->data['Profesor']['correo']; ?></li>
                    <li><span>Teléfono (Lada):</span> <?php echo $this->data['Profesor']['tel_lada']; ?></li>
                    <li><span>Teléfono (Local):</span> <?php echo $this->data['Profesor']['tel_local']; ?></li>
                    <li><span>Nombre de la escuela:</span> <?php echo $this->data['Escuela']['nombre']; ?></li>
                    <li><span>Clave del centro de trabajo:</span> <?php echo $this->data['Escuela']['clave']; ?></li>
                    <li><span>Código postal:</span> <?php echo $this->data['Escuela']['codpost']; ?></li>
                    <li><span>Localidad:</span> <?php echo $this->data['Escuela']['localidad']; ?></li>
                    <li><span>Estado:</span> <?php echo $this->data['Escuela']['estado']; ?></li>
                    <li><span>Director de la escuela:</span> <?php echo $this->data['Escuela']['director']; ?></li>
                    <li><span>Categoría de la escuela:</span> <?php echo $this->data['Escuela']['categoria']; ?></li>
                </ul>
            </div>
            <div class="editar_perfil">
                <div>
                    <?php echo $this->Html->link('Editar', '#', array('class' => 'btnEditarForm')); ?>
                </div>
            </div>
            <div class="form_perfil">                            
                <?php
                echo $this->Form->create('Profesor', array('url' => array('controller' => 'site', 'action' => 'editar_registro')));
                echo "<div class='input'>Nombre: " . $this->data['Profesor']['nombre'] . '</div>';
                echo "<div class='input'>Correo electrónico: " . $this->data['Profesor']['correo'] . '</div>';
                echo "<div class='input'>Nombre de usuario: " . $this->data['Profesor']['usuario'] . '</div>';
                echo $this->Form->input('Profesor.tel_lada', array('type' => 'text', 'label' => 'Telefono (Lada): '));
                echo $this->Form->input('Profesor.tel_local', array('type' => 'text', 'label' => 'Telefono (Local): '));
                echo $this->Form->input('Escuela.nombre', array('type' => 'text', 'label' => 'Nombre de la escuela: '));
                echo $this->Form->input('Escuela.clave', array('type' => 'text', 'label' => 'Clave del centro de trabajo '));
                echo $this->Form->input('Escuela.codpost', array('type' => 'text', 'label' => 'Codigo Postal:'));
                echo $this->Form->input('Escuela.localidad', array('type' => 'text', 'label' => 'Localidad:'));
                echo $this->Form->input('Escuela.director', array('type' => 'text', 'label' => 'Nombre del director:'));
                echo $this->Form->input('Escuela.categoria', array('label' => 'Categoria de la escuela: ', 'options' => array($cats_select)));
                echo $this->Form->submit('Guardar');
                echo $this->Form->end();
                ?>
            </div>
            <div class="back_editar_perfil">
                <div>
                    <?php echo $this->Html->link('Regresar', '#', array('class' => 'btnBackEditarForm')); ?>
                </div>
            </div>
        </div>                
    </div>    
    <div class="tab" id="mis_equipos">

        <?php if(count($equipos) < 3) echo $this->Html->link('Agregar equipo', $this->Html->url('/form_equipos', true), array('class' => 'agregarEquipo')); ?>
        <div clasS="clearfix"></div>
        <?php if ($equipos) { ?>
            <ul class="equipos">
                <?php foreach ($equipos as $k => $e) { ?>
                    <li class="equipo_li <?php echo ($k%2 == 0) ? 'left' : 'right'?>">
                        <div class="equipo_head"></div>
                        <div class="equipo_content">
                            <div>
                                <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?>
                                    <div class="ver">
                                        <div>
                                             <?php echo $this->Html->link('Editar', $this->Html->url('/form_equipos/' . $e['Equipo']['id'], true), array('class' => 'lightbox btn-mas fltR bgC')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            Aún no has agregado ningún equipo.
        <?php } ?>

    </div>
    <div class="tab" id="mis_actividades">        
         <?php if ($equipos) { ?>           
            <ul class="equipos equiposActividades">
                <?php foreach ($equipos as $k => $e) { ?>
                    <li class="equipo_li <?php echo ($k%2 == 0) ? 'left' : 'right'?>">
                        <div class="equipo_head"></div>
                        <div class="equipo_content">
                            <div>
                                <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?>
                                    <div class="ver">
                                        <div>
                                            <?php echo $this->Html->link('Ver', $this->Html->url('/EquipoActividades/' . $e['Equipo']['id'], true), array('id' => 'verEquipo_' . $e['Equipo']['id'], 'class' => 'EquipoActividades btn-mas fltR bgC')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="cargaAjaxActividades"></div>
        <?php } ?>

    </div>

    <div class="right tab maswW arribap" id="proyecto_de_lectura">
        <h2>El formulario de registro del proyecto estará disponible el lunes 11 de febrero a partir de las 13:00 horas.</h2>
    </div>

    <div class="right tab maswW arribap" id="diario">

        <?php //echo $this->Html->link('Agregar equipo',$this->Html->url('/form_equipos?lightbox[width]=680&amp;lightbox[height]=730&amp;lightbox[autoresize]=false',true),array('class'=>'lightbox btn-mas fltR bgB')); ?>
        <h2>Diario colectivo </h2>
        <?php if ($equipos) { ?>
            <ul class="equipos equiposDiario">
                <?php foreach ($equipos as $k => $e) { ?>
                    <li class="equipo_li <?php echo ($k%2 == 0) ? 'left' : 'right'?>">
                        <div class="equipo_head"></div>
                        <div class="equipo_content">
                            <div>
                                <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?>
                                    <div class="ver">
                                        <div>
                                            <?php echo $this->Html->link('Ver', $this->Html->url('/EquipoDiario/' . $e['Equipo']['id'], true), array('id' => 'verEquipo_' . $e['Equipo']['id'], 'class' => 'EquipoDiario btn-mas fltR bgC')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="cargaAjaxDiario"></div>
        <?php } ?>

    </div>
    <div class="right tab maswW arribap" id="mis_actividades_3">

        <?php //echo $this->Html->link('Agregar equipo',$this->Html->url('/form_equipos?lightbox[width]=680&amp;lightbox[height]=730&amp;lightbox[autoresize]=false',true),array('class'=>'lightbox btn-mas fltR bgB')); ?>
        <h2>Actividades etapa 3 parte 1</h2>
        <?php if ($equipos) { ?>
            <ul class="equipos equiposActividades3">
                <?php foreach ($equipos as $e) { ?>
                    <li>
                        <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?></div>
                        <div class="editar_quipo"><?php echo $this->Html->link('Ver', $this->Html->url('/actividades3/' . $e['Equipo']['id'], true), array('id' => 'verEquipo_' . $e['Equipo']['id'], 'class' => 'EquipoActividades3 btn-mas fltR bgC')); ?></div>
                    </li>
                <?php } ?>
            </ul>
            <div class="cargaAjaxActividades3"></div>
        <?php } ?>

    </div>
    <div class="right tab maswW arribap" id="mis_actividades_3_2">

        <?php //echo $this->Html->link('Agregar equipo',$this->Html->url('/form_equipos?lightbox[width]=680&amp;lightbox[height]=730&amp;lightbox[autoresize]=false',true),array('class'=>'lightbox btn-mas fltR bgB')); ?>
        <h2>Actividades etapa 3 parte 2 </h2>
        <?php if ($equipos) { ?>
            <ul class="equipos equiposActividades32">
                <?php foreach ($equipos as $e) { ?>
                    <li>
                        <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?></div>
                        <div class="editar_quipo"><?php echo $this->Html->link('Ver', $this->Html->url('/actividades3_2/' . $e['Equipo']['id'], true), array('id' => 'verEquipo_' . $e['Equipo']['id'], 'class' => 'EquipoActividades32 btn-mas fltR bgC')); ?></div>
                    </li>
                <?php } ?>
            </ul>
            <div class="cargaAjaxActividades32"></div>
        <?php } ?>

    </div>
    <div class="right tab maswW arribap" id="mis_actividades_3_3">

        <?php //echo $this->Html->link('Agregar equipo',$this->Html->url('/form_equipos?lightbox[width]=680&amp;lightbox[height]=730&amp;lightbox[autoresize]=false',true),array('class'=>'lightbox btn-mas fltR bgB')); ?>
        <h2>Actividades etapa 3 parte 3 </h2>
        <?php if ($equipos) { ?>
            <ul class="equipos equiposActividades33">
                <?php foreach ($equipos as $e) { ?>
                    <li>
                        <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?></div>
                        <div class="editar_quipo"><?php echo $this->Html->link('Ver', $this->Html->url('/actividades3_3/' . $e['Equipo']['id'], true), array('id' => 'verEquipo_' . $e['Equipo']['id'], 'class' => 'EquipoActividades33 btn-mas fltR bgC')); ?></div>
                    </li>
                <?php } ?>
            </ul>
            <div class="cargaAjaxActividades33"></div>
        <?php } ?>

    </div>
    <div class="right tab maswW arribap" id="descargas"> 
        <ul class="descargas_ul"> 
            <a href="<?php echo $this->Html->url('/descargas/Guia_Circular_con_palabras_2013-2014.doc'); ?>"><li>Guía</li></a>
            <a href="<?php echo $this->Html->url('/descargas/libros_sugeridos_Olimpiada_2013-2014.xlsx'); ?>"><li>Lista</li></a>
            <a href="<?php echo $this->Html->url('/descargas/Calendario_de_trabajo.docx'); ?>"><li>Calendario</li></a>
            <a href=""><li>Actividades 1</li></a>
            <a href=""><li>Actividades 2</li></a>
            <a href=""><li>Actividades 3</li></a>
            <a href=""><li>Actividades 4</li></a>
        </ul>                    
        <!--<h2>Descargas:</h2>
        <ol>
                <li><a href="../wp-content/downloads/1_guia_circulo_de_lectura.pdf" target="_blank">Guía práctica para realizar Círculos de Lectura en la escuela primaria</a></li>
                <li><a href="../wp-content/downloads/2_Lista_de_libros_recomendados.pdf" target="_blank">Lista de libros recomendados</a></li>
                <li><a href="../wp-content/downloads/3_Calendario.pdf" target="_blank">Calendario de actividades</a></li>
                <li><a href="../wp-content/downloads/4_guia_actividades_bloque_1.pdf" target="_blank">Lista de actividades (Bloque 1)</a></li>
                <li><a href="../wp-content/downloads/8_guia_actividades_bloque_2.pdf" target="_blank">Lista de actividades (Bloque 2)</a></li>
        </ol>-->
    </div>
    <div class="right tab maswW arribap" id="retroalimentacion">
        <div class="retroalimentacion_head" >
            Retroalimentación de las actividades realizadas en la Etapa 1
        </div>
        <div class="retroalimentacion_content">
            <div>
                <a href="">
                    <div>
                        Descargar en PDF
                    </div>
                </a>
            </div>
        </div>
        <!--<h2>Retroalimentación de las actividades realizadas en la Etapa 1:</h2>
                <ul class="contActionDownload"><li><a class="actionDownload" href="../wp-content/downloads/10_retroalimentacion_etapa1.pdf" target="_blank">Descarga el documento en pdf</a></li></ul>-->
    </div>
    <div class="right tab maswW arribap" id="dudasTecnicas">
        <div class="dudas_head" >
            Dudas técnicas
        </div>
        <div class="dudas_content">
            <div>
                <ul>
                    <li class="clearfix"><div class="left" >Preguntas frecuentes </div><a class="right" href=""><div>Descargalo</div></a></li>
                    <li class="clearfix"><div class="left" >Tutorial para cargar videos de Youtube </div><a class="right" href=""><div>Descargalo</div></a></li>
                    <li class="clearfix"><div class="left" >Tutorial para cargar archios de audio a Internet </div><a class="right" href=""><div>Descargalo</div></a></li>
                </ul>
            </div>
        </div>
        <!--<h2>Dudas Técnicas:</h2>
        <ol>
                <li><a href="../wp-content/downloads/7_preguntas_frecuentes_lectura.pdf" target="_blank">Preguntas frecuentes (actualizado al 11 de enero de 2013)</a></li>
                <li><a href="../wp-content/downloads/5_tutorial_youtube_lectura.pdf" target="_blank">Tutorial para cargar videos a YouTube</a></li>
                <li><a href="../wp-content/downloads/6_tutorial_audio_lectura.pdf" target="_blank">Tutorial para cargar archivos de audio a internet</a></li>
        </ol>-->
    </div>
    <div class="right tab maswW arribap" id="registro">
        <h2>Proyecto de Lectura </h2>
        <?php if ($equipos) { ?>
            <ul class="equipos equiposRegistro">
                <?php foreach ($equipos as $e) { ?>
                    <li>
                        <div class="nombre_equipo"><?php echo $e['Equipo']['nombre']; ?></div>
                        <div class="editar_quipo"><?php echo $this->Html->link('Registro', $this->Html->url('/registro_proyecto/' . $e['Equipo']['id'], true), array('id' => 'verEquipo_' . $e['Equipo']['id'], 'class' => 'EquipoRegistro btn-mas fltR bgC')); ?></div>
                    </li>
                <?php } ?>
            </ul>
            <div class="cargaAjaxRegistro"></div>
        <?php } ?>
    </div>
    <!--<div class="right maswW tab arribap" id="subir_video">
    <?php
    echo "<h4>A partir del 17 de Octubre de 2012 podrás<br />comenzar a cargar el video de cada unos de tus equipos.</h4>";
    ?>
    </div>-->
</div>