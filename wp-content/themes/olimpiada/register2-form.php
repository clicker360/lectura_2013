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
                jQuery.validator.addMethod("lettersonly", function(value, element) {
                    return this.optional(element) || /^[a-z]+$/i.test(value);
                  }, "Letters only please"); 
                jQuery.validator.addClassRules({
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
						  },
					
				});

				jQuery.extend(jQuery.validator.messages, {
				    required: "Este campo es requerido.",
				    number: "Solo numeros para este campo.",
				    
				});



                jQuery(".forma-registro2").validate({
                    rules: {    

                    // Registro Corto 
                        'data[Profesor][usuario]': {
                            required: true,
                            minlength: 6,
                            remote: "<?php echo get_bloginfo('url').'/concurso/check_user'; ?>"
                        },
                        'data[Profesor][nombre]': {
                            required: true,
                        },

                        'data[Profesor][correo]': {
                            required: true,
                            email: true,
                            remote: "<?php echo get_bloginfo('url').'/concurso/check_email'; ?>"
                           
                        },	
                        'data[Profesor][password]': {
                           required: true,
                           minlength: 6
                         },
                        'data[Profesor][repeat_password]': {
                           equalTo: "#user_password"
                         },                   
                        'data[Profesor][tel_local]': {
							required: true,
							number: true,
							minlength: 10,
							maxlength: 10,
						 },

                        'data[Escuela][estado]': {
                            required: true
                        },

                    // Escuela
                    	'data[Escuela][nombre]': {
                            required: true,
                        },

                        'data[Escuela][domicilio]': {
                            required: true,
                        },

                        'data[Escuela][clave]': {
                            required: true,
                        },

                        'data[Escuela][horario]': {
                            required: true,
                        },

                        'data[Escuela][telefono]': {
							required: true,
							number: true,
							minlength: 10,
							maxlength: 10,
						},

						'data[Escuela][director]': {
                            required: true,
                            lettersonly: true,
                        },

                         'data[Escuela][director_email]': {
                            required: true,
                            email: true,
                           
                        },
                         'data[Escuela][categoria]': {
                            required: true
                           
                        },

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

                    // Registro Corto 
                        'data[Profesor][usuario]': {
                            required: '*Ingresa tu nombre de usuario',
                            minlength: "*El nombre de usuario debe ser mayor a {0} caracteres.",
                            remote: '*El nombre de usuario ya fue registrado previamente',
                        },

                        'data[Profesor][nombre]': {
                            required: '*Ingresa el nombre del profesor',
                        },

                        'data[Profesor][correo]': {
                            required: '*Ingresa tu correo electr&oacute;nico',
                            email: '*Ingresa un correo electr&oacute;nico correcto',
                            remote: '*El correo electr&oacute;nico ya fue registrado previamente',
                        },                         
                        'data[Profesor][password]': {
                          required: "*Ingrese una contraseña.",
                          minlength: "*La contraseña debe ser mayor a {0} caracteres."
                        },
                        'data[Profesor][repeat_password]': {
                          equalTo: "*Las contraseñas no coinciden."
                        },
                       'data[Profesor][tel_local]': {
							required: '*Valida n&uacute;mero telef&oacute;nico',
							number: '*Solo n&uacute;meros para el tel&eacute;fono',
							minlength: '*El tel&eacute;fono tiene que ser de {0} n&uacute;meros',
							maxlength: '*El tel&eacute;fono tiene que ser de {0} n&uacute;meros',
						},                 

                        'data[Escuela][estado]': {
                            required: '*Debes seleccionar un estado'
                        },

                    // Escuela 
                        'data[Escuela][nombre]': {
                            required: '*Ingresa el nombre de la escuela'
                        },

                        'data[Escuela][domicilio]': {
                            required: '*Ingresa el domicilio'
                        },

                        'data[Escuela][clave]': {
                            required: '*Ingresa la clave CCT'
                        },

                        'data[Escuela][horario]': {
                            required:  '*Ingresa el horario'
                        },

                        'data[Escuela][telefono]': {
							required: '*Valida n&uacute;mero telef&oacute;nico de la escuela',
							number: '*Solo n&uacute;meros para el tel&eacute;fono',
							minlength: '*El tel&eacute;fono tiene que ser de {0} n&uacute;meros',
							maxlength: '*El tel&eacute;fono tiene que ser de {0} n&uacute;meros', 
						},

						'data[Escuela][director]': {
                            required: '*Ingresa el nombre del director',
                            lettersonly: '*Solo letras para el nombre'
                        },

                         'data[Escuela][director_email]': {
                            required: '*Ingresa el correo electr&oacute;nico del director',
                            email: '*Ingresa un correo electr&oacute;nico correcto'
                           
                        },
                         'data[Escuela][categoria]': {
                            required: '*Selecciona un tipo de escuela'
                           
                        },

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


<div class="login" >
	<form name="registerform" class="forma-registro2" id="registerform" action="<?php bloginfo('url');?>/concurso/guarda_registro" method="post">
	<!--<form name="registerform" class="forma-registro2" id="registerform" action="http://www.olimpiadadelectura.org/concurso/guarda_registro" method="post">-->

	<div class="registro-completo">

		<!-- Comienza Registro Corto -->
    	
	    	<div class="titulo-1">REGISTRO CORTO</div>
	    		
	    		<div class="preguntas-1">
		
					

					<div class="registro-p clearfix">
						<p> <label for="data[Profesor][nombre]"><?php _e( 'Profesor responsable del equipo:' ); ?></label> </p>
						<input type="text" name="data[Profesor][nombre]" id="user_profesor" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Profesor][correo]"><?php _e( 'Correo Electrónico:' ); ?></label> </p>
						<input type="text" name="data[Profesor][correo]" id="user_email" class="p-completo" value="" size="20" />
					</div>
                                        <div class="registro-p clearfix">
						<p><label for="data[Escuela][estado]"><?php _e( 'Estado:' ); ?></label></p>
                                                <select name="data[Escuela][estado]" id="user_estado" class="p-completo2" value=""/>
                                                    <option value="">Selecciona un estado</option>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Distrito Federal">Distrito Federal</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="México">México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz">Veracruz</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                    </select>
			  		</div>
                                        <div class="registro-p clearfix">
						<p> <label for="data[Profesor][usuario]"><?php _e( 'Nombre Usuario:' ); ?></label> </p>
						<input type="hidden" name="data[Profesor][registro_largo]" id="user_registro_largo" class="p-completo" value="1" size="20" />
						<input type="text" name="data[Profesor][usuario]" id="user_login" class="p-completo" value="" size="20" />
					</div>
					<div class="registro-p clearfix">
						<p> <label for="data[Profesor][password]"><?php _e( 'Contraseña:' ); ?></label> </p>
						<input type="password" name="data[Profesor][password]" id="user_password" class="p-completo" value="" size="20" />
					</div>
					<div class="registro-p clearfix">
						<p> <label for="data[Profesor][repeat_password]"><?php _e( 'Repetir contraseña:' ); ?></label> </p>
						<input type="password" name="data[Profesor][repeat_password]" id="user_repeat_password" class="p-completo" value="" size="20" />
					</div>
					
					<div class="registro-p clearfix">
						<p> <label for="data[Profesor][tel_local]"><?php _e( 'Teléfono de contacto:' ); ?></label> </p>
						<input type="text" name="data[Profesor][tel_local]" id="user_telefono" class="p-completo" value="" size="20" />
					</div>
					
		  	</div>


		

		<!-- Escuela -->

			<div class="titulo-1">ESCUELA</div>

			    <div class="preguntas-1 no-margin ">

			    	<div class="registro-p clearfix">
						<p> <label for="data[Escuela][nombre]"><?php _e( 'Nombre Completo del Centro Escolar:' ); ?></label> </p>
						<input type="text" name="data[Escuela][nombre]" id="user_centroescolar" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Escuela][domicilio]"><?php _e( 'Domicilio Completo:' ); ?></label> </p>
						<input type="text" name="data[Escuela][domicilio]" id="user_escuela" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Escuela][clave]"><?php _e( 'Clave del centro de trabajo (CCT):' ); ?></label> </p>
						<input type="text" name="data[Escuela][clave]" id="user_cct" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Escuela][horario]"><?php _e( 'Horario de Atención:' ); ?></label> </p>
						<input type="text" name="data[Escuela][horario]" id="user_horario" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Escuela][telefono]"><?php _e( 'Teléfono:' ); ?></label> </p>
						<input type="text" name="data[Escuela][telefono]" id="user_telefonoesc" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Escuela][director]"><?php _e( 'Nombre completo del director:' ); ?></label> </p>
						<input type="text" name="data[Escuela][director]" id="user_director" class="p-completo" value="" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="data[Escuela][director_email]"><?php _e( 'Correo electrónico del director:' ); ?></label> </p>
						<input type="text" name="data[Escuela][director_email]" id="user_emaildirector" class="p-completo" value="" size="20" />
					</div>
					<div class="registro-p clearfix">
                                            <p> <label for="data[Escuela][categoria]"><?php _e( 'Tipo de escuela:' ); ?></label> </p>
                                            <select name="data[Escuela][categoria]" id="user_categoria" class="p-completo2" value="" >
                                                <option value="">Selecciona una categoria</option>
                                                <option value="Escuela pública urbana">Escuela pública urbana</option>
                                                <option value="Escuela pública rural">Escuela pública rural</option>
                                                <option value="Escuela pública indígena">Escuela pública indígena</option>
                                                <option value="Escuela privada">Escuela privada</option>
                                            </select>
					</div>

				</div>

		<!-- Circulo de Lectura-->

			<div class="titulo-1">CIRCULO DE LECTURA </div>

			    <div class="preguntas-1 no-margin ">

			    	<div class="registro-p clearfix">
						<p> <label for="data[Equipo][nombre]"><?php _e( 'Nombre del círculo de lectura:' ); ?></label> </p>
						<input type="text" name="data[Equipo][nombre]" id="user_circulo" class="p-completo" value="" size="20" />
					</div>

					<!--<div class="registro-p clearfix">
						<p> <label for="data[Equipo][integrantes]"><?php _e( 'Número de Integrantes:' ); ?></label> </p>
						<input type="text" name="data[Equipo][integrantes]" id="user_integrantes" class="p-completo" value="" size="20" />
					</div>-->

				</div>


		  <div class="titulo-1">ALUMNOS INTEGRANTES DEL EQUIPO</div>

				<!-- Alumno 1 -->
                        <?php for($a = 1; $a <= 8; $a++){ ?>
			    <div class="titulo-2">ALUMNO <?php echo $a; ?></div>

				    <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="data[Integrante][<?php echo ($a-1); ?>][nombre]"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="data[Integrante][<?php echo ($a-1); ?>][nombre]" id="user_nombrealumno<?php echo $a; ?>" class="p-completo user_nombrealumno" value="" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="data[Integrante][<?php echo ($a-1); ?>][grado]"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="data[Integrante][<?php echo ($a-1); ?>][grado]" id="user_gradoalumno<?php echo $a; ?>" class="p-completo user_gradoalumno" value="" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="data[Integrante][<?php echo ($a-1); ?>][edad]"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="data[Integrante][<?php echo ($a-1); ?>][edad]" id="user_edadalumno<?php echo $a; ?>" class="p-completo user_edadalumno" value="" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="data[Integrante][<?php echo ($a-1); ?>][genero]"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="data[Integrante][<?php echo ($a-1); ?>][genero]" id="user_generoalumno<?php echo $a; ?>" class="p-completo user_generoalumno" value="" size="20" />
						</div>

					</div>
                        <?php } ?>

		<!-- Alumno 2 -->
		<?php //do_action( 'register_form' ); ?>

		<!--<p id="reg_passmail"><?php echo apply_filters( 'tml_register_passmail_template_message', __( '' ) ); ?></p>-->

		<div class="submit">
			<input type="submit" class="enviar-boton-registro" name="wp-submit" id="wp-submit" value="<?php esc_attr_e( '' ); ?>" />
			<!--<input type="hidden" name="redirect_to" value="" />
			<input type="hidden" name="instance" value="" />
			<input type="hidden" name="action" value="register" />-->
        </div>
	</div>
        </form>
</div>

