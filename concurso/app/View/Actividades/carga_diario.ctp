<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--<h1 id="welcomeHeader">Diario Colectivo</h1>-->

<div id="splitter"></div>

<div class="nombreEquipo"><span>Equipo: </span><?php echo $equipo['Equipo']['nombre']; ?></div>
<!--<div class="diariosRealizados"><h2><span>Diarios realizados: </span><?php echo $diariosCount; ?>/13</h2></div>-->
<div class="semanaNombre"><h2><?php echo $semanaNombre; ?></h2></div>
<?php
echo $this->Form->create('EquipoDiario',array('url'=>'/guardaDiario','ENCTYPE' => "multipart/form-data"));
echo $this->Form->input('EquipoDiario.id',array('disabled'=>!$edit));
echo $this->Form->hidden('EquipoDiario.equipo_id',array('type'=>'text','disabled'=>!$edit));
echo $this->Form->hidden('EquipoDiario.semana',array('type'=>'text','disabled'=>!$edit));
echo $this->Form->input('EquipoDiario.esta_semana_leimos',array('label'=>'1) Estos días leímos… (Máximo 60 palabras): ','class'=>'diario_1','disabled'=>!$edit));
echo '<div class="error error_1"></div>';
echo $this->Form->input('EquipoDiario.realizamos',array('label'=>'2) Realizamos … (Máximo 60 palabras): ','class'=>'diario_2','disabled'=>!$edit));
echo '<div class="error error_2"></div>';
echo $this->Form->input('EquipoDiario.mas_nos_gusto',array('label'=>'3) Lo que más nos gustó… (Máximo 60 palabras): ','class'=>'diario_3','disabled'=>!$edit));
echo '<div class="error error_3"></div>';
echo $this->Form->input('EquipoDiario.no_nos_gusto',array('label'=>'4) Lo que no nos gustó… (Máximo 60 palabras): ','class'=>'diario_4','disabled'=>!$edit));
echo '<div class="error error_4"></div>';
echo $this->Form->input('EquipoDiario.que_descubrimos',array('label'=>'5) Lo que descubrimos… (Máximo 60 palabras): ','class'=>'diario_5','disabled'=>!$edit));
echo '<div class="error error_5"></div>';
echo $this->Form->input('EquipoDiario.mas_dificil',array('label'=>'6) Lo que nos pareció difícil… (Máximo 60 palabras): ','class'=>'diario_6','disabled'=>!$edit));
echo '<div class="error error_6"></div>';
echo $this->Form->input('EquipoDiario.quisieramos_que',array('label'=>' 7) Quisiéramos que… (Máximo 60 palabras): ','class'=>'diario_7','disabled'=>!$edit));
echo '<div class="error error_7"></div>';
//echo $this->Form->input('EquipoDiario.la_siguiente_semana',array('label'=>'6) La siguiente semana… (Máximo 60 palabras): ','class'=>'diario_6','disabled'=>!$edit));
//echo '<div class="error error_6"></div>';
echo $this->Form->input('EquipoDiario.quisieramos_comentar',array('label'=>'8) Quisiéramos comentar que… (reflexiones, dudas, comentarios sobre la experiencia de leer este libro) (Máximo 60 palabras): ','class'=>'diario_8','disabled'=>!$edit));
echo '<div class="error error_8"></div>';
//ALTER TABLE  `equipo_diario` ADD  `que_descubrimos` TEXT NOT NULL AFTER  `no_nos_gusto` , ADD  `mas_dificil` TEXT NOT NULL AFTER  `que_descubrimos`
?>

    <div id="fotos_registro">
        <?php if(isset($diario['EquipoDiario']['fotografia_1']) && $diario['EquipoDiario']['fotografia_1']){ ?>
            <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/diario/'.$diario['EquipoDiario']['fotografia_1'])?>">
        <?php }else{ ?>
            <?php if($edit){ ?>
                <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/img/defaults/nino.jpg') ?>">
            <?php }else{ ?>
                <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/img/defaults/nino_gray.jpg') ?>">
            <?php } ?>
        <?php } ?>
        <?php if(isset($diario['EquipoDiario']['fotografia_2']) && $diario['EquipoDiario']['fotografia_2']){ ?>
            <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/diario/'.$diario['EquipoDiario']['fotografia_2'])?>">
        <?php }else{ ?>
             <?php if($edit){ ?>
                <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/img/defaults/nina.jpg') ?>">
            <?php }else{ ?>
                <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/img/defaults/nina_gray.jpg') ?>">
             <?php } ?>
        <?php } ?>
        <?php if(isset($diario['EquipoDiario']['fotografia_3']) && $diario['EquipoDiario']['fotografia_3']){ ?>
            <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/diario/'.$diario['EquipoDiario']['fotografia_3'])?>">
        <?php }else{ ?>
             <?php if($edit){ ?>
                <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/img/defaults/nino_moreno.jpg') ?>">
            <?php }else{ ?>
                <img class="fotoThumbs_registro" src="<?php echo $this->Html->url('/img/defaults/nino_moreno_gray.jpg') ?>">
             <?php } ?>
        <?php } ?>        
    </div>
<?php
if($edit){
        echo $this->Form->input('EquipoDiario.fotografia_1',array('class'=>'diario_8 fotoFile_registro','label'=>'8) Fotografía 1 (Tipo de archivo .jpg .bmp .gif  Peso máximo: 300 kb): ','disabled'=>!$edit,'type'=>'file'));        
        echo $this->Form->input('EquipoDiario.fotografia_2',array('class'=>'diario_9 fotoFile_registro','label'=>'9) Fotografía 2 (Tipo de archivo .jpg .bmp .gif  Peso máximo: 300 kb): ','disabled'=>!$edit,'type'=>'file'));        
        echo $this->Form->input('EquipoDiario.fotografia_3',array('class'=>'diario_10 fotoFile_registro','label'=>'10) Fotografía 3 (Tipo de archivo .jpg .bmp .gif  Peso máximo: 300 kb): ','disabled'=>!$edit,'type'=>'file'));       
}
?>
<div id="botonera">
<div class="return">
<?php
echo $this->Form->button('Regresar',array('href'=>$this->Html->url('/EquipoDiario/'.$equipo['Equipo']['id'],true),'class'=>'regresarListaDiario alineado','type'=>'button'));
?>
</div>
<?php
if($edit)
    echo $this->Form->end('Guardar');
?>
</div>
<script type="text/javascript">
$(".regresarListaDiario").click(function(){
    var href = $(this).attr('href')
        $.get(href,function(lista){
            $(".equiposDiario").hide();
            $(".cargaAjaxDiario").html(lista);
        })
    return false;
})
$("#EquipoDiarioCargaDiarioForm").submit(function(){
    valid = true;
    $(".error").html('');
    $(".error").hide();
    $("textarea").each(function(){
        var id = $(this).attr('class').replace('diario_','');
        var value = $.trim($(this).val()).replace('  ',' ');
        valueCount = value.split(' ').length
        var palabrasMaximo = 60
        if(value == ''){
            $(".error_"+id).html('Debes ingresar este campo.');
                 $(".error_"+id).show();
            valid = false;
        }else{
            if(valueCount > palabrasMaximo){
                $(".error_"+id).html('Este campo debe contener como maximo '+palabrasMaximo+' palabras.');
                 $(".error_"+id).show();
                valid = false;
            }
        }        
        console.log(".error_"+id);
    });
    <?php /*if($nuevo){ ?>
        $("input[type=file]").each(function(){
            var id = $(this).attr('class').replace('diario_','');
            var value = $(this).val();
            if(!value){
                $(".error_"+id).html('Debe subir esta fotografia.');
                valid = false;
            }

        })
    <?php }*/ ?>
    return valid;
})
</script>
<style>
    #EquipoDiarioCargaDiarioForm textarea,
    #EquipoDiarioCargaDiarioForm input{
        width: 100%;
        position: relative;
        float: left;
        border: none;
        background-color: #f98381;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        margin-top: 10px;
        border: 10px solid #f5efd9;
        padding: 10px;
    }
    #EquipoDiarioCargaDiarioForm #fotos_registro{
        margin: 50px auto;
    }
    #EquipoDiarioCargaDiarioForm #fotos_registro img {
        width: 32%;
        padding: 2px;
    }
    #EquipoDiarioCargaDiarioForm .return button{
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
    #EquipoDiarioCargaDiarioForm .submit input{
        float: left;
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
        width: 110px;
    }
    .error{
        text-transform: uppercase;
        color: red;
        text-align: center;
        width: 100%;
        font-size: 22px;
    }
    
</style>