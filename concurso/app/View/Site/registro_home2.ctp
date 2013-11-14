<?php ?>
<div id="regbD">

<h2>Continúa con el registro</h2>

<div class="formD">
    <?php echo $this->Form->create('Profesor', array('url'=>array('controller'=>'site','action'=>'guarda_registro'))); ?>
    <div class="left_esc">
    <?php
    /** Datos escuela **/        
        echo $this->Form->input('Profesor.nombre',array('label'=>'Nombre del profesor: '));
        echo $this->Form->input('Profesor.correo',array('label'=>'Correo electrónico: '));
        echo $this->Form->input('Profesor.password',array('label'=>'Contraseña: '));
        echo $this->Form->input('Profesor.repeat_password',array('type'=>'password','label'=>'Repetir contraseña: '));
        echo $this->Form->input('Profesor.tel_lada',array('type'=>'text','label'=>'Teléfono (Lada): '));
        echo $this->Form->input('Profesor.tel_local',array('type'=>'text','label'=>'Teléfono (Local): '));
    ?>
    </div>
    <div class="left_esc">
    <?php
    /** Datos escuela **/
        echo $this->Form->input('Escuela.nombre',array('label'=>'Escuela: '));
        echo $this->Form->input('Escuela.domicilio',array('label'=>'Domicilio completo: '));
        echo $this->Form->input('Escuela.clave',array('label'=>'Clave del centro de trabajo: '));
        echo $this->Form->input('Escuela.horario',array('label'=>'Horario de atención: '));
        echo $this->Form->input('Escuela.telefono', array('label' => 'Telefono: '));
        echo $this->Form->input('Escuela.categoria', array('label' => 'Categoría de la escuela: ','options'=>array($cats_select)));
    ?>
    </div>
    <div class="left_esc">
    <?php
    /** Datos escuela **/
        echo $this->Form->input('Escuela.codpost',array('label'=>'Código Postal: '));
        echo $this->Form->input('Escuela.localidad',array('type'=>'text','label'=>'Localidad: '));
        echo $this->Form->input('Escuela.estado',array('options'=>$estados,'label'=>'Estado: '));
        echo $this->Form->input('Escuela.director', array('label' => 'Nombre del Director: '));
        echo $this->Form->input('Escuela.director_email', array('label' => 'Correo electrónico del Director: '));
        //echo $this->Form->submit('Guardar');
		echo $this->Form->submit('Guardar', array('class' => 'fltR', 'title' => 'Guardar'));
    ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
<script type="text/javascript">
    /*$("input#EscuelaCodpost").change(function(){
        codigo = $(this).val();
        if($.isNumeric(codigo) && codigo.length == 5){
            $.post('<?php echo $this->Html->url('/get_localidades/',true); ?>'+codigo,function(data){
                $("#EscuelaLocalidad").html(data);
            })
        }else
            $("#EscuelaLocalidad").html('');
    })*/
    $("#ProfesorRegistroHome2Form").validate({
        rules: {
            'data[Profesor][nombre]': "required",
            'data[Profesor][correo]': {
               required: true,
               email: true,
               remote: "<?php echo $this->Html->url('/check_email',true); ?>"
             },
            'data[Profesor][password]': {
               required: true,
               minlength: 6
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
            'data[Escuela][director_email]': {
               required: true,
               email: true,
             },
            'data[Escuela][nombre]': "required",
            'data[Escuela][domicilio]': "required",
            'data[Escuela][horario]': "required",
            'data[Escuela][telefono]': "required",
            'data[Escuela][clave]': "required",
            'data[Escuela][codpost]': {
                required: true,
                number: true,
                minlength: 5,
                maxlength: 5
            },
            'data[Escuela][localidad]': {
                required: true,
                maxlength: 50
            },
            'data[Escuela][estado]': {
                required: true
            },
            'data[Escuela][director]': "required",
            'data[Escuela][categoria]': "required"
       },
        messages: {
            'data[Profesor][nombre]': "Por favor ingrese su nombre.",
             'data[Profesor][correo]': {
               required: "Por favor ingrese su correo electrónico.",
               email: "Por favor ingrese un correo electrónico valido.",
               remote: "El correo electrónico ingresado ya esta en uso."
             },
             'data[Profesor][password]': {
               required: "Por favor ingrese una contraseña.",
               minlength: "La contraseña debe ser mayor a {0} caracteres."
             },
             'data[Profesor][repeat_password]': {
               equalTo: "Las contraseñas no coinciden.",
             },
             'data[Profesor][tel_lada]': {
               required: "Por favor ingrese su clave lada.",
               number: "Ingrese unicamente números para la clave lada.",
               minlength: "Ingrese por lo menos {0} digitos para la clave lada.",
               maxlength: "Ingrese un maximo de {0} digitos para la clave lada."
             },
             'data[Profesor][tel_local]': {
               required: "Por favor ingrese su télefono local.",
               number: "Ingrese unicamente números para el teléfono local.",
               minlength: "Ingrese por lo menos {0} digitos para el teléfono local.",
               maxlength: "Ingrese un maximo de {0} digitos para el teléfono local."
             },
            'data[Escuela][director_email]': {
               required: "Por favor ingrese el correo electrónico del director.",
               email: "Por favor ingrese un correo electrónico valido.",
             },
            'data[Escuela][nombre]': "Por favor ingrese el nombre de la escuela.",
            'data[Escuela][domicilio]': "Por favor ingrese el domicilio de la escuela.",
            'data[Escuela][horario]': "Por favor ingrese el nombre de la escuela.",
            'data[Escuela][telefono]': "Por favor ingrese el horario de atención de la escuela.",
            'data[Escuela][clave]': "Por favor ingrese la clave del centro de trabajo.",
            'data[Escuela][codpost]': {
                required: "Por favor ingrese el código postal.",
                number: "Ingrese unicamente números para el código postal.",
                minlength: "Ingrese exactamente {0} digitos para el código postal.",
                maxlength: "Ingrese exactamente {0} digitos para el código postal."
            },
            'data[Escuela][localidad]': {
                required: "Por favor ingrese la localidad.",
                maxlength: "Ingrese un maximo de  {0} caracteres para la localidad."

            },
            'data[Escuela][estado]': {
                required: "Por favor ingrese el estado."

            },
            'data[Escuela][director]': "Por favor ingrese el nombre del director.",
            'data[Escuela][categoria]': "Por favor ingrese la categoría de la escuela."
        },
        submitHandler: function(form) {
            $.post("<?php echo $this->Html->url('/guarda_registro',true)?>",$("#ProfesorRegistroHome2Form").serialize(),function(data){
                if(data == '1'){
                    $.lightbox("?lightbox[width]=580&amp;lightbox[height]=110#graciasD");
                    setTimeout(function(){
                        window.location = '<?php echo $this->Html->url('/perfil',true); ?>';
                    },2000);
                }else{
                    alert(data);
                }
            })
        }
    });
</script>