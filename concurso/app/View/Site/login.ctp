<?php
if(!$olvido){
?>
<div id="loginD" class="formD">
    <div class="titulo-registro">
        Inicia sesión
    </div>
    <div class="registro-completo">
        <?php //echo $this->Form->create('Profesor', array('url'=>array('controller'=>'site','action'=>'check_login'))); ?>
    <form action="<?php echo $this->Html->url(array('controller'=>'site','action' =>'check_login')); ?>" id="ProfesorLoginForm" method="post" accept-charset="utf-8">
        
    <div class="registro-p clearfix">
        <p><label for="ProfesorCorreo">Correo electrónico o nombre de usuario: </label></p>
        <input type="text" name="data[Profesor][correo]" id="user_correo" class="p-completo" value="" size="20" />
    </div>
    <div class="registro-p clearfix">
        <p><label for="ProfesorCorreo">Contraseña: </label></p>
        <input type="password" name="data[Profesor][password]" id="user_password" class="p-completo" value="" size="20" />
    </div>
    <div class="submit" style="float: right; margin-top: 20px; "><input class="fltR" title="Entrar" type="submit" value="Entrar"></div>
    </form>
        <?php echo $this->Html->link('Recuperar contraseña',$this->Html->url(array('controller'=>'site','action'=>'login'),true).'/1'); ?> 
    </div>
</div>
<script type="text/javascript">
    $("#ProfesorLoginForm").validate({
        rules: {
            'data[Profesor][correo]': {
               required: true,
               //email: true
             },
            'data[Profesor][password]': {
               required: true
             }
        },
        messages: {
            'data[Profesor][correo]': {
               required: "Por favor ingrese su correo electrónico o su nombre de usuario.",
               //email: "Por favor ingrese un correo electrónico valido."
             },
            'data[Profesor][password]': {
               required: "Por favor ingrese una contraseña."
             }
        },
        /*submitHandler: function(form) {
            $.post("<?php echo $this->Html->url('/check_login',true)?>",$("#ProfesorLoginForm").serialize(),function(data){
                if(data == '1'){
                    $.lightbox("?lightbox[width]=580&amp;lightbox[height]=50#gracias_loginD");
                    setTimeout(function(){
                        window.location = '<?php echo $this->Html->url('/perfil',true); ?>';
                    },2000);
                }else{
                    $("#error_login").html(data);
                    $("#error_login").show();
                }
            });
        }*/
    })
</script>
<?php }else{ ?>
<div id="loginD" class="formD">
    <div class="titulo-registro">
        Recuperar contraseña
    </div>
    <div class="registro-completo">
        <?php //echo $this->Form->create('Profesor', array('url'=>array('controller'=>'site','action'=>'check_login'))); ?>
    <form action="<?php echo $this->Html->url('/recuperar',true)?>" id="ProfesorLoginForm" method="post" accept-charset="utf-8">
        
    <div class="registro-p clearfix">
        <p><label for="ProfesorCorreo">Correo electrónico o nombre de usuario: </label></p>
        <input type="text" name="data[Profesor][correo]" id="user_login" class="p-completo" value="" size="20" />
    </div>
    <div class="submit" style="float: right; margin-top: 20px; "><input class="fltR" title="Entrar" type="submit" value="Enviar"></div>
    </form>
        <?php echo $this->Html->link('Iniciar sesión',$this->Html->url(array('controller'=>'site','action'=>'login'),true)); ?> 
    </div>
</div>
<script type="text/javascript">
    $("#ProfesorLoginForm").validate({
        rules: {
            'data[Profesor][correo]': {
               required: true,
               //email: true
             }
        },
        messages: {
            'data[Profesor][correo]': {
               required: "Por favor ingrese su correo electrónico o su nombre de usuario.",
               //email: "Por favor ingrese un correo electrónico valido."
             }
        },
        /*submitHandler: function(form) {
            $.post("<?php //echo $this->Html->url('/recuperar',true)?>",$("#ProfesorLoginForm").serialize(),function(data){
                if(data == '1'){
                    $.lightbox("?lightbox[width]=580&amp;lightbox[height]=150#gracias_recuperarD");                   
                }else{
                    $("#error_login").html(data);
                    $("#error_login").show();
                }
            })
        }*/
    })
</script>
<?php } ?>
<style>
    .fltR{
        float: left;
        margin-top: 30px;
        position: relative;
        border: none;
        background-color: #66a7db;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        border:  5px solid #f5efd9;
        padding: 10px;
        color: #FFFFFF;
        width: 100px;
    }
    
</style>