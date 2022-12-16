<?php
/****codigo para pesquisar em cliente****/
//conecta ao banco
require_once '../php/connect.php';

if (!empty($_POST)) {
  try {
    
    //recebe o atributo que vai ser usado na busca
    $column = $_POST['atributo'];
    //recebe o valor que vai ser usado na busca
    $d = $_POST['value_data'];

    //codigo sql
    $sql = "SELECT * FROM trabalhoowl.cliente
            WHERE [column] = ?
            ORDER BY nome ASC";

    //muda o sql pra usar o atributo recebido em $column
    $sql = str_replace('[column]', $column, $sql);     

    //prepara e executa o codigo
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $d); //usa o valor recebido em $d na consulta
    $sth->execute();

    //guarda o resultado da query
    $tabela = $sth->fetchall(PDO::FETCH_ASSOC);

  } catch (PDOException $e) {
      //die($e->getMessage());
      header("Location: ../html/cliente.php?msgErro=Falha ao buscar...");
  }
}
else {
  header("Location: ../html/cliente.php?msgErro=Erro de acesso.");
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
        <form action="../php/process_customer.php" method="post" class="form">
            <div id="input-data">
            <input id="nome" name="nome" class="input-text" placeholder="Nome" type="text" required />
                <input id="rg" name="rg" class="input-text" placeholder="RG" type="number" required />
                <input id="cpf" name="cpf" class="input-text" placeholder="CPF" type="number" required />
                <input id="telefone" name="telefone" class="input-text" placeholder="Telefone" type="number" required />
                <input id="email" name="email" class="input-text" placeholder="Email" type="email" required />
                <input id="data_nasc" name="data_nasc" class="input-text" placeholder="Data de nascimento" type="date" required />
                <input id="loc_pais" name="loc_pais" class="input-text" placeholder="País" type="text" required />
                <input id="loc_estado" name="loc_estado" class="input-text" placeholder="Estado" type="text" required />
                <input id="loc_cidade" name="loc_cidade" class="input-text" placeholder="Cidade" type="text" required />
                <input id="endereco" name="endereco" class="input-text" placeholder="Rua" type="text" required />
                <input id="loc_numero" name="loc_numero" class="input-text" placeholder="Número" type="text" required />
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
                <option value="data_de_Cadastro">Data Cadastro</option>
                <option value="data_nasc">Data Nascimento</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="loc_pais">País</option>
                <option value="loc_estado">Estado</option>
                <option value="loc_cidade">Cidade</option>
                <option value="endereco">Rua</option>
                <option value="loc_numero">Número</option>
              </select> 
              <input id="valor" class="input-text" placeholder="Valor" name="value_data" type="text" required />
            <input class="input-btn" type="submit" value="Buscar" />
        </div>
    </form>
    </br>
    <form action="../html/update_customer.php" method="post" class="form">
        <div id="input-data">
            <input id="id" class="input-text" placeholder="CPF" name="id" type="text" required />
          <select name="atributo" id="atributo" class="input-text">
          <option value="">Atributo:</option>
                <option value="nome">Nome</option>
                <option value="rg">RG</option>
                <option value="cpf_cliente">CPF</option>
                <option value="data_de_Cadastro">Data Cadastro</option>
                <option value="data_nasc">Data Nascimento</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
                <option value="loc_pais">País</option>
                <option value="loc_estado">Estado</option>
                <option value="loc_cidade">Cidade</option>
                <option value="endereco">Rua</option>
                <option value="loc_numero">Número</option>
              </select> 
              <input id="valor" class="input-text" placeholder="Valor" name="value_data" type="text" required />
            <input class="input-btn" type="submit" value="Atualizar" />
        </div>
    </form>
    <table id="myTable">
            <tr id="0">
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Data de Cadastro</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Pais</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Excluir</th>
            </tr>
            <?php foreach($tabela as $row) { ?>
              <tr>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['cpf_cliente']; ?></td>
              <td><?php echo $row['rg']; ?></td>
              <td><?php echo $row['data_de_cadastro']; ?></td>
              <td><?php echo $row['data_nasc']; ?></td>
              <td><?php echo $row['telefone']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['loc_pais']; ?></td>
              <td><?php echo $row['loc_estado']; ?></td>
              <td><?php echo $row['loc_cidade']; ?></td>
              <td><?php echo $row['endereco']; ?></td>
              <td><?php echo $row['loc_numero']; ?></td>
              <td> <a href="../php/delete_customer.php?id=<?php echo $row['cpf_cliente']; ?>">X</a></td> 
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