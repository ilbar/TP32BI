<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php        
        include("connexion.php");
        $response=$db->query('select * from billet order by date desc limit 5');
        while($billet=$response->fetch()){
            echo '<div class="header">'.$billet['titre'].' le '.$billet['date'].'</div>
            <div class="content">'.$billet['contenu'].
            '<br /><a href="commentaire.php?idbillet='.$billet['id'].'">Commentaires</a>
            </div>';
        }
        $response->closeCursor();
    ?>
</body>
</html>