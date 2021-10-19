<?php

//PRUEBA PHP NUMERO 4


// DESCARGUE EL ARCHIVO COMPRIMIDO DE: https://storage.googleapis.com/a2pcolombia/portability_20211005.zip
// EXTRAIGA EL ARCHIVO .ZIP MANUALMENTE, ESTE CONTIENE UN FICHERO LLAMADA portability.csv
// ESTE ARCHIVO TIENE LA SIGUENTE ESCTRUCTURA

// 573164241556;343573164241556;20210721
// 573023968486;132573023968486;20180124
// 573195307972;121573195307972;20210922
// 573188103499;121573188103499;20210511
// 573026066754;132573026066754;20210723
// 573184727041;121573184727041;20201014
// 573138724788;143573138724788;20210323
// 573007638387;132573007638387;20191017
// 573186127215;132573186127215;20190314


// CADA LINEA DEL ARCHIVO CSV TIENNE 3 COLUMNAS SEPARADAS POR ;
// LA COLUMNA 1, CORRESPONDE A UN NUMERO DE CELULAR
// LA COLUMNA 3, CORRESPONDE A UNA FECHA  YYYYMMDD

// USANDO PHP, LEA LINEA POR LINEA
// GENERE 2 ARRAYS, ASI:
	// ARRAY 1: CANTIDAD DE NUMEROS DE CELULAR AGRUPADOS POR FECHA
	// ARRAY 2: CANTIDAD DE NUMEROS DE CELULAR AGRUPADOS POR INDICATIVO (5 PRIMEROS DIGITOS DEL NUMERO DE CELULAR)
	
// LA COLUMNA 2 NO TIENE NINGUNA FUNCION EN ESTE EJERCICIO

$fila = 1;
$numByDate = [];
$numByPrefix = [];
if (($gestor = fopen("./assets/portability.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
      // group by date
      $date = $datos[2];
      if(!isset($numByDate[$date])) { $numByDate[$date] = []; }
      array_push($numByDate[$date], $datos[0]);
      // group by prefix
      $prefix = substr($datos[0], 0, 5);
      if(!isset($numByPrefix[$prefix])) { $numByPrefix[$prefix] = []; } 
      array_push($numByPrefix[$prefix], $datos[0]);
      $fila++;
    }
    fclose($gestor);
}
print_r($numByDate);
print_r($numByPrefix);

?>