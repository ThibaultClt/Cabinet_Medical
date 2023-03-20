<?php

/**
 * Description of Util
 *
 * @author Thibault
 */

include '../Model/Utilisateur.php';
include '../Model/Secretaire.php';
include '../Model/Medecin.php';

class Util {
    
    public $serveur = "195.144.11.150";
    public $base = "zdj62853";
    public $usr =  "zdj62853";
    public $pass = "MIN2022!!";
    public $mysqli;
    
    /**
     * 
     * @param type $Login
     * @param type $Passwd
     * @return \Utilisateur
     */
    public function getUtilisateur($Login, $Passwd){
        
        $Utilisateur = NULL;
        
        $Query = "SELECT * FROM utilisateur";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Login = $ligne['Login'];
                    $_Passwd = $ligne['Password'];
                    
                    if( ($Login == $_Login) && ($Passwd == $_Passwd) )
                    {
                         $Utilisateur = new Utilisateur();
                         $Utilisateur->Id_Utilisateur = $ligne['Id_Utilisateur'];
                         $Utilisateur->Login = $ligne['Login'];
                         $Utilisateur->Password = $ligne['Passwd'];
                         $Utilisateur->Type_Utilisateur = $ligne['Type_Utilisateur'];
                         $Utilisateur->Last_Login = $ligne['Last_Login'];
                         
                         if($Utilisateur->getType_Utilisateur()=="Secretaire"){
                             $Secretaire = $this->getSecretaireByID($ligne['Id_Secretaire']);
                             $Utilisateur->setSecretaire($Secretaire);
                         }
                         if($Utilisateur->getType_Utilisateur()=="Medecin"){
                             $Medecin = $this->getMedecinByID($ligne['Id_Medecin']);
                             $Utilisateur->setMedecin($Medecin);
                         }
                         break;
                    }
                }

            }
        
        }
        return $Utilisateur;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Utilisateur
     */
    public function getUtilisateurById($Id){
        $Utilisateur = NULL;
        
        $Query = "SELECT * FROM utilisateur WHERE Id_Utilisateur='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Utilisateur'];
                    
                    if(($Id == $_Id))
                    {
                         $Utilisateur = new Utilisateur();
                         $Utilisateur->Id_Utilisateur = $ligne['Id_Utilisateur'];
                         $Utilisateur->Login = $ligne['Login'];
                         $Utilisateur->Password = $ligne['Password'];
                         $Utilisateur->Type_Utilisateur = $ligne['Type_Utilisateur'];
                         $Utilisateur->Last_Login = $ligne['Last_Login'];
                         
                         if($Utilisateur->getType_Utilisateur()=="Secretaire"){
                             $Secretaire = $this->getSecretaireByID($ligne['Id_Secretaire']);
                             $Utilisateur->setSecretaire($Secretaire);
                         }
                         if($Utilisateur->getType_Utilisateur()=="Medecin"){
                             $Medecin = $this->getMedecinByID($ligne['Id_Medecin']);
                             $Utilisateur->setMedecin($Medecin);
                         }
                         break;
                    }
                }

            }
        
        }
        return $Utilisateur;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Secretaire
     */
    public function getSecretaireByID($Id){
        $Secretaire = NULL;
        
        $Query = "SELECT * FROM secretaire WHERE Id_Secretaire='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Secretaire'];
                    
                    if(($Id == $_Id))
                    {
                         $Secretaire = new Secretaire();
                         $Secretaire->Id_Secretaire = $ligne['Id_Secretaire'];
                         $Secretaire->Nom_Secretaire = $ligne['Nom_Secretaire'];
                         $Secretaire->Prenom_Secretaire = $ligne['Prenom_Secretaire'];
                         break;
                    }
                }

            }
        
        }
        return $Secretaire;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Medecin
     */
    public function getMedecinByID($Id){
        $Medecin = NULL;
        
        $Query = "SELECT * FROM medecin WHERE Id_Medecin='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Medecin'];
                    
                    if(($Id == $_Id))
                    {
                         $Medecin = new Medecin();
                         $Medecin->Id_Medecin = $ligne['Id_Medecin'];
                         $Medecin->Nom_Medecin = $ligne['Nom_Medecin'];
                         $Medecin->Prenom_Medecin = $ligne['Prenom_Medecin'];
                         break;
                    }
                }

            }
        
        }
        return $Medecin;
    }

    /**
     * 
     * @param type $Id
     * @return \Patient
     */
    public function getPatientByID($Id){
        $Patient = NULL;
        
        $Query = "SELECT * FROM patient WHERE Id_Patient='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Patient'];
                    
                    if(($Id == $_Id))
                    {
                         $Patient = new Patient();
                         $Patient->Id_Patient = $ligne['Id_Patient'];
                         $Patient->Nom_Patient = $ligne['Nom_Patient'];
                         $Patient->Prenom_Patient = $ligne['Prenom_Patient'];
                         $Patient->Sexe_Patient = $ligne['Sexe_Patient'];
                         $Patient->Adresse_Patient = $ligne['Adresse_Patient'];
                         $Patient->Ville_Patient = $ligne['Ville_Patient'];
                         $Patient->Departement_Patient = $ligne['Departement_Patient'];
                         $Patient->Date_Naissance_Patient = $ligne['Date_Naissance_Patient'];
                         $Patient->Situation_Familiale_Patient = $ligne['Situation_Familiale_Patient'];
                         $Patient->Affiliation_Mutuelle = $ligne['Affiliation_Mutuelle'];
                         $Patient->Date_Creation_Dossier = $ligne['Date_Creation_Dossier'];
                         break;
                    }
                }

            }
        
        }
        return $Patient;
    }

    /**
     * 
     * @param type $Id
     * @return \Liste rendez-vous
     */
    public function getRendezVousAVenirByIDMedecin($Id){
        $Rendez_Vous = NULL;
        
        $Query = "SELECT r.Id_Rendez_Vous, r.Date_Rendez_Vous, r.Salle_Rendez_Vous, 
          p.Nom_Patient, p.Prenom_Patient 
          FROM rendez_vous r 
          JOIN patient p ON r.Id_Patient = p.Id_Patient
          WHERE (Id_Medecin='".$Id."') AND (DATEDIFF(Date_Rendez_Vous, DATE (NOW())) >= 0) 
          ORDER BY Date_Rendez_Vous ASC";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                $Rendez_Vous = $result;
            }
        
        }
        return $Rendez_Vous;
    }

    /**
     * 
     * @param type $Id
     * @return \Liste rendez-vous
     */
    public function getRendezVousPassesByIDMedecin($Id){
        $Rendez_Vous = NULL;
        
        $Query = "SELECT r.Id_Rendez_Vous, r.Date_Rendez_Vous, r.Salle_Rendez_Vous, 
          p.Nom_Patient, p.Prenom_Patient 
          FROM rendez_vous r 
          JOIN patient p ON r.Id_Patient = p.Id_Patient
          WHERE (Id_Medecin='".$Id."') AND (DATEDIFF(Date_Rendez_Vous, DATE (NOW())) >= 0) 
          ORDER BY Date_Rendez_Vous ASC";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                $Rendez_Vous = $result;
            }
        
        }
        return $Rendez_Vous;
    }
    
    /**
     * 
     * @return \Rendez-vous
     */
    public function getRendezVous(){
        $Rendez_Vous = NULL;
        
        $Query = "SELECT r.Id_Rendez_Vous, r.Date_Rendez_Vous, r.Salle_Rendez_Vous,
        m.Nom_Medecin, m.Prenom_Medecin, 
        p.Nom_Patient, p.Prenom_Patient 
        FROM rendez_vous r 
        JOIN medecin m ON r.Id_Medecin = m.Id_Medecin 
        JOIN patient p ON r.Id_Patient = p.Id_Patient";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                $Rendez_Vous = $result;
            }
        
        }
        return $Rendez_Vous;
    }

    /**
     * 
     * @param type $Id
     * @return \Liste patients
     */
    public function getPatientByIDMedecin($Id){
        $Patients = NULL;
        
        $Query = "SELECT p.Id_Patient, p.Nom_Patient, p.Prenom_Patient, p.Sexe_Patient, p.Adresse_Patient, p.Ville_Patient, p.Date_Naissance_Patient
        FROM consultation c 
        JOIN medecin m ON c.Id_Medecin = m.Id_Medecin  
        JOIN patient p ON c.Id_Patient = p.Id_Patient
        WHERE m.Id_Medecin='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                $Patients = $result;
            }
        
        }
        return $Patients;
    }

    /**
     * 
     * @param type $Id
     * @return \Liste consultations
     */
    public function getInfoConsultationByIDMedecin($Id){
        $Patients = NULL;
        
        $Query = "SELECT c.Id_Consultation, c.Date_Consultation, c.Compte_Rendu_Consultation, 
        m.Nom_Medecin, m.Prenom_Medecin, 
        p.Nom_Patient, p.Prenom_Patient 
        FROM consultation c 
        JOIN medecin m ON c.Id_Medecin = m.Id_Medecin 
        JOIN patient p ON c.Id_Patient = p.Id_Patient
        WHERE m.Id_Medecin='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                $Patients = $result;
            }
        
        }
        return $Patients;
    }

    /**
     * 
     * @return \Liste patients
     */
    public function getPatients(){
        $Patients = NULL;
        
        $Query = "SELECT * FROM patient";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                $Patients = $result;
            }
        
        }
        return $Patients;
    }
    
    /**
     * 
     */
    public function dbConnection(){
        $this->mysqli= new mysqli($this->serveur, $this->usr, $this->pass, $this->base);
        $this->mysqli->set_charset("utf8");
    }
       
}