<?php
/*********conecta ao banco de dados*********/
//infos
$endereco = 'localhost';
$banco = 'OWLspedagens';
$usuario = 'postgres';
$senha = 'paosi';

try {

  //conecta
  $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
  echo "Falha ao conectar ao banco de dados. <br/>";
  die($e->getMessage());
}

?>