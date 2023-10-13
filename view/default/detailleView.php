
    <!--  page HTML qui permet à l'utilisateur d'afficher et de modifier les détails d'un film.  -->

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
    <div class="col-lg-5 mr-auto">
      <!-- Formulaire pour la mise à jour des détails du film -->
      <form action="index.php?controller=Films&action=maj" method="post">
            <h3>Film detaillé</h3>
            <hr/>
            <!-- Champ caché pour stocker l'ID du film -->
            <input type="hidden" name="id" value="<?php echo $data["Film"]->Film_id ?>" />
            <!-- Champ pour le nom du film -->
            Nom: <input type="text" name="titre" value="<?php echo $data["Film"]->Film_nom ?>" class="form-control" />
            <!-- Champ pour la date de sortie du film -->
            date: <input type="text" name="date" value="<?php echo $data["Film"]->Date_sortie ?>" class="form-control" />
            <!-- Champ pour le réalisateur du film -->
            realisateur: <input type="text" name="realisateur" value="<?php echo $data["Film"]->Realisateur ?>" class="form-control" />
            <!-- Bouton pour soumettre le formulaire -->
            <input type="submit" value="Modifier" class="btn btn-sucess"/>
        </form>
        <!-- Bouton pour retourner à la page précédente -->
        <a href="index.php" class="btn btn-info">Retour</a>
    </div>

</body>
</html>