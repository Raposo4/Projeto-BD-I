<?php
/****codigo para atualizar em uso_da_bike****/
//conecta ao banco
require_once '../php/connect.php';

if (!empty($_POST)) {
  try {
    //recebe o id que vai ser usado na busca
    $id = $_POST['id'];
    //recebe o atributo que vai ser usadosna busca
    $column = $_POST['atributo'];
    //recebe o valor que vai ser usado na busca
    $d = $_POST['value_data'];

    //codigo sql
    $sql = "UPDATE trabalhoowl.uso_da_bike SET [column] = ?
            WHERE id_bike = ?";

    //muda o sql pra usar o atributo recebido em $column
    $sql = str_replace('[column]', $column, $sql);     

    //prepara e executa o codigo
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $d); //usa o valor recebido em $d na consulta
    $sth->bindParam(2, $id); //usa o valor recebido em $id na consulta

    if ($sth->execute()) {
        header("Location: ../html/bike.php?msgSucesso=Atualização realizada com sucesso!");
    }

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/bike.php?msgErro=Falha ao atualizar...");
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Owlspedagem</title>
    <link rel="stylesheet" href="../assets/stylesheet/reset.css" />
    <link rel="stylesheet" href="../assets/stylesheet/style.css" />
    <script type="text/javascript" src="../assets/javascript/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="feedback">
            <?php if (!empty($_GET['msgErro'])) { ?>
                <div class="alert alert-warning" role="alert">
                <?php echo $_GET['msgErro']; ?>
                </div>
            <?php } ?>

            <?php if (!empty($_GET['msgSucesso'])) { ?>
                <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="header">
        <div class="logo">
            <img src="../imgs/logo.png" href="index.php" />
        </div>
        <div id="nav">
            Owlspedagem PET-SI - Bicicletário
        </div>
    </div>
    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">Patrimônio
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="hotel.php">Hoteis</a>
                <a href="#">Motel</a>
                <a href="#">Pousada</a>
                <a href="#">Apart-Hoteis</a>
                <a href="#">Risorts</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='#';">Recursos Humanos</button>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Contabilidade
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Pagamentos</a>
                <a href="#">Cobranças</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Serviços
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Piscina</a>
                <a href="bike.php">Bicicletário</a>
                <a href="#">Lavagem de carro</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='cliente.php';">Clientes</button>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='#';">Funcionários</button>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='../index.php';">Sair</button>
        </div>
    </div>
    
    
    <section id="table">
        <form action="../php/process_bike.php" method="post" class="form">
            <div id="input-data">
            <input id="id_bike" name="id_bike" class="input-text" placeholder="Numero da bike" type="number" required />
                <input id="id_hotel" name="id_hotel" class="input-text" placeholder="Id do Hotel" type="number" required />
                <input id="cpf" name="cpf_cliente" class="input-text" placeholder="CPF do cliente" type="number" required />
                <input id="data_retirada" name="data_retirada" class="input-text" placeholder="Data de retirada" type="datetime-local" required />
                <input id="data_devolucao" name="data_devolucao" class="input-text" placeholder="Data de devolução" type="datetime-local"/>
                <input class="input-btn" type="submit" value="Cadastrar" />
            </div>
        </form>

    </br>
    <form action="../html/search_bike.php" method="post" class="form">
        <div id="input-data">
          <select name="atributo" id="atributo" class="input-text">
          <option value="">Atributo:</option>
          <option value="">Atributo:</option>
                <option value="id_bike" name="id_bike">Número da bike</option>
                <option value="id_hotel" name="id_hotel">Id Hotel</option>
                <option value="cpf_cliente" name="cpf_clisente">CPF do cliente</option>
              </select> 
              <input id="valor" class="input-text" placeholder="Valor" name="value_data" type="text" required />
            <input class="input-btn" type="submit" value="Buscar" />
        </div>
    </form>
    </br>
    <form action="../html/update_bike.php" method="post" class="form">
        <div id="input-data">
            <input id="id" class="input-text" placeholder="Número da bicicleta" name="id" type="number" required />
          <select name="atributo" id="atributo" class="input-text">
                <option value="">Atributo:</option>
                <option value="id_bike">Número da bike</option>
                <option value="cpf_cliente">CPF do cliente</option>
                <option value="data_retirada">Data de retirada</option>
                <option value="data_devolucao">Data de devolução</option>
              </select> 
              <input id="valor" class="input-text" placeholder="Valor" name="value_data" type="text" required />
            <input class="input-btn" type="submit" value="Atualizar" />
        </div>
    </form>

        <table id="myTable">
            <tr id="0">
            <th>Número da bibicleta</th>
                <th>Id do hotel</th>
                <th>CPF do cliente</th>
                <th>Data de retirada</th>
                <th>Data de devolução</th>
                <th>Excluir</th>
            </tr>
        </table>
    </section>
</body>
<footer>
    <div class="footerbar2">
        | Bem-vindo
    </div>
    <div class="footerbar">
        <a href="#">👤Perfil</a>
    </div>
</footer>

</html>