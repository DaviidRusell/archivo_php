<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=   device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Subir archivo</h3>
    <form action="cargar.php" method="post" enctype="multipart/form-data">
    <!-- accept = limita el tipo archivo que se puede subir, colocar name al input para poder recibirlo por post en peticiones-->
    <input type="file" name="image"  accept=".jpg, .jpeg, .png"> 
    <br><br>
    <button type="submit">Enviar</button>
    </form>
</body>

</html>