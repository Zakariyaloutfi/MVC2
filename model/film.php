
<?php

    // Classe représentant un film dans la base de données
    class Film{
        
        // Variables membres
        private $table="Film"; // Nom de la table dans la base de données
        private $Connexion; // Objet de connexion à la base de données

        // Propriétés d'un film
        private $Film_id;
        private $Film_nom;
        private $Date_sortie;
        private $Realisateur;
        private $Film_image_path;
        private $Film_trailer_path;

        // Constructeur qui initialise la connexion à la base de données
        public function __construct($Connexion){
            $this->Connexion = $Connexion;
        }

        // Getters and Setters
        public function getFilm_id(){
            return $this->Film_id;
        }
        public function getFilm_nom(){
            return $this->Film_nom;
        }
        public function getDate_sortie(){
            return $this->Date_sortie;
        }
        public function getRealisateur(){
            return $this->Realisateur;
        }
        public function getFilm_image_path(){
            return $this->Film_image_path;
        }

        public function setFilm_id($id){
            $this->Film_id = $id;
        }
        public function setFilm_nom($nom){
            $this->Film_nom = $nom;
        }
        public function setDate_sortie($date){
            $this->Date_sortie = $date;
        }
        public function setRealisateur($realisateur){
            $this->Realisateur = $realisateur;
        }
        public function setFilm_image_path($path){
            $this->Film_image_path = $path;
        }
        public function getFilm_trailer_path(){
            return $this->Film_trailer_path;
        }
        
        public function setFilm_trailer_path($path){
            $this->Film_trailer_path = $path;
        }
        

        // CRUD methods        
        // Récupère tous les films de la base de données
        public function getAll(){
            $query = $this->Connexion->prepare("SELECT Film_id, Film_nom, Date_sortie, Realisateur, Film_image_path, Film_trailer_path FROM " . $this->table);
            $query->execute();
            $result = $query->fetchAll();
            $this->Connexion = null;
            return $result;
        }
            
        // Récupère un film spécifique par son ID
        public function getById($id){
            $query = $this->Connexion->prepare("SELECT Film_id, Film_nom, Date_sortie, Realisateur, Film_image_path, Film_trailer_path FROM ".$this->table. " WHERE Film_id = :id");
            $query->execute(array("id" => $id));
            $result = $query->fetchObject();
            $this->Connexion = null;
            return $result;
        }

        // Insère un nouveau film dans la base de données
        public function insert(){
            $query = $this->Connexion->prepare("INSERT INTO " . $this->table . " (Film_nom, Date_sortie, Realisateur, Film_image_path) VALUES (:titre, :date, :realisateur, :image_path)");
            $result = $query->execute(array(
                "titre" => $this->Film_nom,
                "date" =>  $this->Date_sortie,
                "realisateur" => $this->Realisateur,
                "image_path" => $this->Film_image_path
            ));
            $this->Connexion = null;
            return $result;
        }
        
        

         // Met à jour les informations d'un film existant dans la base de données
        public function update(){
            $query = $this->Connexion->prepare("UPDATE " . $this->table . " SET Film_nom= :titre, Date_sortie= :date, Realisateur= :realisateur, Film_image_path= :image_path, Film_trailer_path= :trailer_path WHERE Film_id = :id");
                $result = $query->execute(array(
                "id" => $this->Film_id,
                "titre" => $this->Film_nom,
                "date" => $this->Date_sortie,
                "realisateur" => $this->Realisateur,
                "image_path" => $this->Film_image_path
            ));
            $this->Connexion = null;
            return $result;
        }

        
        // Supprime un film de la base de données
        public function delete(){
            $query = $this->Connexion->prepare("DELETE FROM " . $this->table . " WHERE Film_id = :id");
            $result = $query->execute(array("id" => $this->Film_id));
            $this->Connexion = null;
            return $result;
        }
    }
?>
