<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo json_encode($actividades);
?>
<?php /* 
<h1 id="welcomeHeader">Bienvenido a la Olimpiada de Lectura</h1>
<div class="welcomeBoxes">
<div class="boxLeft">
<p>Esta guía ofrece información y actividades para conformar y/o consolidar un Círculo de Lectura que les permita leer acompañados, mostrar evidencias de lectura y proponer y llevar a cabo, a partir de su experiencia, un  proyecto de lectura para invitar a otras personas de su escuela y de su comunidad a leer.  Te invitamos a descargar la “Guía práctica para realizar Círculos de Lectura en la escuela primaria a continuación:</p>
</div>
<div class="boxRight fix">
<a class="downloadActividades" href="../wp-content/downloads/guia_circulo_de_lectura.pdf" target="_blank">Descargar</a>
</div>
</div>

*/ ?>

<div id="splitter"></div>

<div class="nombreEquipo"><span>Equipo: </span><?php echo $equipo['Equipo']['nombre']; ?></div>

<div class="actividadesBoxes">
    <div class="left">
        <h2>Actividades Disponibles</h2>
        <?php
        $acts_inf = array();
        $acts_lit = array();
        ?>
        <?php echo $this->Form->input('tipos',array('options'=>array('informativo' => 'Informativos', 'literario' => 'Literarios'),'label'=>'Tipo: ','id'=>'select_tipo'));

            foreach($restoActividades as $ka => $a){
                $act = array(
                $a['Actividad']['numero'],
                $a['Actividad']['titulo'],
                (count($actividades) < 5) ? '<div class="hacerActividadDiv"><div>'.$this->Html->link('Realizar','/CargaActividad/'.$a['Actividad']['id'].'/'.$equipo['Equipo']['id'],array('class'=>'botonSmall hacerActividad')).'</div></div>' : ''
                );
                if($a['Actividad']['tipo'] == 'informativo'){
                    $acts_inf[] = $act;
                }else if($a['Actividad']['tipo'] == 'literario'){
                    $acts_lit[] = $act;
                }  
            }
        ?>

        <table class="restoActividades" id="informativoTabla">
            <?php echo $this->Html->tableCells($acts_inf); ?>
        </table>
        <table class="restoActividades" id="literarioTabla" style="display:none;">
            <?php echo $this->Html->tableCells($acts_lit); ?>

        </table>
    </div>
    <div class="right">
        <h2>Actividades Realizadas</h2>
        <div class="countRealizadas"><span>Tu equipo lleva: </span><?php echo count($actividades); ?>/5 <span>actividades realizadas. Recuerda que la fecha límite para enviar las evidencias de las 5 actividades requeridas del Bloque 1, es el 19 de diciembre de 2013.</span></div>
        <table class="actividadEquipo">
        <?php foreach($actividades as $ka => $a){ ?>
            <?php $act = array(
                $a['Actividad']['numero'],
                $a['Actividad']['titulo'],
                '<div class="hacerActividadDiv"><div>'.$this->Html->link('Editar','/CargaActividad/'.$a['Actividad']['id'].'/'.$equipo['Equipo']['id'],array('class'=>'botonSmall hacerActividad')).'</div></div>',
                '<div class="hacerActividadDiv"><div>'.$this->Html->link('Eliminar','/BorraActividad/'.$a['Actividad']['id'].'/'.$equipo['Equipo']['id'],array('class'=>'botonSmall borrarActividad','onclick'=>"return confirm('¿Desea eliminar esta actividad?');")).'</div></div>'
            ); ?>
            <?php echo $this->Html->tableCells($act); ?>
        <?php } ?>
        </table>        
        <div class="regresar"><?php echo $this->Form->button('Regresar',array('class'=>'regresarEquiposActividades'))?></div>
    </div>
</div>
<script type="text/javascript">
$(".regresarEquiposActividades").click(function(){
    $(".equiposActividades").show();
    $(".cargaAjaxActividades").html('');
    return false;
})
$(".hacerActividad").click(function(){
    var href = $(this).attr('href')
    $.get(href,function(equipos){
        $(".equiposActividades").hide();
        $(".cargaAjaxActividades").html(equipos);
    })
    return false;
})
$("#select_tipo").change(function(){
    $(".restoActividades").hide();
    $("#"+$(this).val()+'Tabla').show();
})
/*$(".borrarActividad").click(function(){
    
})*/
    
</script>
<style>
    .actividadesBoxes .left{
        width: 50%;
        float: left;
    }
    .actividadesBoxes .right{
        width: 50%;
        float: right;
    }
    select#select_tipo{
        background: #a91616;
        border: none;
        color: #f5d743;
        margin-left: 0px;
        width: 70%;
        padding: 5px;
        font-size: 1em;
    }
    .restoActividades tr td{
        padding: 5px;
    }
    .hacerActividadDiv{
        float: left;
        border: none;
        width: 100px;
        height: 42px;
        background-color: #FFFFFF;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        left: 70%;
        margin-top: 10px;
        padding-left: 4px;
    }
    .hacerActividadDiv div{
        width: 90px;
        height: 32px;
        background-color: blue;
        background-color: #3eadc4;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        right: 30%;
        margin-top: 5px;
        text-align: center;
        font-size: 18px;
    }
    .hacerActividadDiv div a, .hacerActividadDiv div a:hover{
        text-decoration: none;
        color: #FFFFFF;
    }
    .regresar button{
        float: right;
        margin-top: 30px;
        position: relative;
        border: none;
        background-color: #66a7db;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        border:  10px solid #f5efd9;
        padding: 10px;
        color: #FFFFFF;
    }
    .actividadEquipo tr td{
        padding: 0px 5px;
    }
</style>