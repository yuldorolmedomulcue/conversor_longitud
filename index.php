<?php
//setear valores inciales
$valor = '';
$desde = '';
$hasta = '';
//convertir a medida estandar mts
function convertir_metros($valor, $unidad_desde){
    switch ($unidad_desde) {
        case 'Milimetro':
                return $valor / 1000;
            break;
        case 'Centimetro':
                return $valor / 100;
        break;
        case 'Decimetro':
                return $valor / 10;
        break;
        case 'Metro':
                return $valor * 1;
        break;
        case 'Decametro':
              return $valor * 10;
        break;
        case 'Hectometro':
                return $valor * 100;
        break;
        case 'Kilometro':
                return $valor * 1000;
        break;
        default:
            return 'Unidad de medidad no soportada';
            break;
    }
}
//seccion hasta
function convertir_desde_metros($valor, $unidad_hasta){
    switch ($unidad_hasta) {
        case 'Milimetro':
                return $valor * 1000;
            break;
        case 'Centimetro':
                return $valor * 100;
        break;
        case 'Decimetro':
                return $valor * 10;
        break;
        case 'Metro':
                return $valor * 1;
        break;
        case 'Decametro':
              return $valor / 10;
        break;
        case 'Hectometro':
                return $valor / 100;
        break;
        case 'Kilometro':
                return $valor / 1000;
        break;
        default:
            return 'Unidad de medidad no soportada';
            break;
    }
}

//invocar btn convertir | isset si seha precionado
if (isset($_POST['convertir'])) {
    //valores
    $valor = $_POST['valor'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    $calculo_desde = convertir_metros($valor, $desde);
    $calculo_hasta = convertir_desde_metros($calculo_desde, $hasta);

    //notacion cientifica para quitar 1.0E-5
    $resultado = number_format($calculo_hasta,2); //2 decimales

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Conversor de longitud</title>
</head>
<body>
    <h1 class="text-center">Conversor de Lonngitud MM</h1>
    <div class="container">
        <form method="POST">
            <div class="row mt-4">
                <div class="col-sm-4">
                    <div>
                    <label for="valor" class="form-label">VALOR:</label>
                        <input type="number" name="valor" class="form-control" value="<?php if(isset($_POST['valor'])){echo $_POST['valor']; }?>"> <!--Seteamos para guardar al actualizar-->
                    </div>
                </div>

                <div class="col-sm-4">
                    <label for="desde" class="form-label">Desde: </label>
                    <select class="form-select" name="desde">
                        <option value="">---Seleccionar Valor---</option>
                        <option value="Milimetro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Milimetro'){echo 'selected' ; }?> >Milimetro</option>
                        <option value="Centimetro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Centimetro'){echo 'selected' ; }?> >Centimetro</option>
                        <option value="Decimetro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Decimetro'){echo 'selected' ; }?> >Decimetro</option>
                        <option value="Metro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Metro'){echo 'selected' ; }?> >Metro</option>
                        <option value="Decametro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Decametro'){echo 'selected' ; }?> >Decametro</option>
                        <option value="Hectometro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Hectometro'){echo 'selected' ; }?> >Hectometro</option>
                        <option value="Kilometro" <?php if(isset($_POST['desde']) && $_POST['desde'] == 'Kilometro'){echo 'selected' ; }?> >Kilometro</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="hasta" class="form-label">Hasta:</label>
                    <select class="form-select" name="hasta">
                        <option value="">---Seleccionar Valor---</option>
                        <option value="Milimetro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Milimetro'){echo 'selected' ; }?> >Milimetro</option>
                        <option value="Centimetro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Centimetro'){echo 'selected' ; }?> >Centimetro</option>
                        <option value="Decimetro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Decimetro'){echo 'selected' ; }?> >Decimetro</option>
                        <option value="Metro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Metro'){echo 'selected' ; }?> >Metro</option>
                        <option value="Decametro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Decametro'){echo 'selected' ; }?> >Decametro</option>
                        <option value="Hectometro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Hectometro'){echo 'selected' ; }?> >Hectometro</option>
                        <option value="Kilometro" <?php if(isset($_POST['hasta']) && $_POST['hasta'] == 'Kilometro'){echo 'selected' ; }?> >Kilometro</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-6">
                    <button type="submit" name="convertir" class="btn btn-primary w-100 py-4">Convertir</button>
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="resultado" class="form-label">RESULTADO:</label>
                        <input type="text" name="resultado" class="form-control" value="<?php if(isset($resultado)) echo $resultado; ?>">
                    </div>
                </div> 
            </div>
        </form>
    </div>
    
</body>
</html>