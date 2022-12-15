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

      $column = $_POST['atributo'];
      $d = $_POST['value_data'];

      // Montar a SQL (pgsql)
      $sql = "SELECT * FROM cliente
              WHERE [column] = ?";

      $sql = str_replace('[column]', $column, $sql);     

      $sth = $pdo->prepare($sql);
      $sth->bindParam(1, $d);
      $sth->execute();

      /*while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['cpf_cliente'] . "</td>";
        echo "<td>" . $row['rg'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['data_entrada'] . "</td>";
        echo "</tr>";
      }*/

  } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: ../html/cliente.php?msgErro=Falha ao buscar...");
  }
}
else {
  header("Location: ../html/cliente.php?msgErro=Erro de acesso.");
}

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
    <form action="../php/search_customer.php" method="post" class="form">
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
        <table id="myTable">
            <tr id="0">
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Data de entrada</th>
            </tr>
            <?php while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['cpf_cliente']; ?></td>
              <td><?php echo $row['rg']; ?></td>
              <td><?php echo $row['telefone']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['data_entrada']; ?></td>
              </tr>
            <?php } ?>
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