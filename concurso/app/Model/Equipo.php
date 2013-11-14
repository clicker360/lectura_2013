<?php

class Equipo extends AppModel{

   var $name = 'Equipo';

   public $hasMany = array('Integrante');
   public $belongsTo = array('Profesor' => array(
                                    'className'    => 'Profesor',
                                    'foreignKey'   => 'profesores_id'
                                            ));
    var $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese un nombre de equipo.',
                'last' => true
             )/*,
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Este equipo ya fue registrado anteriormente.',
                'last' => true
             )*/
        )
    );
   }
   
?>