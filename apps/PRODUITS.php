<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 22:04
 */

class PRODUITS
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //afficharge des produits en nombre limite
    public function affich_produit_limite($limit)
    {
        $affich_produit_limite = $this->db->select("SELECT * FROM T_PRODUIT ORDER BY rand() LIMIT $limit");
        return $affich_produit_limite;
    }

    //nombre de produit

    public function nb_house_all(){
        $all_house = $this->db->count("SELECT * FROM T_PRODUIT");
        return $all_house;
    }

    // le nombre des image
    public function nb_imp_all(){
        $all_house = $this->db->count("SELECT ImageP FROM T_PRODUIT");
        return $all_house;
    }

    public function nb_ims_all(){
        $all_house = $this->db->count("SELECT ImageS FROM T_PRODUIT");
        return $all_house;
    }

    public function nb_imt_all(){
        $all_house = $this->db->count("SELECT ImageT FROM T_PRODUIT");
        return $all_house;
    }

    public function nb_imq_all(){
        $all_house = $this->db->count("SELECT ImageQ FROM T_PRODUIT");
        return $all_house;
    }

    public function nb_propriete(){
        $all_house = $this->db->count("SELECT * FROM T_PRODUIT");
        return $all_house;
    }

    //afficharge de tous les produits

    public function affich_produit($start,$end)
    {
        $affich_produit = $this->db->select('SELECT * FROM T_PRODUIT LIMIT '. $start .','. $end);
        return $affich_produit;
    }


    // insertion des proprietes

    public function add_house($title,$price,$imagep,$images,$imaget,$imageq,$desc,$statut,$iframe,$commune,$ville,$quartier,$chambre,$expace,$garage,$bain,$cuisine,$salon,$etat,$cat,$agent){
        return  $this->db->insert("INSERT INTO T_PRODUIT VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",[null,$title,$price,$imagep,$images,$imaget,$imageq,$desc,$statut,$iframe,$commune,$ville,$quartier,$chambre,$expace,$garage,$bain,$cuisine,$salon,$etat,$cat,$agent]);

    }
    // produit par id
    public function detail_produit($id)
    {
        $affich_produit_limite = $this->db->select("SELECT * FROM T_PRODUIT,t_agent WHERE t_produit.idT_AGENT=t_agent.idT_AGENT AND idT_PRODUIT=?",[$id]);
        return $affich_produit_limite;
    }

    //les proprietes d'un agent
    public function propriete_indi($id_age){
        $propri_agent = $this->db->select("SELECT * FROM t_produit WHERE idT_AGENT=?",[$id_age]);
        return $propri_agent;
    }

    //suppresion d'une propriete

    public function del_propriete($del){
        return $this->db->insert("DELETE FROM T_PRODUIT WHERE idT_PRODUIT =?",[$del]);
    }

    /*
     * verification de l'existance de l'id du produit
     */

    public function verif_id_propert($id) {
        $reponse = $this->db->select("SELECT * FROM T_PRODUIT,T_CATEGORIE WHERE T_PRODUIT.idT_CATEGORIE = T_CATEGORIE.idT_CATEGORIE AND idT_PRODUIT=?", [$id]);
        if ($reponse) {
            return $reponse;
        }
    }
    /*
     * recherche de propriete par nom
     */

    public function search_propr($start,$end,$propriet) {
        $reponse = $this->db->select("SELECT * FROM T_PRODUIT WHERE Title LIKE :word LIMIT ".$start.",".$end, ['word'=>"%$propriet%"]);
        if ($reponse) {
            return $reponse;
        }
    }



}