<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08/11/2022
 * Time: 23:35
 */
require 'loader.php';
$article_page=9;

if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) {
    extract($_GET);
    $page = intval($_GET['page']);
    $page_courante = $page;
} else {
    $page_courante = 1;
}

$begin = ($page_courante - 1) * $article_page;

if(isset($_GET['recherche'])){
    extract($_GET);
    $prods_count = $house->nb_propriete();
    $prods = $house->search_propr($begin, $article_page,$motcle);
    /**
     *  total plan
     */
    $total_plan = $prods_count;
    $total_page = ceil($total_plan / $article_page);
}else{
    $prods_count = $house->nb_propriete();
    $prods= $house->affich_produit($begin, $article_page);
    /**
     *  total plan
     */
    $total_plan = $prods_count;
    $total_page = ceil($total_plan / $article_page);
}




echo $twig->render('produits.kmphtml.twig', [
    'active' => 'PRODUITS',
//    'show_categorie' => $house_cat->show_categories(),
    'show_produits' => $prods ,
    'show_produits_limit'=>$house->affich_produit_limite(10),
    'session'=>connect(),
    'log_con'=>$agent->_log_connect(),
    'page_courante' => $page_courante,
    'total_page' => $total_page,
    'i'=>'i',
    'path' => isset($_GET['motcle']),
    'get_page' => isset($_GET['page']),
]);

function connect(){
    return isset($_SESSION['agent']);
}