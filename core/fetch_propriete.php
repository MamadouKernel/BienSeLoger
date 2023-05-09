<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 07/11/2022
 * Time: 14:38
 */

if(isset($_POST["limit"], $_POST["start"]))
{
    $connect = mysqli_connect("localhost", "root", "", "bienseloger");
    $id=$_SESSION['id'];
    $query = "SELECT * FROM T_PRODUIT WHERE idT_AGENT=$id   LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
    $result = mysqli_query($connect, $query);
    $formnum = numfmt_create('fr_FR', NumberFormatter::CURRENCY);
    while($row = mysqli_fetch_array($result))
    {
        echo '
        <div class="box-two proerty-item">
            <div class="item-thumb">
               <a href="/detail_propriete?id='.$show["idT_PRODUIT"].'" ><img src="files/proprietes/'.$show["ImageP"].'"></a>
            </div>
            <div class="item-entry overflow">
               <h5><a href="/detail_propriete?id='.$show["idT_PRODUIT"].'">'.$show["Title"].' </a></h5>
               <h5 class="pull-right" style="background-color: #FDC600; font-size: 16px; font-weight: bold"></h5>
               <div class="dot-hr"></div>
               <br>
               <span class="pull-left"><b> Superficie :</b>'.$show["Espaces"] .'M<sup>2</sup> </span>
               <span class="proerty-price pull-right">'.numfmt_format_currency($formnum,$show["Prix"],"XOF").'</span>
               <p style="display: none;">'.$show["Desciption"].'</p>
               <div class="property-icon">
                 <img src="public/assets/img/icon/bed.png">'.$show["Nb_chambres"] .' |
                 <img src="public/assets/img/icon/shawer.png">'.$show["Salle_bain"].'|
                 <img src="public/assets/img/icon/cars.png">'.$show["Garages"].'
                 <div class="dealer-action pull-right">
                   <a href="/edit_property?edit='.$show["idT_PRODUIT"].'" class="button">Modifier </a>
                   <a href="?del='.$show["idT_PRODUIT"].'" class="button delete_user_car">Supprimer</a>
                   <a href="/detail_propriete?id='.$show["idT_PRODUIT"].'" class="button">Afficher</a>
                 </div>
               </div>
            </div>
        </div>';
    }
}



