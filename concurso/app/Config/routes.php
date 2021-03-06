<?php
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'site', 'action' => 'index'));
	Router::connect('/registro', array('controller' => 'site', 'action' => 'registro_home'));
	Router::connect('/registro2', array('controller' => 'site', 'action' => 'registro_home2'));
	Router::connect('/guarda_registro', array('controller' => 'site', 'action' => 'guarda_registro'));
	Router::connect('/editar_registro/*', array('controller' => 'site', 'action' => 'editar_registro'));
	Router::connect('/check_email', array('controller' => 'site', 'action' => 'check_email'));
	Router::connect('/check_user', array('controller' => 'site', 'action' => 'check_user'));
	Router::connect('/login/*', array('controller' => 'site', 'action' => 'login'));
	Router::connect('/check_login', array('controller' => 'site', 'action' => 'check_login'));
	Router::connect('/recuperar', array('controller' => 'site', 'action' => 'recuperar_password'));
	Router::connect('/recuperar/*', array('controller' => 'site', 'action' => 'recuperar_password'));
	Router::connect('/nueva_password', array('controller' => 'site', 'action' => 'nueva_password'));
	Router::connect('/cerrar_sesion', array('controller' => 'site', 'action' => 'cerrar_sesion'));
	Router::connect('/editar', array('controller' => 'site', 'action' => 'form_editar'));
	Router::connect('/perfil', array('controller' => 'site', 'action' => 'perfil'));
	Router::connect('/actividades', array('controller' => 'site', 'action' => 'perfil'));
	Router::connect('/actividades/:id_equipo', array('controller' => 'site', 'action' => 'perfil'));
	Router::connect('/form_equipos/*', array('controller' => 'site', 'action' => 'form_equipos'));
	Router::connect('/registro_equipos', array('controller' => 'site', 'action' => 'registro_equipos'));
	Router::connect('/get_localidades/*', array('controller' => 'site', 'action' => 'get_localidades'));
	Router::connect('/actividades', array('controller' => 'actividades', 'action' => 'index'));
	Router::connect('/CargaActividad/*', array('controller' => 'actividades', 'action' => 'CargaActividad'));
	Router::connect('/BorraActividad/*', array('controller' => 'actividades', 'action' => 'BorraActividad'));
	Router::connect('/guardaActividad', array('controller' => 'actividades', 'action' => 'guardaActividad'));
	Router::connect('/guardaDiario', array('controller' => 'actividades', 'action' => 'guardaDiario'));
	Router::connect('/EquipoActividades/*', array('controller' => 'actividades', 'action' => 'EquipoActividades'));
	Router::connect('/EquipoDiario/*', array('controller' => 'actividades', 'action' => 'EquipoDiario'));
	Router::connect('/CargaDiario/*', array('controller' => 'actividades', 'action' => 'CargaDiario'));
	Router::connect('/reportes/login', array('controller' => 'reportes', 'action' => 'login'));
	Router::connect('/reportes', array('controller' => 'reportes', 'action' => 'index'));
	Router::connect('/reportes/xls', array('controller' => 'reportes', 'action' => 'xls'));
	Router::connect('/reportes/excel', array('controller' => 'reportes', 'action' => 'excel'));
	Router::connect('/reportes/logout', array('controller' => 'reportes', 'action' => 'logout'));
	Router::connect('/reportes/prueba', array('controller' => 'reportes', 'action' => 'prueba'));
	Router::connect('/reportes/etapa1', array('controller' => 'reportes', 'action' => 'etapa1'));        
	Router::connect('/admin', array('controller' => 'actividades', 'action' => 'login'));
	Router::connect('/admin/login', array('controller' => 'actividades', 'action' => 'login'));
	Router::connect('/admin/actividades', array('controller' => 'actividades', 'action' => 'admin_index'));
	Router::connect('/admin/actividades/addE', array('controller' => 'actividades', 'action' => 'addE'));
	Router::connect('/admin/actividades/add', array('controller' => 'actividades', 'action' => 'add'));
	Router::connect('/admin/actividades/save', array('controller' => 'actividades', 'action' => 'save'));
	Router::connect('/admin/actividades/edit/*', array('controller' => 'actividades', 'action' => 'edit'));
	Router::connect('/admin/actividades/delete/*', array('controller' => 'actividades', 'action' => 'delete'));
	Router::connect('/registro_proyecto/*', array('controller' => 'actividades', 'action' => 'registro_final'));
	Router::connect('/guardar_registro_final', array('controller' => 'actividades', 'action' => 'guardar_registro_final'));
	Router::connect('/actividades3/*', array('controller' => 'actividades', 'action' => 'actividades3'));
	Router::connect('/guarda_actividad3/*', array('controller' => 'actividades', 'action' => 'guarda_actividad3'));
	Router::connect('/actividades3_2/*', array('controller' => 'actividades', 'action' => 'actividades3_2'));
	Router::connect('/guarda_actividad3_2/*', array('controller' => 'actividades', 'action' => 'guarda_actividad3_2'));
	Router::connect('/actividades3_3/*', array('controller' => 'actividades', 'action' => 'actividades3_3'));
	Router::connect('/guarda_actividad3_3/*', array('controller' => 'actividades', 'action' => 'guarda_actividad3_3'));
	Router::connect('/wp_users', array('controller' => 'site', 'action' => 'wp_users'));
	 // Router::connect('/', array('controller' => 'registro', 'action' => 'index'));

	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	CakePlugin::routes();

	//require CAKE2 . 'Config' . DS . 'routes.php';
?>
