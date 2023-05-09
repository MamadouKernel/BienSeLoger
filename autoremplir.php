<?php

require ('vendor/autoload.php');
$faker = Faker\Factory::create();
include 'core/DB_connect.php';
$db = new DATABASE();

//insertion de la maison

for($i = 0; $i<50; $i++){

$produits = $db->insert("INSERT INTO t_produit VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",[
    null,
    $faker->text(20), // title
    $faker->randomNumber(6, true), //prix
    $faker->imageUrl(850,570, 'house',true), //imageP
    $faker->imageUrl(850,570, 'house',true), //images
    $faker->imageUrl(850,570, 'house',true),//imaget
    $faker->imageUrl(850,570, 'house',true),//imageq
    $faker->text(255), //desc
    1,//statut
    "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31779.20393295549!2d-3.970946840075972!3d5.355699479919329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1edc0fd0ae61f%3A0x87db4527e281cd1d!2sCap%20Nord!5e0!3m2!1sfr!2sci!4v1665674802858!5m2!1sfr!2sci' width='355' height='650' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>",//linkmap
    $faker->text(20),//commune
    $faker->text(50),//quatier
    $faker->randomDigit(),//chambre
    $faker->randomNumber(3,true),//espace
    $faker->randomDigit(),//garage
    $faker->randomDigit(),//salle_bain
    $faker->randomDigit(),//cuisine
    $faker->randomDigit(),//salon
    $faker->boolean(),//etat
    1,
    1,
    2
]);

    $agents = $db->insert("INSERT INTO t_agent VALUES(?,?,?,?,?,?,?,?,?,?)",[
        null,
        $faker->name(), // Nom Prenom
        $faker->imageUrl(88,88,true),//image
        $faker->email(), //email
        $faker->password(6,8), //Password
        $faker->randomNumber(8, true), //Telephone
        $faker->text(25),//commune
        $faker->text(150),//description
        $faker->boolean(true),//role
        1
    ]);

    if(($produits = true) AND ($agents = true)){
        echo'success'.''.$i .'<br>';
    }else{
        echo'echec';
    }
}
