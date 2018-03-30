<?php
/**
 * All the validation functions are here.
 *
 * @author     Alan Nunes da Silva <alann.625@gmail.com>
 * @copyright  2018 Dual Dev
 */

function validate_cpf($cpf){
  if(preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) {
   return 0;
  }
  return 1;
}

function validate_telefone($telefone){
  if(preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $telefone)){
   return 0;
  }
  return 1;
}

function validate_celular($celular){
  if(preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/', $celular)){
   return 0;
  }
  return 1;
}

function validate_data($data){
  if(preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $data)) {
   return 0;
  }
  return 1;
}

function validate_cep($cep){
  if(preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) {
   return 0;
  }
  return 1;
}

function validate_email($email){
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
   return 0;
  }
  return 1;
}

// Prevent some SQL Injetions
function safe_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
