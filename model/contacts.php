<?php
class ContactModel{
    private $db;
    public function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=contacts',"root","");
    }
    public function insert($data){
        $consulta="insert into contact_book(`full_name`, `email`, `domicilio`, `phone`, `users_user_id`) values
          (\"". $data['full_name'] ."\",\"".$data['email']."\",\"".$data['address']."\",\"".$data['phone']."\",".$data['users_user_id'].")";
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }
    public function get_contacts_by_user_id($user_id){
        $consul="select * from contact_book where users_user_id=\"".$user_id."\";";
        $resu=$this->db->query($consul);
        $contacts = null;
        while($filas = $resu->fetch(PDO::FETCH_ASSOC)) {
            $contacts[]=$filas;
        }
        return $contacts;
    }
    public function update($data, $contact_id){
        $consulta="update contact_book set 
            full_name=\"". $data['full_name'] ."\", 
            email=\"". $data['email'] ."\",
            domicilio=\"". $data['address'] ."\", 
            phone=\"". $data['phone'] ."\" 
            where contact_id=".$contact_id;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }
    public function delete($condicion){
        $eli="delete from contact_book where ".$condicion;
        $res=$this->db->query($eli);
        if ($res) {
            return true;
        }else {
            return false;
        }
    }
}