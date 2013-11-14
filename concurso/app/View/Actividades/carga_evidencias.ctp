<?php
    for($i = 0; $i <= $num-1; $i++){
        ?>
        <div style="float:left; width: 25%;">
            <?php
            echo "<h3>Evidencia ".($i+1)."</h3>";
            echo $this->Form->input("Evidencia.$i.pregunta",array('label'=>'Pregunta: ','style'=>'width:262px; height:100px;'));
            echo $this->Form->input("Evidencia.$i.tipo",array('label'=>'Tipo de campo: ','style'=>'width:262px;','options'=>array('texto'=>'Texto','textarea'=>'Textarea','imagen'=>'Imagen','video'=>'Video')));
            echo $this->Form->input("Evidencia.$i.maximo",array('label'=>'Máximo permitido: ','style'=>'width:120px;'));
            echo $this->Form->input("Evidencia.$i.maximo_tipo",array('label'=>false,'options'=>array('caracteres'=>'Caracteres','palabras'=>'Palabras'),'style'=>'width:125px;'));
            echo $this->Form->hidden("Evidencia.$i.numero_evidencia",array('value'=>($i+1)));
            ?>
        </div>
        <?php
    }
    ?>
