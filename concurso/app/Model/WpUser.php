<?php

class WpUser extends AppModel
 { 
   var $name = 'WpUser';
   public $hasMany = array(
        'WpUserMeta' => array(
            'className' => 'WpUserMeta',
            'foreignKey' => 'user_id',
        )
    );
   var $useTable = 'wp_users';
   
 }
   
?>