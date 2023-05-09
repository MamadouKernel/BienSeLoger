<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 29/10/2022
 * Time: 08:48
 */

require 'loader.php';

if(!connect()){
    header('location: http://biensseloger.immo/login');
}

$reponse ="";





if (isset($_GET['edit']) and $house->verif_id_propert($_GET['edit']) != NULL) {
    extract($_GET);

    $edit_property = $house->verif_id_propert($edit);

//    var_dump($edit_property);
//    exit();

} else {
    header('location: http://biensseloger.immo/');
}
//$ville = file_get_contents("https://simplemaps.com/static/data/country-cities/ci/ci.json");
$ville = file_get_contents(chemin."core/ci.json");
$ville = json_decode($ville);
// end ville

$commune = file_get_contents(chemin."core/cii.json");
$commune = json_decode($commune);

echo $twig->render('edit_property.kmphtml.twig', [
    'active' => 'login',
    'session' =>connect(),
    'edit_propert'=>$edit_property[0],
    'log_con' =>$agent->_log_connect(),
    'show_categorie' => $house_cat->show_categories(),
    'villes' =>$ville,
    'communes'=>$commune,
]);

function connect(){
    return isset($_SESSION['agent']);
}