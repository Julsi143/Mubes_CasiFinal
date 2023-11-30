<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mubes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener la ID de la canción desde la solicitud GET
$cancionId = $_GET['id'];

// Consulta SQL para obtener los datos de la canción
$sql = "SELECT * FROM canciones WHERE id = $cancionId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos de la canción
    $row = $result->fetch_assoc();

    // Crear un array asociativo con los datos de la canción
    $cancionDatos = array(
        'id' => $row['id'],
        'titulo' => $row['titulo'],
        'artista' => $row['artista'],
        'portada' => $row['portada'],
        'url' => $row['url']
    );

    // Convertir el array a formato JSON y enviarlo como respuesta
    echo json_encode($cancionDatos);
} else {
    // Si no se encuentran resultados, enviar un array con un mensaje de error
    echo json_encode(array('error' => 'Canción no encontrada'));
}

// Cerrar conexión
$conn->close();
?>
