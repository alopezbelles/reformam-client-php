<?php

require_once 'ApiClient.php';

//Configuro la URL base de la API
$apiBaseUrl = 'https://jsonplaceholder.typicode.com/';


//Creo una instancia del cliente API
$apiClient = new ApiClient($apiBaseUrl);

        /////Realizo una solicitud GET a la API, y defino el endpoint 'posts'./////
$posts = $apiClient->get('posts');

        //Verifico si la solicitud GET ha sido exitosa y muestro los resultados
if ($posts) {
    foreach ($posts as $post) {
        echo "Title: " . $post['title'] . "<br>";
        echo "Body: " . $post['body'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Error: no se pudo obtener información de los posts.";
}

        /////Realizo una solicitud POST a la API./////

         // defino el endpoint y los datos para la solicitud
$endpoint = 'posts';
$postData = [
    'title' => 'foo',
    'body' => 'bar',
    'userId' => 1,
];

        //Realizo la solicitud POST
$postResponse = $apiClient->post($endpoint, $postData);

//Verifico si la solicitus POST ha sido exitosa y muestro la respuesta
if($postResponse){
    echo "Respuesta POST exitosa:<br>";
} else {
    echo "La solicitud POST ha fallado";
}


?>