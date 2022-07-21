<?php
require_once("../model/contacts.php");
class ContactController
{
    private $model;
    private $user_id;
    public $name;
    public $last_name;
    public $contacts = [];
    private $action;
    private $name_contact;
    private $email;
    private $address;
    private $phone;

    function __construct()
    {
        session_start();
        $this->model = new ContactModel();

        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
        }
        if (isset($_SESSION['name'])) {
            $this->name = $_SESSION['name'];
        }
        if (isset($_SESSION['last_name'])) {
            $this->last_name = $_SESSION['last_name'];
        }
        if (isset($_GET["action"])) {
            $this->action = $_GET["action"];
        }
        $this->validate_session_exists();

        if ($this->action && $this->action == 'save') {
            $this->save_contact();
        }

        if ($this->action && $this->action == 'edit') {
            $this->edit_contact();
        }

        if ($this->action && $this->action == 'delete') {
            $this->delete_contact();
        }
    }

    function validate_session_exists() {
        if (is_null($this->user_id)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <strong>Error</strong> Es necesario realizar el login a la pagina.                         
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
            </div>';
            header( "refresh:3; url=index.php" );
        }
    }

    function get_contacts() {
        $res = $this->model->get_contacts_by_user_id($this->user_id);
        if ($res) {
            $this->contacts = $res;
        }
    }

    function get_contact_fields_from_post() {
        if (isset($_POST["name"])) {
            $this->name_contact = $_POST["name"];
        }
        if (isset($_POST["email"])) {
            $this->email = $_POST["email"];
        }
        if (isset($_POST["address"])) {
            $this->address = $_POST["address"];
        }
        if (isset($_POST["phone"])) {
            $this->phone = $_POST["phone"];
        }
    }

    function save_contact() {
        $this->get_contact_fields_from_post();

        $data =array(
            'full_name' => $this->name_contact,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'users_user_id' => $this->user_id,
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
                  <span>Tu datos fueron guardados correctamente</span></br>
                </div>';
            header( "refresh:3; url=dashboard.php" );
        }
    }

    function edit_contact() {
        $this->get_contact_fields_from_post();
        $contact_id = $_POST["contact-id"];

        $data =array(
            'full_name' => $this->name_contact,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
        );

        $status = $this->model->update($data, $contact_id);
        if ($status) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <h4 class="alert-heading">Datos actualizados!</h4>                            
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
                  <span>Tu datos fueron actualizados correctamente</span></br>
                </div>';
            header( "refresh:2; url=dashboard.php" );
        }
    }

    function delete_contact() {
        $contact_id = $_POST["contact-id"];

        $status = $this->model->delete($contact_id);
        if ($status) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <h4 class="alert-heading">Contacto eliminado!</h4>                            
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
                  <span>Contacto eliminado correctamente</span></br>
                </div>';
            header( "refresh:2; url=dashboard.php" );
        }

    }

}