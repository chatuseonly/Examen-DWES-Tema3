<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir libro</title>
</head>

<body>
    <h1>Añadir libro</h1>
    <p><a href="view_books.php">Listado de libros</a></p>
    <?php

    

    // Imprimir mensaje de éxito si se ha guardado el libro
    echo "Libro guardado con exito";
    ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>

        <label for="author">Autor</label>
        <input type="text" name="author" id="author" required>

    </form>
</body>

</html>