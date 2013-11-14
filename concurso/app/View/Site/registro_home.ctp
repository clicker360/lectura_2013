<?php if(!$this->Session->check('Profesor')){  ?>
<!--<h2><?php echo $this->Html->link('Inicia sesión',$this->Html->url('/login/0/?lightbox[width]=800&amp;lightbox[height]=210',true),array('class'=>'lightbox'));?></h2>-->
<!--<ul class="box-main-menu" id="box-main-menu">
			<li class="main-link" id="main-primero"><a class="lightbox" href="<?php //bloginfo('url'); ?>concurso/login/0/?lightbox[width]=800&amp;amp;amp;lightbox[height]=180">Inicia sesión</a></li>
			<li class="main-link" id="main-segundo"><a href="<?php //get_bloginfo('url'); ?>wp-content/downloads/3_calendario.pdf" target="_blank">Calendario de Trabajo</a></li>
<!--			<li class="main-link" id="main-tercero"><a href="<?php //get_bloginfo('url'); ?>wp-content/downloads/4_guia_actividades_bloque_1.pdf" target="_blank">Guía de Actividades (Bloque 1)</a></li> -->
			<!--<li class="main-link" id="main-tercero"><a href="<?php //get_bloginfo('url'); ?>wp-content/downloads/9_guia_completa.pdf" target="_blank">Guía de Actividades para el Proyecto de Lectura (Bloque 3)</a></li>
			<li class="main-link" id="main-cuarto"><a href="<?php //get_bloginfo('url'); ?>wp-content/downloads/1_guia_circulo_de_lectura.pdf" target="_blank">Guía práctica para realizar Círculos de Lectura en la escuela primaria</a></li>
		</ul>-->

<div id="formD" class="contR formD login widget widget_theme_my_login">

	<h3>¡Regístrate y Participa!</h3>

    <?php
    echo $this->Form->create('Profesor', array('url'=>array('controller'=>'site','action'=>'guarda_registro'))); 
    ?>
        
        <div class="segmento segmentoA clearfix">   
            <?php echo $this->Form->input('Profesor.nombre',array('label'=>'Nombre Completo (Profesor) ','class' => 'nombre-contacto-widget clearfix')); ?>
        </div>
        <div class="segmento2 segmentoA clearfix">   
            <?php echo $this->Form->input('Escuela.nombre',array('label'=>'Nombre Escuela ','class' => 'escuela-contacto-widget clearfix')); ?>
        </div>
        <div class="segmento3 segmentoA clearfix">   
            <?php echo $this->Form->input('Profesor.correo',array('label'=>'Correo Electrónico ','class' => 'escuela-contacto-widget clearfix')); ?>
        </div>
        <div class="segmento4 clearfix">
            <div class="texto-widget clearfix">
                <label for="user_estado1">Estado</label></div>
            <div class="campo-widget clearfix">
                <?php echo $this->Form->input('Escuela.estado',array('label'=>false,'div'=>false,'class' => 'estado-campo-form clearfix','empty' => 'Selecciona un estado','options' => $estados)); ?>			    	
            </div>
	</div>
        <div class="segmento2 segmentoA clearfix">   
            <?php echo $this->Form->input('Profesor.usuario',array('label'=>'Nombre Usuario ','class' => 'escuela-contacto-widget clearfix')); ?>
        </div>
        <div class="segmento2 segmentoA clearfix">   
            <?php echo $this->Form->input('Profesor.password',array('label'=>'Contraseña ','class' => 'escuela-contacto-widget clearfix')); ?>
        </div>
        <div class="segmento2 segmentoA clearfix">   
            <?php echo $this->Form->input('Profesor.repeat_password',array('label'=>'Repetir Contraseña','type'=>'password','class' => 'escuela-contacto-widget clearfix')); ?>
        </div>
    <?php
    //echo $this->Form->submit('Siguiente >>');
	echo $this->Form->submit('', array('class' => 'fltR', 'title' => 'Siguiente >>'));
    echo $this->Form->end();

    ?>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#ProfesorRegistroHomeForm").validate({
            rules: {
                'data[Profesor][nombre]': "required",
                'data[Profesor][correo]': {
                   required: true,
                   email: true,
                   remote: "<?php echo $this->Html->url('/check_email'); ?>"
                 },
                'data[Profesor][password]': {
                   required: true,
                   minlength: 6
                 },
                'data[Escuela][nombre]': {
                   required: true,
                 },
                'data[Escuela][estado]': {
                   required: true,
                 },
                'data[Profesor][usuario]': {
                   required: true,
                   minlength: 6,
                   remote: "<?php echo $this->Html->url('/check_user'); ?>"
                 },
                'data[Profesor][repeat_password]': {
                   equalTo: "#ProfesorPassword"
                 },
                'data[Profesor][tel_lada]': {
                   required: true,
                   number: true,
                   minlength: 2,
                   maxlength: 3
                 },
                'data[Profesor][tel_local]': {
                   required: true,
                   number: true,
                   minlength: 7,
                   maxlength: 8
                 },

           },
            messages: {
                'data[Profesor][nombre]': "*Ingresa tu nombre",
                 'data[Profesor][correo]': {
                   required: "*Ingresa tu correo electrónico",
                   email: "*Ingresa un correo electrónico correcto.",
                   remote: "*El correo electrónico ingresado ya esta en uso."
                 },
                 'data[Profesor][password]': {
                   required: "*Ingrese una contraseña.",
                   minlength: "*La contraseña debe ser mayor a {0} caracteres."
                 },
                'data[Escuela][nombre]': {
                   required: "*Ingrese el nombre de la escuela.",
                 },
                'data[Escuela][estado]': {
                   required: '*Debes seleccionar un estado'
                 },
                 'data[Profesor][usuario]': {
                   required: "*Ingresa tu nombre de usuario",
                   minlength: "*El nombre de usuario debe ser mayor a {0} caracteres.",
                   remote: "*El nombre de usuario ingresado ya esta en uso."
                 },
                 'data[Profesor][repeat_password]': {
                   equalTo: "*Las contraseñas no coinciden."
                 }
            },
            /*submitHandler: function(form) {
                $.lightbox("<?php echo $this->Html->url('/registro2?lightbox[width]=800&lightbox[height]=482&',true)?>"+$("#ProfesorRegistroHomeForm").serialize());
            }*/
        });
      });
    </script>
</div>
<?php }else{?>
<h2><?php echo $this->Html->link('Perfil',$this->Html->url('/perfil',true), array('class' => 'perf'));?> <?php echo $this->Html->link('Cerrar Sesión',$this->Html->url('/cerrar_sesion',true), array('class' => 'sess'));?></h2>
<!--
<div id="formD" class="contR formD logg">
        <ul class="info_perfil">
            <li><span>Nombre:</span> <?php echo $this->data['Profesor']['nombre'];?></li>
            <li><span>Correo Electrónico:</span> <?php echo $this->data['Profesor']['correo'];?></li>
            <li><span>Teléfono (Lada):</span> <?php echo $this->data['Profesor']['tel_lada'];?></li>
            <li><span>Teléfono (Local):</span> <?php echo $this->data['Profesor']['tel_local'];?></li>
            <li><span>Nombre de la escuela:</span> <?php echo $this->data['Escuela']['nombre'];?></li>
            <li><span>Clave del centro de trabajo:</span> <?php echo $this->data['Escuela']['clave'];?></li>
            <li><span>Código postal:</span> <?php echo $this->data['Escuela']['codpost'];?></li>
            <li><span>Localidad:</span> <?php echo $this->data['Escuela']['localidad'];?></li>
            <li><span>Director de la escuela:</span> <?php echo $this->data['Escuela']['director'];?></li>
        </ul>
</div>-->

<?php }?>
