<?php if($this->Session->check('Profesor')){ ?>
<div id="regbD">

<h2><?php echo ($this->data) ?  'Editar equipo' :  "Agregar equipo"; ?></h2>
<h3>Profesor(a): Recuerda que cada equipo debe de tener 8 alumnos</h3>
<?php
$generos_select = array(
    '' => 'Selecciona',
    'masculino' => 'Masculino',
    'femenino' => 'Femenino'
);
?>
<div class="formD">
    <?php echo $this->Form->create('Equipo', array('url'=>array('controller'=>'site','action'=>'registro_equipos'))); ?>
    <div class="left">
    <?php
    if($this->data){
        //debug($this->data);
        echo $this->Form->input('Equipo.id');
        ?>
     <ul class="info_perfil">
            <li>&nbsp;</li>
            <li><span>Nombre:</span> <?php echo $this->data['Equipo']['nombre'];?></li>
        </ul>
    <?php
    }else{
            echo $this->Form->input('Equipo.nombre',array('type'=>'text','label'=>'Nombre del equipo: '));
    }
        ?>
    </div>
    <br class="clear">
    <div class="right">
        <?php
            //echo $this->Form->input('Equipo.tema', array('label' => 'Tema: ','options'=>array($temas_select)));
        ?>
    </div>
    <?php for($i = 0; $i <= 7; $i ++){ ?>
        <div class="left_int tresW">
            <?php
                if(isset($this->data['Integrante'][$i]['id']) && $this->data['Integrante'][$i]['id'])
                    echo $this->Form->input('Integrante.'.$i.'.id');
                if(isset($this->data['Integrante'][$i]['equipo_id']) && $this->data['Integrante'][$i]['equipo_id'])
                    echo $this->Form->input('Integrante.'.$i.'.equipo_id',array('type'=>'hidden'));
                echo $this->Form->input('Integrante.'.$i.'.nombre',array('type'=>'text','label'=>'Nombre del participante '.($i + 1).': '));
            ?>
        </div>
        <div class="left_int unoW">
            <?php
               echo $this->Form->input('Integrante.'.$i.'.grado', array('label' => 'Grado escolar: ','options'=>array($grado_select),'style'=>'width:110px;'));
            ?>
        </div>
        <div class="left_int dosW">
            <?php                
                echo $this->Form->input('Integrante.'.$i.'.edad',array('type'=>'text','label'=>'Edad: ','style'=>'width:50px;'));
            ?>
        </div>
        <div class="left_int unoW">
            <?php              
                echo $this->Form->input('Integrante.'.$i.'.genero',array('label'=>'Genero: ','options'=>array($generos_select),'style'=>'width:110px;'));
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
	        echo $this->Form->submit('Guardar',array('class'=>'submit_editar_equipo'));
            echo $this->Form->end();
        ?>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#EquipoFormEquiposForm").validate({
            rules: {
                'data[Equipo][nombre]': "required",
                'data[Integrante][0][nombre]': {
                   required: true
                 },
                'data[Integrante][0][grado]': {
                   required: true
                 },
                'data[Integrante][0][edad]': {
                   required: true
                 },
                'data[Integrante][0][genero]': {
                   required: true
                 },
                'data[Integrante][1][nombre]': {
                   required: true
                 },
                'data[Integrante][1][grado]': {
                   required: true
                 },
                'data[Integrante][1][edad]': {
                   required: true
                 },
                'data[Integrante][1][genero]': {
                   required: true
                 },
                'data[Integrante][2][nombre]': {
                   required: true
                 },
                'data[Integrante][2][grado]': {
                   required: true
                 },
                'data[Integrante][2][edad]': {
                   required: true
                 },
                'data[Integrante][2][genero]': {
                   required: true
                 },
                'data[Integrante][3][nombre]': {
                   required: true
                 },
                'data[Integrante][3][grado]': {
                   required: true
                 },
                'data[Integrante][3][edad]': {
                   required: true
                 },
                'data[Integrante][3][genero]': {
                   required: true
                 },
                'data[Integrante][4][nombre]': {
                   required: true
                 },
                'data[Integrante][4][grado]': {
                   required: true
                 },
                'data[Integrante][4][edad]': {
                   required: true
                 },
                'data[Integrante][4][genero]': {
                   required: true
                 },
                'data[Integrante][5][nombre]': {
                   required: true
                 },
                'data[Integrante][5][grado]': {
                   required: true
                 },
                'data[Integrante][5][edad]': {
                   required: true
                 },
                'data[Integrante][5][genero]': {
                   required: true
                 },
                'data[Integrante][6][nombre]': {
                   required: true
                 },
                'data[Integrante][6][grado]': {
                   required: true
                 },
                'data[Integrante][6][edad]': {
                   required: true
                 },
                'data[Integrante][6][genero]': {
                   required: true
                 },
                'data[Integrante][7][nombre]': {
                   required: true
                 },
                'data[Integrante][7][grado]': {
                   required: true
                 },
                'data[Integrante][7][edad]': {
                   required: true
                 },
                'data[Integrante][7][genero]': {
                   required: true
                 }
           },
            messages: {
                'data[Equipo][nombre]': "Por favor ingrese el nombre del equipo.",
                'data[Integrante][0][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 1."
                 },
                'data[Integrante][0][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 1."
                 },
                'data[Integrante][0][edad]': {
                   required: "Por favor ingresa la edad del integrante 1."
                 },
                'data[Integrante][0][genero]': {
                   required: "Por favor ingresa el genero del integrante 1."
                 },
                'data[Integrante][1][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 2."
                 },
                'data[Integrante][1][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 2."
                 },
                'data[Integrante][1][edad]': {
                   required: "Por favor ingresa la edad del integrante 2."
                 },
                'data[Integrante][1][genero]': {
                   required: "Por favor ingresa el genero del integrante 2."
                 },
                'data[Integrante][2][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 3."
                 },
                'data[Integrante][2][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 3."
                 },
                'data[Integrante][2][edad]': {
                   required: "Por favor ingresa la edad del integrante 3."
                 },
                'data[Integrante][2][genero]': {
                   required: "Por favor ingresa el genero del integrante 3."
                 },
                'data[Integrante][3][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 4."
                 },
                'data[Integrante][3][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 4."
                 },
                'data[Integrante][3][edad]': {
                   required: "Por favor ingresa la edad del integrante 4."
                 },
                'data[Integrante][3][genero]': {
                   required: "Por favor ingresa el genero del integrante 4."
                 },
                'data[Integrante][4][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 5."
                 },
                'data[Integrante][4][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 5."
                 },
                'data[Integrante][4][edad]': {
                   required: "Por favor ingresa la edad del integrante 5."
                 },
                'data[Integrante][4][genero]': {
                   required: "Por favor ingresa el genero del integrante 5."
                 },
                'data[Integrante][5][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 6."
                 },
                'data[Integrante][5][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 6."
                 },
                'data[Integrante][5][edad]': {
                   required: "Por favor ingresa la edad del integrante 6."
                 },
                'data[Integrante][5][genero]': {
                   required: "Por favor ingresa el genero del integrante 6."
                 },
                'data[Integrante][6][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 7."
                 },
                'data[Integrante][6][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 7."
                 },
                'data[Integrante][6][edad]': {
                   required: "Por favor ingresa la edad del integrante 7."
                 },
                'data[Integrante][6][genero]': {
                   required: "Por favor ingresa el genero del integrante 7."
                 },
                'data[Integrante][7][nombre]': {
                   required: "Por favor ingresa el nombre del integrante 8."
                 },
                'data[Integrante][7][grado]': {
                   required: "Por favor ingresa el grado escolar del integrante 8."
                 },
                'data[Integrante][7][edad]': {
                   required: "Por favor ingresa la edad del integrante 8."
                 },
                'data[Integrante][7][genero]': {
                   required: "Por favor ingresa el genero del integrante 8."
                 }
            },
            submitHandler: function(form) {
                $.post("<?php echo $this->Html->url('/registro_equipos',true)?>",$("#EquipoFormEquiposForm").serialize(),function(data){
                    if(data == '1'){
                        $.lightbox("?lightbox[width]=580&amp;lightbox[height]=50#gracias_equipoD");
                        setTimeout(function(){
                            window.location = '<?php echo $this->Html->url('/perfil',true); ?>';
                        },2000);
                    }else{
                        alert(data);
                    }
                })
            }
        });
      });
</script>
<?php }else{ ?>

<div id="regbD">
    <h2>No tiene permisos para acceder a esta sección</h2>
</div>
<?php } ?>