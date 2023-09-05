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
    echo "Error: no information could be obtained from the posts.";
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
    echo "Successful POST response:<br>";
    print_r($postResponse);
} else {
    echo "POST request failed";
}

/////REALIZO UNA SOLICITUD PATCH a la API./////

$patchData = [
    'title' => 'new title',
];

$patchResponse = $apiClient->sendRequest('PATCH', 'patch/1', $patchData);

//Verifico si la solicitud PATCH ha sido exitosa y muestro la respuesta
if ($patchResponse) {
    echo "PATCH request SUCCESSFUL:<br>";
    print_r($patchResponse);
} else {
    echo "PATCH request failed or data has not been updated properly";
}


/////REALIZO UNA SOLICITUD DELETE a la API./////

$deleteEndpoint = 'posts/1';
$deleteResult = $apiClient->delete($deleteEndpoint);

//Verifico si la solicitud DELETE ha sido exitosa
if ($deleteResult) {
    echo "DELETE request SUCCESSFUL. The resource was correctly deleted";
} else {
    echo "DELETE request FAILED, or the resource could not be deleted ";
}

?>