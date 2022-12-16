<?php
/****codigo de delete da tabela uso_da_bike****/
//conecta ao banco
require_once '../php/connect.php';

if (!empty($_GET['id'])) {
  try {
      
    //codigo sql
    $sql = "DELETE FROM trabalhoowl.uso_da_bike
            WHERE id_bike = :id";

    //prepara 
    $sth = $pdo->prepare($sql);

    //executa o codigo
    if ($sth->execute(array(':id' => $_GET['id']))) {
      header("Location: ../html/bike.php?msgSucesso=Registro deletado com sucesso!");
    }

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/search_bike.php?msgErro=Falha ao deletar...");
  }
}
?>