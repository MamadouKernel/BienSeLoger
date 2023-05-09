<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:43
 */

require 'loader.php';

if(connect()){
    header('location:http://biensseloger.immo/publier-propriete');
}


$reponse = "";

if(isset($_POST['log'])){
    extract($_POST);

    if ($agent->_login_agent($email,$pwd)){

        $reponse = "success";
    }else{
        $reponse ="echec";
    }

}



echo $twig->render('login.kmphtml.twig', [
    'active' => 'login',
    'message' => $reponse,
    'message_connexion' => 'Connexion réussie ! le système va vous rediriger !....',
    'message_err_connexion' => 'Echec Vos données d\'ouverture de session sont incorrectes ! Réessayer SVP !',
    'session'=> connect(),
]);

function connect(){
    return isset($_SESSION['agent']);
}