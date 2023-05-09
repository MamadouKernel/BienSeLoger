<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 22:26
 */

class CATEGORIES
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //afficharge des categories
    public function show_categories(){
        $show_categories = $this->db->select("SELECT * FROM T_CATEGORIE");
        return $show_categories;
    }
    //nombre de categorie
    public function nb_categories(){
        $show_categories = $this->db->count("SELECT * FROM T_CATEGORIE");
        return $show_categories;
    }



}