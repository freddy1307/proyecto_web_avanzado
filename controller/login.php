<?php
require_once("../model/users.php");
require_once("functions.php");
class LoginController
{
    private $model;

    function __construct()
    {
        $this->model = new UserModel();

        if (isset($_POST['username']) and isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $status = $this->model->check_login_with_credentials($username, $password);
            if ($status) {
                $_SESSION["user_id"] = $status["user_id"];
                $_SESSION["name"] = $status["name"];
                $_SESSION["last_name"] = $status["last_name"];
                header("Location: dashboard.php");
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="d-flex">
                        <div>
                            <strong>Error</strong> El usuario o la contresaña son incorrectos.                         
                        </div>
                        <div class="ms-auto">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btn">
                                <span aria-hidden="true">&times;</span>
                              </button>                    
                        </div>
                </div>
            </div>';
            }
        }
    }

}