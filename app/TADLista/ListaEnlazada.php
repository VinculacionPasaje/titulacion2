<?php

namespace App\TADLista;

use Exception;
use App\TADLista\Nodo;


//Clase Lista Enlazada
class ListaEnlazada
{
    //variable o puntero que apunta al primer nodo de la lista
    public $primero = null;
    //variable que almacena la cantidad de elementos dentro de la lista
    private static $count = 0;
 
    //funcion que cuenta los nodos dentro de la lista
    public function ContarNodos()
    {
        return self::$count;
    }
 
    //funcion que inserta un nodo dentro de una lista vacia
	public function InsertarPrimerovacia($elemento) {
            $this->primero = new Nodo($elemento);
            $this->proximo = null;
			self::$count++;
    }
 
    //funcion que inserta un nodo en la primera posicion de una lista
    public function InsertarPrimero($elemento) {
        if ($this->primero == null) {
            $this->primero = new Nodo($elemento);
        } else {
            $aux = new Nodo($elemento);
 
            $aux->proximo = $this->primero;
 
            $this->primero = $aux;
        }
 
        self::$count++;
    }
 
    //funcion que inserta un nodo en la ultima posicion de la lista
    public function InsertarUltimo($elemento) {
        if ($this->primero == null) {
            $this->primero = new Nodo($elemento);
        } else {
            $actual = $this->primero;
            while ($actual->proximo != null)
            {
                $actual = $actual->proximo;
            }
            $actual->proximo = new Nodo($elemento);
        }
        self::$count++;
    }
 
    //funcion que inserta un nodo despues de una posicion dada
    public function InsertarDespues($elemento,$key){
        if($key == 0){
        $this->InsertarPrimero($elemento);
    }
    else{
        $aux = new Nodo($elemento);
        $actual = $this->primero;
        $anterior = $this->primero;
        for($i=0;$i<$key;$i++)
        {
                $anterior = $actual;
                $actual = $actual->proximo;
        }
           $anterior->proximo = $aux;
           $aux->proximo = $actual;
           self::$count++;
    }
    }
 
    //funcion que elimina el primer nodo de la lista
    public function EliminarPrimero() {
        if ($this->primero != null) {
            $actual = $this->primero;
            $this->primero = $actual->proximo;
        }
        self::$count--;
    }
 
 
    //funcion que elimina el nodo que ocupa la posicion que sigue a la posicion pasada por parametro
    public function EliminarDespues($key){
    if($key == 0){
            $this->EliminarPrimero($elemento);
        }
        else{
            $actual = $this->primero;
            $anterior = $this->primero;
            for($i=0;$i<$key;$i++)
            {
                    $anterior = $actual;
                    $actual = $actual->proximo;
            }
               $anterior->proximo = $actual->proximo;
               self::$count--;
        }
        }
 
    //funcion que elimina el nodo cuyo dato coincide con el valor del parametro
    public function EliminarNodo($key)
    {
        $actual = $anterior = $this->primero;
        while($actual->dato != $key) {
            $anterior = $actual;
            $actual = $actual->proximo;
        }
        if ($actual == $anterior) {
            $this->primero = $actual->proximo;
        }
        $anterior->proximo = $actual->proximo;
        self::$count--;
    }
 
 
    //funcion que recorre la lista desde el primer nodo hasta e ultimo e imprime el dato dentro del nodo
    public function ImprimirLista()
    {
        $elementos = [];
        $actual = $this->primero;
        while($actual != null) {
            array_push($elementos, $actual->dato);
            $actual = $actual->proximo;
        }
        $str = '';
        foreach($elementos as $elemento)
        {
            $str .= $elemento . '->';
        }
        echo $str;
    }
}

?>