<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:32
 */

require 'loader.php';

echo $twig->render('contact.kmphtml.twig',[
    'active'=>'contact',
    'house_recom'=>$house->affich_produit_limite(6),
    'session'=> connect(),
    'log_con'=>$agent->_log_connect(),
]);

function connect(){
    return isset($_SESSION['agent']);
}