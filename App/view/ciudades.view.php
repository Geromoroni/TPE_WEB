<?php

class CiudadView{

    function showCiudades($ciudades){
      $count = count($ciudades);
      require "templates/homeCiudades.phtml";
      
    }
    
    function showInfoCiudades($ciudades){
      $count = count($ciudades);
      require "templates/infoCiudades.phtml";
    }


    public function showError($error) {
      require 'templates/error.phtml';
  }

    

}