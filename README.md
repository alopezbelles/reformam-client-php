# reformam-client-php
Proyecto BackEnd desarrollado en PHP. 

 ### Descripción general del proyecto 
Desarrollo de un cliente PHP que interactúa con la API pública https://jsonplaceholder.typicode.com/. 
Clase desarrollada en PHP modular y reutilizable. 

 ### Archivos y explicación del código

  ### ApiClient.php
  - Defino la clase ApiClient que contiene toda la funcionalidad necesaria.
  - Establezco como propiedad privada la $base_url que se usa para almacenar la url de la API.
  - Defino el constructor de la clase ApiClient que toma como parámetro la la $base_url.
    
      ### Método GET
    - Defino el método get() para realizar la solicitud GET a la API e introduzco el $endpoint como parámetro y que se introducirá en el momento de hacer la instancia: get($endpoint).
    - En este caso $url es la base_url+endpoint.
    - Realizo la solicitud GET utilizando "file_get_contents()" introduciendo $url como parámetro.
    - Decodifico la respuesta JSON usando json_decode().
    - Verifico si la solicitud ha sido exitosa. 

  ### index.php
  - El archivo index.php funciona como punto principal de entrada y punto de demostración para el uso del cliente API implementado en la clase 'ApiClient'.
  - En este archivo se configura la URL base de la API con la que interactuará, en este caso,  'https://jsonplaceholder.typicode.com/'.
  - Creo una instancia del cliente API utilizando la clase 'ApiClient' introduciendo $apiBaseUrl como parámetro.
    
       ### Solicitud GET
    - Realizo una solicitud GET  a la API utilizando el método 'get()' de la instancia 'ApiClient' para realizar una soliciitud GET a la API y recibir la información de los posts.
    - Introduzco 'posts' como parámetro.
    - Verifico si se han obtenido los datos correctamente.
    - Almaceno cada elemento en la variable $post, y utilizo un bucle para mostrar los detalles de cada post.
    - Muestro "title" y "body" de cada post.
   
      ### Solicitud POST
    - Realizo una solicitud POST  a la API utilizando el método post() de la instancia 'ApiClient'.
    - Introduzco el $endPoint y los datos $postData como argumentos.
    - Defino un array asociativo en $postData con los datos que se envían en el cuerpo de la solicitud POST. En este caso se envía "title, body y userId".
    - Llamo al método POST de la instancia ApiClient para realizar la solicitud.
    - Verifico si los datos se han obtenido correctamente, mostrando un mensaje de éxito o un mensaje de fallo. 
  
 
