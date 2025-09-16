<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Iniciammos una nueva sesión de curl; ch = cURL handle
$ch = curl_init(API_URL);
// Inidicamos que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la petición y guardamos el resultado
$result = curl_exec($ch);

// una alternativa ser'ia utilizar la función file_get_contents
// $reesult = file_get_contents(API_URL); // si solo quieres hacer un get
$data = json_decode($result, true);

curl_close($ch);
// var_dump($data);
?>

<head>
    <meta charset="UTF-8">
    <title>La próxima película de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>

<main>
    <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días </h3>
    <section>
        <img src="<?= $data['poster_url'] ?>" width="300" alt="El poster de <?= $data["title"]; ?>"
            style="border-radius: 16px;" />
    </section>

    <hgroup>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<footer>
    <p>Este producto utiliza la <a href="https://www.themoviedb.org/" target="_blank">TMDb API</a>, pero no está avalada o certificada por TMDb</p>
    <p>Hecho por <a href="https://github.com/Pipkonx" target="_blank">Pipkonx</a></p>
</footer>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }

    footer {
        text-align: center;
        opacity: 0.8;
    }
</style>