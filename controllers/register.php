<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:46
 */
require 'loader.php';

if(connect()){
    header('location:http://biensseloger.immo/publier-propriete');
}


$reponse ="";

if (isset($_POST['register'])){
    extract($_POST);

    $verif_agen = $agent->verif_agent($email,$tel);

    if($verif_agen !=0){
        $reponse .= 'echec';
    }else{
        $upload_dir =chemin.'files/agents/';
        $imageAgent = $_FILES['ImageAgent']['name'];
        $tmp_name = $_FILES['ImageAgent']['tmp_name'];
        $np = $n . ' ' . $p;
        $role = 'Agent';

        $add_agent = $agent->add_agent($np,$imageAgent,$email,$pwd,$tel,$commune,$desc,$role);

        if ($add_agent == true) {
            $reponse .= "success";
            move_uploaded_file($tmp_name, $upload_dir . $imageAgent);
        } else {
            $reponse .= "echec";
        }
    }

}


echo $twig->render('register.kmphtml.twig', [
    'active' => 'login',
    'message' => $reponse,
    'message_succes' => 'L\'Agent a bien été enregistrer avec sucèss',
    'message_echec' => 'Echec d\'enregistrement veuillez verifier si les informations sont correctes',
    'add_exit' => 'Désoler cet agent existe déjà',
    'session'=> connect(),

]);

function connect(){
    return isset($_SESSION['agent']);
}