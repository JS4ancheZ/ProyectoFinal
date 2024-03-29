<?php 
    session_start();
    include_once("../../config/DBConect.php");
    include_once("../../config/Config.php");
    
    $id = $_GET['id'];

    $conexion = new Database;  
    $result = $conexion->editMateria($id);

    $mat_id = $mat_nombre = $mat_horario = $mat_docente = $mat_descripcion = "";
    foreach($result->fetchAll(PDO::FETCH_OBJ) as $r){
        $mat_id = $r->id;
        $mat_nombre = $r->nombre;
        $mat_horario = $r->horario;
        $mat_docente = $r->docente;
        $mat_descripcion = $r->descripcion;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../estilos/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Modificar Materias
                        <a href="<?= ROOT ?>modulos/materias/materias.php" class="btn btn-primary">Regresar</a>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="POST" name="forrol">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $mat_nombre ?>" required>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $mat_id ?>">
                            </div>

                            <div class="form-group">
                                <label for="horario">Horario</label>
                                <input type="text" class="form-control" id="horario" name="horario" value="<?= $mat_horario ?>" required>
                                <input type="hidden" class="form-control" id="horario" name="horario" value="<?= $mat_horario ?>">
                            </div>

                            <div class="form-group">
                                <label for="docente">Docente</label>
                                <input type="text" class="form-control" id="docente" name="docente" value="<?= $mat_docente ?>" required>
                                <input type="hidden" class="form-control" id="docente" name="docente" value="<?= $mat_docente ?>">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $mat_descripcion ?>" required>
                                <input type="hidden" class="form-control" id="descripcion" name="descripcion" value="<?= $mat_descripcion ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    <div>

    <script src="../../js/javascript.js" ></script>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js" ></script>
</body>
</html>