<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#ffffff">
    <div>
        <h1 align="center">
            <strong>¡Gracias por participar en la 3ra Olimpiada de Lectura!</strong>
        </h1>
        <h2 align="center">Estos son los datos de tu cuenta:</h2>
    </div>
    <h3 align="center">
        Correo electrónico: <?php echo $datos['Profesor']['correo']; ?><br>
        Contraseña: <?php echo $datos['Profesor']['repeat_password']; ?>
    </h3>
    <div>
        <div>
            <h3 align="center">Espera las actividades a partir del 18 de noviembre. 
            </h3>
            <div class="yj6qo"></div>            
        </div>        
    </div>
<!--<table style="border: 0px; border-collapse: collapse; padding: 0px;display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="620">
  <tr>
   <td><a href="http://olimpiadadelectura.org/" target="_blank"><img name="mailinglectura_r1_c1" src="<?php echo $this->Html->url('/',true); ?>img/mailinglectura_r1_c1.jpg" width="620" height="349" id="mailinglectura_r1_c1" alt="" style="display: block;" /></a></td>
  </tr>
  <tr>
   <td width="620" height="321" style="background:url(<?php echo $this->Html->url('/',true); ?>img/mailinglectura_r2_c1.jpg) repeat;" valign="top">
	<p style="margin:0;padding:20px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Hola <?php echo $datos['Profesor']['nombre']; ?>,</p>
	<p style="margin:0;padding:5px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Hacemos de tu conocimiento a través de esta comunicación que ya hemos recibido tu registro para La Olimpiada de Lectura.</p>
        <p style="margin:0;padding:5px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Te invitamos a iniciar sesión en: www.olimpiadadelectura.org con tu nombre de usuario <i><?php echo $datos['Profesor']['correo']; ?></i>  y contraseña <i><?php echo $datos['Profesor']['repeat_password']; ?></i>  para que  comiences a dar de alta a tus equipos.</p>
        <p style="margin:0;padding:5px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Cualquier duda que tengas, por favor comunícate con nosotros a contacto@olimpiadadelectura.org</p>
   </td>
  </tr>
  <tr>
   <td><img name="mailinglectura_r3_c1" src="<?php echo $this->Html->url('/',true); ?>img/mailinglectura_r3_c1.jpg" width="620" height="67" id="mailinglectura_r3_c1" alt="" style="display: block;" /></td>
  </tr>
</table>-->
</body>
</html>