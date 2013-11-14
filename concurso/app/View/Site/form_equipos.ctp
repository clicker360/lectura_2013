<?php if ($this->Session->check('Profesor')) { ?>
    <div id="regbD">

        <!--<h3>Profesor(a): Recuerda que cada equipo debe de tener 8 alumnos</h3>-->
        <?php
        $generos_select = array(
            '' => 'Selecciona',
            'masculino' => 'Masculino',
            'femenino' => 'Femenino'
        );
        ?>
        <!--<div class="formD">
        <?php echo $this->Form->create('Equipo', array('url' => array('controller' => 'site', 'action' => 'registroecho quipos'))); ?>
            <div class="left">
        <?php
        if ($this->data) {
            //debug($this->data);
            echo $this->Form->input('Equipo.id');
            ?>
                 <ul class="info_perfil">
                        <li>&nbsp;</li>
                        <li><span>Nombre:</span> <?php echo $this->data['Equipo']['nombre']; ?></li>
                    </ul>
            <?php
        } else {
            echo $this->Form->input('Equipo.nombre', array('type' => 'text', 'label' => 'Nombre del equipo: '));
        }
        ?>
            </div>
            <br class="clear">
            <div class="right">
        <?php
        //echo $this->Form->input('Equipo.tema', array('label' => 'Tema: ','options'=>array($temas_select)));
        ?>
            </div>
        <?php for ($i = 0; $i <= 7; $i++) { ?>
                    <div class="left_int tresW">
            <?php
            if (isset($this->data['Integrante'][$i]['id']) && $this->data['Integrante'][$i]['id'])
                echo $this->Form->input('Integrante.' . $i . '.id');
            if (isset($this->data['Integrante'][$i]['equipo_id']) && $this->data['Integrante'][$i]['equipo_id'])
                echo $this->Form->input('Integrante.' . $i . '.equipo_id', array('type' => 'hidden'));
            echo $this->Form->input('Integrante.' . $i . '.nombre', array('type' => 'text', 'label' => 'Nombre del participante ' . ($i + 1) . ': '));
            ?>
                    </div>
                    <div class="left_int unoW">
            <?php
            echo $this->Form->input('Integrante.' . $i . '.grado', array('label' => 'Grado escolar: ', 'options' => array($grado_select), 'style' => 'width:110px;'));
            ?>
                    </div>
                    <div class="left_int dosW">
            <?php
            echo $this->Form->input('Integrante.' . $i . '.edad', array('type' => 'text', 'label' => 'Edad: ', 'style' => 'width:50px;'));
            ?>
                    </div>
                    <div class="left_int unoW">
            <?php
            echo $this->Form->input('Integrante.' . $i . '.genero', array('label' => 'Genero: ', 'options' => array($generos_select), 'style' => 'width:110px;'));
            ?>
                    </div>
                    <br class="clear">
        <?php } ?>
            <div class="left_int">
                &nbsp;
            </div>
            <div class="left_int">
                &nbsp;
            </div>
            <div class="left_int">
                &nbsp;
            </div>
            <div class="left_int cuatroW">
        <?php
        echo $this->Form->submit('Guardar', array('class' => 'submitecho ditarecho quipo'));
        echo $this->Form->end();
        ?>
            </div>
        </div>-->
        <div class="titulo-registro">
            <?php echo ($this->data) ? 'Editar equipo' : "Agregar equipo"; ?>
        </div>
        <div class="login" >
            <form name="registerform" class="forma-registro2" id="EquipoFormEquiposForm" action="<?php echo $this->Html->url(array('controller' => 'site', 'action' => 'registro_equipos')); ?>" method="post">
                <!--<form name="registerform" class="forma-registro2" id="registerform" action="http://www.olimpiadadelectura.org/concurso/guarda_registro" method="post">-->

                <div class="registro-completo">

                    <!-- Circulo de Lectura-->

                    <div class="titulo-1">CIRCULO DE LECTURA </div>

                    <div class="preguntas-1 no-margin ">

                        <div class="registro-p clearfix">
                            <p> <label for="data[Equipo][nombre]"><?php echo ( 'Nombre del círculo de lectura:' ); ?></label> </p>
                            <input type="text" name="data[Equipo][nombre]" id="user_circulo" class="p-completo" value="" size="20" />
                        </div>

                        <div class="registro-p clearfix">
                            <p> <label for="data[Equipo][integrantes]"><?php echo ( 'Número de Integrantes:' ); ?></label> </p>
                            <input type="text" name="data[Equipo][integrantes]" id="user_integrantes" class="p-completo" value="" size="20" />
                        </div>

                    </div>


                    <div class="titulo-1">ALUMNOS INTEGRANTES DEL EQUIPO</div>

                    <!-- Alumno 1 -->
                    <?php for ($a = 1; $a <= 8; $a++) { ?>
                        <div class="titulo-2">ALUMNO <?php echo $a; ?></div>

                        <div class="preguntas-1 no-margin ">

                            <div class="registro-p clearfix">
                                <p> <label for="data[Integrante][<?php echo ($a - 1); ?>][nombre]"><?php echo ( 'Nombre Completo:' ); ?></label> </p>
                                <input type="text" name="data[Integrante][<?php echo ($a - 1); ?>][nombre]" id="user_nombrealumno<?php echo $a; ?>" class="p-completo user_nombrealumno" value="" size="20" />
                            </div>

                            <div class="registro-p clearfix">
                                <p> <label for="data[Integrante][<?php echo ($a - 1); ?>][grado]"><?php echo ( 'Grado Escolar:' ); ?></label> </p>
                                <input type="text" name="data[Integrante][<?php echo ($a - 1); ?>][grado]" id="user_gradoalumno<?php echo $a; ?>" class="p-completo user_gradoalumno" value="" size="20" />
                            </div>

                            <div class="registro-p clearfix">
                                <p> <label for="data[Integrante][<?php echo ($a - 1); ?>][edad]"><?php echo ( 'Edad:' ); ?></label> </p>
                                <input type="text" name="data[Integrante][<?php echo ($a - 1); ?>][edad]" id="userecho dadalumno<?php echo $a; ?>" class="p-completo userecho dadalumno" value="" size="20" />
                            </div>

                            <div class="registro-p clearfix">
                                <p> <label for="data[Integrante][<?php echo ($a - 1); ?>][genero]"><?php echo ( 'Genero:' ); ?></label> </p>
                                <input type="text" name="data[Integrante][<?php echo ($a - 1); ?>][genero]" id="user_generoalumno<?php echo $a; ?>" class="p-completo user_generoalumno" value="" size="20" />
                            </div>

                        </div>
                    <?php } ?>

                    <div class="submit">
                        <input type="submit" class="enviar-boton-registro" name="wp-submit" id="wp-submit" value="" />

                    </div>
                </div>
            </form>
        </div>


    </div>
    <script>
        $(document).ready(function() {

            $.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Letters only please");
            $.validator.addClassRules({
                user_nombrealumno: {
                    required: true,
                },
                user_gradoalumno: {
                    required: true,
                    number: true
                },
                user_edadalumno: {
                    required: true,
                    number: true
                },
                user_generoalumno: {
                    required: true
                }

            });

            $.extend($.validator.messages, {
                required: "Este campo es requerido.",
                number: "Solo numeros para este campo.",
            });



            $("#EquipoFormEquiposForm").validate({
                rules: {
                    // Circulo de lectura
                    'data[Equipo][nombre]': {
                        required: true,
                    },
                    'data[Equipo][integrantes]': {
                        required: true,
                        number: true,
                    },
                    // Alumno 1


                },
                messages: {
                    // Circulo de lectura
                    'data[Equipo][nombre]': {
                        required: '*Ingresa el nombre del circulo'
                    },
                    'data[Equipo][integrantes]': {
                        required: '*Ingresa el n&uacute;mero  de integrantes',
                        number: '*Solo n&uacute;meros para este campo',
                    }

                }
            });
        });
    </script>
<?php } ?>
<style>
    .perfil #regbD{
        width: 70%;
        margin: 0 auto;
    }
    .titulo-registro{
        text-transform: uppercase;
    }
</style>