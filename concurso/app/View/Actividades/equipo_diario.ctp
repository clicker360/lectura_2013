<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo json_encode($actividades);
?>
<!--<h1 id="welcomeHeader">Diario Colectivo</h1>-->

<div id="splitter"></div>

<div class="nombreEquipo"><span>Equipo: </span><?php echo $equipo['Equipo']['nombre']; ?></div>
<div class="diariosRealizados"><h2><span>Diarios realizados: </span><?php echo $diariosCount; ?>/13</h2></div>
    <?php
        $diariosTabla = array();
        $actual = array();
        foreach($semana as $s){
            $actual[] = array(
                0 => $s,
                1 => $semanas[$s],
                2 => $this->Html->link( (in_array($s,$diarioActual)) ? 'Editar': 'Realizar','/CargaDiario/'.$s.'/'.$equipo['Equipo']['id'],array('class'=>'botonSmall hacerDiario'))
            );
        }
        if($diarioActual){            
            
        }        
        $diariosTabla = $actual;
        foreach($semanas as $k => $s){
            if(!in_array($k, $semanasDiarios) && !in_array($k,$semana)){
                $diarioSemana = array(
                    0 => $k,
                    1 => $s,
                    2 => '<div class="botonSmall noRealizadoDiario">No realizado</div>'
                );
                $diariosTabla[] = $diarioSemana;
            }else if(in_array($k, $semanasDiarios)){
                $diarioSemana = array(
                    0 => $k,
                    1 => $s,
                    2 => '<div class="botonSmall RealizadoDiario">Realizado</div>',
                    3 => $this->Html->link('Ver','/CargaDiario/'.$k.'/'.$equipo['Equipo']['id'],array('class'=>'botonSmall verDiario'))
                );
                $diariosTabla[] = $diarioSemana;
            }
        }
        foreach($diarios as $kd => $d){
            $diarioSemana = array(
                0 => $d['EquipoDiario']['semana'],
                1 => $semanas[$d['EquipoDiario']['semana']],
                2 => $this->Html->link('Ver','/CargaDiario/'.$d['EquipoDiario']['semana'].'/'.$equipo['Equipo']['id'],array('class'=>'botonSmall hacerDiario'))
            );
            //$diariosTabla[] = $diarioSemana;
        }
    ?>

<div class="actividadesBoxes">
<div>
    <h2>Lista de Diarios</h2>
    <table class="restoActividades" id="informativoTabla">
        <?php echo $this->Html->tableCells($diariosTabla); ?>
    </table>
</div>
</div>

<div class="regresar"><?php echo $this->Form->button('Regresar',array('class'=>'regresarEquiposDiarios'))?></div>
<script type="text/javascript">
$(".regresarEquiposDiarios").click(function(){
    $(".equiposDiario").show();
    $(".cargaAjaxDiario").html('');
    return false;
})
$(".hacerDiario, .verDiario").click(function(){
    var href = $(this).attr('href')
    $.get(href,function(diario){
        $(".equiposDiario").hide();
        $(".cargaAjaxDiario").html(diario);
    })
    return false;
})

</script>