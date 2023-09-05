<?php

class ApiClient
{
    private $base_url = 'https://jsonplaceholder.typicode.com/';


    //MAKE A GET API REQUEST

    public function getPosts()
    {
        $url = $this->base_url . 'posts';

        //Realizo solicitud HTTP GET a la API
        $response = file_get_contents($url);

        //Decodifico la respuesta JSON
        $postsData = json_decode($response, true);

        //Verifico si la solicitud ha sido exitosa
        if (is_array($postsData)) {
            return $postsData;
        } else {
            return false;
        }
    }
}

?>