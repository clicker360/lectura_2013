<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>

<!-- Comienza Script Contacto -->

		<script>
            jQuery(document).ready(function() {
                if (document.location.hash.indexOf("#error=") != '-1') {
                    var errores = document.location.hash.replace('#error=', '');
                    errores = JSON.parse(errores);
                    document.location.hash = '';
                    erroresString = '';
                    for (var i in errores) {
                        erroresString += errores[i] + '\n';
                    }
                    alert(erroresString);
                }
                jQuery(".forma-registro").validate({
                    rules: {

                        user_nombre: {
                            required: true,
                            lettersonly: true,
                        },

                        user_login: {
                            required: true, 
                        },

                        user_escuela: {
                            required: true,
                            
                        },


                        user_email: {
                            required: true,
                            email: true,
                           
                        },									                       
                   
                        
                        user_estado: {
                            required: true
                        }
                      
                    },

                    messages: {
                        user_nombre: {
                            required: '*Ingresa tu nombre',
                            lettersonly: '*Solo letras para el nombre'
                        },

                        user_login: {
                            required: '*Ingresa tu nombre de usuario'  
                        },

                        user_escuela: {
                            required: '*Ingresa tu escuela',
                            
                        },

                        user_email: {
                            required: '*Ingresa tu correo electr&oacute;nico',
                            email: '*Ingresa un correo electr&oacute;nico correcto',
                            remote: '*El correo electr&oacute;nico ya fue ingresado previamente',
                        },                  

                        user_estado: {
                            required: '*Debes seleccionar un estado'
                        }								                       

                    }
                });	
			});	
             </script>


<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( '' ); ?>
	<?php $template->the_errors(); ?>
	<form name="registerform" class="forma-registro" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register' ); ?>" method="post">

		<div class="segmento clearfix">
			<div class="texto-widget clearfix"><label for="user_nombre<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo<br>(Profesor)' ); ?></label></div>
			<div class="campo-widget clearfix"><input type="text" name="user_nombre" id="user_nombre<?php $template->the_instance(); ?>" class="nombre-contacto-widget" value="<?php $template->the_posted_value( 'user_contacto' ); ?>" size="20" /></div>
		</div>

		<div class="segmento2 clearfix">
			<div class="texto-widget clearfix"><label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Nombre Usuario' ); ?></label></div>
			<div class="campo-widget clearfix"><input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="escuela-contacto-widget" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" /></div>
		</div>

		<div class="segmento2 clearfix">
			<div class="texto-widget clearfix"><label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Nombre Escuela' ); ?></label></div>
			<div class="campo-widget clearfix"><input type="text" name="user_escuela" id="user_escuela<?php $template->the_instance(); ?>" class="escuela-contacto-widget" value="<?php $template->the_posted_value( 'user_escuela' ); ?>" size="20" /></div>
		</div>

		<div class="segmento3 clearfix">
			<div class="texto-widget clearfix"><label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'Correo Electrónico' ); ?></label></div>
			<div class="campo-widget clearfix"><input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="email-contacto-widget" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" /></div>
		</div>

		<div class="segmento4 clearfix">
			<div class="texto-widget clearfix"><label for="user_estado<?php $template->the_instance(); ?>"><?php _e( 'Estado' ); ?></label></div>
			  <div class="campo-widget clearfix">
			    	<select name="user_estado" id="user_estado<?php $template->the_instance(); ?>" class="estado-campo-form" value="<?php $template->the_posted_value( 'user_estado' ); ?>"/>
		  				<option value="saab">Aguascalientes</option>
						<option value="saab">Baja California</option>
						<option value="saab">Campeche</option>
						<option value="saab">Chiapas</option>
						<option value="saab">Chihuahua</option>
						<option value="saab">Coahuila</option>
						<option value="saab">Colima</option>
						<option value="saab">Distrito Federal</option>
						<option value="saab">Durango</option>
						<option value="saab">Guanajuato</option>
						<option value="saab">Guerrero</option>
						<option value="saab">Hidalgo</option>
						<option value="saab">Jalisco</option>
						<option value="saab">México (Estado)</option>
						<option value="saab">Michoacán</option>
						<option value="saab">Morelos</option>
						<option value="saab">Nayarit</option>
						<option value="saab">Nuevo León</option>
						<option value="saab">Oaxaca</option>
						<option value="saab">Puebla</option>
						<option value="saab">Querétaro</option>
						<option value="saab">Quintana Roo</option>
						<option value="saab">San Luis Potosí</option>
						<option value="saab">Sinaloa</option>
						<option value="saab">Sonora</option>
						<option value="saab">Tabasco</option>
						<option value="saab">Tamaulipas</option>
						<option value="saab">Tlaxcala</soption>
						<option value="saab">Veracruz</option>
						<option value="saab">Yucatán</option>
						<option value="saab">Zacatecas</option>
	  				</select>
	  		</div>
	  	</div>

		<?php do_action( 'register_form' ); ?>

		<p id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( '' ) ); ?></p>

		<p class="submit">
			<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( '' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="register" />
		</p>
	</form>
	<?php $template->the_action_links( array( 'register' => false ) ); ?>
</div>

