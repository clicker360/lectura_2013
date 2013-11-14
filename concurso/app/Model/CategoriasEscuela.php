<?php

class CategoriasEscuela extends AppModel
 { 
   var $name = 'CategoriasEscuela';


   function select(){
       $categorias = $this->find('all');
            foreach ($categorias as $cat) {
                $cats_select[$cat['CategoriasEscuela']['id']] = $cat['CategoriasEscuela']['nombre']; //asignaci�n de arreglo a arreglo m�s sencillo
            }
            return $cats_select;

   }
 }
   
?>