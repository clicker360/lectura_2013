<div class="titulo-1">REGISTRO CORTO</div>
	    		
	    		<div class="preguntas-1">
		
					<div class="registro-p clearfix">
						<p> <label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Nombre Usuario' ); ?></label> </p>
						<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_profesor<?php $template->the_instance(); ?>"><?php _e( 'Profesor responsable del equipo:' ); ?></label> </p>
						<input type="text" name="user_profesor" id="user_profesor<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_profesor' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'Correo Electrónico' ); ?></label> </p>
						<input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
					</div>
					
					<div class="registro-p clearfix">
						<p> <label for="user_telefono<?php $template->the_instance(); ?>"><?php _e( 'Teléfono de contacto:' ); ?></label> </p>
						<input type="text" name="user_telefono" id="user_telefono<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_telefono' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p><label for="user_estado<?php $template->the_instance(); ?>"><?php _e( 'Estado' ); ?></label></p>
					    	<select name="user_estado" id="user_estado<?php $template->the_instance(); ?>" class="p-completo2" value="<?php $template->the_posted_value( 'user_estado' ); ?>"/>
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


		

		<!-- Escuela -->

			<div class="titulo-1">ESCUELA</div>

			    <div class="preguntas-1 no-margin ">

			    	<div class="registro-p clearfix">
						<p> <label for="user_centroescolar<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo del Centro Escolar:' ); ?></label> </p>
						<input type="text" name="user_centroescolar" id="user_centroescolar<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_centroescolar' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_domicilio<?php $template->the_instance(); ?>"><?php _e( 'Domicilio Completo:' ); ?></label> </p>
						<input type="text" name="user_domicilio" id="user_escuela<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_domicilio' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_cct<?php $template->the_instance(); ?>"><?php _e( 'Clave del centro de trabajo (CCT):' ); ?></label> </p>
						<input type="text" name="user_cct" id="user_cct<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_cct' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_horario<?php $template->the_instance(); ?>"><?php _e( 'Horario de Atención' ); ?></label> </p>
						<input type="text" name="user_horario" id="user_horario<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_horario' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_telefonoesc<?php $template->the_instance(); ?>"><?php _e( 'Teléfono' ); ?></label> </p>
						<input type="text" name="user_telefonoesc" id="user_telefonoesc<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_telefonoesc' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_director<?php $template->the_instance(); ?>"><?php _e( 'Nombre completo del director:' ); ?></label> </p>
						<input type="text" name="user_director" id="user_director<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_director' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_emaildirector<?php $template->the_instance(); ?>"><?php _e( 'Correo electrónico del director:' ); ?></label> </p>
						<input type="text" name="user_emaildirector" id="user_emaildirector<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_emaildirector' ); ?>" size="20" />
					</div>

				</div>

		<!-- Circulo de Lectura-->

			<div class="titulo-1">CIRCULO DE LECTURA </div>

			    <div class="preguntas-1 no-margin ">

			    	<div class="registro-p clearfix">
						<p> <label for="user_circulo<?php $template->the_instance(); ?>"><?php _e( 'Nombre del círculo de lectura:' ); ?></label> </p>
						<input type="text" name="user_circulo" id="user_circulo<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_circulo' ); ?>" size="20" />
					</div>

					<div class="registro-p clearfix">
						<p> <label for="user_integrantes<?php $template->the_instance(); ?>"><?php _e( 'Número de Integrantes:' ); ?></label> </p>
						<input type="text" name="user_integrantes" id="user_integrantes?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_integrantes' ); ?>" size="20" />
					</div>

				</div>


		  <div class="titulo-1">ALUMNOS INTEGRANTES DEL EQUIPO</div>

				<!-- Alumno 1 -->

			    <div class="titulo-2">ALUMNO 1</div>

				    <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno1<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno1" id="user_nombrealumno1<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno1' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno1<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno1" id="user_gradoalumno1<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno1' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno1<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno1" id="user_edadalumno1<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno1' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno1<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno1" id="user_generoalumno1<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno1' ); ?>" size="20" />
						</div>

					</div>

		<!-- Alumno 2 -->

				 <div class="titulo-2">ALUMNO 2</div>

				  <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno2<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno2" id="user_nombrealumno2<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno2' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno2<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno2" id="user_gradoalumno2<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno2' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno2<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno2" id="user_edadalumno2<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno2' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno2<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno2" id="user_generoalumno2<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno2' ); ?>" size="20" />
						</div>

					</div>

		<!-- Alumno 3 -->

		    <div class="titulo-2">ALUMNO 3</div>

			   <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno3<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno3" id="user_nombrealumno3<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno3' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno3<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno3" id="user_gradoalumno3<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno3' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno3<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno3" id="user_edadalumno3<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno3' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno3<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno3" id="user_generoalumno3<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno3' ); ?>" size="20" />
						</div>

					</div>

		<!-- Alumno 4 -->

			<div class="titulo-2">ALUMNO 4</div>

			   <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno4<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno4" id="user_nombrealumno4<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno4' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno4<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno4" id="user_gradoalumno4<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno4' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno4<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno4" id="user_edadalumno4<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno4' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno4<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno4" id="user_generoalumno4<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno4' ); ?>" size="20" />
						</div>

					</div>

		<!-- Alumno 5 -->

			    <div class="titulo-2">ALUMNO 5</div>

				    <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno5<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno5" id="user_nombrealumno5<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno5' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno5<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno5" id="user_gradoalumno5<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno5' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno5<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno5" id="user_edadalumno5<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno5' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno5<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno5" id="user_generoalumno5<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno5' ); ?>" size="20" />
						</div>

					</div>

		<!-- Alumno 6 -->

				 <div class="titulo-2">ALUMNO 6</div>

				    <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno6<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno6" id="user_nombrealumno6<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno6' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno6<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno6" id="user_gradoalumno6<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno6' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno6<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno6" id="user_edadalumno6<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno6' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno6<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno6" id="user_generoalumno6<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno6' ); ?>" size="20" />
						</div>

					</div>

		<!-- Alumno 7 -->

		    <div class="titulo-2">ALUMNO 7</div>

			    <div class="preguntas-1 no-margin ">

			    	<div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno7<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno7" id="user_nombrealumno7<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno7' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno7<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno7" id="user_gradoalumno7<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno7' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno7<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno7" id="user_edadalumno7<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno7' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno7<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno7" id="user_generoalumno7<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno7' ); ?>" size="20" />
						</div>

					</div>
				</div>

		<!-- Alumno 8 -->

			<div class="titulo-2">ALUMNO 8</div>

			    <div class="preguntas-1 no-margin ">

				    	<div class="registro-p clearfix">
							<p> <label for="user_nombrealumno8<?php $template->the_instance(); ?>"><?php _e( 'Nombre Completo:' ); ?></label> </p>
							<input type="text" name="user_nombrealumno8" id="user_nombrealumno8<?php $template->the_instance(); ?>" class="p-completo user_nombrealumno" value="<?php $template->the_posted_value( 'user_nombrealumno8' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_gradoalumno8<?php $template->the_instance(); ?>"><?php _e( 'Grado Escolar:' ); ?></label> </p>
							<input type="text" name="user_gradoalumno8" id="user_gradoalumno8<?php $template->the_instance(); ?>" class="p-completo user_gradoalumno" value="<?php $template->the_posted_value( 'user_gradoalumno8' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_edadalumno8<?php $template->the_instance(); ?>"><?php _e( 'Edad:' ); ?></label> </p>
							<input type="text" name="user_edadalumno8" id="user_edadalumno8<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_edadalumno8' ); ?>" size="20" />
						</div>

						<div class="registro-p clearfix">
							<p> <label for="user_generoalumno8<?php $template->the_instance(); ?>"><?php _e( 'Genero:' ); ?></label> </p>
							<input type="text" name="user_generoalumno8" id="user_generoalumno8<?php $template->the_instance(); ?>" class="p-completo" value="<?php $template->the_posted_value( 'user_generoalumno8' ); ?>" size="20" />
						</div>

					</div>

	





		<?php do_action( 'register_form' ); ?>

		<p id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( '' ) ); ?></p>

		<p class="submit">
			<input type="submit" class="enviar-boton-registro" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( '' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="register" />
	</div>

		</p>

</div>

