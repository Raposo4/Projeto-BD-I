<?php
/****codigo de inserçao da tabela cliente****/
//conecta ao banco
require_once 'connect.php';

if (!empty($_POST)) {
  try {
   
    //codigo sql
    $sql = "INSERT INTO trabalhoowl.cliente
              (cpf_cliente, rg, nome, telefone, email, data_de_cadastro, data_nasc, endereco, loc_numero, loc_cidade, loc_estado, loc_pais)
            VALUES
              (:cpf, :rg, :nome, :telefone, :email, :data_de_cadastro, :data_nasc, :endereco, :loc_numero, :loc_cidade, :loc_estado, :loc_pais)";

    //prepara
    $stmt = $pdo->prepare($sql);

    //pega os dados do post para o codigo
    $dados = array(
      ':cpf' => $_POST['cpf'],
      ':rg' => $_POST['rg'],
      ':nome' => $_POST['nome'],
      ':telefone' => $_POST['telefone'],
      ':email' => $_POST['email'],
      ':data_de_cadastro' => date("Y/m/d"),
      ':data_nasc' => $_POST['data_nasc'],
      ':endereco' => $_POST['endereco'],
      ':loc_numero' => $_POST['loc_numero'],
      ':loc_cidade' => $_POST['loc_cidade'],
      ':loc_estado' => $_POST['loc_estado'],
      ':loc_pais' => $_POST['loc_pais'],
    );

    //executa o codigo
    if ($stmt->execute($dados)) {
      header("Location: ../html/cliente.php?msgSucesso=Cadastro realizado com sucesso!");
    }
  } catch (PDOException $e) {
    die($e->getMessage());
    header("Location: ../html/cliente.php?msgErro=Falha ao cadastrar...");
  }
}
else {
  header("Location: ../html/cliente.php?msgErro=Erro de acesso.");
}
die();
 ?>

 