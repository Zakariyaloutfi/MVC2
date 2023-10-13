<!-- Page HTML pour afficher les détails d'un film -->


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
        <h3>Film detaillé</h3>
        <hr/>
         <!-- Champ caché pour stocker l'ID du film -->
         <input type="hidden" name="id" value="<?php echo $data["Film"]->Film_id ?>" />
        <!-- Affichage du nom du film en mode lecture seule (readonly) -->
        Nom: <input type="text" readonly name="titre" value="<?php echo $data["Film"]->Film_nom ?>" class="form-control bg-light" />
        <!-- Affichage du réalisateur du film en mode lecture seule (readonly) -->
        réalisateur: <input type="text" readonly name="realisateur" value="<?php echo $data["Film"]->Realisateur ?>" class="form-control bg-light" />
        <!-- Affichage de la date de sortie du film en mode lecture seule (readonly) -->
        date: <input type="text" readonly name="date" value="<?php echo $data["Film"]->Date_sortie ?>" class="form-control bg-light" />
        <!-- Affichage de l'image du film  (readonly)-->
        <img src="<?php echo $data["Film"]->Film_image_path ?>" alt="Image du film" width="300" />

        <!-- Boutons pour éditer, supprimer et revenir à la liste des films -->
        <a href="index.php?controller=Films&action=edition&id=<?php echo $data["Film"]->Film_id ?>" class="btn btn-info">Editer</a>
        <a href="index.php?controller=Films&action=delete&id=<?php echo $data["Film"]->Film_id ?>" class="btn btn-danger">Supprimer</a>
        <a href="index.php?controller=Films&action=getAll" class="btn btn-secondary">Retour</a>
    </div>

</body>
</html>