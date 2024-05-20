
    
    <!-- Bibliothèque Fontawesome pour les icones  -->
    <link href="/MVC2/assets/image/fontawesome-free-6.4.0-web/css/fontawesome.min.css" rel="stylesheet" />
    <link href="/MVC2/assets/image/fontawesome-free-6.4.0-web/css/brands.min.css" rel="stylesheet"/>
    <link href="/MVC2/assets/image/fontawesome-free-6.4.0-web/css/solid.min.css" rel="stylesheet"/> 
    <!-- Bibliothèque Boostrap pour la mise en page  -->
    <link rel="stylesheet" href="/MVC2/assets/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="/MVC2/assets/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <?php 
            session_start();
            
            require_once __DIR__ ."/../controller/authenticateController.php";
            
            if(isset($isLoggedIn))
                if (!$isLoggedIn) {
                    //$util->redirect("dashboard.php");
                    //echo "isConnected";
                    header('Location: /MVC2/login.php');
                }


    ?>
