<?php

namespace App\TADPila;
use Exception;

class Pila {
 
    public $size;
    public $elements;
    public $top;
    
    public function Pila($size){
        $this->size=$size;
        $this->top=0;
        $this->elements=array();
    }
 
    function apilar($elemento){
        $element=null;
        if($this->top>0){
            $element=$this->elements[$this>top];
            $this->top--; 
        }
        else { echo "PILA VACIA";  }
        return $element;
    }
 
    function desapilar($element){
        if($this->top<$this->size){
            $this->top++;
            $this->elements[$this->top]=$element;
        }else {
            echo "PILA LLENA";
        }
    }
}

?>