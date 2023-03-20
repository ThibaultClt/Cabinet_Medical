<!-- Projet cabinet médical -->
<!-- @author Thibault & Matthieu & Matthieu -->

<?php

   require('../Controller/Util.php');
   
   
   session_start();
    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else{
        $Util = new Util();
        $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
        $Medecin = new Medecin();
        $Medecin = $Utilisateur->getMedecin();
        $Rendez_Vous_A_Venir = $Util->getRendezVousAVenirByIDMedecin($_SESSION["ID_CONNECTED_USER"]);
        $Rendez_Vous_Passes = $Util->getRendezVousPassesByIDMedecin($_SESSION["ID_CONNECTED_USER"]);
    }
   

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               <?php
                    
                    echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
               ?>
        </title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
        <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="content" class="span9">
                    <div class="main_body">
                    
                        <div class="Home-Header">
                            <div class="Slogan">
                                
                            </div>
                            <div class="Contact-Research">

                            </div>
                            <div class="Logo">

                            </div>
                        </div>
                        <div class="Horizontal-menu">
                            <center>
                                <h4>
                                    <?php
                                        echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
                                   ?>
                                </h4>
                            </center>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Liste des rendez-vous à venir 
                            </div>
                            <div>
                                <center>
                                    <table class="table table-striped table-bordered align-middle">
                                        <thead >
                                            <tr>
                                                <th scope="col">Id Rendez-vous</th>
                                                <th scope="col">Date Rendez-vous</th>
                                                <th scope="col">Salle Rendez-vous</th>
                                                <th scope="col">Patient</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_array($Rendez_Vous_A_Venir)) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row["Id_Rendez_Vous"] ?></td>
                                                    <td class="text-center"><?php echo $row["Date_Rendez_Vous"] ?></td>
                                                    <td class="text-center"><?php echo $row["Salle_Rendez_Vous"] ?></td>
                                                    <td class="text-center"><?php echo $row["Nom_Patient"] . " " . $row["Prenom_Patient"] ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            
                            <div class="en_bref">
                            </div>

                        </div>

                        <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">

                                <a href="consultations_medecin.php"><i class="icon-list"></i> Mes consultations </a>
                                <br/>
                                <a href="patients_medecin.php"><i class="icon-user"></i> Mes patients </a>
                                <br/>
                                <a href="medecin_display.php"><i class="icon-calendar"></i> Mes rendez-vous </a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>
                                
                            </div>
                        </div>
                        
                        
                    </div>

                        <div class="Left-body">
                            <div class="Left-body-head">
                                Liste des rendez-vous passés 
                            </div>
                            <div>
                                <center>
                                    <table class="table table-striped table-bordered align-middle">
                                        <thead >
                                            <tr>
                                                <th scope="col">Id Rendez-vous</th>
                                                <th scope="col">Date Rendez-vous</th>
                                                <th scope="col">Salle Rendez-vous</th>
                                                <th scope="col">Id Patient</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_array($Rendez_Vous_Passes)) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row["Id_Rendez_Vous"] ?></td>
                                                    <td class="text-center"><?php echo $row["Date_Rendez_Vous"] ?></td>
                                                    <td class="text-center"><?php echo $row["Salle_Rendez_Vous"] ?></td>
                                                    <td class="text-center"><?php echo $row["Nom_Patient"] . " " . $row["Prenom_Patient"] ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </div>
                        
                    
                    </div>
                    <div class="footer">
                        &COPY; Cabinet Médical 2021
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
    
    
    
</html>
