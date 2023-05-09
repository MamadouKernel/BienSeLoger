<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/10/2022
 * Time: 16:28
 */

require 'loader.php';

if(!connect()){
    header('location: http://biensseloger.immo/login');
}

$reponse ="";

if(isset($_POST['modifier'])){
    extract($_POST);

//    var_dump($_POST);
//    exit();

    $verif_edit_agent = $agent->verif_id_agent($id_edit);
    if($verif_edit_agent == 0){
        $reponse .= 'echec';
    }else{
        $upload_dir = chemin.'files/agents/';
        $img_agent = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        if(empty($img_agent)){
            $img_agent = $curent_image;
        }

        $edit_agent = $agent->edit_agent($name,$img_agent,$email,$pwd,$tel,$commune,$desc,$role,$id_edit);

        if($edit_agent == true){

            $reponse .= 'success';
            if(!empty($img_agent)){
                move_uploaded_file($tmp_name,$upload_dir.$img_agent);
            }
        }else{
            $reponse .= 'echecc';
        }

    }

}


echo $twig->render('profile.kmphtml.twig', [
    'active' => 'login',
    'session'=>connect(),
    'log_con'=>$agent->_log_connect(),
    'message' => $reponse,
    'message_success' => 'L\'Agent a bien été modifier avec sucèss',
    'message_echec' => 'Echec d\'enregistrement veuillez verifier si les informations sont correctes',
    'add_noexit' => 'Désoler cet agent n\'existe pas',
]);

function connect(){
    return isset($_SESSION['agent']);
}