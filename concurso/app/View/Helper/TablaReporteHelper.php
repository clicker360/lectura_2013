<?php

class TablaReporteHelper extends AppHelper {
    var $helpers = array('Html','Session','Form','Js');

    function displayHeaders($fields){        
        foreach($fields as $k =>$h){
            if($k != '0'){
                $hs1[] = array(
                    $k => array(
                        'colspan' => count($h)
                    )
                );
            }else{
                $hs1[] = array(
                    '' => array(
                        'colspan' => 1
                    )
                );
            }
                foreach($h as $f){
                    if(is_array($f))
                        $hs2[] = $f[0];
                    else
                        $hs2[] = $f;
                }
        }
        echo $this->Html->tableHeaders($hs1);
        echo $this->Html->tableHeaders($hs2);
    }
    function displayCells($fields, $registros){
        $count = 0;
        $cells = array();
        foreach($registros as $k => $r){
            foreach($fields as $kh =>$h){
                foreach($h as $kf => $f){
                        if(is_array($f)){
                            $im = array();
                            $im[] = $r[$kh][$kf];
                            foreach($f[1] as $im2){
                                $im[] = $r[$kh][$im2];
                            }
                            $cells[$count][] = implode(' ', $im);
                        }else
                            $cells[$count][] = $r[$kh][$kf];
                }
            }
            $count++;
        }
        echo $this->Html->tableCells($cells);
    }

}
?>
