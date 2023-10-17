<?php

class EstacionView{

    function showEstaciones($estaciones){
      $count = count($estaciones);
      require "templates/home.phtml";
      


    }


    public function showError($error) {
      require 'templates/error.phtml';
  }

  public function showEdicion($estaciones, $id_estacion){

    require "templates/modificar.phtml";
  }

    
   
    

}