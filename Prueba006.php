<?php

//PRUEBA PHP NUMERO 6


// $numero=xxx;
// $color=xxx;

// si $numero es mayor a 50, $color="azul";
// pero si $numero es mayor a 50 y es par, $color="azul claro";
// pero si $numero es mayor a 50 es par y comienza por 5, $color="azul oscuro";

// si $numero es menor o igual a 50, $color="verde";
// si $numero es menor o igual a 50 y es impar, $color="verde claro";
// si $numero es menor o igual a 50 es impar y comienza por 6, $color="verde oscuro";

//construya los condicionales necesarios, para retornar el color indicado para $numero=xxx
$num = 7;
$color = '';
if($num > 50) {
  $color="azul";
  if($num % 2 == 0){ 
    $color="azul claro";
    if(substr($num, 0, 1) == 5){ $color="azul oscuro"; }
  }
} else {
  $color="verde";
  if($num % 2 != 0) { $color="verde claro"; }
}
echo $color;





?>