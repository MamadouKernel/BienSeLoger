<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/10/2022
 * Time: 12:52
 */

require 'loader.php';

if(isset($_GET['id'])){
    extract($_GET);

    $view_produit = $house->detail_produit($id);
}


echo $twig->render('detail_propriete.kmphtml.twig',[
    'active' => 'produits',
    'show_categorie' => $house_cat->show_categories(),
    'view_produits' => $view_produit[0],
    'show_produits_limit'=>$house->affich_produit_limite(6),
    'session'=>connect(),
    'log_con'=>$agent->_log_connect()

]);

function connect(){
    return isset($_SESSION['agent']);
}