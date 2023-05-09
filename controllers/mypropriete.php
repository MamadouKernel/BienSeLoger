<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/10/2022
 * Time: 22:14
 */

require 'loader.php';

if(!connect()){
    header('location: http://biensseloger.immo/login');
}

$id_connect = $agent->_log_connect()[0]->idT_AGENT;

$reponse ='';
if(isset($_GET['del'])){
    extract($_GET);
    $del_property = $house->del_propriete($del);

    if($del_property == true){
        $reponse .='success';
    }else{
        $reponse .='echec';
    }
}

echo $twig->render('mypropriete.kmphtml.twig', [
    'active' => 'login',
    'session'=>connect(),
    'log_con'=>$agent->_log_connect(),
    'propri_by_agen'=> $house->propriete_indi($id_connect),
     'message' => $reponse,
     'message_success' => 'Votre proprété a bien été supprimé avec sucèss',
     'message_echec' => 'Echec de suppression',
]);

function connect(){
    return isset($_SESSION['agent']);
}