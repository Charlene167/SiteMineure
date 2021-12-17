
<?php
    $nom = isset($_POST["name"])? $_POST["name"] :"";
    $genre = isset($_POST["genre"])? $_POST["genre"] :"";
    $type = isset($_POST["type"])? $_POST["type"] :"";

    //Connexion avec la base de données

    $database = "mineur";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $db_handle->set_charset('utf8');

    //Si le formulaire est validée
    if(isset($_POST["valider"])){
        if($db_found){
            //Ajouter le nouvel utilisateur dans la base de données
            $sql = "INSERT INTO personne (Nom, Genre, theme) VALUES ('$nom','$genre', '$type')";
            //Récupérer l'histoire choisi
            $sql2 = "SELECT * FROM paragraphes WHERE theme LIKE '%$type%'";
            
            $result = mysqli_query($db_handle, $sql);
            $result2 = mysqli_query($db_handle, $sql2);


        if (mysqli_num_rows($result2) == 0) {
            echo "RAS";
        }else{
            //Affichage en modifiant le nom par défaut "Alex" par le nom de notre personnage
            while ($data = mysqli_fetch_assoc($result2)) {
                echo "<h2 style ='text-align: center; font-family: cursive;'>Voici ton histoire " . $nom . ". Bonne lecture ! </h2>" . "<br>" . "<br>" . "<br>";
                echo "<div style =' font-family: cursive; margin-left : 20px; margin-right = 100px;'>" . str_replace("Alex", $nom, $data['p1'] ) . "</div>" . "<br>" . "<br>";
                echo "<div style =' font-family: cursive; margin-left : 20px; margin-right = 100px;'>" . str_replace("Alex", $nom, $data['p2'] ) . "</div>". "<br>" . "<br>";
                echo "<div style =' font-family: cursive; margin-left : 20px; margin-right = 100px;'>" . str_replace("Alex", $nom, $data['p3'] ) . "</div>". "<br>" . "<br>";
            }
        }

    }else { 
        echo "Database not found";
    }
}
mysqli_close($db_handle);

?>
<!--html de la page de l'histoire-->
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />

<link rel="stylesheet" href="layoutbis.css" />
    </head>
    <body><style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        html,
        body {
            height: 100%;
            background-color: rgb(255, 240, 187);
        }
    </style>
    
</html>