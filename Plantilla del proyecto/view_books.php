
<?php 
require_once("./config/db.php");

$librosOrdenadosPorTitulo = $conn -> query("SELECT * FROM books ORDER BY title ASC");
$librosOrdenadosPorAutor = $conn -> query("SELECT * FROM books ORDER BY author ASC");


var_dump($librosOrdenadosPorTitulo);
var_dump($librosOrdenadosPorAutor);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Libros</title>
</head>

<body>
    <h1>Ver Libros</h1>
    <p><a href="insert_book.php">Añadir un nuevo libro</a></p>

    <h2>Libros ordenados alfabéticamente por título</h2>
    <table border="1" cellpadding="10" cellspacing="10">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Listado de libros
            foreach($librosOrdenadosPorTitulo as $title):
            ?>
            <tr>
                <td><?= $title["title"] ?></td>
                <td><?= $title["author"] ?></td>
                <td>
                    <form action="delete_book" method="get">
                        <input type="hidden" name="id" value="<?= $title["id"]?>">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Libros ordenados alfabéticamente por autor</h2>
    <table border="1" cellpadding="10" cellspacing="10">
        <thead>
            <tr>
                <th>Autor</th>
                <th>Título</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Listado de libros
            foreach($librosOrdenadosPorAutor as $autor):?>
            <tr>
                <td><?= htmlspecialchars($autor["author"])?></td>
                <td><?= htmlspecialchars($autor["title"])?></td>
                <td>
                    <form action="delete_book.php" method="get">
                        <input type="hidden" name="id" value="">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>