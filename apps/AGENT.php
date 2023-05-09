<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/10/2022
 * Time: 22:27
 */

class AGENT
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //nombre d'agent enregistrer

    public function nb_agent_all(){
        $all_house = $this->db->count("SELECT * FROM T_AGENT");
        return $all_house;
    }

    //afficharge des agents en nombre limite

    public function show_all_agent($limit){
        $all_agent = $this->db->select("SELECT * FROM T_AGENT ORDER BY rand() LIMIT $limit");
        return $all_agent;
    }

    //connection de l'agent

    public function _login_agent($email, $password) {
        $agent = $this->db->select("SELECT * FROM T_AGENT WHERE  Email=:login  && Password=:pass", [
            'login' => $email,
            'pass' => $password,
        ]);

        if ($agent) {
            $_SESSION['agent']['id'] = $agent[0]->idT_AGENT;
            $_SESSION['agent']['nomprenom'] = $agent[0]->NomPrenom;
            $_SESSION['agent']['image'] = $agent[0]->ImageA;
            $_SESSION['agent']['email'] = $agent[0]->Email;
            $_SESSION['agent']['pwd'] = $agent[0]->Password;
            $_SESSION['agent']['tel'] = $agent[0]->Tel;
            $_SESSION['agent']['commune'] = $agent[0]->CommuneAge;
            $_SESSION['agent']['desc'] = $agent[0]->DescriptionAge;
            $_SESSION['agent']['role'] = $agent[0]->Role;

            return TRUE;
        }
        return FALSE;
    }

    /**
     * selection de l'id connectee
     */
    public static function agent_id() {
        return $_SESSION['agent']['id'];
    }

    //selectionnne l'agent connecte

    public function _log_connect() {
        if(isset($_SESSION['agent'])){
            return $this->db->Show("SELECT * FROM T_AGENT WHERE   idT_AGENT =" . self::agent_id());
        }
    }

    // VERIFICATION DE L'EXISTANCE DE L'AGENT
    public function verif_agent($email, $tel) {
        $reponse = $this->db->count("SELECT * FROM T_AGENT WHERE Email=? && Tel=? ", [$email, $tel]);
        if ($reponse) {
            return $reponse;
        }
    }

    /*     * **
    * insertion de l'agent
    */

    public function add_agent( $np,$image, $email, $mdp, $tel, $com, $desc, $role) {
        return $this->db->insert("INSERT INTO T_AGENT(idT_AGENT,NomPrenom,ImageA,Email,Password,Tel,CommuneAge,DescriptionAge,Role) VALUES (?,?,?,?,?,?,?,?,?)", [null,$np,$image, $email, $mdp, $tel, $com, $desc, $role]);
    }

    //mise a jour de l'agent

    public function edit_agent($nom,$image,$email,$pwd,$tel,$commune,$desc,$role,$idag){
        return $this->db->insert("UPDATE T_AGENT SET NomPrenom=?, ImageA=?, Email=?, Password=?, Tel=?, CommuneAge=?, DescriptionAge=?, Role=? WHERE idT_AGENT=?",[$nom,$image,$email,$pwd,$tel,$commune,$desc,$role,$idag]);
    }

    /*
     * verification de l'existance de l'id agent
     */

    public function verif_id_agent($id) {
        $reponse = $this->db->count("SELECT * FROM T_AGENT WHERE idT_AGENT=?", [$id]);
        if ($reponse) {
            return $reponse;
        }
    }

}