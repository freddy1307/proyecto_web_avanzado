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

if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    # TO DO: Cuando se vea la parte de base de datos se validara desde ahi, ahorita esta fixeado los valores.
    if ($username === 'lavalenc' && $password === '123456') {
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

?>
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
                <div class="row gx-lg-5 align-items-center mb-5">
                    <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                            Tu libreta <br />
                            <span style="color: hsl(218, 81%, 75%)"> de contactos personales</span>
                        </h1>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="card-body px-4 py-5 px-md-5">
                                <form method="post" action="index.php" name="signin-form" >
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example3" class="form-control" name="username" required/>
                                        <label class="form-label" for="form3Example3">Usuario</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control"  name="password" required/>
                                        <label class="form-label" for="form3Example4">Contraseña</label>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                        <label class="form-check-label" for="form2Example33">
                                            Recuerdame
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Acceder
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <a type="button" class="btn btn-primary mb-4" href="register_user.php">
                                            Quieres crear una cuenta?
                                        </a>
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