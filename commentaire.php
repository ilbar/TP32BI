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
   include('connexion.php');
   session_start();
   /* Sauvegarder le billet dans une variable de session*/
        if(isset($_GET['idbillet'])) {
            $_SESSION['idbillet']=$_GET['idbillet'];
        }
        /* Affichage du billet sélectionné*/
        $response=$db->prepare('select * from billet where id=?');
        $response->execute(array($_SESSION['idbillet']));
        $billet=$response->fetch();
        echo '<div class="header">'.$billet['titre'].' le '.$billet['date'].'</div>
            <div class="content">'.$billet['contenu'].'</div>';

    ?>
    <form action="commentaire_post.php" method="post">
        <label>Auteur</label><br /><input type="text" name="auteur" /><br />
        <label>Commentaire</label><br />
        <textarea rows="3" name="comment"></textarea>
        <input type="submit" value="Valider" name="valider" />
    </form>
    <?php
    /* Recherche et affichage des commentaires sur le billet sélectionné*/
        $response=$db->prepare('select * from commentaire where idbillet=? order by date desc');
        $response->execute(array($_SESSION['idbillet']));
        echo '<h3 class="subtitle">Commentaires</h3>';
        while($commentaire=$response->fetch()){
            echo '<div><span class="subtitle">'.$commentaire['auteur'].'</span> le '.$commentaire['date'].'<br />'.
            $commentaire['commentaire'].'</div>';
        }
        $response->closeCursor();
    ?>
</body>
</html>