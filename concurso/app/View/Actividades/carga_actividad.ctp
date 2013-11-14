<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
inputsMaxLength = new Array();
</script>
<div class="dataActividades">
	<div>
	    <span>Número:</span> <?php echo $actividad['Actividad']['numero']?>
	</div>
	<div>
	    <span>Tipo:</span> <?php echo $actividad['Actividad']['tipo']?>
	</div>
	<div>
	    <span>Título:</span> <?php echo $actividad['Actividad']['titulo']?>
	</div>
	<div>
	    <span>Objetivo:</span> <?php echo $actividad['Actividad']['objetivo']?>
	</div>
	<div>
	    <span>Actividad:</span> <?php echo $actividad['Actividad']['actividad']?>
	</div>
</div>
<h2>Evidencias:</h2>
<div class="actividadesBoxes">
<?php echo $this->Form->create('EquipoActividad',array('url'=>'/guardaActividad','ENCTYPE' => "multipart/form-data")); ?>
<div class="boxLeft2">
<?php
echo $this->Form->hidden('EquipoActividad.id');
echo $this->Form->hidden('EquipoActividad.actividad_id',array('value'=>$actividad_id));
echo $this->Form->hidden('EquipoActividad.equipo_id',array('value'=>$equipo_id));
$c = 0;
$params = array();
foreach($actividad['Evidencia'] as $k => $e){ 
    $params[$k] = array(
        'id' => $k,
        'evidencia_id' => $e['id'],
        'numero' => $e['numero_evidencia'],
        'label' => $e['pregunta'],
        'type' => $e['tipo'],
        'length' => array($e['maximo'],$e['maximo_tipo'])
    );
    $c++;
}
ksort($params);
foreach($params as $kp => $p){ 
    echo $this->Actividades->createInput($p,$edit);
    //echo $this->data['Respuesta'][$kp]['value'];
    //echo $p['type'];
?>
<script type="text/javascript">
inputsMaxLength[<?php echo ($p['numero']-1); ?>] = ['<?php echo $p['length'][0]; ?>', '<?php echo $p['length'][1]; ?>'];
</script>
<?php
if($p['type'] == 'imagen' && (isset($this->data['Respuesta'][$kp]['value']) && $this->data['Respuesta'][$kp]['value']))
    echo $this->Html->image('../evidencias/'.$this->data['Respuesta'][$kp]['value'],array('style'=>'width: 210px; display: inline-block; padding: 0 35px 5px 0; float:right;'));

}
?>
</div>
<div class="boxRight">
</div>

<div class="return">
<?php
echo $this->Form->button('Regresar',array('type'=>'button', 'href'=>$this->Html->url('/EquipoActividades/'.$equipo_id,true),'class'=>'regresarListaActividades alineado botonesActividades'));
?>
</div>
<?php
echo $this->Form->end('Guardar', array('class'=>'botonesActividades'));
?>
</div>
<script type="text/javascript">
$("#EquipoActividadCargaActividadForm").submit(function(){
    valid = true
    $(".error").html('');
    /*$(".validate").each(function(){
        var value = $.trim($(this).val());
        var length = $(this).val().length
        var id = $(this).attr('id').substring('9', $(this).attr('id').length).substring('0','1')
        if(!value || value == ''){            
            valid = false;
            $(".error_"+id).html('Debes ingresar este campo.');
            console.log(inputsMaxLength[id]);
        }
        var MaxLength = inputsMaxLength[id];
        if(MaxLength[0] > 0){
            if(MaxLength[1] == 'palabras'){
                valueCount = value.split(' ')
                console.log(valueCount.length);
                if(valueCount.length > MaxLength[0]){
                    valid = false;
                    $(".error_"+id).html('El maximo de palabras debe ser de '+MaxLength[0]+'.');
                }
              
            }else if(MaxLength[1] == 'caracteres'){
                if(length > MaxLength[0]){
                    valid = false;
                    $(".error_"+id).html('El maximo de caracteres debe ser de '+MaxLength[0]+'.');
                }
            }
        }
    })*/
    return valid;
});
$(".regresarListaActividades").click(function(){
    var href = $(this).attr('href')
        $.get(href,function(equipos){
            $(".equiposActividades").hide();
            $(".cargaAjax").html(equipos);
        })
    return false;
})
</script>
