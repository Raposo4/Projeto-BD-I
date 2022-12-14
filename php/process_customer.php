<?php
require_once 'conectaBD.php';
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
      $sql = "INSERT INTO cliente
                (cpf_cliente, rg, nome, data_entrada, telefone, email)
              VALUES
                (:cpf, :rg, :nome, :dataEntrada, :telefone, :email)";

      // Preparar a SQL (pdo)
      $stmt = $pdo->prepare($sql);

      // Definir/organizar os dados p/ SQL
      $dados = array(
        ':cpf' => $_POST['cpf'],
        ':rg' => $_POST['rg'],
        ':nome' => $_POST['nome'],
        ':dataEntrada' => $_POST['dataEntrada'],
        ':telefone' => $_POST['telefone'],
        ':email' => $_POST['email'],
      );

      // Tentar Executar a SQL (INSERT)
      // Realizar a inserção das informações no BD (com o PHP)
      if ($stmt->execute($dados)) {
        header("Location: index.php?msgSucesso=Cadastro realizado com sucesso!");
      }
  } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: index.php?msgErro=Falha ao cadastrar...");
  }
}
else {
  header("Location: index.php?msgErro=Erro de acesso.");
}
die();

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
 ?>