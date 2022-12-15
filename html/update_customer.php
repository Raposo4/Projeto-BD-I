<?php
require_once '../php/connect.php';

if (!empty($_POST)) {

  try {
    // Preparar as informações

      $id = $_POST['id'];
      $column = $_POST['atributo'];
      $d = $_POST['value_data'];

      // Montar a SQL (pgsql)
      $sql = "UPDATE cliente SET [column] = ?
              WHERE cpf_cliente = ?";

      $sql = str_replace('[column]', $column, $sql);     

      $sth = $pdo->prepare($sql);
      $sth->bindParam(1, $d);
      $sth->bindParam(2, $id);

      if ($sth->execute()) {
        header("Location: ../html/update_customer.php?msgSucesso=Atualização realizada com sucesso!");
      }

  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/update_customer.php?msgErro=Falha ao atualizar...");
  }
}
//else {
  //header("Location: ../html/update_customer.php?msgErro=Erro de acesso.");
//}

// Redirecionar para a página inicial (login) c/ mensagem erro/sucesso
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
            Owlspedagem PET-SI - Clientes
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
            <button class="dropbtn" onclick="location.href='./cliente.php';">Clientes</button>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='#';">Funcionários</button>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='../index.php';">Sair</button>
        </div>
    </div>
    
    
    <section id="table">
        <form action="../php/process_customer.php" method="post" class="form">
            <div id="input-data">
                <input id="nome" name="nome" class="input-text" placeholder="Nome" type="text" required />
                <input id="rg" name="rg" class="input-text" placeholder="RG" type="number" required />
                <input id="cpf" name="cpf" class="input-text" placeholder="CPF" type="number" required />
                <!-- <input id="pais" name="pais" class="input-text" placeholder="País" type="text" required />-->
                <input id="telefone" name="telefone" class="input-text" placeholder="Telefone" type="number" required />
                <input id="email" name="email" class="input-text" placeholder="Email" type="email" required />
                <input class="input-btn" type="submit" value="Cadastrar" />
            </div>
        </form>

    </br>
    <form action="../html/search_customer.php" method="post" class="form">
        <div id="input-data">
          <select name="atributo" id="atributo" class="input-text">
                <option value="">Atributo:</option>
                <option value="nome">Nome</option>
                <option value="rg">RG</option>
                <option value="cpf_cliente">CPF</option>
                <option value="data_entrada">Data Entrada</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="quarto">Quarto</option>
              </select> 
              <input id="valor" class="input-text" placeholder="Valor" name="value_data" type="text" required />
            <input class="input-btn" type="submit" value="Buscar" />
        </div>
    </form>
    </br>
    <form action="../html/update_customer.php" method="post" class="form">
        <div id="input-data">
            <input id="id" class="input-text" placeholder="CPF" name="id" type="number" required />
          <select name="atributo" id="atributo" class="input-text">
                <option value="">Atributo:</option>
                <option value="nome">Nome</option>
                <option value="rg">RG</option>
                <option value="cpf_cliente">CPF</option>
                <option value="data_entrada">Data Entrada</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="quarto">Quarto</option>
              </select> 
              <input id="valor" class="input-text" placeholder="Valor" name="value_data" type="text" required />
            <input class="input-btn" type="submit" value="Atualizar" />
        </div>
    </form>

        <table id="myTable">
            <tr id="0">
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Data de entrada</th>
                <th>Telefone</th>
                <th>Email</th>
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