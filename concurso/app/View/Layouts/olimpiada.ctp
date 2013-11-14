<?php
/**
  Aqui iba algo
 */
$home = str_replace('concurso/', '', $this->Html->url('/', true) . '/layout');
$html = file_get_contents($home);
$separador_header = '<!-- Header Fin-->';
$separador_footer = '<!-- Footer Inicio-->';
$fin_header = strpos($html, $separador_header);
$inicio_footer = strpos($html, $separador_footer);
$header = substr($html, 0, $fin_header + strlen($separador_header));
$footer = substr($html, $inicio_footer, strlen($html));
echo $header;
?>
<?php ?>
<div class="contenedor-menu fullcol clearfix" id="menu-contenedor">
    <?php if($this->Session->check('Profesor')) { ?>
        <div class="contenedor-menu-interior wrap clearfix">
            <nav role="navigation">
                <ul id="menu-menu-principal-1" class="nav top-nav clearfix responsiveSelectFullMenu">
                    <li class="mi-perfil">
                        <a href="<?php echo $this->Html->url(array('controller'=>'site','action'=>'perfil')); ?>" id="li_mis_datos" class="li_tab">
                            Mi perfil
                        </a>
                    </li>
                    <li class="mis-actividades">
                        <a href="<?php echo $this->Html->url(array('controller'=>'site','action'=>'perfil')); ?>" id="li_mis_actividades" class="li_tab">
                            Mis actividades
                        </a>
                    </li>
                    <li class=mis-equipos">
                        <a href="<?php echo $this->Html->url(array('controller'=>'site','action'=>'perfil')); ?>?tab=mis_equipos" id="li_mis_equipos" class="li_tab">
                            Mis equipos
                        </a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-171">
                        <a href="#">
                            Actividades
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item-20">
                                <a href="<?php echo $this->Html->url(array('controller'=>'site','action'=>'perfil')); ?>?tab=descargas" id="li_descargas" class="li_tab" >
                                    Descargas
                                </a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49">
                                <a href="<?php echo $this->Html->url(array('controller'=>'site','action'=>'perfil')); ?>?tab=retroalimentacion" id="li_retroalimentacion" class="li_tab" >
                                    Retroalimentación
                                </a>
                            </li>
                        </ul>
                    </li>                
                    <li class=dudas">
                        <a href="<?php echo $this->Html->url(array('controller'=>'site','action'=>'perfil')); ?>?tab=dudasTecnicas" id="li_dudasTecnicas" class="li_tab">
                            Dudas técnicas
                        </a>
                    </li>                
                </ul>						
            </nav>
        </div>	
    <?php } ?>
</div>
<div id="content"> <!-- Contenedor General -->

    <!-- Comienza Fondo Personalizado -->
    <style type="text/css">

        #content{

            background: url(http://localhost/lectura_2013/wp-content/uploads/2013/09/fondo1.jpg) repeat;

        }

    </style>

    <!-- Comienza Contenido -->

    <div id="inner-content" class="wrap clearfix"> <!-- Contenedor Interno -->

        <div id="main" class="twelvecol first clearfix perfil" role="main"> <!-- Contenedor Principal -->
            <div class="hldr-general">
                <div class="smbrA"></div>
                <div class="box-contC mrgnUP">
                    <h3><?php echo $this->Session->flash('good'); ?></h3>
                    <h3><?php echo $this->Session->flash('bad'); ?></h3>
                    <!--Principal-->
                    <?php echo $this->fetch('content'); ?>
                    <!-- Principal -->
                </div>
            </div>
            <!-- Bloque General -->
            
        </div> <!-- Contenido Principal -->
    </div> <!-- Contenedor Interno -->
</div>
            <?php
            echo $footer;
            
            ?>
<script type="text/javascript">
    $(".tab").hide();
    <?php if(!$id_equipo){ ?>
    $(".tab:first").show();
    $('a#li_mis_datos').addClass('activo');
    <?php }else{ ?>
    $(".tab#mis_actividades").show();
    $('a#li_mis_actividades').addClass('activo');
    $.get('<?php echo $this->Html->url('/EquipoActividades/'.$id_equipo,true)?>',function(equipos){
        $(".equiposActividades").hide();
        $(".cargaAjax").html(equipos);
    });
    <?php } ?>
    <?php if($this->params->params['action'] == 'perfil') { ?>
        $(document).on('ready',function(){
            $(".form_perfil, .back_editar_perfil").hide();
            <?php if(isset($_GET['tab'])) { ?>
                $(".tab").hide();
                $("#<?php echo $_GET['tab']; ?>").show();
                var id = '<?php echo $_GET['tab']; ?>';
                var pajaro = $(".pajarito-home");
                switch(id){
                    case 'mis_datos':
                        pajaro.css('left','0%');
                        break;
                    case 'mis_equipos':
                        pajaro.css('left','25%');
                        break;
                    case 'descargas':
                        pajaro.css('left','50%');
                        break;
                    case 'retroalimentacion':
                        pajaro.css('left','50%');
                        break;
                    case 'dudasTecnicas':
                        pajaro.css('left','75%');
                        break;
                }
            <?php } ?>            
        });
        $("li").children('a.li_tab').on('click',function(e){
            e.preventDefault();
            id = $(this).attr('id').substring('3');
            $(".tab").hide();
            $(".tab#"+id).fadeIn(400).show();
            $('a.li_tab').removeClass('activo');
            $(this).addClass('activo');
            var pajaro = $(".pajarito-home");
            switch(id){
                case 'mis_datos':
                    pajaro.css('left','0%');
                    break;
                case 'mis_equipos':
                    pajaro.css('left','25%');
                    break;
                case 'descargas':
                    pajaro.css('left','50%');
                    break;
                case 'retroalimentacion':
                    pajaro.css('left','50%');
                    break;
                case 'dudasTecnicas':
                    pajaro.css('left','75%');
                    break;
            }
        });
        $(".EquipoActividades3").click(function(){
            var href = $(this).attr('href')
            $.get(href,function(equipos){
                $(".equiposActividades3").hide();
                $(".cargaAjaxActividades3").html(equipos);
            })
            return false;
        });
        $(".EquipoActividades32").click(function(){
            var href = $(this).attr('href')
            $.get(href,function(equipos){
                $(".equiposActividades32").hide();
                $(".cargaAjaxActividades32").html(equipos);
            })
            return false;
        });
        $(".EquipoActividades33").click(function(){
            var href = $(this).attr('href')
            $.get(href,function(equipos){
                $(".equiposActividades33").hide();
                $(".cargaAjaxActividades33").html(equipos);
            })
            return false;
        });
        $(".EquipoDiario").click(function(){
            var href = $(this).attr('href')
            $.get(href,function(equipo){
                $(".equiposDiario").hide();
                $(".cargaAjaxDiario").html(equipo);
            })
            return false;
        });
        $(".EquipoActividades").click(function(){
            var href = $(this).attr('href')
            $.get(href,function(equipo){
                $(".equiposActividades").hide();
                $(".cargaAjaxActividades").html(equipo);
            })
            return false;
        });
        $(".EquipoRegistro").click(function(){
            var href = $(this).attr('href')
            $.get(href,function(registro){
                $(".equiposRegistro").hide();
                $(".cargaAjaxRegistro").html(registro);
            })
            return false;
        });
        $(".btnEditarForm").on('click',function(e){
            e.preventDefault();
            $(".ul_perfil, .editar_perfil").hide();
            $(".form_perfil, .back_editar_perfil").show();
        });
        $(".btnBackEditarForm").on('click',function(e){
            e.preventDefault();
            $(".ul_perfil, .editar_perfil").show();
            $(".form_perfil, .back_editar_perfil").hide();
        });
    <?php } ?>
</script>
<style>
    
    .perfil #mis_datos{
        width: 40%;
        margin: 0 auto;   
        min-width: 400px;     
    }    
    .perfil #mis_equipos{
        display: table;
        width: 80%;
        margin: 0 auto;
    }
    .perfil #descargas{
        display: table;
        width: 30%;
        margin: 0 auto;
        min-width: 250px;
    }
    .perfil #retroalimentacion{
        display: table;
        width: 40%;
        margin: 0 auto;
        min-width: 250px;
    }
    .perfil #dudasTecnicas{
        display: table;
        width: 40%;
        margin: 0 auto;
        min-width: 250px;
    }
    .perfil .mensaje{
        color: #fff;
        margin-top: 1.2em;
        margin-bottom: 0.2em;
        text-indent: 20px;
        font-size: 1.2em;
        background-color: #a91616;
        text-transform: uppercase;
        -webkit-border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        border-radius: 15px 15px 0 0;
        height: 40px;
    }
    .perfil .mensaje a{
        color: #FFFFFF;
        text-decoration: none;
    }
    .perfil .form_perfil{
        display: table;
        width: 100%;
    }
    .perfil #mis_datos .mi_perfil{
        background: #d8762d;
        color: #ffffff;
        padding: 10px;
        overflow: hidden;
        -webkit-border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        border-radius: 0 0 15px 15px;
        -moz-box-shadow: inset 0 0 50px -8px #000000;
        -webkit-box-shadow: inset 0 0 30px -8px #000000;
        box-shadow: inset 0 0 30px -8px #000000;
    }
    .perfil #mis_datos .mi_perfil > div{        
        background-color: #a91616;        
        padding-left: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .perfil .info_perfil li, .perfil .form_perfil div{
        line-height: 2.5em;
    }
    .perfil #mis_datos .mi_perfil .editar_perfil,
    .perfil #mis_datos .mi_perfil .back_editar_perfil{
        position: absolute;
        border: none;
        width: 100px;
        height: 42px;
        right: 0;        
        background-color: #FFFFFF;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        right: 30%;
        margin-top: -10px;
        padding-left: 4px;
    }
    .perfil #mis_datos .mi_perfil .editar_perfil div,
    .perfil #mis_datos .mi_perfil .back_editar_perfil div{
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
    }
    .perfil #mis_datos .form_perfil div{
        clear: both;
    }
    .perfil #mis_datos .form_perfil label{
        float: left;
        width: 55%;
    }
    .perfil #mis_datos .form_perfil input,
    .perfil #mis_datos .form_perfil select{
        margin: 0;
        background: #ba2020;
        border: none;
        color: #f5d743;
        margin-left: 0px;
        width: 50%;
        padding: 5px;
        font-size: 1em;
        float: right;
        margin-right: 10px;
        width: 40%;
    }
    .perfil #mis_datos .mi_perfil .editar_perfil div a,
    .perfil #mis_datos .mi_perfil .back_editar_perfil div a{
        color: #FFFFFF;
        text-decoration: none;
        font-size: 20px;
    }
    .equipo_li{
        width: 40%;
        float: left;
        min-width: 250px;
    }
    .equipo_li.left{ 
        float: left;
    }
    .equipo_li.right{    
        float: right;
    }
    @media only screen and (max-width: 768px){
         .equipo_li{
            width: 100%;            
            min-width: 250px;            
            float: left !important;
         }
    }
    
    .equipo_li .equipo_head{
         color: #fff;
        margin-top: 1.2em;
        margin-left: -2px;
        text-indent: 20px;
        font-size: 1.2em;
        background-color: #bb5450;
        text-transform: uppercase;
        -webkit-border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        border-radius: 15px 15px 0 0;
        width: 101%;
        height: 30px;
        border: 2px solid #FFFFFF;
        
    }
    .equipo_li .equipo_content{
        background: #d8762d;
        color: #ffffff;
        padding: 10px;
        overflow: hidden;
        -webkit-border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        border-radius: 0 0 15px 15px;
        -moz-box-shadow: inset 0 0 50px -8px #000000;
        -webkit-box-shadow: inset 0 0 30px -8px #000000;
        box-shadow: inset 0 0 30px -8px #000000;
        width: 100%;
    }
    .equipo_li .equipo_content div{
        width: 100%;
        height: 80%;       
        background-color: #a91616;     
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        text-align: center;
    }
    .equipo_li .equipo_content div div{
        font-size: 36px;
        text-transform: uppercase;
    }
    @media only screen and (min-width: 768px){
        .nav li ul.sub-menu, .nav li ul.children{
            margin-top: 28px;
        }
        <?php if($this->Session->check('Profesro')){ ?>
        .pajarito-home{
            top: 350px;
        }
        <?php } ?>
        .nav li:nth-child(1) {
            width: 25%;
            margin-top: 0px;
        }
        .nav li:nth-child(2) {
            width: 25%;
        }
        .nav li:nth-child(3) {
            width: 25%;
        }
        .nav li:nth-child(4) {
            width: 25%;
        }
    }
    
    .perfil #descargas .descargas_ul a {
        text-decoration: none;
    }
    .perfil #descargas .descargas_ul a li{
        color: #fff;
        margin-top: 0.2em;
        margin-left: -2px;
        font-size: 1.2em;        
        text-transform: uppercase;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        width: 100%;
        height: 50px;
        border: 3px solid #FFFFFF;
        font-size: 32px;
        text-align: center;
    }
    .perfil #descargas .descargas_ul a:nth-child(1) li{
        background-color: #3eadc4;   
    }
    .perfil #descargas .descargas_ul a:nth-child(2) li{
        background-color: #3eadc4;   
    }
    .perfil #descargas .descargas_ul a:nth-child(3) li{
        /* Safari 4-5, Chrome 1-9 */
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#3eadc4), to(#7EC1CD));
        /* Safari 5.1+, Chrome 10+ */
        background: -webkit-linear-gradient(top, #3eadc4, #7EC1CD);
        /* Firefox 3.6+ */
        background: -moz-linear-gradient(top, #3eadc4, #7EC1CD);
        /* Opera 11.10+ */
        background: -o-linear-background(top, #3eadc4, #7EC1CD);
        /* IE 10 */
        background: -ms-linear-background(top, #3eadc4, #7EC1CD);
        /* estándar */
        background: linear-background(top, #3eadc4, #7EC1CD);   
    }
    .perfil #descargas .descargas_ul a:nth-child(4) li{
        /* Safari 4-5, Chrome 1-9 */
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#7EC1CD), to(#92d6df));
        /* Safari 5.1+, Chrome 10+ */
        background: -webkit-linear-gradient(top, #7EC1CD, #7EC1CD, #92d6df);
        /* Firefox 3.6+ */
        background: -moz-linear-gradient(top, #7EC1CD, #7EC1CD, #92d6df);
        /* Opera 11.10+ */
        background: -o-linear-background(top, #7EC1CD, #7EC1CD, #92d6df);
        /* IE 10 */
        background: -ms-linear-background(top, #7EC1CD, #7EC1CD, #92d6df);
        /* estándar */
        background: linear-background(top, #7EC1CD, #7EC1CD, #92d6df);   
    }
    .perfil #descargas .descargas_ul a:nth-child(5) li{
        /* Safari 4-5, Chrome 1-9 */
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#92d6df), to(#C1F4F9));
        /* Safari 5.1+, Chrome 10+ */
        background: -webkit-linear-gradient(top, #92d6df,#C1F4F9);
        /* Firefox 3.6+ */
        background: -moz-linear-gradient(top,#92d6df,#C1F4F9);
        /* Opera 11.10+ */
        background: -o-linear-background(top, #92d6df,#C1F4F9);
        /* IE 10 */
        background: -ms-linear-background(top, #92d6df,#C1F4F9);
        /* estándar */
        background: linear-background(top, #92d6df,#C1F4F9);  
        color: #7EC1CD; 
    }
    .perfil #descargas .descargas_ul a:nth-child(6) li{
        /* Safari 4-5, Chrome 1-9 */
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#C1F4F9), to(#C1F4F9));
        /* Safari 5.1+, Chrome 10+ */
        background: -webkit-linear-gradient(top, #C1F4F9,#C1F4F9);
        /* Firefox 3.6+ */
        background: -moz-linear-gradient(top, #C1F4F9,#C1F4F9);
        /* Opera 11.10+ */
        background: -o-linear-background(top, #C1F4F9,#C1F4F9);
        /* IE 10 */
        background: -ms-linear-background(top, #C1F4F9,#C1F4F9);
        /* estándar */
        background: linear-background(top, #C1F4F9,#C1F4F9);   
        color: #7EC1CD;
    }
    .perfil #descargas .descargas_ul a:nth-child(7) li{
        /* Safari 4-5, Chrome 1-9 */
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#C1F4F9), to(#C1F4F9));
        /* Safari 5.1+, Chrome 10+ */
        background: -webkit-linear-gradient(top, #C1F4F9,#C1F4F9);
        /* Firefox 3.6+ */
        background: -moz-linear-gradient(top, #C1F4F9,#C1F4F9);
        /* Opera 11.10+ */
        background: -o-linear-background(top, #C1F4F9,#C1F4F9);
        /* IE 10 */
        background: -ms-linear-background(top, #C1F4F9,#C1F4F9);
        /* estándar */
        background: linear-background(top, #C1F4F9,#C1F4F9);  
        
        color: #7EC1CD;
    }
    .perfil .retroalimentacion_head{
        color: #fff;
        margin-top: 1.2em;
        margin-left: -2px;
        text-indent: 20px;
        font-size: 1.6em;
        background-color: #a91616;
        text-align: center;
        -webkit-border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        border-radius: 15px 15px 0 0;
        width: 100%;
        height: 60px;
        border: 3px solid #FFFFFF;
        line-height: 25px;
    }
    .perfil .retroalimentacion_content{
        background: #d8762d;
        color: #ffffff;
        padding: 20px;
        overflow: hidden;
        -webkit-border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        border-radius: 0 0 15px 15px;
        -moz-box-shadow: inset 0 0 50px -8px #000000;
        -webkit-box-shadow: inset 0 0 30px -8px #000000;
        box-shadow: inset 0 0 30px -8px #000000;
        width: 100%;
        border-left: 3px solid #FFFFFF;
        border-right: 3px solid #FFFFFF;
        border-bottom: 3px solid #FFFFFF;
        margin-left: -2px;
    }
    .perfil .retroalimentacion_content div{
        background: #3eadc4;
        color: #ffffff;
        padding: 100px 50px;
        overflow: hidden;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        width: 100%;
        margin-left: -2px;
    }
    .perfil .retroalimentacion_content div a{
        text-decoration: none;
    }
    .perfil .retroalimentacion_content div a div{
        background: #bb5450;
        color: #ffffff;
        padding: 10px;
        overflow: hidden;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        width: 100%;
        margin-left: -2px;
        border: 3px solid #FFFFFF;
        -moz-box-shadow: inset 0 0 50px -8px #000000;
        -webkit-box-shadow: inset 0 0 30px -8px #000000;
        box-shadow: inset 0 0 30px -8px #000000;
        font-size: 36px;
        text-align: center;
    }
    .perfil .dudas_head{
        color: #fff;
        margin-top: 1.2em;
        margin-left: -2px;
        font-size: 1.6em;
        background-color: #bb5450;
        text-align: center;
        -webkit-border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        border-radius: 15px 15px 0 0;
        width: 100%;
        height: 50px;
        border: 3px solid #FFFFFF;
        line-height: 25px;
        text-transform: uppercase;
        padding: 10px;
    }
    .perfil .dudas_content{
        background: #d8762d;
        color: #ffffff;
        padding: 20px;
        overflow: hidden;
        -webkit-border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        border-radius: 0 0 15px 15px;
        -moz-box-shadow: inset 0 0 50px -8px #000000;
        -webkit-box-shadow: inset 0 0 30px -8px #000000;
        box-shadow: inset 0 0 30px -8px #000000;
        width: 100%;
        border-left: 3px solid #FFFFFF;
        border-right: 3px solid #FFFFFF;
        border-bottom: 3px solid #FFFFFF;
        margin-left: -2px;
    }
    .perfil .dudas_content > div{
        background: #a91616;
        color: #ffffff;
        padding: 10px;
        overflow: hidden;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        width: 100%;
        margin-left: -2px;
    }
    .perfil .dudas_content div li{
        font-size: 26px;
        line-height: 30px;
        margin-top: 10px;
        
    }
    .perfil .dudas_content div li a{
        text-decoration: none;
        margin-top: 10px;
    }
    .perfil .dudas_content div li .left{
        width: 80%;
        float: left;
    }
    .perfil .dudas_content div li .right{
        width: 20%;
        float: right;
    }
    .perfil .dudas_content div li a div{
        background-image: url(<?php echo str_replace ('concurso/', '', $this->Html->url('/', true));?>/wp-content/themes/olimpiada/library/images/nube.png);
        background-size: 100%;
        background-repeat: no-repeat;        
        color: #3eadc4;
        padding: 10px;
        padding-top: 15px;
        overflow: hidden;
        width: 100%;
        font-size: 12px;
        text-align: center;
    }
    .message{
        width: 100%;
        height: 50px;
        font-size: 26px;
        color: #FFFFFF;
        text-transform: uppercase;
        text-align: center;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
    }
    #goodMessage{
        background-color: #3eadc4;
    }
    #badMessage{
        background-color: #a91616;
    }
    .perfil .agregarEquipo{
        float: right;
        width: 200px;
        height: 40px;
        background-color: #3eadc4;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        border-radius: 15px;
        text-align: center;
        color: #FFFFFF;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 22px;        
    }
    .perfil .agregarEquipo:hover{
        color: #FFFFFF;
    }
        
</style>

