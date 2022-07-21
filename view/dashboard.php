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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>

<?php

require_once("../controller/contacts.php");

$contact_cont = new ContactController();
$contact_cont->get_contacts();

?>
<section class="background-radial-gradient overflow-hidden h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-violet">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img
                            src="img/notes-favicon.ico"
                            height="15"
                            alt="MDB Logo"
                            loading="lazy"
                    />
                </a>
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="dropdown">
                    <a
                            class="dropdown-toggle d-flex align-items-center hidden-arrow"
                            href="#"
                            id="navbarDropdownMenuAvatar"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                    >
                        <span><?php echo $contact_cont->name." ".$contact_cont->last_name. " "?></span>
                        <img
                                src="img/avatar.png"
                                class="rounded-circle"
                                height="25"
                                alt="Black and White Portrait of a Man"
                                loading="lazy"
                        />
                    </a>
                    <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="d-flex align-items-center justify-content-center h-100 mh-100">
        <div class="container">
            <div class="row gx-lg-5 align-items-center mb-5">

                <div class="col-lg-12 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <div class="container-xl">
                                <div class="table-responsive">
                                    <div class="table-wrapper">
                                        <div class="table-title mb-3">
                                            <div class="d-flex">
                                                <div>
                                                    <h2>Libreta de <b>Contactos</b></h2>
                                                </div>
                                                <div class="ms-auto">
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" id="addEmployeeButton" onclick="openAddContactModal()">
                                                        <i class="material-icons">&#xE147;</i> <span>Agregar nuevo contacto</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Correo electronico</th>
                                                <th>Domicilio</th>
                                                <th>Telefono</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach($contact_cont->contacts as $contact) {
                                                echo '
                                                <tr>
                                                    <td>'.$contact["full_name"].'</td>
                                                    <td>'.$contact["email"].'</td>
                                                    <td>'.$contact["domicilio"].'</td>
                                                    <td>'.$contact["phone"].'</td>
                                                    <td>
                                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" onclick="openEditContactModal(\''.$contact["contact_id"].'\',\''.$contact["full_name"].'\',\''.$contact["email"].'\',\''.$contact["domicilio"].'\',\''.$contact["phone"].'\')">&#xE254;</i></a>
                                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" onclick="openDeleteContactModal(\''.$contact["contact_id"].'\')">&#xE872;</i></a>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <div class="clearfix">
                                            <div class="d-flex">
                                                <div>
                                                    <div class="hint-text">Mostrando <b><?php echo count($contact_cont->contacts) ?></b> entradas de <b><?php echo count($contact_cont->contacts) ?></b>.</div>
                                                </div>
                                                <div class="ms-auto">
                                                    <ul class="pagination">
                                                        <li class="page-item"><a href="#">Anterior</a></li>
                                                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                                        <li class="page-item"><a href="#">Siguiente</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="dashboard.php?action=save">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeAddContactModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Correo electronico</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Domicilio</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar" onclick="closeAddContactModal()">
                    <input type="submit" class="btn btn-success" value="Agregar" >
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="dashboard.php?action=edit">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeEditContactModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="hidden" name="contact-id" id="edit-contact">
                        <input type="text" class="form-control" name="name" required id="edit-name">
                    </div>
                    <div class="form-group">
                        <label>Correo electronico</label>
                        <input type="email" class="form-control" name="email" required id="edit-email">
                    </div>
                    <div class="form-group">
                        <label>Domicilio</label>
                        <textarea class="form-control" name="address" required id="edit-address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="phone" required id="edit-phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar" onclick="closeEditContactModal()">
                    <input type="submit" class="btn btn-info" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="dashboard.php?action=delete">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Contacto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeDeleteContactModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="contact-id" id="delete-contact">
                    <p>Estas seguro que deseas eliminar este contacto?</p>
                    <p class="text-warning"><small>Esta accion no se podra deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar" onclick="closeDeleteContactModal()">
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/contacts.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
