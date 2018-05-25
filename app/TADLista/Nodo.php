<?php

namespace App\TADLista;
use Exception;

class Nodo
{
    //variable que contiene el elemento a almacenar dentro del nodo
    public $dato;
    //variable que contiene el puntero con la posicion del siguiente nodo
    public $proximo;
 
    //funcion void para crear el nodo
    public function __construct($elemento)
    {
        $this->dato = $elemento;
        $this->proximo = null;
    }
}


?>