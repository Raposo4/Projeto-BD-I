<?php
/****codigo de delete da tabela hotel****/
//conecta ao banco
require_once '../php/connect.php';

if (!empty($_GET['id'])) {
  try {
      
    //codigo sql
    $sql = "DELETE FROM trabalhoowl.hotel
            WHERE id_hotel = :id";

    //prepara 
    $sth = $pdo->prepare($sql);

    //executa o codigo
    if ($sth->execute(array(':id' => $_GET['id']))) {
      header("Location: ../html/hotel.php?msgSucesso=Hotel deletado com sucesso!");
    }

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/search_hotel.php?msgErro=Falha ao deletar...");
  }
}
?>