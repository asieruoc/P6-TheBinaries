<?php
#Incluimos una y solo una vez el config.php
//require_once ('./../config.php');

$head  = "templates/headerlogin.php";

//$head  = "templates/header.php";

require($head);

if (!(isset($_SESSION["login"]))){
    echo "no estas logueado";
    header("Location: ./login.php");
}
require_once '../controller/config/Conexion.php';
require_once '../controller/crud/Crud.php';

//Comprobamos que boton nos ha pulsado el usuario.
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
//Creamos el objeto para concectarnos a la BBDD
$conexion = (new Conexion())->conectar();

//dependiendo del boton pulsado entrara en un caso o otro
switch($accion){
    //Consulta horario diaria
    case "btnDaily":
        $sentencia=$conexion->prepare("SELECT sh.day, sh.time_start, sh.time_end, cl.name
                             FROM enrollment e, courses c, class cl, schedule sh
                            WHERE e.id_course=c.id_course 
                            AND e.id_student=:id 
                            AND c.id_course=cl.id_course 
                            AND sh.id_class=cl.id_class AND sh.day=:dataForm");
        //pasamos por parametro el id de usuario logueado y la data que ha introducido.
        $sentencia->bindParam(':id', $_SESSION["id"]);
        $sentencia->bindParam(':dataForm', $_POST["viewDate"]);
        //ejecutamos la sentencia
        $sentencia->execute();
        //rellenamos el array listaDatos con los datos recogidos de la consulta ejecutada.
        $listaDatos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "btnWeekly":
        //Consulta horario semanal
        $sentencia=$conexion->prepare("SELECT sh.day, sh.time_start, sh.time_end, cl.name
                             FROM enrollment e, courses c, class cl, schedule sh
                            WHERE e.id_course=c.id_course 
                            AND e.id_student=:id 
                            AND c.id_course=cl.id_course 
                            AND sh.id_class=cl.id_class AND sh.day BETWEEN :dataStart AND :dataEnd");
        //pasamos por parametro el id de usuario logueado y la data que ha introducido.
        $sentencia->bindParam(':id', $_SESSION["id"]);
        $sentencia->bindParam(':dataStart', $_POST["viewDate"]);
        //calculamos a partir de la data introducida por el usuario una semana. (Sumamos 6 dias a la fecha inicial)
        $dataRecibida=$_POST["viewDate"];
        $dataWeek=strtotime('+6 day', strtotime($dataRecibida));
        $dataWeek=date('Y-m-d', $dataWeek);
        //pasamos por parametro la data final previamente calculada
        $sentencia->bindParam(':dataEnd', $dataWeek);
        //ejecutamos la sentencia
        $sentencia->execute();
        //rellenamos el array listaDatos con los datos recogidos de la consulta ejecutada.
        $listaDatos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "btnMonthly":
        //Consulta horario mensual
        $sentencia=$conexion->prepare("SELECT sh.day, sh.time_start, sh.time_end, cl.name
                             FROM enrollment e, courses c, class cl, schedule sh
                            WHERE e.id_course=c.id_course 
                            AND e.id_student=:id 
                            AND c.id_course=cl.id_course 
                            AND sh.id_class=cl.id_class AND sh.day BETWEEN :dataStart AND :dataEnd");
        //pasamos por parametro el id de usuario logueado y la data que ha introducido.
        $sentencia->bindParam(':id', $_SESSION["id"]);
        $sentencia->bindParam(':dataStart', $_POST["viewDate"]);
        //calculamos a partir de la data introducida por el usuario un mes. (Sumamos 30 dias a la fecha inicial)
        $dataRecibida=$_POST["viewDate"];
        $dataWeek=strtotime('+30 day', strtotime($dataRecibida));
        $dataWeek=date('Y-m-d', $dataWeek);
        //pasamos por parametro la data final previamente calculada
        $sentencia->bindParam(':dataEnd', $dataWeek);
        //ejecutamos la sentencia
        $sentencia->execute();
        //rellenamos el array listaDatos con los datos recogidos de la consulta ejecutada.
        $listaDatos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        break;
    default:
}
//Consulta para saber en que curso esta inscrito el usuario registrado
$sentencia=$conexion->prepare("SELECT c.description FROM courses c, enrollment e
                                    WHERE e.id_course=c.id_course AND e.id_student=:id ");
//pasamos por parametro el id de usuario logueado.
$sentencia->bindParam(':id', $_SESSION["id"]);
//ejecutamos la sentencia
$sentencia->execute();
//rellenamos el array listaCursos con los datos recogidos de la consulta ejecutada.
$listaCursos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div align="center">
    <h3>Consultar horarios</h3>
</div>
<!--Tabla donde mostramos la informacion-->
<div class="container">
    <div class="row">
        <!--Columna Izquierda-->
        <div class="col">
            <h3>VISTAS<br></h3>
            <h5>Introduce una fecha para realizar la consulta:</h5>
            <form method="post" action="" name="horarios">
                <div class="form-group">
                    <label>Introducir fecha:</label>
                    <input class="form-control" type="text" required name="viewDate" placeholder="Enter date: aaaa-mm-dd" id="viewDate"/>
                </div>
                <h5>Seleccionar vista:</h5>
                <div class="form-group">
                    <button value="btnDaily" type="submit" class="btn btn-primary" name="accion">
                        Diariamente
                    </button>
                </div>
                <div class="form-group">
                    <button value="btnWeekly" type="submit" class="btn btn-primary" name="accion">
                        Semanalmente
                    </button>
                </div>
                <div class="form-group">
                    <button value="btnMonthly" type="submit" class="btn btn-primary" name="accion">
                        Mensualmente
                    </button>
                </div>
            </form>
        </div>
        <!--Columna Derecha-->
        <div class="col">
            <p><h3>INFORMACIÓN ESTUDIANTE</h3></p>
            <p>Nombre: <?php echo $_SESSION["name"]; ?> </p>
            <p>Apellidos: <?php echo $_SESSION["surname"]; ?> </p>
            <p>Nombre usuario: <?php echo $_SESSION["username"]; ?> </p>
            <p><?php foreach($listaCursos as $listCursos){ ?>
            <p>Estás cursando: <?php echo $listCursos['description']; ?></p>
            <?php } ?>
            <p>Fecha registrada: <?php echo date("Y-m-d", strtotime($_SESSION["fechaActual"])); ?> </p>
        </div>
    </div>
</div>

<?php
//Verificamos que en el campo Data se haya introducido un valor, de esta manera inicialmente enseñamos las clases
// que se imparten en el mismo dia.
// Si se ha rellenado el campo data muestra los datos solicitados por el usuario.
if (isset($_POST['viewDate'])){ ?>
    <div class="row-cols-auto">
         <table class="table">
            <thead>
                <th>Día</th>
                <th>Comienzo</th>
                <th>Fin</th>
                <th>Clase</th>
            </thead>
            <?php
            foreach($listaDatos as $list){ ?>
                <tr class="table table-striped">
                    <td><?php echo $list['day']; ?></td>
                    <td><?php echo $list['time_start']; ?></td>
                    <td><?php echo $list['time_end']; ?></td>
                    <td><?php echo $list['name']; ?></td>
                </tr>
            <?php }?>
        </table>
    </div>
<!--Si NO se ha rellenado el campo data muestra los datos para el mismo dia -->
<?php } else {
    //Consulta para seleccionar las asignaturas del mismo dia.
    $sentencia=$conexion->prepare("SELECT sh.day, sh.time_start, sh.time_end, cl.name
                             FROM enrollment e, courses c, class cl, schedule sh
                            WHERE e.id_course=c.id_course 
                            AND e.id_student=:id 
                            AND c.id_course=cl.id_course 
                            AND sh.id_class=cl.id_class AND sh.day=CURRENT_DATE");
    //pasamos por parametro el id de usuario logueado.
    $sentencia->bindParam(':id', $_SESSION["id"]);
    //ejecutamos la sentencia.
    $sentencia->execute();
    //rellenamos el array listaDatos con los datos recogidos de la consulta ejecutada.
    $listaDatos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div class="row-cols-auto">
        <table class="table">
            <thead>
                <th>Día</th>
                <th>Comienzo</th>
                <th>Fin</th>
                <th>Clase</th>
            </thead>
            <?php
                foreach($listaDatos as $list){ ?>
                    <tr class="table table-striped">
                        <td><?php echo $list['day']; ?></td>
                        <td><?php echo $list['time_start']; ?></td>
                        <td><?php echo $list['time_end']; ?></td>
                        <td><?php echo $list['name']; ?></td>
                    </tr>
            <?php }?>
       </table>
    </div>
<?php }?>

<?php
$footer  = "templates/footer.php";
require($footer);
?>


