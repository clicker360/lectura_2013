<?php

class ActividadesController extends AppController {

    public $name = 'Actividades';
    public $uses = array('Profesor', 'Escuela', 'CategoriasEscuela','Equipo','Integrante','CodigoPostal','User','Actividad','Evidencia','EquipoActividad','Respuesta','EquipoDiario');
    var $olimpiada = 'lectura';
    public $semana = '3';
    public $semanas = array(
       '1' => 'Semana del 14 al 21 de diciembre',
       '2' => 'Semana del 7 al 11 de enero',
       '3' => 'Semana del 14 al 18 de enero',
       '4' => 'Semana 4',
       '5' => 'Semana 5',
    );

    function  beforeFilter() {
        if(!$this->Session->check('User'.$this->olimpiada) && in_array($this->params['action'],array('admin_index','add','edit','delete','save','login')))
                $this->redirect (array('controller'=>'actividades','action'=>'login'));
		$this->disableCache();    
}
    function index(){
        $this->layout = 'olimpiada';
        $actividades = $this->Actividad->find('all');
        $this->set(compact('actividades'));
        
    }
    function admin_index() {
        $this->layout = 'admin_actividades';
        $actividades = $this->Actividad->find('all');
        $this->set(compact('actividades'));
       
    }
    function cargaActividad($actividad_id = false,$equipo_id = false){
        if(!$this->Session->check('Profesor'))
                exit();
        $equipo = $this->Equipo->findById($equipo_id);
        if(!$equipo || $equipo['Equipo']['profesores_id'] != $this->Session->read('Profesor.Profesor.id'))
                exit();
        $this->layout = 'ajax';
        if(!$actividad_id || !$equipo_id)
            $this->redirect (array('action'=>'index'));
        $edit = false;
        $actividadPrevia = $this->EquipoActividad->find('first',array('conditions'=>array('EquipoActividad.equipo_id'=>$equipo_id,'EquipoActividad.actividad_id'=>$actividad_id)));
        if($actividadPrevia){
            $edit = true;
            $this->data = $actividadPrevia;
        }
        $actividad = $this->Actividad->findById($actividad_id);
        $this->set(compact('actividad','actividad_id','equipo_id','edit'));
        
    }
    function guardaActividad(){
        if(!$this->Session->check('Profesor'))
                exit();
        if(!$this->data)
            exit();
        $equipo = $this->Equipo->findById($this->data['EquipoActividad']['equipo_id']);
        if(!$equipo || $this->Session->read('Profesor.Profesor.id') != $equipo['Equipo']['profesores_id'])
                exit();
        $etapaActividades = $this->Actividad->find('all',array('conditions'=>array('Actividad.etapa' => 2)));
        foreach($etapaActividades as $a){
            $actsEtapa_id[] = $a['Actividad']['id'];
        }
        $actividadesEquipo = $this->EquipoActividad->find('count',array('conditions'=>array('EquipoActividad.actividad_id'=>$actsEtapa_id,'EquipoActividad.equipo_id' => $equipo['Equipo']['id'])));
        if($actividadesEquipo >= 5){
            if(!isset($this->data['EquipoActividad']['id']) || !$this->data['EquipoActividad']['id']){
                $this->Session->setFlash('Ya se alcanzo el limite de 5 actividades por equipo.','error');
                $this->redirect(Router::url('/actividades/'.$actividad['EquipoActividad']['equipo_id'],true));
                exit();
            }
        }
        $this->autoRender = false;
        //debug($this->data);
        $actividad = $this->data;
        foreach($actividad['Respuesta'] as $k => $r){
            if(is_array($r['value'])){
                if($r['value']['name'] != ''){
                    $fileOk = $this->uploadFiles($r['value'],'evidencias');
                    if(isset($fileOk['errors'])){
                        $this->Session->setFlash($fileOk['errors'],'error');
                        $this->redirect(Router::url('/actividades/'.$actividad['EquipoActividad']['equipo_id'],true));
                    }else if($fileOk['final_name']){
                        $actividad['Respuesta'][$k]['value'] = $fileOk['final_name'];
                    }
                }else{
                    unset($actividad['Respuesta'][$k]);
                }
            }
        }
        if($this->EquipoActividad->saveAll($actividad))
             $this->Session->setFlash('La actividad se guardó correctamente.','success');
        else
             $this->Session->setFlash('No se pudo guardar la actividad.','error');
        $this->redirect(Router::url('/actividades/'.$actividad['EquipoActividad']['equipo_id'],true));
    }
    function BorraActividad($actividad_id = false, $equipo_id = false){
        if(!$this->Session->check('Profesor'))
                exit();
         $equipo = $this->Equipo->findById($equipo_id);
         if(!$equipo || $this->Session->read('Profesor.Profesor.id') != $equipo['Equipo']['profesores_id'])
                exit();         
        $this->autoRender = false;
        if($this->EquipoActividad->deleteAll(array('EquipoActividad.actividad_id'=>$actividad_id,'EquipoActividad.equipo_id'=>$equipo_id),true))
             $this->Session->setFlash('La actividad se borró correctamente.','success');
        else
             $this->Session->setFlash('No se pudo borrar la actividad.','error');
        $this->redirect(Router::url('/actividades/'.$equipo_id,true));
    }
    function EquipoActividades($id){
        if(!$this->Session->check('Profesor'))
                exit();
        if(!$id)
            exit();
        $equipo = $this->Equipo->findById($id);
         if(!$equipo || $this->Session->read('Profesor.Profesor.id') != $equipo['Equipo']['profesores_id'])
            exit();  
        $this->layout = 'ajax';
        $this->Equipo->unbindModel(
                array(
                    'hasMany' => array('Integrante'),
                    'belongsTo' => array('Profesor')
                    )
            );
        $this->EquipoActividad->unbindModel(
                array(
                    'hasMany' => array('Respuesta'),
                    'belongsTo' => array('Equipo')
                    )
            );
        $etapaActividades = $this->Actividad->find('all',array('conditions'=>array('Actividad.etapa' => 2)));
        foreach($etapaActividades as $a){
            $actsEtapa_id[] = $a['Actividad']['id'];
        }
        $actividades = $this->EquipoActividad->find('all',array('conditions'=>array('EquipoActividad.actividad_id'=>$actsEtapa_id,'EquipoActividad.equipo_id'=>$id)));
        $acts_id = array();
        foreach($actividades as $a){
            $acts_id[] = $a['Actividad']['id'];
        }
        $restoActividades = $this->Actividad->find('all',array('conditions'=>array('Actividad.id NOT' => $acts_id,'Actividad.etapa' => 2)));
        $this->set(compact('equipo','actividades','restoActividades'));
    }
    function EquipoDiario($id){
        if(!$this->Session->check('Profesor'))
                exit();
        if(!$id)
            exit();
        $this->Equipo->unbindModel(
                array(
                    'hasMany' => array('Integrante'),
                    'belongsTo' => array('Profesor')
                    )
            );
        $equipo = $this->Equipo->findById($id);
         if(!$equipo || $this->Session->read('Profesor.Profesor.id') != $equipo['Equipo']['profesores_id'])
            exit();
        $this->layout = 'ajax';
        $semanas = $this->semanas;
        $semana = $this->semana;
        $diarios = $this->EquipoDiario->find('all',array('conditions'=>array('EquipoDiario.equipo_id'=>$id,'EquipoDiario.semana !='=>$semana),'order'=>array('EquipoDiario.semana'=>'DESC')));
        $diarioActual = $this->EquipoDiario->find('first',array('conditions'=>array('EquipoDiario.equipo_id'=>$id,'EquipoDiario.semana'=>$semana)));
        $diariosCount = 0;
        if($diarioActual)
            $diariosCount++;
        if($diarios)
            $diariosCount += count($diarios);
        /*if(!$diario){
            $diario['EquipoDiario']['equipo_id'] = $equipo['Equipo']['id'];
            $diario['EquipoDiario']['semana'] = $semana;
        }*/
        //$this->data = $diario;
        $this->set(compact('equipo','diarios','diarioActual','semana','semanas','diariosCount'));
    }
    function CargaDiario($semana, $id_equipo){
	if(!$this->Session->check('Profesor'))
                exit();
        if(!$id_equipo || !$semana)
            exit();
        $this->Equipo->unbindModel(
                array(
                    'hasMany' => array('Integrante'),
                    'belongsTo' => array('Profesor')
                    )
            );
        $equipo = $this->Equipo->findById($id_equipo);
         if(!$equipo || $this->Session->read('Profesor.Profesor.id') != $equipo['Equipo']['profesores_id'])
            exit();
        $this->layout = 'ajax';
        $diarios = $this->EquipoDiario->find('all',array('conditions'=>array('EquipoDiario.equipo_id'=>$id_equipo,'EquipoDiario.semana !='=>$semana),'order'=>array('EquipoDiario.semana'=>'DESC')));
        $diario = $this->EquipoDiario->find('first',array('conditions'=>array('EquipoDiario.equipo_id'=>$id_equipo,'EquipoDiario.semana'=>$semana)));
	$diariosCount = 0;
        $nuevo = false;
        if(!$diario){
            $diario['EquipoDiario']['equipo_id'] = $equipo['Equipo']['id'];
            $diario['EquipoDiario']['semana'] = $semana;
            $nuevo = true;
        }else{
            $diariosCount++;
        }
        if($diarios)
            $diariosCount += count($diarios);
        $this->data = $diario;
        $semanaNombre = $this->semanas[$semana];
        $edit = ($semana == $this->semana) ? true : false;
        $this->set(compact('equipo','diario','semana','edit','semanaNombre','diariosCount','nuevo'));
    }
    function guardaDiario(){
        if(!$this->Session->check('Profesor'))
                exit();
        if(!$this->data){
            $this->Session->setFlash('No se pudo guardar el diario de esta semana.','error');
             $this->redirect(Router::url('/perfil',true));
             exit();
        }
        $equipo = $this->Equipo->findById($this->data['EquipoDiario']['equipo_id']);
        if(!$equipo || $this->Session->read('Profesor.Profesor.id') != $equipo['Equipo']['profesores_id']){
             $this->Session->setFlash('No se pudo guardar el diario de esta semana.','error');
             $this->redirect(Router::url('/perfil',true));
             exit();
        }
        if($this->data['EquipoDiario']['semana'] != $this->semana){
            $this->Session->setFlash('Solo puede guardar el diario de la semana actual.','error');
            $this->redirect(Router::url('/perfil',true));
            exit();
        }
        $this->autoRender = false;
        $diario = $this->data['EquipoDiario'];
        foreach($diario as $k => $d){
            if(is_array($d)){
                if($d['name'] != ''){
                    $fileOk = $this->uploadFiles($d,'diario');
                    if(isset($fileOk['errors'])){
                        $this->Session->setFlash($fileOk['errors'],'error');
                        $this->redirect(Router::url('/perfil',true));
                        exit();
                    }else if($fileOk['final_name']){
                        $diario[$k] = $fileOk['final_name'];
                    }
                }else{
                    unset($diario[$k]);
                }
            }
        }
        if($this->EquipoDiario->save($diario))
             $this->Session->setFlash('El diario de esta semana se guardó correctamente.','success');
        else
             $this->Session->setFlash('No se pudo guardar el diario de esta semana.','error');
        $this->redirect(Router::url('/perfil',true));
    }
    function add(){
        $this->layout = 'admin_actividades';
        if(!$this->data)
            $this->redirect(array('controller'=>'actividades','action'=>'addE'));
        //exit();
    }
    function addE(){
        $this->layout = 'admin_actividades';
    }
    function edit($id){
        if(!$id)
            exit();
        $this->layout = 'admin_actividades';
        $actividad = $this->Actividad->findById($id);
        $evidencias = array();
        foreach($actividad['Evidencia'] as $k => $e){
            $evidencias[($e['numero_evidencia'])-1] = $e;
        }
        ksort($evidencias);
        $actividad['Evidencia'] = $evidencias;
        $this->data = $actividad;
    }
    function delete($id){
        $this->autoRender = false;
        if($this->Actividad->delete($id,true))
            $this->Session->setFlash('La actividad se borró correctamente.','success');
        else
            $this->Session->setFlash('No se pudo borrar la actividad.','error');
        $this->redirect(array('controller'=>'actividades','action'=>'admin_index')); 
    }
    function save(){
        $this->autoRender = false;
        $save = false;
        if($this->Actividad->save($this->data))
                $save = true;
        foreach($this->data['Evidencia'] as $k => $e){
            $actividad_id = $this->Actividad->id;
            if($e['tipo'] != ''){
                $e['actividad_id'] = $actividad_id;
                $this->Evidencia->create();
                $this->Evidencia->save($e);
            }
        }
        if($save)
            $this->Session->setFlash('La actividad se agregó correctamente.','success');
        else
            $this->Session->setFlash('No se pudo guardar la actividad.','error');
        $this->redirect(array('controller'=>'actividades','action'=>'admin_index'));
    }
    function login(){
        if($this->Session->check('User'.$this->olimpiada))
                $this->redirect (array('action'=>'admin_index','controller'=>'actividades'));
        $this->layout = 'admin_actividades';
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
                    $this->redirect(array('action'=>'admin_index','controller'=>'actividades'));
                }else{
                    $this->Session->setFlash('Los datos ingresados son incorrectos.','error');
                    $this->redirect(array('action'=>'admin_index','controller'=>'actividades'));
                }
            }
        }
    }
    private function uploadFiles($file, $folder/*$folder, $formdata, $itemId = null*/) {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        /*if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }*/

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

        //validate the file
        if (isset($file['name']) && $file['name'] != '') {
            // replace spaces with underscores
            $filename = str_replace(' ', '_', $file['name']);
            // assume filetype is false
            // check filetype is ok
            if(in_array($file['type'],$permitted))
                $typeOK = true;
            else
                $typeOK = false;
            // if file type ok upload the file
            if ($typeOK) {
                // switch based on error code
                switch ($file['error']) {
                    case 0:
                        // check filename already exists
                        if($file['size'] <= 300000){
                        if (!file_exists($folder_url . '/' . $filename)) {
                            // create full filename
                            $name_uploaded = $filename;
                            $full_url = $folder_url . '/' . $filename;
                            $url = $rel_url . '/' . $filename;
                            // upload the file
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        } else {
                            // create unique filename and upload file
                            ini_set('date.timezone', 'America/Mexico_City');
                            $now = date('Y-m-d-His');
                            $name_uploaded = $now . $filename;
                            $full_url = $folder_url . '/' . $name_uploaded;
                            $url = $rel_url . '/' . $name_uploaded;
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        }
                        // if upload was successful
                        if ($success) {
                            // save the url of the file
                            $result['urls'] = $url;
                            $result['final_name'] = $name_uploaded;
                        } else {
                            $result['errors'] = "No se pedo subir $filename.Por favor inténtelo mas tarde.";
                        }
                        }else{
                            $result['errors'] = "No se pudo subir $filename. El archivo debe ser menor a 300 kB.";
                        }
                        break;
                    case 3:
                        // an error occured
                        $result['errors'] = "No se pudo subir $filename. Por favor inténtelo mas tarde.";
                        break;
                    default:
                        // an error occured
                        $result['errors'] = "No se pudo subir $filename. Por favor inténtelo mas tarde.";
                        break;
                }
            } elseif ($file['error'] == 4) {
                // no file was selected for upload
                $result['nofiles'] = "No se seleccionó ningun archivo";
            } else {
                // unacceptable file type
                $result['errors'] = "$filename no es un archivo permitido. Los archivos permitidos son de tipo: gif, jpg, png.";
            }
        }

        return $result;
    }
    
}	




?>
