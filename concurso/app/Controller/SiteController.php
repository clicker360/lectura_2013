<?php

class SiteController extends AppController {

    public $name = 'Site';
    public $uses = array('Profesor', 'Escuela', 'CategoriasEscuela','Equipo','Integrante','CodigoPostal','Estado', 'WpUser', 'WpUserMeta');
    public $components = array('Email');
    function  beforeFilter() {
                $this->disableCache();
}

    function index() {
        $this->redirect(str_replace ('concurso/', '', Router::url('/', true)));
    }

    public function registro_home() {
        $this->layout = false;        
            $categorias = $this->CategoriasEscuela->find('all');
            foreach ($categorias as $cat) {
                $cats_select[$cat['CategoriasEscuela']['id']] = $cat['CategoriasEscuela']['nombre']; //asignaci�n de arreglo a arreglo m�s sencillo
            }
            $estados = $this->Estado->find(
                    'list',
                    array(
                        'fields'=> array(
                            'estado',
                            'estado'
                            )
                        )
                    );
            $this->set(compact('cats_select','estados')); //manda a llamar el arreglo al .ctp
        
        if($this->Session->check('Profesor')){
            $this->data = $this->Session->read('Profesor');
            $cats_select = $this->CategoriasEscuela->select();
            $equipos = $this->Equipo->find('all',array('conditions'=>array('Equipo.profesores_id' => $this->Session->read('Profesor.Profesor.id'),'Equipo.verde' => 1)));
            $this->set(compact('cats_select','equipos')); //manda a llamar el arreglo al .ctp
			}
		
    }

    function guarda_registro() {
        $this->autoRender = false;
        if ($this->data) {            
            $this->Profesor->set( $this->data );
            $profesor_errores = $this->Profesor->invalidFields();
            $this->Escuela->set( $this->data );
            $escuela_errores = $this->Escuela->invalidFields();
            if($this->data['Profesor']['repeat_password'] != $this->data['Profesor']['password'])
                    $profesor_errores['repeat_password']['0'] = 'Las contraseñas no coinciden.';
            if(isset($escuela_errores['nombre'])){
                $escuela_errores['nombre_escuela'] = $escuela_errores['nombre'];
                unset($escuela_errores['nombre']);
            }
            $errores = array_merge($profesor_errores, $escuela_errores);     
            if($errores == array()){
                $profesor = array();
                $profesor['Profesor'] = $this->data['Profesor'];
                $profesor['Escuela'] = $this->data['Escuela'];
                $profesor['Profesor']['password'] = md5($profesor['Profesor']['password']);
                $profesor['Profesor']['lectura'] = 1;
                if($this->Profesor->saveAll($profesor)){ 
                    $this->envio_email('confirmacion', $profesor);
                    $this->check_login();
                    if(isset($this->data['Profesor']['registro_largo']) && $this->data['Profesor']['registro_largo'])
                        $this->registro_equipos(true);
                    $this->redirect(array('controller'=>'site','action'=>'perfil'));
                    //$this->cerrar_sesion();
                }
            }else{
                foreach($errores as $e){
                    echo $e[0]."\n";
                }
            }
        }else
            $this->redirect(str_replace ('concurso/', '', Router::url('/', true)));
    }
    function editar_registro(){
        $this->autoRender = false;
        if($this->Session->check('Profesor')){
            $profesor_ant = $this->Session->read('Profesor');
            if($this->data){
                $profesor = $this->data;
                foreach($profesor as $k =>$p){
                    foreach($p as $k_1 => $p_1){
                        $profesor_ant[$k][$k_1] = $p_1;
                    }
                }
                $this->Profesor->set( $profesor_ant );
                $profesor_errores = $this->Profesor->invalidFields();
                $this->Escuela->set( $profesor_ant );
                $escuela_errores = $this->Escuela->invalidFields();
                if(isset($escuela_errores['nombre'])){
                    $escuela_errores['nombre_escuela'] = $escuela_errores['nombre'];
                    unset($escuela_errores['nombre']);
                }
                $errores = array_merge($profesor_errores, $escuela_errores);
                if($errores == array()){
                    if($this->Profesor->saveAll($profesor_ant)){
                        $this->Session->delete('Profesor');
                        $this->Session->write('Profesor',$profesor_ant);
                        $this->Session->setFlash('Perfil actualizado con exito.', 'default', array(), 'good');
                            $this->redirect(
                                    array(
                                        'controller' => 'site',
                                        'action' => 'perfil'
                                        )
                                    );
                    }
                }else{
                   foreach($errores as $e){                       
                        $er = $e[0]."<br>";
                   }
                   $this->Session->setFlash($er, 'default', array(), 'bad');
                            $this->redirect(
                                    array(
                                        'controller' => 'site',
                                        'action' => 'perfil'
                                        )
                                    );
               }
            }else
            echo "No tiene permisos para acceder a esta sección";
        }else
            echo "No tiene permisos para acceder a esta sección";
    }
    public function perfil(){
        $this->layout = 'olimpiada';
        $path =substr($this->params->url, 0, (strpos($this->params->url,'/') == true) ? strpos($this->params->url,'/') : strlen($this->params->url));
        $id_equipo = false;
        if($path == 'actividades'){
            $id_equipo = (isset($this->params->params['id_equipo'])) ? $this->params->params['id_equipo'] : false;
            if(!$id_equipo)
                $this->redirect(Router::url('/perfil',true));
            $this->Equipo->unbindModel(
                array(
                    'hasMany' => array('Integrante'),
                    'belongsTo' => array('Profesor')
                    )
            );
            $equipo = $this->Equipo->findById($id_equipo);
            if(!$equipo || $equipo['Equipo']['profesores_id'] != $this->Session->read('Profesor.Profesor.id')){
                $id_equipo = false;
                $this->redirect(Router::url('/perfil',true));
            }
        }
        if($this->Session->check('Profesor')){
            $this->data = $this->Session->read('Profesor');
            $cats_select = $this->CategoriasEscuela->select();
            $equipos = $this->Equipo->find('all',array('conditions'=>array('Equipo.profesores_id' => $this->Session->read('Profesor.Profesor.id'),'Equipo.lectura' => 1)));
            $this->set(compact('cats_select','equipos','id_equipo')); //manda a llamar el arreglo al .ctp
        }else
            $this->redirect(str_replace ('concurso/', '', Router::url('/', true)));
    }

    public function form_editar() {
        $this->layout = 'ajax';
        if($this->Session->check('Profesor')){
            $this->data = $this->Session->read('Profesor');
            $categorias = $this->CategoriasEscuela->find('all');
            $estados_init = array(''=>'Selecciona una opción');
            $estados = $this->Estado->find('list', array('fields' => array('Estado.estado', 'Estado.estado')));
            $estados = array_merge($estados_init,$estados);
            $cats_select[''] = 'Selecciona una categoría';
            $select_localidades = $this->select_localidades($this->data['Escuela']['codpost']);
            foreach ($categorias as $cat) {
                $cats_select[$cat['CategoriasEscuela']['id']] = $cat['CategoriasEscuela']['nombre']; //asignaci�n de arreglo a arreglo m�s sencillo
            }
            $this->set(compact('cats_select' , 'select_localidades','estados')); //manda a llamar el arreglo al .ctp
        }
    }
    private function select_localidades($codigo){
        if($codigo){
            $localidades = $this->CodigoPostal->find('all',array('conditions'=>array('CodigoPostal.codigo'=>$codigo)));
            $localidades_select[''] = 'Selecciona una localidad';
            foreach($localidades as $l){
                $localidades_select[$l['CodigoPostal']['colonia']] = $l['CodigoPostal']['colonia'];
            }
            return $localidades_select;
        }else
            return false;
    }
    public function registro_home2() {
        $this->layout = 'ajax';
        if (isset($_GET['data'])) {
            $data = $_GET['data'];
            $this->data = $data;
        }
        $estados_init = array(''=>'Selecciona una opción');
        $estados = $this->Estado->find('list', array('fields' => array('Estado.estado', 'Estado.estado')));
        $estados = array_merge($estados_init,$estados);
        $categorias = $this->CategoriasEscuela->find('all');
        $cats_select[''] = 'Selecciona una categoría';
        foreach ($categorias as $cat) {
            $cats_select[$cat['CategoriasEscuela']['id']] = $cat['CategoriasEscuela']['nombre']; //asignaci�n de arreglo a arreglo m�s sencillo
        }
        $this->set(compact('cats_select','estados')); //manda a llamar el arreglo al .ctp
    }

    public function check_email() {
        $this->autoRender = false;
        if (!$_GET['data']['Profesor']['correo'] || !isset($_GET['data']['Profesor']['correo']))
            exit();
        $email = $_GET['data']['Profesor']['correo'];
        $check_email = $this->Profesor->find('first', array('conditions' => array('Profesor.correo' => $email)));
        if (!$check_email)
            echo 'true';
    }
    public function check_user() {
        $this->autoRender = false;
        if (!$_GET['data']['Profesor']['usuario'] || !isset($_GET['data']['Profesor']['usuario']))
            exit();
        $user = $_GET['data']['Profesor']['usuario'];
        $check_user = $this->Profesor->find('first', array('conditions' => array('Profesor.usuario' => $user)));
        if (!$check_user)
            echo 'true';
    }

    public function login($olvido = false) {
        $this->layout = 'olimpiada';
        $this->set(compact('olvido'));
    }
    public function check_login(){
        $this->autoRender = false;
        if($this->data){
            //$login = $this->Profesor->find('first', array('conditions' => array('Profesor.usuario' => $this->data['Profesor']['usuario'], 'Profesor.password'=> md5($this->data['Profesor']['password']))));
            $login = $this->Profesor->find(
                    'first', 
                    array(
                        'conditions' => array(
                            'OR' => array(
                                array('Profesor.correo' => $this->data['Profesor']['correo']),
                                array('Profesor.usuario' => $this->data['Profesor']['correo']),
                            )
                            , 
                            'Profesor.password'=> md5($this->data['Profesor']['password'])
                            )
                        )
                    );
            if($login){
                $this->Session->write('Profesor',$login);
                $this->redirect (array('controller' => 'site','action'=>'perfil'));
            }else{
                $loginByEmail = $this->Profesor->find('first',array('conditions'=>array('OR' => array(
                                array('Profesor.correo' => $this->data['Profesor']['correo']),
                                array('Profesor.usuario' => $this->data['Profesor']['correo']),
                            )
                            , 'Profesor.is_user_wordpress' => 1)));
                if($loginByEmail){
                    $loginWp = (file_get_contents(str_replace ('concurso/', '', Router::url('/', true)).'hashpassword/?key='.$this->data['Profesor']['password'].'&keyh='.$loginByEmail['Profesor']['password_wordpress']));
                    if($loginWp){
                        $loginByEmail['Profesor']['password'] = md5($this->data['Profesor']['password']);
                        $loginByEmail['Profesor']['is_user_wordpress'] = 0;
                        $this->Profesor->save($loginByEmail['Profesor']);
                        $this->Session->write('Profesor',$loginByEmail);
                        $this->redirect (array('controller' => 'site','action'=>'perfil'));
                    }else{
                        $this->redirect (str_replace ('concurso/', '', Router::url('/', true)));
                    }
                }
                $this->redirect (str_replace ('concurso/', '', Router::url('/', true)));
                //echo 'Los datos ingresados son incorrectos.';
            }
        }
    }
    public function recuperar_password($codigo = false){
        if(!$codigo){
            $this->autoRender = false;
            if(isset($this->data['Profesor']['correo'])){
                $email = $this->data['Profesor']['correo'];
                $profesor = $this->Profesor->find('first',array('conditions'=>array('OR' => array(
                                array('Profesor.correo' => $email),
                                array('Profesor.usuario' => $email),
                            ))));
                if($profesor){
                   $codigo  = $this->codigo_recuperacion();
                   $profesor['Profesor']['codigo_recuperacion'] = $codigo;
                   $this->Profesor->save($profesor);
                   if($this->envio_email('recuperacion',$profesor))
                       $this->Session->setFlash('Se te ha enviado un correo con información para recuperar tu contraseña.', 'default', array(), 'good');
                   else
                       $this->Session->setFlash('No se pudo enviar el correo.', 'default', array(), 'bad');
                           
                }else
                    $this->Session->setFlash('El correo electrónico no existe en la base de datos.', 'default', array(), 'bad');
            }
            $this->redirect(Router::url('/login',true));
        }else{
            $this->layout = 'olimpiada';
            $profesor = $this->Profesor->find('first',array('conditions'=>array('Profesor.codigo_recuperacion'=>$codigo)));
            if($profesor)
                $this->set(compact('profesor'));
            else
                $this->redirect (str_replace ('concurso/', '', Router::url('/', true)));
        }
    }
    public function nueva_password(){
        $this->autoRender = false;
        if($this->data){
            $profesor = $this->Profesor->find('first',array('conditions'=>array('Profesor.id'=>$this->data['Profesor']['id'],'Profesor.codigo_recuperacion'=>$this->data['Profesor']['codigo_recuperacion'])));
            if($profesor){
                $profesor['Profesor']['password'] = md5($this->data['Profesor']['password']);
                $profesor['Profesor']['codigo_recuperacion'] = '';
                $profesor['Profesor']['is_user_wordpress'] = 0;
                if($this->Profesor->save($profesor)){
                        $this->Session->write('Profesor',$profesor);
                        $this->redirect(Router::url('/perfil',true));
                }else
                     $this->Session->setFlash('Ocurrio un error. Por favor intentelo de nuevo mas tarde.', 'default', array(), 'bad');
                        
            }else
                     $this->Session->setFlash('Ocurrio un error. Por favor intentelo de nuevo mas tarde.', 'default', array(), 'bad');
        }
        $this->redirect(Router::url('/login',true));
    }
    private function codigo_recuperacion(){
        $cadena="[^A-Z0-9]";
        $codigo = substr(eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())), 0, '20');
        $codigo_existente = $this->Profesor->find('first',array('conditions'=>array('Profesor.codigo_recuperacion'=>$codigo)));
        while($codigo_existente){
            $codigo = substr(eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())), 0, '20');
            $codigo_existente = $this->Profesor->find('first',array('conditions'=>array('Profesor.codigo_recuperacion'=>$codigo)));
        }
        return $codigo;
    }
    private function envio_email($template, $datos = array()){
        $this->Email->smtpOptions = array(
            'port'=>'465',
            'timeout'=>'30',
            'host'=>'ssl://smtp.gmail.com',
            'username'=>'contacto@olimpiadadelectura.org',
            'password'=>'hdEhdejaPO'
            );
            $this->Email->delivery = 'smtp';

            //hay que poner los correos entre < > por que si no manda un error 501
        switch ($template){
            case 'recuperacion':
                $this->Email->to = $datos['Profesor']['correo'];
                $this->Email->subject = 'Recuperación de contraseña';
                $this->Email->from = 'Olimpiada de Lectura<contacto@olimpiadaverde.org>';
                $this->Email->sendAs = 'html';
                $this->Email->template = 'recuperacion';
                $this->set(compact('datos'));
                return $this->Email->send();
                break;
            case "confirmacion":
                $this->Email->to = $datos['Profesor']['correo'];
                $this->Email->subject = 'Confirmación de registro';
                $this->Email->from = 'Olimpiada de Lectura<contacto@olimpiadaverde.org>';
                $this->Email->sendAs = 'html';
                $this->Email->template = 'confirmacion';
                $this->set(compact('datos'));
                $this->Email->send();

                break;
        }
    }
    function cerrar_sesion(){
        $this->autoRender = false;
        $this->Session->delete('Profesor');        
        $this->redirect(str_replace ('concurso/', '', Router::url('/', true)));
        //$this->redirect(str_replace ('concurso/', '', Router::url('/', true)));
    }
    function form_equipos($id = null){
        //$this->layout = false;
        $this->layout = 'olimpiada';
        if($this->Session->check('Profesor')){
            $equipos = $this->Equipo->find('count',array(
               'conditions' => array(
                   'Equipo.profesores_id' => $this->Session->read('Profesor.Profesor.id')
               ) 
            ));
            if($equipos >=3) {
                $this->Session->setFlash('Ya agregaste el número máximo de equipos.', 'default', array(), 'bad');
                $this->redirect(array('controller' => 'site', 'action' => 'perfil'));
                
            }
            if($id){
                $equipo = $this->Equipo->find('first',array('conditions'=>array('Equipo.id'=>$id)));
                if(!$equipo || $equipo['Equipo']['profesores_id'] != $this->Session->read('Profesor.Profesor.id'))
                        exit();
                else
                    $this->data = $equipo;
            }
            $grado_select = array(
                '' => 'Selecciona',
                '3' => 'Tercero',
				'4' => 'Cuarto',
                '5' => 'Quinto',
                '6' => 'Sexto'
            );
            $temas_select = array(
                '' => 'Selecciona un tema',
                'aire' => 'Aire',
                'residuos' => 'Residuos',
                'agua' => 'Agua',
                'energia' => 'Energia / Cambio climatico'
            );
            $this->set(compact('grado_select','temas_select'));
        }else{
            $this->redirect(array('controller' => 'site', 'action' => 'perfil'));
        }
    }
    function registro_equipos($init = false){
        $this->autoRender = false;
        if($this->Session->check('Profesor')){
            if($this->data){
                $equipo = $this->data; 
                if(isset($equipo['Equipo']['id'])){
                    $equipo_ant = $this->Equipo->find('first',array('conditions'=>array('Equipo.id'=>$equipo['Equipo']['id'])));
                    if($equipo_ant['Equipo']['profesores_id'] != $this->Session->read('Profesor.Profesor.id'))
                            exit();
                    //$equipo['Equipo']['nombre'] = $equipo_ant['Equipo']['nombre'];
                }
                $equipo['Equipo']['lectura'] = 1;
                $this->Equipo->set($equipo);
                $errores_equipo = $this->Equipo->invalidFields();
                $errores_int = array();
                $this->Integrante->set($equipo['Integrante']['0']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[0] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['1']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[1] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['2']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[2] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['3']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[3] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['4']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[4] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['5']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[5] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['6']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[6] = $this->Integrante->invalidFields() : '';
                $this->Integrante->set($equipo['Integrante']['7']);
                ($this->Integrante->invalidFields() != array()) ? $errores_int[7] = $this->Integrante->invalidFields() : '';
                foreach($errores_int as $k => $e){
                    (isset($e['nombre'][0])) ? $errores_equipo[][0] = $e['nombre'][0].' '.($k+1): '';
                    (isset($e['grado'][0]))  ? $errores_equipo[][0] = $e['grado'][0].' '.($k+1): '';
                    (isset($e['edad'][0])) ? $errores_equipo[][0] = $e['edad'][0].' '.($k+1): '';
                    (isset($e['genero'][0]))  ? $errores_equipo[][0] = $e['genero'][0].' '.($k+1): '';
                }
                $errores = $errores_equipo; 
                if($errores == array()){
                    $equipo_i = $equipo['Equipo'];
                    $equipo_i['profesores_id'] = $this->Session->read('Profesor.Profesor.id');
                    if($this->Equipo->save($equipo_i)){
                        $equipo_id = $this->Equipo->id;
                        $integrantes = $this->data['Integrante'];
                        foreach($integrantes as $k => $i){
                            $i['equipo_id'] = $equipo_id;
                            $this->Integrante->create();
                            $this->Integrante->save($i);
                        }
                        if(!$init){
                            $this->Session->setFlash('Equipo guardado con exito.', 'default', array(), 'good');
                            $this->redirect(
                                    array(
                                        'controller' => 'site',
                                        'action' => 'perfil'
                                        )
                                    );
                        }
                        //echo "1";
                    }
                }else{
                   foreach($errores as $e){
                        echo $e[0]."\n";
                   }
                }
            }
        }else
            echo "No tiene permisos para acceder a esta sección";
    }
    function get_localidades($codigo = null){
        $this->autoRender = false;
        if($codigo){
            $localidades = $this->CodigoPostal->find('all',array('conditions'=>array('CodigoPostal.codigo'=>$codigo)));
            $localidades_select = '<option value="">Selecciona una localidad</option>';
            foreach($localidades as $l){
                $localidades_select .= '<option value ="'.$l['CodigoPostal']['colonia'].'">'.$l['CodigoPostal']['colonia'].'</option>';
            }
            echo $localidades_select;
        }else
            $this->redirect(str_replace ('concurso/', '', Router::url('/', true)));
    }
    function reportes($args = false){
        
       /* if(!isset($_GET) || !$_GET['args'])
            exit();
        $args = json_decode($_GET['args'],true);
        if(!is_array($args))
            exit();
        $model = $args['model'];
        $registros = $this->$model->find('all');
        print_r(json_encode($registros));*/
        
    }
    function wp_users(){
        $this->autoRender = false;
        debug($this->Profesor->find('all',array('conditions'=>array('Profesor.is_user_wordpress' => 1))));
        /*$wpUsers = $this->WpUser->find('all');
        foreach($wpUsers as $wp){
            foreach($wp['WpUserMeta'] as $k_meta => $meta){
                $wp['WpUserMeta'][$meta['meta_key']] = $meta;
                unset($wp['WpUserMeta'][$k_meta]);
            }                        
            //debug($wp);
            $user = array();
            $user['Profesor']['usuario'] = $wp['WpUser']['user_login'];
            $user['Profesor']['correo'] = $wp['WpUser']['user_email'];
            $user['Profesor']['created'] = $wp['WpUser']['user_registered'];      
            $user['Profesor']['password_wordpress'] = $wp['WpUser']['user_pass'];      
            $user['Profesor']['is_user_wordpress'] = 1;      
            $user['Profesor']['nombre'] = (isset($wp['WpUserMeta']['user_profesor'])) ? $wp['WpUserMeta']['user_profesor']['meta_value'] : $wp['WpUser']['user_login'];
            $user['Profesor']['tel_local'] = (isset($wp['WpUserMeta']['user_telefono'])) ? $wp['WpUserMeta']['user_telefono']['meta_value'] : '';
            $user['Escuela']['estado'] = '';
            $user['Escuela']['nombre'] = (isset($wp['WpUserMeta']['user_escuela'])) ? $wp['WpUserMeta']['user_escuela']['meta_value'] : ((isset($wp['WpUserMeta']['user_centroescolar'])) ? $wp['WpUserMeta']['user_centroescolar']['meta_value'] : '');
            $user['Escuela']['domicilio'] = (isset($wp['WpUserMeta']['user_domicilio'])) ? $wp['WpUserMeta']['user_domicilio']['meta_value'] : '';
            $user['Escuela']['clave'] = (isset($wp['WpUserMeta']['user_cct'])) ? $wp['WpUserMeta']['user_cct']['meta_value'] : '';
            $user['Escuela']['horario'] = (isset($wp['WpUserMeta']['user_horario'])) ? $wp['WpUserMeta']['user_horario']['meta_value'] : '';
            $user['Escuela']['telefono'] = (isset($wp['WpUserMeta']['user_telefonoesc'])) ? $wp['WpUserMeta']['user_telefonoesc']['meta_value'] : '';
            $user['Escuela']['director'] = (isset($wp['WpUserMeta']['user_director'])) ? $wp['WpUserMeta']['user_director']['meta_value'] : '';
            $user['Escuela']['director_email'] = (isset($wp['WpUserMeta']['user_emaildirector'])) ? $wp['WpUserMeta']['user_emaildirector']['meta_value'] : '';
            $this->Profesor->create();
            $this->Profesor->saveAll($user);
            $profesor_id = $this->Profesor->getLastInsertId();
            debug($profesor_id);
            if((isset($wp['WpUserMeta']['user_circulo']))){
                $user['Equipo'][0]['Equipo']['profesores_id'] = $profesor_id;
                $user['Equipo'][0]['Equipo']['nombre'] = (isset($wp['WpUserMeta']['user_circulo'])) ? $wp['WpUserMeta']['user_circulo']['meta_value'] : '';
                $user['Equipo'][0]['Equipo']['integrantes'] = (isset($wp['WpUserMeta']['user_integrantes'])) ? $wp['WpUserMeta']['user_integrantes']['meta_value'] : '';

                for($i = 1; $i <= 8; $i++){
                    if(isset($wp['WpUserMeta']['user_nombrealumno'.$i])){
                        $user['Equipo'][0]['Integrante'][$i-1]['Integrante']['nombre'] = (isset($wp['WpUserMeta']['user_nombrealumno'.$i])) ? $wp['WpUserMeta']['user_nombrealumno'.$i]['meta_value'] : '';
                        $user['Equipo'][0]['Integrante'][$i-1]['Integrante']['grado'] = (isset($wp['WpUserMeta']['user_gradoalumno'.$i])) ? $wp['WpUserMeta']['user_gradoalumno'.$i]['meta_value'] : '';
                        $user['Equipo'][0]['Integrante'][$i-1]['Integrante']['edad'] = (isset($wp['WpUserMeta']['user_edadalumno'.$i])) ? $wp['WpUserMeta']['user_edadalumno'.$i]['meta_value'] : '';
                        $user['Equipo'][0]['Integrante'][$i-1]['Integrante']['genero'] = (isset($wp['WpUserMeta']['user_generoalumno'.$i])) ? $wp['WpUserMeta']['user_generoalumno'.$i]['meta_value'] : '';
                    }
                }
                $this->Equipo->saveAll($user['Equipo'][0]);
                debug($this->Equipo->getLastInsertId());
            }            
            
            
        }*/
        
    }
}	




?>
