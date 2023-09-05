<?php

require_once 'ApiClient.php';

//Creo una instancia del cliente API
$apiClient = new ApiClient();

//Realizo una solicitud GET a la API

$posts = $apiClient->getPosts();

//Verifico si la solicitude ha sido exitosa y muestro los resultados

if ($posts) {
    foreach ($posts as $post) {
        echo "Title: " . $post['title'] . "<br>";
        echo "Body: " . $post['body'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Error: no se pudo obtener información de los posts.";
}

?>