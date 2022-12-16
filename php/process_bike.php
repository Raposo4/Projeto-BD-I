<?php
/****codigo de inserçao da tabela uso_da_bike****/
//conecta ao banco
require_once 'connect.php';

if (!empty($_POST)) {
  
  try {
    
    //codigo sql
    $sql = "INSERT INTO trabalhoowl.uso_da_bike
              (id_bike, id_hotel, cpf_cliente, data_retirada, data_devolucao)
            VALUES
              (:id_bike, :id_hotel, :cpf_cliente, :data_retirada, :data_devolucao)";

    //prepara
    $stmt = $pdo->prepare($sql);

    //converte o input 'datetime-local' do html para um tipo de datetime que seja compativel com o timestamp do postgres
    $ret = DateTime::createFromFormat("Y-m-d*H:i", $_POST['data_retirada']);
    $ret = $ret->format('Y-m-d H:i');

    //lida com quando a ike ainda nao foi devolvida, ou seja, data_devolucao = null
    if(!empty($_POST['data_devolucao'])){
      $dev = DateTime::createFromFormat("Y-m-d*H:i", $_POST['data_devolucao']);
      $dev = $dev->format('Y-m-d H:i');
    }else
    {
      $dev =date('Y-m-d H:i');
    }

    //coloca os valores no codigo sql
    $stmt->bindValue(":id_bike", $_POST['id_bike'],);
    $stmt->bindValue(":id_hotel", $_POST['id_hotel'],);
    $stmt->bindValue(":cpf_cliente", $_POST['cpf_cliente']);
    $stmt->bindValue(":data_retirada", $ret);

    //lida com quando a ike ainda nao foi devolvida, ou seja, data_devolucao = null
    if(empty($_POST['data_devolucao'])){
      $stmt->bindValue(":data_devolucao", null);
    }else
    {
      $stmt->bindValue(":data_devolucao", $dev);
    }

    //executa o codigo
    if ($stmt->execute()) {
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
 ?>

 