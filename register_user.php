<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Proyecto avanzado Web</title>
    <link rel="icon" href="img/notes-favicon.ico" type="image/x-icon" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>
<section class="background-radial-gradient overflow-hidden h-100">
<?php

include 'functions.php';

$genders=array
(
    'H' => 'Hombre',
    'M' => 'Mujer',
    'N' => 'No definido',
);

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $last_name = $_GET['last_name'];
    $second_name = $_GET['second_name'];
    $username = $_GET['username'];
    $gender = $_GET['gender'];
    $password = $_GET['password'];
    $confirm_password = $_GET['confirm_password'];

    if (strlen($password) < 6 ) {
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

    } else if ($password !== $confirm_password) {
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
    } else {
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
                  <span>Tu nombre es: '.$name.' '.$last_name.' '.$second_name.'</span></br>
                  <span>Tu usuario es: '.ucfirst($username).'</span></br>
                  <span>Tu genero es: '.changeGenderValueToFullValue($gender).'</span></br>
                </div>';
        header( "refresh:3; url=index.php" );
    }
}

?>
        <div class="d-flex align-items-center justify-content-center h-100 mh-100">
            <div class="container">
                <div class="row gx-lg-5 align-items-center mb-5">

                    <div class="col-lg-12 mb-5 mb-lg-0 position-relative">
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="card-body px-4 py-5 px-md-5">
                                <h3 class="text-center mb-4">Crear una cuenta</h3>
                                <form method="get" action="register_user.php" name="signin-form" class="row gy-2 gx-3 align-items-center">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" id="nameInput" name="name" required value="<?php echo (isset($_GET['name']))?$_GET['name']:'';?>">
                                        <label class="form-label" for="nameInput">Nombre</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" id="lastNameInput" name="last_name" required value="<?php echo (isset($_GET['last_name']))?$_GET['last_name']:'';?>">
                                        <label class="form-label" for="lastNameInput">Apellido paterno</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" id="secondNameInput" name="second_name" value="<?php echo (isset($_GET['second_name']))?$_GET['second_name']:'';?>">
                                        <label class="form-label" for="secondNameInput">Apellido materno</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" id="userInput" name="username" required value="<?php echo (isset($_GET['username']))?$_GET['username']:'';?>">
                                        <label class="form-label" for="userInput">Usuario</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control" id="passwordInput" name="password" required>
                                        <label class="form-label" for="passwordInput">Contraseña</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control" id="passwordInput2" name="confirm_password" required>
                                        <label class="form-label" for="passwordInput2">Confirmar contraseña</label>
                                    </div>
                                        <div class="form-outline mb-4">
                                            <label for="genderSelect" class="form-label">Selecciona tu genero</label>
                                            <select class="form-select"  id="genderSelect" name="gender">
                                                <option value="">Selecciona tu genero</option>
                                                <?php
                                                foreach($genders as $key => $value) {
                                                    if (isset($_GET['gender'])) {
                                                        if ($_GET['gender'] === $key) {
                                                            echo '<option selected value="'.$key.'">'.$value.'</option>';
                                                            continue;
                                                        }
                                                    }
                                                    echo '<option value="'.$key.'">'.$value.'</option>';
                                                }
                                                ?>
                                            </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto mt-3">
                                            <button type="submit" class="btn btn-primary">Crear cuenta</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
