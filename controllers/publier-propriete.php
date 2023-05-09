<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:53
 */

require 'loader.php';

if(!connect()){
    header('location: http://biensseloger.immo/login');
}

$reponse ="";
if(isset($_POST['finish'])){
    extract($_POST);

//    var_dump($_POST);
//    var_dump($_FILES);
//    exit();

    //recuperation de l'id de l'agent
    $id_ag = $agent->_log_connect()[0]->idT_AGENT;
//    var_dump($id_ag);
//    exit();
    //le chemin des upload
    $uploads_dir = chemin.'files/proprietes/';
//image principal
    $imageP = $_FILES['ImageP']['name'];
    $image_name = $_FILES['ImageP']['tmp_name'];

//deuxieme image
    $imageS = $_FILES['imageS']['name'];
    $image_second = $_FILES['imageS']['tmp_name'];

//troisieme image
    $imageT = $_FILES['imageT']['name'];
    $image_tert = $_FILES['imageT']['tmp_name'];

//quatrieme image
    $imageQ = $_FILES['imageQ']['name'];
    $image_quatre = $_FILES['imageQ']['tmp_name'];

    $add_house = $house->add_house($nom,$price,$imageP,$imageS,$imageT,$imageQ,$description,1,$iframe,$commune,$ville,$ktier,$nbcham,$espace,$garage,$salbain,$cuisine,$salon,$etat,$cat,$id_ag);

//insertion des donnees

    if($add_house == true){
        $reponse .= "success";

        //pour la premiere image
        move_uploaded_file($image_name,$uploads_dir.$imageP);
        //pour la deuxieme image
        move_uploaded_file($image_second,$uploads_dir.$imageS);
        //pour la troisieme image
        move_uploaded_file($image_tert,$uploads_dir.$imageT);
        //pour la quatrieme image
        move_uploaded_file($image_quatre,$uploads_dir.$imageQ);
    }else{
        $reponse .= "echec";
    }



}


//$ville = file_get_contents("https://simplemaps.com/static/data/country-cities/ci/ci.json");
$ville = file_get_contents(chemin."core/ci.json");
$ville = json_decode($ville);
// end ville

$commune = file_get_contents(chemin."core/cii.json");
$commune = json_decode($commune);


echo $twig->render('publier-propriete.kmphtml.twig', [
    'active' => 'publier',
    'show_categorie' => $house_cat->show_categories(),
    'villes' =>$ville,
    'communes'=>$commune,
    'message'=>$reponse,
    'message_succes'=>'La propriété à bien été enregistrer avec succèss',
    'message_echec'=>'Echec d\'enregistrement veuillez vérifier si les informations sont correctes',
    'session'=> connect(),
    'log_con'=>$agent->_log_connect(),
]);

function connect(){
    return isset($_SESSION['agent']);
}