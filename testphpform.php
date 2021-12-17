
<?php
    $nom = isset($_POST["name"])? $_POST["name"] :"";
    $genre = isset($_POST["genre"])? $_POST["genre"] :"";
    $type = isset($_POST["type"])? $_POST["type"] :"";

    $database = "mineur";

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $db_handle->set_charset('utf8');



    if(isset($_POST["valider"])){
        if($db_found){
            $sql = "INSERT INTO personne (Nom, Genre, theme) VALUES ('$nom','$genre', '$type')";
            $sql2 = "SELECT * FROM paragraphes WHERE theme LIKE '%$type%'";
            
            $result = mysqli_query($db_handle, $sql);
            $result2 = mysqli_query($db_handle, $sql2);


        if (mysqli_num_rows($result2) == 0) {
            echo "RAS";
        }else{
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