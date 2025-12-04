
<?php 
require_once("./config/db.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $insert = $conn -> prepare("INSERT INTO 
    (title, author) 
    VALUES(:title, :author)");
    $insert -> bindParam(":title", $_POST["title"]);
    $insert -> bindParam(":author", $_POST["author"]);
    $insert -> execute();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir libro</title>
</head>

<body>
    <h1>Añadir libros</h1>
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

        <button type="submit">Añadir libro</button>

    </form>
</body>

</html>