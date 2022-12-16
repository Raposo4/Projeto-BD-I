<?php
require_once '../php/connect.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

if (!empty($_GET['id'])) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
      // Montar a SQL (pgsql)
      $sql = "DELETE FROM uso_da_bike
              WHERE id_bike = :id";

      $sth = $pdo->prepare($sql);

      if ($sth->execute(array(':id' => $_GET['id']))) {
        header("Location: ../html/bike.php?msgSucesso=Registro deletado com sucesso!");
      }

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/search_bike.php?msgErro=Falha ao deletar...");
  }
}//else {
  //header("Location: ../html/hotel.php?msgErro=Erro de acesso.");
//}
//die();

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
?>