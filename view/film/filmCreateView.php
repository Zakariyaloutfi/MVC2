<!-- page HTML servant à l'ajout d'un nouveau film -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titre"] ?></title>
    <style>
        input{
            margin-top:5px;
            margin-bottom:5px;
        }
        .right{
            float:right;
        }
    </style>
    <?php include "view/header.php"; ?>

</head>
<body>

    <?php include "view/navbar.php"; ?>

    <!--<div class="col-lg-5 mr-auto">-->
    <div class="container mt-3">
        <!-- Formulaire pour ajouter un nouveau film -->
        <form action="index.php?controller=Films&action=save" method="post" enctype="multipart/form-data">
            <h3>Nouveau Film</h3>
            <hr/>
            <!-- Champ pour le titre du film -->
            Titre: <input type="text" name="titre" class="form-control">
            <!-- Champ pour le réalisateur du film -->
            Réalisateur: <input type="text" name="realisateur" class="form-control">
            <!-- Champ pour la date de sortie du film -->
            Date: <input type="text" name="date" class="form-control">
            Image: <input type="file" name="film_image" class="form-control"> <!-- Champ pour un fichier image -->
            <!-- Bouton pour soumettre le formulaire -->
            <input type="submit" value="Send" class="btn btn-success"/>
        </form>
        <!-- Lien pour revenir à la liste des films -->
        <a href="index.php?controller=Films&action=getAll" class="btn btn-info">Retour</a>
    </div>
</body>
</html>