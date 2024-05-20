<?php 
// Contrôleur pour gérer les opérations liées aux films
class FilmsController{

    private $connecteur;
    private $connexion;

    public function __construct(){
        require_once __DIR__ ."/../core/connecteur.php";
        require_once __DIR__ ."/../model/Film.php";

        $this->connecteur = new Connecteur();
        $this->connexion=$this->connecteur->connexion();
    }

    public function run($action){
    // En fonction de l'action passée en paramètre, exécute la méthode correspondante
        switch($action){
            case "index" :
                $this->index();
                break;
            case "read" :
                $this->read();
                break;
            case "getAll" :
                $this->getAll();
                break;
            case "edition" :
                $this->edition();
                break;
            case "create" :
                $this->create();
                break;
            case "save" :
                $this->save();
                break;
            case "delete" :
                $this->delete();
                break;
            default :
                $this->index();
                break;
        }


    }

    /**
     * Chargement des Films sur la page d'accueil
     */
    public function index(){
        // on charge un objet modele Film
        //$Film = new Film($this->connexion);
        //$listeFilms = $Film->getAll();
        //$this->view("index",array("Films"=>$listeFilms,"titre"=> "PHP MVC"));
        header('Location: /MVC2/welcome.php');
    }   

    public function read(){
        // on charge un objet modele Film
        $Film = new Film($this->connexion);
        $unFilm = $Film->getById($_GET["id"]);
        $this->view("FilmRead", array("Film"=>$unFilm,"titre" => "Film"));
    }

    // Méthode pour sauvegarder les informations d'un film (nouveau ou existant)
    public function save(){
        if(isset($_POST["id"])){
            $Film = new Film($this->connexion);
            $Film->setFilm_id($_POST["id"]);
            $Film->setFilm_Nom($_POST["titre"]);
            $Film->setDate_sortie($_POST["date"]);
            $Film->setRealisateur($_POST["realisateur"]);
            if ($_FILES["film_image"]["name"]) {
                $image_path = $this->uploadImage($_FILES["film_image"]);
                $Film->setFilm_image_path($image_path);
            }
            $Film->update();
        }
        else
        {
            $Film = new Film($this->connexion);
            $Film->setFilm_Nom($_POST["titre"]);
            $Film->setDate_sortie($_POST["date"]);
            $Film->setRealisateur($_POST["realisateur"]);
            if ($_FILES["film_image"]["name"]) {
                $image_path = $this->uploadImage($_FILES["film_image"]);
                $Film->setFilm_image_path($image_path);
            }
            $Film->insert(); 
        }
        header('Location: /MVC2/index.php?controller=Films&action=getAll');
    }
    
    // Méthode pour supprimer un film à partir de son identifiant
    public function delete(){
        if(isset($_GET["id"])){
            $Film = new Film($this->connexion);
            $Film->setFilm_id($_GET["id"]);
            $Film->delete();
        }
        // Redirection vers la liste des films après la suppression
        header('Location: /MVC2/index.php?controller=Films&action=getAll');
    }

    // Méthode pour préparer la vue d'édition d'un film à partir de son identifiant
    public function edition(){
        $Film = new Film($this->connexion);
        // Récupère les données du film à partir de son identifiant
        $unFilm = $Film->getById($_GET["id"]);
        // Charge la vue d'édition avec les données du film
        $this->view("FilmUpdate", array("Film"=>$unFilm,"titre" => "Edition Film"));
    }


    // Méthode pour afficher la vue de création d'un nouveau film
    public function create(){
        $Film = new Film($this->connexion);
        $this->view("FilmCreate", array("Film"=>$Film,"titre" => "Ajout Film"));
    }
    // Méthode pour obtenir et afficher la liste de tous les films
    public function getAll(){
        $Film = new Film($this->connexion);
        $listeFilms = $Film->getAll();
        $this->view("FilmList",array("Films"=>$listeFilms,"titre"=> "Liste des Films"));
    }

// Méthode pour afficher une vue spécifique
    public function view($name,$data){
        require_once __DIR__ . "/../view/Film/" . $name . "View.php";
    }

    private function uploadImage($file){
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Vérifiez si le fichier est une image
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    
        // Vérifiez si le fichier existe déjà
        if (file_exists($target_file)) {
            echo "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        }
    
        // Vérifiez la taille du fichier
        if ($file["size"] > 500000) { // 500KB
            echo "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }
    
        // Autorise certains formats de fichier
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }
    
        // Vérifiez si $uploadOk est défini sur 0 par une erreur
        if ($uploadOk == 0) {
            echo "Désolé, votre fichier n'a pas été téléchargé.";
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $target_file; // Retourne le chemin du fichier
            } else {
                echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
                return false;
            }
        }
    }
    

}