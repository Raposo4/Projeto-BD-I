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
      $sql = "INSERT INTO hotel
                (nome_fantasia, caixa_total, data_abertura, loc_cidade, loc_estado, loc_pais, loc_numero, loc_complemento,
                 valor_aluguel, num_funcionarios, num_hospedes, ocupacao_maxima, possui_cafe, possui_wifi, categoria)
              VALUES
              (:nome_fantasia, :caixa_total, :data_abertura, :loc_cidade, :loc_estado, :loc_pais, :loc_numero, :loc_complemento,
                 :valor_aluguel, :num_funcionarios, :num_hospedes, :ocupacao_maxima, :possui_cafe,
                 :possui_wifi, :categoria)";

      // Preparar a SQL (pdo)
      $stmt = $pdo->prepare($sql);

      // Definir/organizar os dados p/ SQL
      $dados = array(
        ':nome_fantasia' => $_POST['nome_fantasia'],
        ':caixa_total' => $_POST['caixa_total'],
        ':data_abertura' => $_POST['data_abertura'],
        ':loc_cidade' => $_POST['loc_cidade'],
        ':loc_estado' => $_POST['loc_estado'],
        ':loc_pais' => $_POST['loc_pais'],
        ':loc_numero' => $_POST['loc_numero'],
        ':loc_complemento' => $_POST['loc_complemento'],
        ':valor_aluguel' => $_POST['valor_aluguel'],
        ':num_funcionarios' => $_POST['num_funcionarios'],
        ':num_hospedes' => $_POST['num_hospedes'],
        ':ocupacao_maxima' => $_POST['ocupacao_maxima'],
        ':possui_cafe' => $_POST['possui_cafe'],
        ':possui_wifi' => $_POST['possui_wifi'],
        ':categoria' => $_POST['categoria'],
      );

      // Tentar Executar a SQL (INSERT)
      // Realizar a inserção das informações no BD (com o PHP)
      if ($stmt->execute($dados)) {
        header("Location: ../html/hotel.php?msgSucesso=Cadastro realizado com sucesso!");
      }
  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/hotel.php?msgErro=Falha ao cadastrar...");
  }
}
else {
  header("Location: ../html/hotel.php?msgErro=Erro de acesso.");
}
die();

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
 ?>

 