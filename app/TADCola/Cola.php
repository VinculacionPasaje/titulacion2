<?php

namespace App\TADCola;
use Exception;

class tadCola{

   function tadCola () {
   }

   function encolar(&$cola,$elemento) {
       array_push($cola,$elemento);
   }

   function desencolar(&$cola,&$elemento) {
      $elemento = array_shift($cola);
   }   

   function numElementos(&$cola) {
      return count($cola);
   }

   function listarCola(&$cola) {
         $elemento;
         if (!$this->vacia($cola)) {
          $this->desencolar($cola,$elemento);
     echo $elemento."|";
     $this->listarCola($cola);
          $this->encolar($cola,$elemento);
         } else {
     //$this->invertirCola($cola);
    }
   }

   function invertirCola(&$cola) {
         $elemento;
         if (!$this->vacia($cola)) {
          $this->desencolar($cola,$elemento);
     $this->invertirCola($cola);
          $this->encolar($cola,$elemento);
         }
   }

   function vacia(&$cola) {
     if (count($cola)==0)
      return 1;
     else
      return 0;
   }
}


?>