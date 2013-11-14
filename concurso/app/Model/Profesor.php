<?php

class Profesor extends AppModel{ 

   var $name = 'Profesor';
   
   public $useTable = 'profesores';
   
   public $hasOne = array(
       'Escuela' => array(
                    'foreignKey' => 'profesores_id'
            )
       );
   public $hasMany = array(
       'Equipo' => array(
                    'foreignKey' => 'profesores_id'
            )
       );
    var $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese su nombre.',
                'last' => true
             )
        ),
        'correo' => array(
            'email' => array(
                'rule' => array('email', true),
                'message' => 'Por favor ingrese un correo electrónico valido.',
                'last' => true
             ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'El correo electrónico ingresado ya esta en uso.',
                'last' => true
             )
        ),
        'usuario' => array(
            'required' => array(
                'rule' => array('minLength', '1'),
                'message' => 'Por favor ingrese un nombre de usuario.',
                'last' => true
             ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'El nombre de usuario ingresado ya esta en uso.',
                'last' => true
             )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('minLength', '6'),
                'message' => 'La contraseña debe ser mayor a 6 caracteres.',
                'last' => true
             )
        ),
        /*'tel_lada' => array(
            'between' => array(
                'rule' => array('between', 2, 3),
                'message' => 'La clave lada debe contener entre 2 y 3 digitos.',
                'last' => true
             ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Ingrese únicamente números para la clave lada.',
                'last' => true
             )
        ),
        'tel_local' => array(
            'between' => array(
                'rule' => array('between', 7, 8),
                'message' => 'El número local debe contener entre 7 y 8 digitos.',
                'last' => true
             ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Ingrese únicamente números para el telefono local.',
                'last' => true
             )
        ),*/
    );
   }
   
?>