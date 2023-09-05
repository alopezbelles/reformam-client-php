<?php

class ApiClient
{
    private $base_url;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }


    //GET METHOD: make a GET API REQUEST

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

        //PUT METHOD: make a PUT API REQUEST

    public function post($endpoint, $postData){

        //URL completa incluyendo el endpoint
        $url = $this->base_url . $endpoint;

        //Configuro las opciones de la solicitud POST
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/json; charset=UTF-8',
                'content' => json_encode($postData),
            ]
            ];

        //Creo un contexto para la solicitud
        $context = stream_context_create($options);

        //Realizo la solicitud POST
        $response = file_get_contents($url, false, $context);

        //Decodifico la respuesta JSON
        $responseData = json_decode($response, true);

        //Verifico si la solicitud POST ha tenido exito. 
        if($responseData){
            return $responseData;
        } else {
            return false;
        }
    }


}

?>