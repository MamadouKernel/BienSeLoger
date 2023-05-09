<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 07/11/2022
 * Time: 11:42
 */

if (isset($_POST["limit"], $_POST["start"])) {

    $connect = mysqli_connect("localhost", "root", "", "bienseloger");
    $query = "SELECT * FROM T_PRODUIT ORDER BY idT_PRODUIT DESC LIMIT " . $_POST["start"] . ", " . $_POST["limit"] . "";
    $result = mysqli_query($connect, $query);
    $formnum = numfmt_create('fr_FR', NumberFormatter::CURRENCY);
        while ($row = mysqli_fetch_array($result)) {
            echo '
        <div class="col-sm-6 col-md-4 p0">
            <div class="box-two proerty-item">
                <div class="item-thumb">
                    <a href="/detail_propriete?id=' . $row["idT_PRODUIT"] . '" ><img src="files/proprietes/' . $row["ImageP"] . '"></a>
                </div>
                <div class="item-entry overflow">
                   <h5><a href="/detail_propriete?id=' . $row["idT_PRODUIT"] . '"> ' . $row["Title"] . '</a></h5>
                   <div class="dot-hr"></div>
                      <span class="pull-left"><b> Superficie :</b> ' . $row["Espaces"] . ' M<sup>2</sup></span>
                      <span class="proerty-price pull-right"> ' . numfmt_format_currency($formnum, $row["Prix"], "XOF") . '</span>
                     <!--<p style="display: none;"></p>-->
                      <div class="property-icon">
                         <img src="public/assets/img/icon/bed.png"> ' . $row["Nb_chambres"] . '|
                         <img src="public/assets/img/icon/shawer.png">' . $row["Salle_bain"] . '|
                         <img src="public/assets/img/icon/cars.png">' . $row["Salon"] . '
                       </div>
                   </div>
            </div>
        </div>';
        }

    }


