<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/tail.select-default.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <select class="form-control" id="optPrecidimientos">
                    <option disabled selected>Selecciona una opción</option>
                    <?php
                    $con = new SQLite3("riesgos.db") or die("Problemas para conectar");
                    $cs = $con -> query("SELECT procesoPro FROM listaProcedimientos GROUP BY procesoPro  ORDER BY procesoPro");
                    
                    while ($resul = $cs -> fetchArray()) {
                    
                        $procesoPro = $resul['procesoPro'];

                        echo '<optgroup label="Proceso: <i>'.$procesoPro.'</i>">';

                        $csDos = $con -> query("SELECT procedimientoPro FROM listaProcedimientos WHERE procesoPro = '$procesoPro' ORDER BY procedimientoPro");

                        while ($resulDos = $csDos -> fetchArray()) {

                            $procedimientoPro = $resulDos['procedimientoPro'];

                            echo '<option value="'.$procedimientoPro.'">'.$procedimientoPro.'</option>';
                        }

                        echo '</optgroup>';

                    }
                    
                    $con -> close();
                    
                    ?>
                </select>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tail.select.js"></script>
    <script>
        tail.select("#optPrecidimientos", {
            search: true,
        });
    </script>
</body>

</html>