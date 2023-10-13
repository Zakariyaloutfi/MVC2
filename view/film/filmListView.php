<!-- page HTML pour afficher une liste de films -->



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titre"] ?></title>

    <?php include "view/header.php"; ?>

</head>
<body>
    <!--<div style="margin: 5px;">
        <a href="index.php?controller=Films&action=index" class="btn btn-info">
            <i class="fa-solid fa-house" style="color:darkslategray"></i> - Accueil
        </a>  
    </div>-->

    <?php include "view/navbar.php"; ?>


    <div class="container mt-3">
        <!-- En-tête de la liste des films -->
        <h3 style="float:left">Liste des Films </h3>          <!-- Bouton pour ajouter un nouveau film --> <a href="index.php?controller=Films&action=create" 
                    class="btn btn-secondary" style="float:right">
                    <i class="fa-solid fa-plus" style="color:whitesmoke"></i>
                    </a>   
        <!--<hr/> -->
        <br>

        <style>
            /* striped color */
            .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
                background-color: #F1F1F1;
            }
            /* focus line color */
            .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: lightgrey;
            }
        </style>

        <!-- Tableau pour afficher les films -->
        <table class="table table-striped table-hover shadow-sm rounded">
            <thead class="table-dark">
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Réalisateur</th>
                <th>Image</th>
                <th>Bande-annonce</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <!-- Boucle pour afficher chaque film -->
            <?php foreach($data["Films"] as $Film) {?>
            <tr>
                <td><?php echo $Film["Film_nom"]; ?></td>
                <td><?php echo $Film["Date_sortie"]; ?></td>
                <td><?php echo $Film["Realisateur"]; ?></td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#imageModal<?php echo $Film['Film_id']; ?>">Voir l'image du film</a>
        
                    <!-- Structure de la modale pour l'image -->
                    <div class="modal fade" id="imageModal<?php echo $Film['Film_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Image du film : <?php echo $Film["Film_nom"]; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo $Film["Film_image_path"]; ?>" alt="Image du film" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                </td>  

                <td>
   
                 <a href="#" data-toggle="modal" data-target="#trailerModal<?php echo $Film['Film_id']; ?>">Voir bande annonce</a>
                
                <!-- Modale pour afficher la bande-annonce du film -->
                <div class="modal fade" id="trailerModal<?php echo $Film['Film_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="trailerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="trailerModalLabel">Bande annonce : <?php echo $Film["Film_nom"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <video width="100%" controls>
                                    <source src="<?php echo $Film["Film_trailer_path"]; ?>" type="video/mp4">
                                    Votre navigateur ne prend pas en charge la vidéo.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
                <td align="right">
                    <a href="index.php?controller=Films&action=read&id=<?php echo $Film['Film_id']; ?>">
                        <i class="fa-solid fa-magnifying-glass" style="color:darkslategray"></i>
                    </a> &nbsp;
                    <a href="index.php?controller=Films&action=delete&id=<?php echo $Film['Film_id']; ?>">
                        <i class="fa-regular fa-trash-can" style="color:red"></i>
                    </a>
                </td>
            </tr>      
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>