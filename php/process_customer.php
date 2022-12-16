<?php
/****codigo de inserçao da tabela cliente****/
//conecta ao banco
require_once 'connect.php';

if (!empty($_POST)) {
  try {
   
    //codigo sql
    $sql = "INSERT INTO cliente
              (cpf_cliente, rg, nome, data_entrada, telefone, email)
            VALUES
              (:cpf, :rg, :nome, :data_entrada, :telefone, :email)";

    //prepara
    $stmt = $pdo->prepare($sql);

    //pega os dados do post para o codigo
    $dados = array(
      ':cpf' => $_POST['cpf'],
      ':rg' => $_POST['rg'],
      ':nome' => $_POST['nome'],
      ':data_entrada' => date("Y/m/d"),
      ':telefone' => $_POST['telefone'],
      ':email' => $_POST['email'],
    );

    //executa o codigo
    if ($stmt->execute($dados)) {
      header("Location: ../html/cliente.php?msgSucesso=Cadastro realizado com sucesso!");
    }
  } catch (PDOException $e) {
    header("Location: ../html/cliente.php?msgErro=Falha ao cadastrar...");
  }
}
else {
  header("Location: ../html/cliente.php?msgErro=Erro de acesso.");
}
die();
 ?>

 