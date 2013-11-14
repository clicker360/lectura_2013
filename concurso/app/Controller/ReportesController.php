<?php

class ReportesController extends AppController {

    public $name = 'Reportes';
    public $uses = array('Profesor', 'Escuela', 'CategoriasEscuela','Equipo','Integrante','CodigoPostal','User','Score');
    var $olimpiada = 'lectura';

    function  beforeFilter() {
        if(!$this->Session->check('User'.$this->olimpiada) && $this->params['action'] != 'login')
                $this->redirect (array('controller'=>'reportes','action'=>'login'));
    }


    function index() {
        //echo md5('ERcq3eAp');
	set_time_limit(90);
        $this->layout = 'reporte';
        $title_for_layout = 'Reportes';
        $models = array('Profesor','Equipo');
        $model = (isset($this->data['Filtro']['Model']) && in_array($this->data['Filtro']['Model'], $models)) ? $this->data['Filtro']['Model'] : 'Profesor';
        $showFields = array("Profesor.*,Escuela.*,CASE WHEN Escuela.categoria =  '1' THEN  'Escuela pública urbana' WHEN Escuela.categoria =  '2' THEN  'Escuela pública rural' WHEN Escuela.categoria =  '3' THEN  'Escuela pública indígena' WHEN Escuela.categoria =  '4' THEN  'Escuela privada' END AS 'categoria_nombre'");
        $joins = array();
        $inicio = (isset($this->data['Filtro']['Inicio']) && $this->data['Filtro']['Inicio']) ? $this->data['Filtro']['Inicio'] : '2012-01-01';
        $fin = (isset($this->data['Filtro']['Fin']) && $this->data['Filtro']['Fin']) ? $this->data['Filtro']['Fin'] : '2013-12-31';
        $conditions = array();
        //$conditions[$model.'.'.$this->olimpiada] = 1;
        if(isset($this->data['Filtro']['Inicio']) && $this->data['Filtro']['Inicio'])
                $conditions[$model.'.created >='] = $this->data['Filtro']['Inicio'].' 00:00:00';
        if(isset($this->data['Filtro']['Fin']) && $this->data['Filtro']['Fin'])
                $conditions[$model.'.created <='] = $this->data['Filtro']['Fin'].' 23:59:59';
        if($model == 'Equipo'){
            $showFields[] = 'Equipo.nombre, Equipo.created';
            $joins[] = array(
                        'table' => 'escuelas',
                        'alias' => 'Escuela',
                        'conditions' => array('Escuela.profesores_id = Equipo.profesores_id')
                        );
        }
        if($model == 'Profesor'){
            // Eliminemos el hasMany...
            $this->Profesor->unbindModel(
                array('hasMany' => array('Equipo'))
            );
            $fields = array(
                'Profesor' => array(
                    'nombre' => 'Nombre del profesor',
                    'correo' => 'Correo electrónico',
                    'tel_lada' => array('Teléfono',array('tel_local')),
                    'nombre' => 'Nombre',
                ),
                'Escuela' => array(
                    'nombre' => 'Nombre de la escuela',
                    'clave' => 'Clave del centro de trabajo',
                    'domicilio' => 'Domicilio',
                    'localidad' => 'Localidad',
                    'codpost' => 'Codigo Postal',
                    'estado' => 'Estado',
                    'horario' => 'Horario de atención',
                    'telefono' => 'Teléfono',
                    'director' => 'Nombre del director',
                    'director_email' => 'Correo electrónico del director',
                    'created' => 'Fecha de creación',
                ),
                0 => array(
                    'categoria_nombre' => 'Categoría de la escuela'
                )
            );
        }else if($model == 'Equipo'){
            $this->Equipo->unbindModel(
                array('hasMany' => array('Integrante'))
            );
            $fields = array(
                'Equipo' => array(
                  'nombre' => 'Nombre del equipo',
                  'created' => 'Fecha de creación',
                ),
                'Profesor' => array(
                    'nombre' => 'Nombre del profesor',
                    'correo' => 'Correo electrónico',
                    'tel_lada' => array('Teléfono',array('tel_local')),
                    'nombre' => 'Nombre',
                ),
                'Escuela' => array(
                    'nombre' => 'Nombre de la escuela',
                    'clave' => 'Clave del centro de trabajo',
                    'domicilio' => 'Domicilio',
                    'localidad' => 'Localidad',
                    'codpost' => 'Codigo Postal',
                    'estado' => 'Estado',
                    'horario' => 'Horario de atención',
                    'telefono' => 'Teléfono',
                    'director' => 'Nombre del director',
                    'director_email' => 'Correo electrónico del director'
                ),
                0 => array(
                    'categoria_nombre' => 'Categoría de la escuela'
                )
            );
        }
        $registros = $this->$model->find('all',array('fields'=>$showFields,'joins' => $joins,'conditions'=>$conditions,'limit'=>'1'));
        $this->set(compact('registros','fields','model','inicio','fin'));
    }
    
    function login(){
        if($this->Session->check('User'.$this->olimpiada))
                $this->redirect (array('action' => 'index'));
        $this->layout = 'reporte';
        //echo md5('Ux0Xr{z9KX');
        $title_for_layout = 'Login';
        $this->set(compact('title_for_layout'));        
        if($this->data){
            $username = (isset($this->data['User']['username'])) ? $this->data['User']['username']  : false;
            $password = (isset($this->data['User']['password'])) ? $this->data['User']['password']  : false;
            if($username && $password){
                $user = $this->User->find('first',array('conditions'=>array('User.username' => $username, 'User.password' => md5($password),'User.'.$this->olimpiada => 1)));
                if($user){
                    $this->Session->write('User'.$this->olimpiada,$user);
                    $this->Session->setFlash('Sesión iniciada correctamente.','success');
                    $this->redirect(array('action'=>'index'));
                }else{
                    $this->Session->setFlash('Los datos ingresados son incorrectos.','error');
                    $this->redirect(array('action'=>'index'));
                }
                debug($user);
            }
        }
    }
    function logout(){
        $this->autoRender = false;
        $this->Session->delete('User'.$this->olimpiada);
        $this->Session->setFlash('Sesión finalizada correctamente.','success');
        $this->redirect($this->referer());
    }
    function excel(){
        $this->layout='ajax';
           $this->Profesor->recursive = 0;
       $this->set('profesores', $this->paginate());
    }
    function xls(){
	set_time_limit(90);
        $this->layout = 'xls';
        if(!$this->data)
            $this->redirect ('/reportes');
        $model = $this->data['Xls']['Model'];
        $inicio = $this->data['Xls']['Inicio'];
        $fin = $this->data['Xls']['Fin'];
        $models = array('Profesor','Equipo');
        $showFields = array("Profesor.*,Escuela.*,CASE WHEN Escuela.categoria =  '1' THEN  'Escuela pública urbana' WHEN Escuela.categoria =  '2' THEN  'Escuela pública rural' WHEN Escuela.categoria =  '3' THEN  'Escuela pública indígena' WHEN Escuela.categoria =  '4' THEN  'Escuela privada' END AS 'categoria_nombre'");
        $joins = array();
        $conditions = array();
        //$conditions[$model.'.'.$this->olimpiada] = 1;
        $conditions[$model.'.created >='] = $inicio;
        $conditions[$model.'.created <='] = $fin;
        if($model == 'Equipo'){
            $showFields[] = 'Equipo.*';
            $joins[] = array(
                        'table' => 'escuelas',
                        'alias' => 'Escuela',
                        'conditions' => array('Escuela.profesores_id = Equipo.profesores_id')
                        );
        }
        if($model == 'Profesor'){
            // Eliminemos el hasMany...
            $this->Profesor->unbindModel(
                array('hasMany' => array('Equipo'))
            );
            $fields = array(
                'Profesor' => array(
                    'nombre' => 'Nombre del profesor',
                    'correo' => 'Correo electrónico',
                    'tel_lada' => array('Teléfono',array('tel_local')),
                    'nombre' => 'Nombre',
                ),
                'Escuela' => array(
                    'nombre' => 'Nombre de la escuela',
                    'clave' => 'Clave del centro de trabajo',
                    'domicilio' => 'Domicilio',
                    'localidad' => 'Localidad',
                    'codpost' => 'Codigo Postal',
                    'estado' => 'Estado',
                    'horario' => 'Horario de atención',
                    'telefono' => 'Teléfono',
                    'director' => 'Nombre del director',
                    'director_email' => 'Correo electrónico del director',
                    'created' => 'Fecha de creación',
                ),
                0 => array(
                    'categoria_nombre' => 'Categoría de la escuela'
                )
            );
        }else if($model == 'Equipo'){
            // Eliminemos el hasMany...
            $this->Equipo->unbindModel(
                array('hasMany' => array('Integrante'))
            );
            $fields = array(
                'Equipo' => array(
                  'nombre' => 'Nombre del equipo',
                  'created' => 'Fecha de creación',
                ),
                'Profesor' => array(
                    'nombre' => 'Nombre del profesor',
                    'correo' => 'Correo electrónico',
                    'tel_lada' => array('Teléfono',array('tel_local')),
                    'nombre' => 'Nombre',
                ),
                'Escuela' => array(
                    'nombre' => 'Nombre de la escuela',
                    'clave' => 'Clave del centro de trabajo',
                    'domicilio' => 'Domicilio',
                    'localidad' => 'Localidad',
                    'codpost' => 'Codigo Postal',
                    'estado' => 'Estado',
                    'horario' => 'Horario de atención',
                    'telefono' => 'Teléfono',
                    'director' => 'Nombre del director',
                    'director_email' => 'Correo electrónico del director'
                ),
                0 => array(
                    'categoria_nombre' => 'Categoría de la escuela'
                )
            );
        }
        $registros = $this->$model->find('all',array('fields'=>$showFields,'joins' => $joins,'conditions'=>$conditions,'limit'=>'1'));
        $this->set(compact('registros','fields'));
    }
    /*function prueba(){
        //$this->autoRender = false;
        $this->layout = 'xls';
        $fin = '20121204';
        $inicio = '20121121';
        $dias = array();
        while(strtotime($inicio) <= strtotime($fin)){
           $dias[] = $inicio;
           $inicio = strtotime($inicio) + (60*60*24);
           $inicio = date('Ymd',$inicio);
        }
        $ganadoresPrev = array();
        $ganadores = array();
        foreach($dias as $d){
            $conditions = array(
                'Score.id_fb !='=>'',
                "Date_format(Score.timestamp, '%Y%m%d')"=>$d
            );
            if(count($ganadoresPrev) != 0)
                $conditions['Score.id_fb NOT'] = $ganadoresPrev;
            //SELECT email_fb, MAX(score) AS score, nombre_fb, id_fb FROM score WHERE id_fb != '' AND Date_format(timestamp, '%Y%m%d') = DATE_FORMAT(".$d.", '%Y%m%d')  GROUP BY id_fb ORDER BY score DESC LIMIT 0 ,5
            $score = $this->Score->find('all',array('fields'=>'email_fb, MAX(score) AS score, nombre_fb, id_fb,timestamp','conditions'=>$conditions,'group'=>'email_fb','order'=>array('score'=>'DESC')));
            foreach($score as $k => $s){
                if(in_array($k,array('0','1'))){
                    $ganadoresPrev[] = $s['Score']['id_fb'];
                    $s['Score']['dia'] = date('Y-m-d',strtotime($s['Score']['timestamp']));
                    $s['Score']['score'] = $s[0]['score'];
                    $ganadores[] = $s['Score'];
                }
            }
        }
        //debug($ganadoresPrev);
        $this->set(compact('ganadores'));
    }*/
    
}	




?>
