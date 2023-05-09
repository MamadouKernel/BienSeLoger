<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:16
 */
require 'loader.php';


$all_images = ($house->nb_imp_all() + $house->nb_ims_all() + $house->nb_imt_all() + $house->nb_imq_all());


echo $twig->render('index.kmphtml.twig',[
    'active' => 'index',
    'show_categorie' => $house_cat->show_categories(),
    'show_produits_limit'=>$house->affich_produit_limite(7),
    'nb_categorie'=>$house_cat->nb_categories(),
    'nb_house'=>$house->nb_house_all(),
    'all_image'=>$all_images,
    'nb_agent'=>$agent->nb_agent_all(),
    'show_agent'=>$agent->show_all_agent(6),
    'session'=> connect(),
    'log_con'=>$agent->_log_connect(),
]);

function connect(){
    return isset($_SESSION['agent']);
}
