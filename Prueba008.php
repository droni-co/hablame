<?php

//PRUEBA PHP NUMERO 8


//contruya un formulario en html con los siguientes campos:
	//nombre
	//apellido
	//telefono
	//email
	//IPv4
	//fecha de nacimiento Y-m-d


// Realice en PHP (del lado del servidor) las siguientes validaciones
	//nombre contenga al menos 2 palabra
	//apellido contenga solo 1 palabra
	//que ip ingresada sea valida en IPv4
	//que fecha de nacimiento sea valida en formato Y-m-d
	
// SI pasa esta validaciones previas, se debe imprimir en pantalla:
	//nombre y apellido, todo en minusculas y primera letra de cada palabra en mayuscula
	//teléfono solo numerico, eliminar espacios en blanco, +, (, ), -
		//si ingreso en formulario el numero +(57)311-2345566, debe imprimir 573112345566
	//direccion IP
	//fecha de nacimiento

  $res = mull;
  $errors = [];
  $old = [
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'telefono' => $_POST['telefono'],
    'email' => $_POST['email'],
    'IPv4' => $_POST['IPv4'],
    'nacimiento' => $_POST['nacimiento']
  ];
  if(isset($_POST['formSubmit'])) {
    
    //validations
    if(
      !isset($_POST['nombre']) || empty($_POST['nombre']) || 
      !isset($_POST['apellido']) || empty($_POST['apellido']) ||
      !isset($_POST['IPv4']) || empty($_POST['IPv4']) ||
      !isset($_POST['nacimiento']) || empty($_POST['nacimiento'])
    ) { array_push($errors, 'Datos incompletos.'); }
    if(
      count($errors) == 0 &&
      count(explode(' ', $_POST['nombre'])) < 2
    ) {
      array_push($errors, 'El nombre debe tener al menos dos palabras.');
    }
    if(
      count($errors) == 0 &&
      strpos($_POST['apellido'], ' ')
    ) {
      array_push($errors, 'El apellido debe tener una sola palabra.');
    }
    if(
      count($errors) == 0 &&
      !filter_var($_POST['IPv4'], FILTER_VALIDATE_IP)
    ) {
      array_push($errors, 'Ip No valida.');
    }
    $nacimiento = date('Y-m-d', strtotime($_POST['nacimiento']));
    $checkdate = explode('-', $nacimiento);
    if(
      count($errors) == 0 &&
      (count($checkdate) != 3 ||
      !checkdate($checkdate[1], $checkdate[2], $checkdate[0]))
    ) {
      array_push($errors, 'Fecha no valida.');
    }
    // final validacion
    if(count($errors) == 0) {
      $res = [
        'name' => ucwords(strtolower($_POST['nombre'].' '.$_POST['apellido'])),
        'phone' => str_replace(['+', ' ', '.', ','], '', $_POST['telefono']),
        'ip' => $_POST['IPv4'],
        'birthdate' => $nacimiento
      ];
    }
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Prueba 008</title>
  </head>
  <body>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $old['nombre']; ?>" placeholder="Nombre">
                  <label for="nombre">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $old['apellido']; ?>" placeholder="Apellido">
                  <label for="apellido">Apellido</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $old['telefono']; ?>" placeholder="Teléfono">
                  <label for="telefono">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $old['email']; ?>" placeholder="Email">
                  <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="IPv4" name="IPv4" value="<?php echo $old['IPv4']; ?>" placeholder="IPv4">
                  <label for="IPv4">IPv4</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $old['nacimiento']; ?>" placeholder="Fecha de nacimiento">
                  <label for="Fecha de nacimiento">IPv4</label>
                </div>
                <div class="form-floating mb-3">
                  <button type="submit" name="formSubmit" value="1" class="btn btn-primary">Enviar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <?php if(count($errors) > 0) { ?>
            <div class="alert alert-danger" role="alert">
              <ul>
                <?php foreach($errors as $error) { echo '<li>'.$error.'</li>'; } ?>
              </ul>
            </div>
          <?php } ?>
          <?php if(is_array($res)) { ?>
            <table class="table">
              <tbody>
                <?php foreach($res as $key => $dat) { ?>
                <tr>
                  <td scope="row"></td>
                  <td><?php echo $key; ?></td>
                  <td><?php echo $dat; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php } ?>
        </div>
      </div>
      
    </div>
  </body>
</html>