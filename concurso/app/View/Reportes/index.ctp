<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $this->Html->script(array('jquery/datepicker','jquery/eye','jquery/utils','jquery/layout'));
?>
<div class="formFiltro">
    <?php
     echo $this->Form->create('Filtro',array('url'=>array('controller'=>'reportes','action'=>'index')));
     echo $this->Form->input('Model',array('label' => 'Ver por: ','default'=>'Profesor','options' => array(
                                                                                     '' => 'Selecciona',
                                                                                     'Profesor' => 'Profesores',
                                                                                     'Equipo' => 'Equipos'
                                                                                     )));
     echo $this->Form->input('Inicio',array('label' => 'Desde: '));
     echo $this->Form->input('Fin',array('label' => 'Hasta: '));
     echo $this->Form->end('Generar');
    ?>
</div>
<div class="formXls">
    <?php
    echo $this->Form->create('Xls',array('url'=>array('controller'=>'reportes','action'=>'xls')));
    echo $this->Form->input('Model',array('type'=>'hidden','label'=>false,'div'=>false,'value'=>$model));
    echo $this->Form->input('Inicio',array('type'=>'hidden','label'=>false,'div'=>false,'value'=>$inicio.' 00:00:00'));
    echo $this->Form->input('Fin',array('type'=>'hidden','label'=>false,'div'=>false,'value'=>$fin.' 23:59:59'));
    echo $this->Form->end('Generar xls');
    ?>
</div>
<h2>
    Total de registros: <?php echo count($registros); ?>
</h2>
<table class="reporte">
    <?php $this->TablaReporte->displayHeaders($fields); ?>
    <?php $this->TablaReporte->displayCells($fields, $registros); ?>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $('#FiltroInicio').DatePicker({
	format:'Y-m-d',
	date: ($('#FiltroInicio').val()) ? $('#FiltroInicio').val() : new Date(),
	current: ($('#FiltroInicio').val()) ? $('#FiltroInicio').val() : new Date(),
        locale: {
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            daysMin:['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            weekMin: 'Sm',
	},
	onBeforeShow: function(){
		$('#FiltroInicio').DatePickerSetDate(($('#FiltroInicio').val()) ? $('#FiltroInicio').val() : new Date(), true);
	},
	onChange: function(formated, dates){
                $('#FiltroInicio').val(formated);
		$('#FiltroInicio').DatePickerHide();
	}
    });
    $('#FiltroFin').DatePicker({
	format:'Y-m-d',
	date: ($('#FiltroFin').val()) ? $('#FiltroFin').val() : new Date(),
	current: ($('#FiltroFin').val()) ? $('#FiltroFin').val() : new Date(),
        locale: {
            days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            daysMin:['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            weekMin: 'Sm',
	},
	onBeforeShow: function(){
		//$('#FiltroFin').DatePickerSetDate(($('#FiltroFin').val()) ? $('#FiltroFin').val() : new Date(), true);
	},
	onChange: function(formated, dates){
                $('#FiltroFin').val(formated);
		$('#FiltroFin').DatePickerHide();
	}
    });
})
</script>
