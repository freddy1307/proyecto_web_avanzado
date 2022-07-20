<?php
class UserModel{
    private $db;
    public function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=contacts',"root","");
    }
    public function insert($data){
        $consulta="insert into users(`name`, `last_name`, `second_name`, `user`, `password`, `gender`) values
            (\"". $data['name'] ."\",\"".$data['last_name']."\",\"".$data['second_name']."\",\"".$data['user']."\",\"".$data['password']."\",\"".$data['gender']."\")";
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }
    public function check_login_with_credentials($user, $password) {
        $consul="select * from users where user=\"".$user."\" and password=\"".$password."\";";
        $resu=$this->db->query($consul)->fetch();
        echo '<pre>'; print_r($resu); echo '</pre>';
        return $resu;
    }

    public function show($condicion){
        $consul="select * from users where ".$condicion.";";
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->personas[]=$filas;
        }
        return $this->personas;
    }
    public function update($data, $condicion){
        $consulta="update users set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }
    public function delete($condicion){
        $eli="delete from users where ".$condicion;
        $res=$this->db->query($eli);
        if ($res) {
            return true;
        }else {
            return false;
        }
    }
}