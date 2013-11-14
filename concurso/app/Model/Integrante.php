<?php

class Integrante extends AppModel{

   var $name = 'Integrante';
   public $belongsTo = array('Equipo' => array(
                                    'className'    => 'Equipo',
                                    'foreignKey'   => 'equipo_id'
                                            ));
    var $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese el nombre del integrante ',
                'last' => true
             )
        ),
        'grado' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese el grado escolar del integrante ',
                'last' => true
             )
        ),
        'edad' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese la edad del integrante ',
                'last' => true
             )
        ),
        'genero' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese el genero del integrante ',
                'last' => true
             )
        )
    );
   }
   
?>