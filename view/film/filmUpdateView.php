<!-- Page HTML pour éditer les détails d'un film -->

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
        <form action="index.php?controller=Films&action=save" method="post">
            <h3>Film detaillé</h3>
            <hr/>
            <input type="hidden" name="id" value="<?php echo $data["Film"]->Film_id ?>" />
            Nom: <input type="text" name="titre" value="<?php echo $data["Film"]->Film_nom ?>" class="form-control" />
            date: <input type="text" name="date" value="<?php echo $data["Film"]->Date_sortie ?>" class="form-control" />
            <label for="film_image">Image du film:</label>
            <input type="file" name="film_image" class="form-control" />

            réalisateur: <input type="text" name="realisateur" value="<?php echo $data["Film"]->Realisateur ?>" class="form-control" />
            <input type="submit" value="Modifier" class="btn btn-success"/>
        </form>
        <!--<a href="index.php" class="btn btn-info">Retour</a>
        <a href="index.php?controller=Films&action=getAll" class="btn btn-info">Retour</a>-->
        <a href="index.php?controller=Films&action=read&id=<?php echo $data["Film"]->Film_id ?>" class="btn btn-info">Retour</a>
    </div>

</body>
</html>