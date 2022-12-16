<?php
require_once 'connect.php';
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
    // Preparar as informações
      // Montar a SQL (pgsql)
      $sql = "INSERT INTO uso_da_bike
                (id_bike, cpf_cliente, data_retirada, data_devolucao)
              VALUES
                (:id_bike, :cpf_cliente, :data_retirada, :data_devolucao)";

      // Preparar a SQL (pdo)
      $stmt = $pdo->prepare($sql);

      // Definir/organizar os dados p/ SQL

      $ret = DateTime::createFromFormat("Y-m-d*H:i", $_POST['data_retirada']);
      $ret = $ret->format('Y-m-d H:i');

      if(!empty($_POST['data_devolucao'])){
      $dev = DateTime::createFromFormat("Y-m-d*H:i", $_POST['data_devolucao']);
      $dev = $dev->format('Y-m-d H:i');
      }else
      {
        $dev =date('Y-m-d H:i');
      }


      $dados = array(
        ':id_bike' => $_POST['id_bike'],
        ':cpf_cliente' => $_POST['cpf_cliente'],
        ':data_retirada' => $ret,
      );

      if(empty($_POST['data_devolucao'])){
      $stmt->bindValue(":data_devolucao", null, PDO::PARAM_NULL);
      }else
      {
        $stmt->bindValue(":data_devolucao", $dev);
      }

      // Tentar Executar a SQL (INSERT)
      // Realizar a inserção das informações no BD (com o PHP)
      if ($stmt->execute($dados)) {
        header("Location: ../html/bike.php?msgSucesso=Cadastro realizado com sucesso!");
      }
  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/bike.php?msgErro=Falha ao cadastrar...");
  }
}
else {
  header("Location: ../html/bike.php?msgErro=Erro de acesso.");
}
die();

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
 ?>

 