<?php

/*$password_hashed = '$P$B55D6LjfHDkINU5wF.v2BuuzO0/XPk/';
$plain_password = 'clicker360';

$hash = wp_hash_password( $plain_password );

echo $hash;*/
?>
<?php 
if(isset($_GET['key']) && $_GET['key'] && isset($_GET['keyh']) && $_GET['keyh']){
    require_once( ABSPATH . 'wp-includes/class-phpass.php');
    $wp_hasher = new PasswordHash(8, TRUE);
    $password_hashed = $_GET['keyh'];
    $plain_password = $_GET['key'];

    if($wp_hasher->CheckPassword($plain_password, $password_hashed)) {
        echo "1";
    } else {
        echo "0";
    }
}
?>
