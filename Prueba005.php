<?php

//PRUEBA PHP NUMERO 5

// CREACION DE UN API REST - POST

// CONTRUYA UN SCRIPT EN PHP QUE RECIBA POR POST UN OBJETO JSON QUE TIENE INFORMACION DE:
	//nombre
	//apellido
	//cedula
	//edad

	// EJEMPLO DE JSON: {"nombre":"DIEGO","apellido":"VALDIVIESO","cedula":"80999888","edad":"45"}


// el api debe retornar como resultado un objeto json de la siguiente manera

// {"info":"La persona DIEGO VALDIVIESO identificada con cedula 80999888 tienen 45 años de edad"}
// el JSON retornado debera corresponder a los datos recibidos en el JSON de ingreso

// TENER EL CUENTA:
	//SI METODO ES DIFERENTE A POST, SE DEBE RETORNAR ERROR 404
	//SI JSON DE ENTRADA TIENE UN DATO VACIO, RETORNAR ERROR 405
	//SI JSON DE ENTRADA NO TIENE LOS DATOS COMPLETOS, RETORNAR ERROR 406

  class Api {
    static function error($error) {
      http_response_code($error);
      exit;
    }
    static function validate() {
      $data = json_decode(file_get_contents('php://input'), true);
      //validate full data
      if(
        !isset($data['nombre']) || 
        !isset($data['apellido']) ||
        !isset($data['cedula']) ||
        !isset($data['edad'])
      ) { return 406; }
      if(
        empty($data['nombre']) || 
        empty($data['apellido']) ||
        empty($data['cedula']) ||
        empty($data['edad'])
      ) { return 405; }
      return 0;
    }
    static function user() {
      $data = json_decode(file_get_contents('php://input'), true);
      $res = new stdClass();
      $res->info = "La persona ".$data['nombre']." ".$data['apellido']." identificada con cedula ".$data['cedula']." tienen ".$data['edad']." años de edad";
      echo json_encode($res);
    }
  }
	
  require __DIR__ . '/vendor/autoload.php';
  $router = new \Bramus\Router\Router();

  
  $router->get('Prueba005.php', function() { Api::error(404); });
  $router->post('Prueba005.php', function() { 
    $validation = Api::validate();
    $validation > 0 ? Api::error($validation) : Api::user();
  });
  $router->run();

?>