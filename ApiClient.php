<?php

class ApiClient
{
    private $base_url;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }


    //MAKE A GET API REQUEST

    public function get($endpoint)
    {

        //Defino la ruta, que es la url+el endpoint que se introducirá a la hora de instanciar el método.
        $url = $this->base_url . $endpoint;

        //Realizo solicitud HTTP GET a la API
        $response = file_get_contents($url);

        //Decodifico la respuesta JSON
        $data = json_decode($response, true);
        return $data;

        // Verifico si los datos son un array antes de devolverlos
        if (is_array($data)) {
            return $data;
        } else {
            return false;
        }
    }

        //MAKE A PUT API REQUEST

    


}

?>