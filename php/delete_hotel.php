<?php
require_once '../php/connect.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

if (!empty($_POST)) {
  // Está chegando dados por POST e então posso tentar inserir no banco
  // Obter as informações do formulário ($_POST)
  try {
      // Montar a SQL (pgsql)
      $sql = "DELETE FROM hotel
              WHERE id_hotel = :id";

      $sth = $pdo->prepare($sql);

      $dados = array(':id' => $_POST['id']);
      
      print($dados);

      if ($sth->execute($dados)) {
        header("Location: ../html/hotel.php?msgSucesso=Hotel deletado com sucesso!");
      }

      header("Location: ../html/hotel.php");

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/search_hotel.php?msgErro=Falha ao buscar...");
  }
}//else {
  //header("Location: ../html/hotel.php?msgErro=Erro de acesso.");
//}
//die();

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
?>