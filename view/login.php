<?php
session_start();    

$head  = "templates/header.php";
require($head);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./view/css/style_view.css" rel="stylesheet"/>
    <title>The Binaries</title>
</head>


<body>

        <header>
             <div class="col-md-12 text-center">
                <h1>Centro de Estudios The Binaries</h1>
                </div>

        </header>
</body>





<!--Formulario Iniciar sesión o registrar-->
<div id="master">
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">

                            <h3>Iniciar sesión o Registrar</h3>
                        </div>
                    </div>
                     <form method="post" action="" name="login">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" require name="email_login" placeholder="Introduce tu correo" />
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" type="text" require name="password_login" placeholder="Introduce tu contraseña"/>
                        </div>


                         <div class="col-md-12 text-center ">
                             <button value="btnSignUp" type="submit" class=" btn btn-success tx-tfm">Iniciar sesión</button>
                         </div>
                         <div class="col-md-12 ">
                             <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">o</span>
                             </div>
                         </div>
                         <div class="form-group">
                            <p class="text-center">¿Aún no estás registrado?</p>
                         </div>
                         <div class="form-group text-center">
                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                 Estudiante
                             </button>
                        </div>
                        <div class="form-group text-center">
                             <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#admin">
                                 Administrador
                             </button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Crear cuenta Estudiante-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Crear cuenta estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="">
            <div class="form-group">
                <label>Nombre Usuario</label>
                <input class="form-control" type="text" required name="username" />
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input class="form-control" type="text" required name="password" />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" required name="email" />
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" required name="name" />
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input class="form-control" type="text" required name="surname" />
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input class="form-control" type="text" required name="telephone" />
            </div>

            <div class="form-group">
                <label>NIF</label>
                <input class="form-control" type="text" required name="nif" />
            </div>
            <input class="btn btn-primary" type="submit" value="Create" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Crear cuenta Admin-->
<div class="modal fade" id="admin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Crear cuenta administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="">
            <div class="form-group">
                <label>Nombre usuario</label>
                <input class="form-control" type="text" require name="username_admin" />
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" require name="name_admin" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" require name="email_admin" />
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input class="form-control" type="password" require name="password_admin" />
            </div>
            <input class="btn btn-primary" type="submit" value="Create" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php 
require_once '../controller/conexion/Conexion.php';
require_once '../controller/crud/Crud.php';

if(isset($_POST["email_login"])&&(!empty($_POST["email_login"]))){

    //Gestion del login
    $email= $_POST["email_login"];
    $pass = $_POST["password_login"];

   //Operamos con dos tablas, estudiantes y administradores
    $crud = new Crud("students");
    $crudAdmins = new Crud("users_admin");

    $lista = $crud -> get();
    $admins=$crudAdmins->get();
    $countLista = count($lista);
    // ¿Es administrador?
    foreach($admins as $admin){
        if($admin->email==$email){
            if($admin->password==$pass){
                //Es admin
                $_SESSION["email"]=$email;
                $_SESSION["id"]=$admin->id_user_admin;
                $_SESSION["username"]=$admin->username;
                $_SESSION["name"]=$admin->name;
                $_SESSION["password"]=$admin->password;
                $_SESSION["admin"]=$admin->email;
                $_SESSION["tipoUsuario"]="Admin";
                echo "<script> window.location='./admin.php'; </script>";    
            }
        }
    }

    // ¿Es estudiante?
    $i=0;
    while ($i<$countLista){

       if($lista[$i]->email==$email){
        if($lista[$i]->pass==$pass){
            //está logueado
            //require_once('../controller/setCook.php');
            //createCookie($email);
            
            $_SESSION["login"]=$email;
            $_SESSION["name"]=$lista[$i]->name;

            $_SESSION["id"]=$lista[$i]->id;
            $_SESSION["username"]=$lista[$i]->username;
            $_SESSION["password"]=$lista[$i]->pass;
            $_SESSION["surname"]=$lista[$i]->surname;
            $_SESSION["telephone"]=$lista[$i]->telephone;
            $_SESSION["nif"]=$lista[$i]->nif;
            $_SESSION["fechaActual"]=$lista[$i]->date_registered;
            $_SESSION["tipoUsuario"]="Student";

            echo "<script> window.location='./main.php'; </script>";
            //echo "<script> window.location='../controller/setCook.php'; </script>";
            //header("Location: ./main.php");
        }
       }
       $i++;
    }

    // ¿Ha dado al botón pero no hay registro?
    if(!(isset($_SESSION["login"]))) {
        echo "<script> window.location='./login.php'; </script>";
      
    }

}


    //Alta a un estudiante mediante formulario
    function insertStudent(){

        $username=$_POST["username"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        $name=$_POST["name"];
        $surname=$_POST["surname"];
        $telephone=$_POST["telephone"];
        $nif=$_POST["nif"];
        $fecha_actual = date("Y-m-d"); //no inserta la hora

        #gestionamos el alta
        $crud = new Crud("students");

        #INSERT INTO
        $crud->insert([
            //omitimos id por ser autoincremental
            
            "username" => $username,
            "pass" => $password,
            "email" => $email,
            "name" => $name,
            "surname" => $surname,
            "telephone" => $telephone,
            "nif" => $nif,
            "date_registered" => $fecha_actual
        ]);
    }

    //Alta a un Administrador mediante formulario
    function insertarAdmin()
        //¿Validar Alta de Admin mediante código verificación de alta?
    {
        $name_admin = $_POST["username_admin"];
        $surname_admin = $_POST["name_admin"];
        $email_admin = $_POST["email_admin"];
        $pass_admin = $_POST["password_admin"];
        #gestionamos el alta
        $crud = new Crud('users_admin');

        #INSERT INTO
        $crud->insert([
            //omitimos id por ser autoincremental
            "username" => $name_admin,
            "name" => $surname_admin,
            "email" => $email_admin,
            "password" => $pass_admin
        ]);
    }

    //Si ha dado al botón y ha rellenado el campo nombre (name) del form alta estudiante
if(isset($_POST["name"])&&(!empty($_POST["name"]))){
    insertStudent();
    echo '<center> Se ha insertado un Alumno </center>' ;
}else if(isset($_POST["name_admin"])&&(!empty($_POST["name_admin"]))){//Si ha rellenado el form de alta admin
    insertarAdmin();
    echo '<center> Se ha insertado un Administrador correctamente </center>';
}
?>

<?php
$footer  = "templates/footer.php";
require($footer);
?>