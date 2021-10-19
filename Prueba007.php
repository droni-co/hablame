<?php

//PRUEBA PHP NUMERO 7


//contruya un formulario en html que permita subir un archivo csv
//guarde este archivo en en servidor local 
//lea el archivo guardado previamente
//imprima linea por linea en pantalla
$data = [];
if(isset($_FILES['file'])) {
  move_uploaded_file($_FILES['file']['tmp_name'], './assets/prueba6.csv');
  $data = array_map('str_getcsv', file('./assets/prueba6.csv'));
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

    <title>Prueba 007</title>
  </head>
  <body>
    <div class="container py-5">
      <div class="card">
        <div class="card-body">
          <form action="" method="POST"  enctype="multipart/form-data" class="row row-cols-lg-auto g-3 align-items-center">
            <div class="col-12">
              <input name="file" type="file" accept=".csv">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <table class="table">
        <tbody>
          <?php foreach($data as $row) { ?>
          <tr>
            <?php foreach($row as $dat) { ?>
            <td><?php echo $dat; ?></td>
            <?php } ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>