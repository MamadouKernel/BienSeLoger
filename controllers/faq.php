<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 29/10/2022
 * Time: 17:09
 */
require 'loader.php';



echo $twig->render('faq.kmphtml.twig',[
    'active' => 'index',
    'session'=> connect(),
    'log_con'=>$agent->_log_connect(),
]);

function connect(){
    return isset($_SESSION['agent']);
}