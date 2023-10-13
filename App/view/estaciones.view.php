<?php

class EstacionView{

    function showEstaciones($estaciones){


      foreach($estaciones as $estacion){
        include "templates/header.php"

        echo"<li>";
        $estacion->nombre_estacion
        echo"</li>";
        include "templates/footer.php"

      }

    }
   
    

}