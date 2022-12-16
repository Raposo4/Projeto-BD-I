<?php
/****codigo de inserçao da tabela hotel****/
//conecta ao banco
require_once 'connect.php';

if (!empty($_POST)) {
  try {
    
    //codigo sql
    $sql = "INSERT INTO trabalhoowl.hotel 
              (cnpj, nome_fantasia, area, caixa_total, data_abertura, loc_cidade, loc_estado, loc_pais, loc_numero, loc_complemento,
                ticket_medio, num_funcionarios, num_hospedes, ocupacao_maxima, possui_cafe, possui_wifi, tipo, categoria)
            VALUES
            (:cnpj, :nome_fantasia, :area, :caixa_total, :data_abertura, :loc_cidade, :loc_estado, :loc_pais, :loc_numero, :loc_complemento,
              :ticket_medio, :num_funcionarios, :num_hospedes, :ocupacao_maxima, :possui_cafe,
                :possui_wifi, :tipo, :categoria)";

    //prepara
    $stmt = $pdo->prepare($sql);

    //pega os dados do post para o codigo
    $dados = array(
      ':cnpj' => $_POST['cnpj'],
      ':nome_fantasia' => $_POST['nome_fantasia'],
      ':area' => $_POST['area'],
      ':caixa_total' => $_POST['caixa_total'],
      ':data_abertura' => $_POST['data_abertura'],
      ':loc_cidade' => $_POST['loc_cidade'],
      ':loc_estado' => $_POST['loc_estado'],
      ':loc_pais' => $_POST['loc_pais'],
      ':loc_numero' => $_POST['loc_numero'],
      ':loc_complemento' => $_POST['loc_complemento'],
      ':ticket_medio' => $_POST['ticket_medio'],
      ':num_funcionarios' => $_POST['num_funcionarios'],
      ':num_hospedes' => $_POST['num_hospedes'],
      ':ocupacao_maxima' => $_POST['ocupacao_maxima'],
      ':possui_cafe' => $_POST['possui_cafe'],
      ':possui_wifi' => $_POST['possui_wifi'],
      ':tipo' => $_POST['tipo'],
      ':categoria' => $_POST['categoria'],
    );

    //executa o codigo
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
 ?>

 