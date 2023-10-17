<?php

class EstacionView{

    function showEstaciones($estaciones){
      $count = count($estaciones);
      require "templates/home.phtml";
      


    }


    public function showError($error) {
      require 'templates/error.phtml';
  }

    
   
    

}