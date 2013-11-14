<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//debug($profesor);
?>
<div id="loginD" class="formD">
    <div class="titulo-registro">
        Recuperar contraseña
    </div>
    <div class="registro-completo">
        <?php //echo $this->Form->create('Profesor', array('url'=>array('controller'=>'site','action'=>'check_login'))); ?>
    <form action="<?php echo $this->Html->url(array('controller'=>'site','action'=>'nueva_password'),true)?>" id="ProfesorRecuperarPasswordForm" method="post" accept-charset="utf-8">
        <?php echo $this->Form->input('Profesor.id',array('value'=>$profesor['Profesor']['id'])); ?>
        <?php echo $this->Form->input('Profesor.codigo_recuperacion',array('type'=>'hidden','value'=>$profesor['Profesor']['codigo_recuperacion'])); ?>
    <div class="registro-p clearfix">
        <p><label for="ProfesorCorreo">Ingresa tu nueva contraseña: </label></p>
        <input type="password" name="data[Profesor][password]" id="user_pass" class="p-completo" value="" size="20" />
    </div>
    <div class="registro-p clearfix">
        <p><label for="ProfesorCorreo">Ingresa tu nueva contraseña: </label></p>
        <input type="password" name="data[Profesor][repeat_password]" id="user_pass2" class="p-completo" value="" size="20" />
    </div>
    <div class="submit" style="float: right; margin-top: 20px; "><input class="fltR" title="Entrar" type="submit" value="Enviar"></div>
    </form>
        <?php echo $this->Html->link('Iniciar sesión',$this->Html->url(array('controller'=>'site','action'=>'login'),true)); ?> 
    </div>
</div>
    
</div>
<script type="text/javascript">
    $("#ProfesorRecuperarPasswordForm").validate({
        rules: {
            'data[Profesor][password]': {
               required: true,
               minlength: 6
             },
            'data[Profesor][repeat_password]': {
               required: true,
               equalTo: "#user_pass"
             }
       },
        messages: {            
             'data[Profesor][password]': {
               required: "Por favor ingrese su nueva contraseña.",
               minlength: "La contraseña debe ser mayor a {0} caracteres."
             },
             'data[Profesor][repeat_password]': {
               required: "Por favor ingrese su nueva contraseña.",
               equalTo: "Las contraseñas no coinciden.",
             }
        },
        /*submitHandler: function(form) {
            $.post("<?php echo $this->Html->url('/nueva_password',true)?>",$("#ProfesorRecuperarPasswordForm").serialize(),function(data){
                if(data == '1'){
                    $.lightbox("?lightbox[width]=580&amp;lightbox[height]=100#gracias_nuevaD");
                    setTimeout(function(){
                        window.location = '<?php echo $this->Html->url('/perfil',true); ?>';
                    },2000);
                }else{
                    alert(data);
                }
            })
        }*/
    });
</script>
