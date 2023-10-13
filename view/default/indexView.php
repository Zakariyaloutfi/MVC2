<!-- page HTML qui offre à l'utilisateur une interface pour ajouter un nouveau film et afficher une liste des films existants.-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple PHP+PDO+POO+MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> <!-- Correction ajout CSS bootstrap -->
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> <!-- Correction ajout JS bootstrap -->
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
</head>
<body>

 <!-- Formulaire pour ajouter un nouveau film -->
 <form action ="index.php?controller=Films&action=creation" 
    method ="post" class="col-lg-5">
        <h3>Add Film</h3>
        <!-- Champ pour le titre du film -->
        Titre: <input type="text" name="titre" class="form-control">
        <!-- Champ pour le réalisateur du film -->
        Réalisateur: <input type="text" name="realisateur" class="form-control">
        <!-- Champ pour la date de sortie du film -->
        Date: <input type="text" name="date" class="form-control">
        <!-- Bouton pour soumettre le formulaire -->
        <input type="submit" value="Send" class="btn btn-success"/>
    </form>

    <div class="col-lg-7">
        <h3>Films</h3>
        <hr/> 
    </div>
    
    <!-- Section pour afficher la liste des films existants -->
    <section class="col-lg-7" style="height:400px;overflow-y:scroll;">
        <!-- Boucle pour parcourir et afficher tous les films de la base de données -->
        <?php foreach($data["Films"] as $Film) {?>
            <!-- Affichage du nom, de la date de sortie et du réalisateur du film -->
            <?php echo $Film["Film_nom"]; ?> - 
            <?php echo $Film["Date_sortie"]; ?> - 
            <?php echo $Film["Realisateur"]; ?> - 
            <!-- Lien pour voir les détails du film -->
            <div class="right">
                <a href="index.php?controller=Films&action=detaille&id=<?php echo $Film['Film_id']; ?>" 
                class="btn btn-info">
                detailles
                </a>
                
        </div>
        <hr/>
        <?php } ?>
    </section>
</body>
</html>