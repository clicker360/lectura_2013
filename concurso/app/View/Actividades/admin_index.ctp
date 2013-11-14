<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$headers = array(
    'numero' => 'Número',
    'titulo' => 'Titulo',
    'actividad' => 'Actividad',
    'recuerden_que' => 'Recuerden que',
    'tipo' => 'Tipo',
    'etapa' => 'Etapa'
);
?>
<div style="float: left; width: 20%;">
    <?php echo $this->Html->link('Agregar actividad',array('action'=>'add','controller'=>'actividades')); ?>
</div>
<div style="float: left; width: 80%;">
    <table style="border-collapse: collapse;">
        <tr>
            <?php foreach($headers as $k => $h){ ?>
            <td style="width: 200px; border: 1px solid black;"><?php echo $h; ?></td>
            <?php } ?>
            <td style="width: 200px; border: 1px solid black;">Editar</td>
            <td style="width: 200px; border: 1px solid black;">Eliminar</td>
        </tr>
        <?php foreach($actividades as $ka => $a){ ?>
        <tr>
            <?php foreach($headers as $kh => $h){ ?>
            <td style="width: 200px; border: 1px solid black;"><?php echo $a['Actividad'][$kh]; ?></td>
            <?php } ?>
            <td style="width: 200px; border: 1px solid black;"><?php echo $this->Html->link('Editar',$this->Html->url('/admin/actividades/edit/'.$a['Actividad']['id'],true)); ?></td>
            <td style="width: 200px; border: 1px solid black;"><?php echo $this->Html->link('Eliminar',$this->Html->url('/admin/actividades/delete/'.$a['Actividad']['id'],true),array('class'=>'delete')); ?></td>
        </tr>
        <?php }?>

    </table>
</div>
<script type="text/javascript">
    $(".delete").click(function(){
        if(confirm('¿Deseas eliminar esta actividad?')){
            return true;
        }else{
            return false;
        }
    })
</script>
