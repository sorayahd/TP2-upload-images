<?php

require './connexion.php';

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    // les extensions acceptées (format images)
    $extensions = ['jpg', 'png', 'jpeg'];
    $maxSize = 400000; // taille max d'une images

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

        $uniqueName = uniqid('', true);

        //uniqid génère un numéro uniq
        $file = $uniqueName.".".$extension;

        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './uploads/'.$file);

        $req = $db->prepare('INSERT INTO file (name) VALUES (?)');
        $req->execute([$file]);

        echo "Image téléchargée avec succées";
    }
    else{
        echo "erreur lors du téléchargement de fichier";
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

    </head>
<body>
    <h2>Ajouter une image</h2>
    <form action="index.php" method="POST" enctype="multipart/form-data">
    
        <label for="file">Images</label>
        <input type="file" name="file">

        <button type="submit">Enregistrer</button>
    </form>
    <h2>Mes images</h2>
    <?php 
        $req = $db->query('SELECT name FROM file'); // selectionner les images de la bdd
        while($data = $req->fetch()){
            echo "<img src='./uploads/".$data['name']."' width='300px' ><br>";// affichage d'images
        }
    ?>
</body>
</html>        