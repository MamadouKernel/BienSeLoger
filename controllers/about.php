<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 20:38
 */
require 'loader.php';

echo $twig->render('about.kmphtml.twig',[
    'active'=>'about',
    'session'=> connect(),
    'log_con'=>$agent->_log_connect(),
]);

function connect(){
    return isset($_SESSION['agent']);
}