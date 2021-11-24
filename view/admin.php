<?php 

$head  = "templates/headerlogin.php";
require($head);

if (!(isset($_SESSION["admin"])) && !empty ($_SESSION['email'])){
    echo "No estás logueado como administrador";
    header("Location: ./login.php");
}

//teachers
if(isset($_POST["name2"])){
    $name2=$_POST["name2"];
    $surname2=$_POST["surname2"];
    $telephone2=$_POST["telephone2"];
    $nif2=$_POST["nif2"];
    $email2=$_POST["email2"];
}


//Cursos
if(isset($_POST["nameCurso2"])){
    $nameCurso2=$_POST["nameCurso2"];
    $descricionCurso2=$_POST["descripcionCurso2"];
    $inicioCurso2=$_POST["inicioCurso2"];
    $finCurso2=$_POST["finCurso2"];
    $activoCurso2=$_POST["activo2"];
    
}

//Agenda
if(isset($_POST["idclassAgenda2"])){
    $dayAgenda2=$_POST["day2"];
    $inicioAgenda2=$_POST["inicioAgenda2"];
    $finAgenda2=$_POST["finAgenda2"];
    $idclassAgenda2=$_POST["idclassAgenda2"];
    $dayAgenda2=$_POST["day2"];
}

//clases
if(isset($_POST["nameclass2"])){
    $id2classteacher=$_POST["id2classTeacher"];
    $id2classcourse=$_POST["id2classCourse"];
    $id2classagenda=$_POST["id2classAgenda"];
    $name2class=$_POST["nameclass2"];
    $color2class=$_POST["colorclass2"];
    
}

//estudiantes
if(isset($_POST["username2student"])){
    $username2student=$_POST["username2student"];
    $email2student=$_POST["email2student"];
    $name2student=$_POST["name2student"];
    $surname2student=$_POST["surname2student"];
    $telephone2student=$_POST["telephone2student"];
    $nif2student=$_POST["nif2student"];
    $date2student=$_POST["date2student"];
    $id2student=$_POST["id2student"];
    
}

//Enrollment
if(isset($_POST["status2Enroll"])){
    $id2studentEnroll=$_POST["id2studentEnroll"];
    $id2courseEnroll=$_POST["id2courseEnroll"];
    $status2Enroll=$_POST["status2Enroll"];
    
}


require_once '../controller/config/Conexion.php';
require_once '../controller/crud/Crud.php';
include("../controller/listar.php");

$crudClass= new Crud('class');
$crudCourse= new Crud('courses');
$crudTeachers= new Crud('teachers');
$crudAgenda= new Crud('schedule');
$crudStudent = new Crud("students");
$crudEnroll = new Crud("enrollment");

$listaClass = $crudClass->get();
$listaCourse = $crudCourse->get();
$listaTeachers = $crudTeachers->get();
$listaAgenda = $crudAgenda->get();
$listaStudent = $crudStudent->get();
$listaEnrollment = $crudEnroll->get();

if(isset($_POST["accion"])&&!(empty($_POST["accion"]))){
    
    $btn=$_POST["accion"];

    switch($btn){

        case 'ListarProfesor':
            //echo("<script> alert('Modificar'); </script>");
            listarProfesores($listaTeachers);
            break;
        case 'ListarCurso':
            //echo("<script> alert('Modificar'); </script>");
            listarCursos($listaCourse);
            break;
        case 'ListarAgenda':
            //echo("<script> alert('Eliminar'); </script>");
            listarAgenda($listaAgenda);
            break;
        case 'ListarClase':
            //echo("<script> alert('Eliminar'); </script>");
            listarClases($listaClass);
            break;
        case 'ListarStudent':
            listarStudent($listaStudent);
            break;
        case 'ListarEnroll':
            listarEnrollment($listaEnrollment);
            break;

    }
    
}

?>
<div id="message">
<?php
    if(isset($_SESSION["trueInsert"])&&($_SESSION["trueInsert"]==true)){
        $exitoBootstrapInsert = "<div class='alert alert-success' role='alert'>
        Se ha insertado correctamente en la BBDD
    </div>";
        echo($exitoBootstrapInsert);
        $_SESSION["trueInsert"]=false;
    }
    if(isset($_SESSION["trueModificacion"])&&($_SESSION["trueModificacion"]==true)){
        $exitoBootstrapModificacion = "<div class='alert alert-success' role='alert'>
        Se ha modificado correctamente el dato en la BBDD
    </div>";
        echo($exitoBootstrapModificacion);
        $_SESSION["trueModificacion"]=false;
    }
    if(isset($_SESSION["trueDelete"])&&($_SESSION["trueDelete"]==true)){
        $exitoBootstrapDelete = "<div class='alert alert-success' role='alert'>
        Se ha Borrado correctamente el dato en la BBDD
    </div>";
        echo($exitoBootstrapDelete);
        $_SESSION["trueDelete"]=false;
    }
    
?>
</div>
<div id="message2">
<?php
    if(isset($name2)){
        //¿Seguro que quiere realizar la operación?
        ?>
        <button name="desactivo" onclick="alterar(event);" value="alterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#teachers">Confirmar modificación</button>
        <?php
        $_SESSION['idProfesor']=$_POST['id2Profesor'];
    } else if (isset($nameCurso2)){
        //¿Seguro que quiere realizar la operación?
        ?>
        <button name="desactivo" value="alterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#course">Confirmar modificación</button>
        <?php
        $_SESSION['idCurso']=$_POST['id2Curso'];

    }else if (isset($idclassAgenda2)){
        //¿Seguro que quiere realizar la operación?
        ?>
        <button name="desactivo" value="alterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#agenda">Confirmar modificación</button>
        <?php
        $_SESSION['id2Agenda']=$_POST['id2Agenda'];

    }else if (isset($name2class)){
        //¿Seguro que quiere realizar la operación?
        ?>
        <button name="desactivo" value="alterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#clase">Confirmar modificación</button>
        <?php
        $_SESSION['idclass']=$_POST['id2class'];

    }else if (isset($username2student)){
        //¿Seguro que quiere realizar la operación?
        ?>
        <button name="desactivo" value="alterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#students">Confirmar modificación</button>
        <?php
        $_SESSION['idstudent']=$_POST['id2student'];

    }else if (isset($status2Enroll)){
        //¿Seguro que quiere realizar la operación?
        ?>
        <button name="desactivo" value="alterar" type="button" class="btn btn-warning" data-toggle="modal" data-target="#enroll">Confirmar modificación</button>
        <?php
        $_SESSION['idEnroll']=$_POST['id2Enroll'];

    }
?>
</div>

  <div class="container">
    <h1 class="display-4">Centro de Estudios The Binaries</h1>
    <h2>Panel de Administración</h2>
    <div class="container">
    <ul class="list-group">
          <li class="btn btn-outline-success" button type="button" data-toggle="modal" data-target="#teachers" name="desactivo" value="anyadir"> Gestionar Profesores</li>
          <li class="btn btn-outline-success" button type="button" data-toggle="modal" data-target="#agenda" name="desactivo" value="anyadir">Gestionar Agenda</li>
          <li class="btn btn-outline-success" button type="button" data-toggle="modal" data-target="#course" name="desactivo" value="anyadir">Gestionar Curso</li>
          <li class="btn btn-outline-success" button type="button" data-toggle="modal" data-target="#clase" name="desactivo" value="anyadir">Gestionar Clase</li>
          <li class="btn btn-outline-success" button type="button" data-toggle="modal" data-target="#students" name="desactivo" value="anyadir">Gestionar Estudiantes</li>
          <li class="btn btn-outline-success" button type="button" data-toggle="modal" data-target="#enroll" name="desactivo" value="anyadir">Gestionar Enrollment</li>
        </ul>

        </div>
        </div>


    <!--1 teachers -->
    <!-- Modal -->
    <div class="modal fade" id="teachers" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
    <div class="modal-dialog">

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel1">Crear cuenta de profesor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="../controller/insert.php">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" required name="name" value=<?php if(isset($_POST["name2"])) echo($name2); ?> >
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input class="form-control" type="text" required name="surname" value=<?php if(isset($_POST["name2"])) echo($surname2); ?> >
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input class="form-control" type="text" required name="telephone" value=<?php if(isset($_POST["name2"])) echo($telephone2); ?> >
                </div>
                <div class="form-group">
                    <label>NIF</label>
                    <input class="form-control" type="text" required name="nif" value=<?php if(isset($_POST["name2"])) echo($nif2); ?>>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" required name="email" value=<?php if(isset($_POST["name2"])) echo($email2); ?> >
                </div>
<?php if(isset($_SESSION['idProfesor'])) $_SESSION['idProfesor']=$_POST['id2Profesor'];?>

            <div class="row alterarBD">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="CreateProfesor" name="crear" />
                    <input type="submit" class="btn btn-warning float-left btn-listado" name="accion" value="ModificarPro"/>
                    <input type="submit" class="btn btn-danger btn-listado" name="accion" value="EliminarPro"/>
                </div>
            </div>

            </form>
        </div>
        <div class="modal-footer">
            <form action="" method="post">
                <input type="submit" class="btn btn-info" name="accion" value="ListarProfesor">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
    </div>


    <!--2 course -->

    <!-- Modal -->
    <div class="modal fade" id="course" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Crear Curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="../controller/insert.php">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" required name="name_curso" value=<?php if(isset($_POST["nameCurso2"])) echo($nameCurso2); ?> >
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <input class="form-control" type="textarea" name="description_curso" value=<?php if(isset($_POST["nameCurso2"])) echo($descricionCurso2); ?>>
                </div>
                <div class="form-group">
                    <label>Día comienzo</label>
                    <input class="form-control" type="date" name="inicio_curso" value=<?php if(isset($_POST["nameCurso2"])) echo($inicioCurso2); ?>>
                </div>
                <div class="form-group">
                    <label>Día fin</label>
                    <input class="form-control" type="date" name="fin_curso" value=<?php if(isset($_POST["nameCurso2"])) echo($finCurso2); ?>>
                </div>
                <div class="form-group">    
                    <label>Activo</label>
                    <input class="form-control" type="number" required name="activo" value=<?php if(isset($_POST["nameCurso2"])) echo($activoCurso2); ?>>
                </div>

<?php if(isset($_SESSION['idCurso'])) $_SESSION['idCurso']=$_POST['id2Curso'];?>

            <div class="row alterarBD">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="CreateCurso" name="crear" />
                    <input type="submit" class="btn btn-warning float-left btn-listado" name="accion" value="ModificarCur">
                    <input type="submit" class="btn btn-danger btn-listado" name="accion" value="EliminarCur">
                </div>

            </div>
        </form>
        </div><!--body modal -->
        <div class="modal-footer">
            <form action="" method="post">
                <input type="submit" class="btn btn-info" name="accion" value="ListarCurso">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>

    <!--3 Agenda -->

    <!-- Modal -->
    <div class="modal fade" id="agenda" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Crear Agenda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="../controller/insert.php">
                <div class="form-group">
                    <label>Nombre Agenda</label>
                    <input class="form-control" type="text" name="id_class_agenda" value=<?php if(isset($_POST["idclassAgenda2"])) echo($idclassAgenda2); ?>>
                </div>
                <div class="form-group">
                    <label>Hora Comienzo</label>
                    <input class="form-control" type="time" required name="inicio_agenda" value=<?php if(isset($_POST["idclassAgenda2"])) echo($inicioAgenda2); ?> >
                </div>
                <div class="form-group">
                    <label>Hora Fin</label>
                    <input class="form-control" type="time" required name="fin_agenda" value=<?php if(isset($_POST["idclassAgenda2"])) echo($finAgenda2); ?>>
                </div>
                <div class="form-group">
                    <label>Día</label>
                    <input class="form-control" type="date" required name="dia_agenda" value=<?php if(isset($_POST["idclassAgenda2"])) echo($dayAgenda2); ?>>
                </div>

            
<?php if(isset($_SESSION['id2Agenda'])) $_SESSION['id2Agenda']=$_POST['id2Agenda'];?>

            <div class="row alterarBD">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="CreateAgenda" name="crear">
                    <input type="submit" class="btn btn-warning float-left btn-listado" name="accion" value="ModificarAge">
                    <input type="submit" class="btn btn-danger btn-listado" name="accion" value="EliminarAge">
                </div>
            </div>
        </form>
        </div><!--body modal -->
        <div class="modal-footer">
            <form action="" method="post">
                <input type="submit" class="btn btn-warning" name="accion" value="ListarAgenda">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>

    <!--4 clase -->
    <!-- Modal -->
    <div class="modal fade" id="clase" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Crear Clase </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="../controller/insert.php">
                <div class="form-group">
                    <label>Profesor Existente</label>

                    <select name='prof_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente:' value=<?php if(isset($_POST["nameclass2"])) echo($id2classteacher);?>>

                    <?php
                           
                        //echo("<select name='prof_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente: '>");
                        for($i=0;$i<count($listaTeachers);$i++){
                            ?>
                            <option name="idProfClass" value=<?php echo($listaTeachers[$i]->id_teacher);?>>Nombre: <?php echo($listaTeachers[$i]->name.' '.$listaTeachers[$i]->surname); ?></option>
                            <?php
                        }
                        //echo("</select>");

                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Curso Existente</label>
                    
                        <select name='curs_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente:' value=<?php if(isset($_POST["nameclass2"])) echo($id2classcourse);?>>

                    <?php
                        //echo("<select name='curs_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente: '>");
                        for($i=0;$i<count($listaCourse);$i++){
                            ?>
                            <option name="idCursoClass" value=<?php echo($listaCourse[$i]->id_course);?>>Nombre: <?php echo($listaCourse[$i]->name); ?></option>
                            <?php
                        }
                       // echo("</select>");

                    ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Agenda Existente</label>

                    <select name='agen_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente:' value=<?php if(isset($_POST["nameclass2"])) echo($id2classagenda);?> >

                    <?php
                        //echo("<select name='agen_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente: '>");
                        for($i=0;$i<count($listaAgenda);$i++){
                            ?>
                            <option name="idAgendaClass" value=<?php echo($listaAgenda[$i]->id_schedule);?>>Nombre: <?php echo($listaAgenda[$i]->id_schedule.' day: '.$listaAgenda[$i]->day); ?></option>
                            <?php
                        }
                        //echo("</select>");

                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre Clase</label>
                    <input class="form-control" type="text" required name="nombre_clase" value=<?php if(isset($_POST["nameclass2"])) echo($name2class);?> >
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input class="form-control" type="text" required name="color_clase" value=<?php if(isset($_POST["nameclass2"])) echo($color2class);?> >
                </div>

        
<?php if(isset($_SESSION['idclass'])) $_SESSION['idclass']=$_POST['id2class'];?>

            <div class="row alterarBD">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="CreateClase" name="crear" />
                    <input type="submit" class="btn btn-warning float-left btn-listado" name="accion" value="ModificarClasClas">
                    <input type="submit" class="btn btn-danger btn-listado" name="accion" value="EliminarClas">
                </div>
            </div>
        </form>
        </div><!--body modal -->    
        <div class="modal-footer">
            <form action="" method="post">
                <input type="submit" class="btn btn-warning" name="accion" value="ListarClase">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>

<!--5 students -->
    <!-- Modal -->
    <div class="modal fade" id="students" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
    <div class="modal-dialog">

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel1">Crear cuenta Estudiante </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="../controller/insert.php">
                <div class="form-group">
                    <label>Nombre usuario</label>
                    <input class="form-control" type="text" required name="username_stu" value=<?php if(isset($_POST["username2student"])) echo($username2student); ?> >
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input class="form-control" type="password" required name="password_stu">
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" required name="name_stu" value=<?php if(isset($_POST["username2student"])) echo($name2student); ?> >
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input class="form-control" type="text" required name="surname_stu" value=<?php if(isset($_POST["username2student"])) echo($surname2student); ?> >
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input class="form-control" type="text" required name="telephone_stu" value=<?php if(isset($_POST["username2student"])) echo($telephone2student); ?> >
                </div>
                <div class="form-group">
                    <label>NIF</label>
                    <input class="form-control" type="text" required name="nif_stu" value=<?php if(isset($_POST["username2student"])) echo($nif2student); ?>>
                </div>
                <div class="form-group">
                    <label>Fecha Registro</label>
                    <input class="form-control" type="Date" required name="day_stu" value=<?php if(isset($_POST["username2student"])) echo($date2student); ?> >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" required name="email_stu" value=<?php if(isset($_POST["username2student"])) echo($email2student); ?> >
                </div>

<?php if(isset($_SESSION['idstudent'])) $_SESSION['idstudent']=$_POST['id2student'];?>

            <div class="row alterarBD">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="CreateStudent" name="crear" />
                    <input type="submit" class="btn btn-warning float-left btn-listado" name="accion" value="ModificarStu">
                    <input type="submit" class="btn btn-danger btn-listado" name="accion" value="EliminarStu">
                </div>
            </div>

            </form>
        </div>
        <div class="modal-footer">
            <form action="" method="post">
                <input type="submit" class="btn btn-info" name="accion" value="ListarStudent">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
    </div>



    <!--6 enrollment -->
    <!-- Modal -->
    <div class="modal fade" id="enroll" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Crear enrollment </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method="post" action="../controller/insert.php">
                <div class="form-group">
                    <label>Alumno Existente</label>

                    <select name='stuEnroll' class='form-control form-control-sm' placeholder='Elija Clase Existente:' value=<?php if(isset($_POST["id2studentEnroll"])) echo($id2studentEnroll);?>>

                    <?php
                           
                        //echo("<select name='prof_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente: '>");
                        for($i=0;$i<count($listaStudent);$i++){
                            ?>
                            <option name="idstudentselect" value=<?php echo($listaStudent[$i]->id);?>>Nombre: <?php echo($listaStudent[$i]->name.' '.$listaStudent[$i]->surname); ?></option>
                            <?php
                        }
                        //echo("</select>");

                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Curso Existente</label>
                    
                        <select name='cursostudentselect' class='form-control form-control-sm' placeholder='Elija Clase Existente:' value=<?php if(isset($_POST["id2studentEnroll"])) echo($id2courseEnroll);?>>

                    <?php
                        //echo("<select name='curs_clase' class='form-control form-control-sm' placeholder='Elija Clase Existente: '>");
                        for($i=0;$i<count($listaCourse);$i++){
                            ?>
                            <option name="idCursoSelect" value=<?php echo($listaCourse[$i]->id_course);?>>Nombre: <?php echo($listaCourse[$i]->name); ?></option>
                            <?php
                        }
                       // echo("</select>");

                    ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input class="form-control" type="number" required name="statusSelect" value=<?php if(isset($_POST["id2studentEnroll"])) echo($status2Enroll); ?> >
                </div>

        
<?php if(isset($_SESSION['idEnroll'])) $_SESSION['idEnroll']=$_POST['id2Enroll'];?>

            <div class="row alterarBD">
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" value="CreateEnroll" name="crear" />
                    <input type="submit" class="btn btn-warning float-left btn-listado" name="accion" value="ModificarEnroll">
                    <input type="submit" class="btn btn-danger btn-listado" name="accion" value="EliminarEnroll">
                </div>
            </div>
        </form>
        </div><!--body modal -->    
        <div class="modal-footer">
            <form action="" method="post">
                <input type="submit" class="btn btn-warning" name="accion" value="ListarEnroll">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>

<?php
$footer  = "templates/footer.php";
require($footer);
?>