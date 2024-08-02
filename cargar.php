<?php
$image = $_FILES['image'];
$name = $_FILES['image']['name'];
$ruta_nameTmp = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];
// Limitador de archivos, si es diferente .JPEG o .PNG no subir al servidor
if (mime_content_type($ruta_nameTmp) != "image/jpeg" and mime_content_type($ruta_nameTmp) != "image/png") {
    echo "Tipo de archivo no compatible. extensiones .JPEG .PNG";
    exit();
}

// crea el directorio sino existe
if (!file_exists("archivo")) {
    // asigna derecho admin a la carpeta
    if (!mkdir("archivo", 0777)) {
        echo "error al crear directorio";
    }
}
//habilita los derecho de admin carpeta
chmod("archivo", 0777);

// Limitador de tamano, si es mayor a [] no subir y cancela accion.
if ($size / 1024 > 512) {
    //echo "Tamano del archivo excede el max ( 0.5 MGB)";
    if ($ruta_nameTmp == "image/jpeg") {
        $image = imagecreatefromjpeg($ruta_nameTmp);
    } elseif ($ruta_nameTmp == "image/png") {
        $image = imagecreatefrompng($ruta_nameTmp);
    } else {
        $image = imagecreatefromjpeg($ruta_nameTmp);
    }
     // Guardamos la imagen
     imagejpeg($image, "archivo/".$name, 50); 
     echo "Archivo subido con exito";
} else {
    // mover archivo a la ruta especificada
    // primer parrametro: ruta en cache  segundo parametro: ruta final + agrega el nombre del archivo

    if (move_uploaded_file($ruta_nameTmp, "archivo/".$name)) {  
        echo "Archivo subido con exito";
    } else {
        echo "Archivo no subido";
        
    }
}

