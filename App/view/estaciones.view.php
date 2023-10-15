<?php

class EstacionView{

    function showEstaciones($estaciones){

      include "templates/header.php";

      echo "<ul class='list-group mt-5'>";
      foreach($estaciones as $estacion){
        echo "<li class='list-group-item'>
        $estacion->nombre_estacion
         </li>";

      
      }
      echo "</ul>";

      include "templates/footer.php";


    }
   
    

}