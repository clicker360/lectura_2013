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
        <title>mailinglectura.png</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body >

        <div>
            <h1 align="center">
                <strong>Hola <?php echo $datos['Profesor']['nombre']; ?></strong>
            </h1>
            <h2 align="center">Has solicitado la renovación de tu contraseña para tu cuenta de Olimpiada de Lectura.</h2>
            <h2 align="center">Haz clic en la siguiente liga para continuar con esta solicitud y obtener tu nueva contraseña.</h2>
        </div>
        <h3 align="center">
           <?php echo $this->Html->url('/recuperar/' . $datos['Profesor']['codigo_recuperacion'], true); ?>
        </h3>
        <!--<table style="border: 0px; border-collapse: collapse; padding: 0px;display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="620">
            <tr>
                <td><a href="http://olimpiadadelectura.org/" target="_blank"><img name="mailinglectura_r1_c1" src="<?php echo $this->Html->url('/', true); ?>img/mailinglectura_r1_c1.jpg" width="620" height="349" id="mailinglectura_r1_c1" alt="" style="display: block;" /></a></td>
            </tr>
            <tr>
                <td width="620" height="321" style="background:url(<?php echo $this->Html->url('/', true); ?>img/mailinglectura_r2_c1.jpg) repeat;" valign="top">
                    <p style="margin:0;padding:20px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Hola <?php echo $datos['Profesor']['nombre']; ?>,</p>
                    <p style="margin:0;padding:5px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Has solicitado la renovación de tu contraseña para tu cuenta de Olimpiada de Lectura.</p>
                    <p style="margin:0;padding:5px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;">Haz clic en la siguiente liga para continuar con esta solicitud y obtener tu nueva contraseña.</p>
                    <p style="margin:0;padding:5px 40px 12px;font-family:Arial,Sans-Serif;font-size:18px;color:#222;"><?php echo $this->Html->url('/recuperar/' . $datos['Profesor']['codigo_recuperacion'], true); ?></p>
                </td>
            </tr>
            <tr>
                <td><img name="mailinglectura_r3_c1" src="<?php echo $this->Html->url('/', true); ?>img/mailinglectura_r3_c1.jpg" width="620" height="67" id="mailinglectura_r3_c1" alt="" style="display: block;" /></td>
            </tr>
        </table>-->
    </body>
</html>
