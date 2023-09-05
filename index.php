<?php

require_once 'ApiClient.php';

//Configuro la URL base de la API
$apiBaseUrl = 'https://jsonplaceholder.typicode.com/';


//Creo una instancia del cliente API
$apiClient = new ApiClient($apiBaseUrl);

/////REALIZO UNA SOLICITUD GET a la API./////
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

/////REALIZO UNA SOLICITUD POST a la API./////

// defino  los datos para la solicitud POST.
$endpoint = 'posts';

$postData = [
    'title' => 'foo',
    'body' => 'bar',
    'userId' => 1,
];

//Realizo la solicitud POST
$postResponse = $apiClient->sendRequest('POST', 'posts', $postData);

//Verifico si la solicitus POST ha sido exitosa y muestro la respuesta
if ($postResponse) {
    echo "Respuesta POST exitosa:<br>";
    print_r($postResponse);
} else {
    echo "La solicitud POST ha fallado";
}

/////REALIZO UNA SOLICITUD PATCH a la API./////

$patchData = [
    'title' => 'nuevo título',
];

$patchResponse = $apiClient->sendRequest('PATCH', 'patch/1', $patchData);

//Verifico si la solicitud PATCH ha sido exitosa y muestro la respuesta
if($patchResponse){
    echo "Solicitud PATCH exitosa:<br>";
    print_r($patchResponse);
} else {
    echo "La solicitud PATCH falló o los datos no se han actualizado correctamente";
}

?>