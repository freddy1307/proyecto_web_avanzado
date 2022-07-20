<?php
require_once("../model/users.php");
require_once("functions.php");
class UserController
{
    private $model;
    private $name;
    private $last_name;
    private $second_name;
    private $gender;
    private $password;
    private $confirm_password;
    public $genders=array
    (
        'H' => 'Hombre',
        'M' => 'Mujer',
        'N' => 'No definido',
    );

    function __construct()
    {
        $this->model = new UserModel();

        if (isset($_POST['name'])) {
            $this->name = $_POST['name'];
        }
        if (isset($_POST['last_name'])) {
            $this->last_name = $_POST['last_name'];
        }
        if (isset($_POST['second_name'])) {
            $this->second_name = $_POST['second_name'];
        }
        if (isset($_POST['username'])) {
            $this->username = $_POST['username'];
        }
        if (isset($_POST['gender'])) {
            $this->gender = $_POST['gender'];
        }
        if (isset($_POST['password']) and isset($_POST['confirm_password'])) {
            $this->password = $_POST['password'];
            $this->confirm_password = $_POST['confirm_password'];

            $status = $this->validate_password();
            if ($status) {
                $this->save_user();
            }
        }
    }

    function validate_password() {
        if (strlen($this->password) < 6 ) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <strong>Error</strong> La contraseña debe tener una longitud mayor a 6 caracteres.                         
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
            </div>';
            return false;
        }
        if ($this->password != $this->confirm_password ) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <strong>Error</strong> La contraseñas capturadas no concuerdan.                         
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
            </div>';
            return false;
        }
        return true;
    }

    function save_user() {
        $data =array(
            'name' => $this->name,
            'last_name' => $this->last_name,
            'second_name' => $this->second_name,
            'user' => $this->username,
            'password' => $this->password,
            'gender' => $this->gender
        );

        $status = $this->model->insert($data);

        if ($status) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <h4 class="alert-heading">Datos correctos!</h4>                            
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
                  <span>Tu nombre es: '.$this->name.' '.$this->last_name.' '.$this->second_name.'</span></br>
                  <span>Tu usuario es: '.ucfirst($this->username).'</span></br>
                  <span>Tu genero es: '.changeGenderValueToFullValue($this->gender).'</span></br>
                </div>';
            header( "refresh:3; url=index.php" );
        }
    }



}