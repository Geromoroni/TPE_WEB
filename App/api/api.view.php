<?php

//vista para la API REST
class APIView{
    public function response($data, $status){
        header("Content-Type: application/json");
        header("HTTP/1.1" . $status . "" . $this->requestStatus($status));

        //transformamos en JSON
        echo json_encode($data);
    }

    public function requestStatus($code){
        $status = array (
            200=>"OK",
            404=>"Not Found",
            500=>"Internal Server Error",
            
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
    }
}