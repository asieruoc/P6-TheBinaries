<?php

$head  = "templates/headerlogin.php";

require($head);

if (!(isset($_SESSION["login"]))){
    echo "No te encuentras logueado";
    header("Location: ./login.php");
}
?>
<!--Columnas de la pagina-->
<div class="container">
    <!--Columna Izquierda-->
    <div class="row">
        <div class="col">
            <h3>Perfil usuario<br></h3>
            <h4><?php echo $_SESSION["name"] . " " . $_SESSION["surname"]; ?></h4>
            <h5><?php echo $_SESSION["tipoUsuario"]; ?><br><br></h5>
            <!--Formulario con botones Help y Account settings"-->
            <form method="post" action="" name="perfil">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfile">
                       Configuración de cuenta
                    </button>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#help">
                        Ayuda
                    </button>
                </div>
            </form>
        </div>
        <!--Columna Derecha-->
        <div class="col">
            <p><h3>Información usuario</h3></p>
            <p>Nombre: <?php echo $_SESSION["name"]; ?> </p>
            <p>Apellidos: <?php echo $_SESSION["surname"]; ?> </p>
            <p>Nombre usuario: <?php echo $_SESSION["username"]; ?> </p>
            <p>Email: <?php echo $_SESSION["login"]; ?> </p>
            <p>Teléfono: <?php echo $_SESSION["telephone"]; ?> </p>
            <p>NIF: <?php echo $_SESSION["nif"]; ?> </p>
            <p>Fecha de registro: <?php echo date("Y-m-d", strtotime($_SESSION["fechaActual"])); ?> </p>
        </div>
    </div>

<!--modal edit profile-->
<div class="modal fade" id="editProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" required name="emailEdit" />
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input class="form-control" type="password" required name="passwordEdit" />
                    </div>
                    <div class="form-group text-center">
                        <button value="btnSave" type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Help-->
<div class="modal fade" id="help" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ayuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Puedes modificar tus datos de perfil de usuario rellenando los campos requeridos "Nombre",
                    "Email" y "Contraseña".</p>
                <p>Pulsar sobre el botón "Guardar" y tus datos se actualizarán.</p>
            </div>
        </div>
    </div>
</div>

<?php
require_once '../controller/conexion/Conexion.php';
require_once '../controller/crud/Crud.php';

//Controlamos que el campo email no este vacio.
if(isset($_POST["emailEdit"])&&(!empty($_POST["emailEdit"]))) {
    //Verificamos que no encontrames en la sesion de tipo Usuario
    if($_SESSION["tipoUsuario"] == "Student"){

        $passwordEdit = $_POST["passwordEdit"];
        $emailEdit = $_POST["emailEdit"];

        //gestionamos la modificacion
        $crud = new Crud("students");

        //Guardmos la variable id de estudiante.
        $id= $_SESSION["id"];
        //Realizamos consulta usando crud generico pasando los datos recogidos por parametro.
        $crud->where("id", "=", $id)->update([
         "pass" => $passwordEdit,
         "email" => $emailEdit,
        ]);
        //lanzamos mensaje conforme se ha realizado el cambio correctmente.
        echo "<script> alert ('Student modified correctly.')</script>";

    }
    //Verificamos que no encontrames en la sesion de tipo User Admin
    if($_SESSION["tipoUsuario"] == "Admin"){

        $passwordEdit = $_POST["passwordEdit"];
        $emailEdit = $_POST["emailEdit"];

        #gestionamos la modificacion
        $crud = new Crud("users_admin");

        //Guardmos la variable id de admin.
        $id = $_SESSION["id"];
        //Realizamos consulta usando crud generico pasando los datos recogidos por parametro.
        $crud->where("id_user_admin", "=", $id)->update([
            "email" => $emailEdit,
            "password" => $passwordEdit,
        ]);
        echo "<script> alert ('Admin modified correctly.')</script>";
    }
}
?>
<?php
    $footer  = "templates/footer.php";
    require($footer);
?>
