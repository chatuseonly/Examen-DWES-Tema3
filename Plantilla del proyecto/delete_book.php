<?php 
require_once("./config/db.php");

$select = $conn -> prepare("SELECT * FROM books WHERE id = :id");
$select -> bindParam(":id", $_GET["id"]);
$select -> execute();


if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(!isset($_GET["id"]) || empty($_GET["id"])){
        die("Id no proporcionada");
    }


if(isset($_GET["action"]) && $_GET["action"] == "delete"){
    $delete = $conn -> prepare("DELETE FROM books WHERE id = :id");
    $delete -> bindParam(":id", $_GET["id"]);
    if($delete -> execute()){
    header("Location: view_books.php");
    }
}
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar libro</title>
</head>

<body>
    <h1>Borrar libro</h1>
    <p><a href="view_books.php">Listado de libros</a></p>
    <?php

    // Mostrar la información del libro
    foreach($select as $sel):
    // y dos enlaces:
    // uno para conformar el borrado
    // otro para cancelar dicho borrado
    ?>

    <p class="title"><?= $sel["title"]?></p>
    <p class="author"><?= $sel["author"]?></p>
   <?php endforeach; ?>
    <a href="view_books.php">Cancelar</a>
    <a href="delete_book.php?id=<?= $sel["id"]?>&action=delete">Borrar libro</a>
</body>
</html>