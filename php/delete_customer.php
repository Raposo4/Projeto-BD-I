<?php
/****codigo de delete da tabela cliente****/
//conecta ao banco
require_once '../php/connect.php';

if (!empty($_GET['id'])) {
  try {

    //codigo sql
    $sql = "DELETE FROM trabalhoowl.cliente
            WHERE cpf_cliente = :id";

    //prepara 
    $sth = $pdo->prepare($sql);

    //executa o codigo
    if ($sth->execute(array(':id' => $_GET['id']))) {
      header("Location: ../html/cliente.php?msgSucesso=Cliente deletado com sucesso!");
    }

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/search_customer.php?msgErro=Falha ao deletar...");
  }
}
?>