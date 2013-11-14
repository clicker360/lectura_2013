<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="formLogin">
    <?php
    echo $this->Form->create('User',array('url'=>'/reportes/login'));
    echo $this->Form->input('username',array('label'=>'Usuario: '));
    echo $this->Form->input('password',array('label'=>'Password: '));
    echo $this->Form->end('Enviar');

    ?>
</div>
