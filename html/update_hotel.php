<?php
/****codigo para atualizar em hotel****/
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
    $sql = "UPDATE trabalhoowl.hotel SET [column] = ?
            WHERE id_hotel = ?";

    //muda o sql pra usar o atributo recebido em $column
    $sql = str_replace('[column]', $column, $sql);     

    //prepara e executa o codigo
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $d); //usa o valor recebido em $d na consulta
    $sth->bindParam(2, $id); //usa o valor recebido em $id na consulta

    if ($sth->execute()) {
        header("Location: ../html/hotel.php?msgSucesso=Atualização realizada com sucesso!");
    }


  } catch (PDOException $e) {
      die($e->getMessage());
      header("Location: ../html/hotel.php?msgErro=Falha ao atualizar...");
  }
}
//else {
  //header("Location: ../html/update_hotel.php?msgErro=Erro de acesso.");
///}

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
            Owlspedagem PET-SI - Hoteis
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
        <form action="../php/process_hotel.php" method="post" class="form">
            <div id="input-data">
            <input id="cnpj" name="cnpj" class="input-text" placeholder="CNPJ" type="number" required />
                <input id="name" name="nome_fantasia" class="input-text" placeholder="Nome" type="text" required />
                <input id="caixa" name="caixa_total" class="input-text" placeholder="Caixa" type="number" min="0.00" max="1000000.00" step="0.01"  required />
                <input id="area" name="area" class="input-text" placeholder="Area" type="number" required />
                <input id="Data_Abertura" name="data_abertura" class="input-text" placeholder="Data de abertura" type="date" required />
                <input id="Pais" name="loc_pais" class="input-text" placeholder="País" type="text" required />
                <input id="Estado" name="loc_estado" class="input-text" placeholder="Estado" type="text" required />
                <input id="Cidade" name="loc_cidade" class="input-text" placeholder="Cidade" type="text" required />
                <input id="Rua" name="loc_complemento" class="input-text" placeholder="Rua" type="text" required />
                <input id="Número" name="loc_numero" class="input-text" placeholder="Número" type="number" required />
                <input id="Ticket-medio" name="ticket_medio" class="input-text" placeholder="Ticket-medio" type="number" required />
                <input id="Funcionarios" name="num_funcionarios" class="input-text" placeholder="Número funcionários" type="number" required />
                <input id="Clientes" name="num_hospedes" class="input-text" placeholder="Número hospedes" type="number" required />
                <input id="Ocupacao-Max" name="ocupacao_maxima" class="input-text" placeholder="Ocupação Máxima" type="number" required />
                <input id="Tipo" name="tipo" class="input-text" placeholder="Tipo" type="text" required />
                <input id="Categoria" name="categoria" class="input-text" placeholder="Categoria" type="text" required />
                    <option value="">Tem café?</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                  </select>
                 <select name="possui_wifi" id="Wifi" class="input-text">
                    <option value="">Tem wifi?</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                  </select> 
                <input class="input-btn" type="submit" value="Enviar" />
            </div>
        </form>
    </br>
        <form action="../html/search_hotel.php" method="post" class="form">
            <div id="input-data">
              <select name="atributo" id="Atributo" class="input-text">
              <option value="">Atributo:</option>
                    <option value="nome_fantasia">Nome</option>
                    <option value="caixa_total">Caixa</option>
                    <option value="area">Area</option>
                    <option value="data_abertura">Data de abertura</option>
                    <option value="loc_cidade">Cidade</option>
                    <option value="loc_estado">Estado</option>
                    <option value="loc_pais">País</option>
                    <option value="loc_numero">Número</option>
                    <option value="loc_complemento">Rua</option>
                    <option value="ticket_medio">Ticket-medio</option>
                    <option value="num_funcionarios">Num Funcionários</option>
                    <option value="num_hospedes">Num Hospedes</option>
                    <option value="ocupacao_maxima">Ocupação</option>
                    <option value="possui_cafe">Café?</option>
                    <option value="possui_wifi">Wifi?</option>
                    <option value="tipo">Tipo</option>
                    <option value="categoria">Categoria</option>
                  </select> 
                  <input id="valor" name="value_data" class="input-text" placeholder="Valor" type="text" required />
                <input class="input-btn" type="submit" value="Buscar" />
            </div>
        </form>
        </br>
        <form action="../html/update_hotel.php" method="post" class="form">
            <div id="input-data">
            <input id="id" class="input-text" placeholder="Id" name="id" type="text" required />
              <select name="atributo" id="Atributo" class="input-text">
              <option value="">Atributo:</option>
                    <option value="nome_fantasia">Nome</option>
                    <option value="caixa_total">Caixa</option>
                    <option value="area">Area</option>
                    <option value="data_abertura">Data de abertura</option>
                    <option value="loc_cidade">Cidade</option>
                    <option value="loc_estado">Estado</option>
                    <option value="loc_pais">País</option>
                    <option value="loc_numero">Número</option>
                    <option value="loc_complemento">Rua</option>
                    <option value="ticket_medio">Ticket-medio</option>
                    <option value="num_funcionarios">Num Funcionários</option>
                    <option value="num_hospedes">Num Hospedes</option>
                    <option value="ocupacao_maxima">Ocupação</option>
                    <option value="possui_cafe">Café?</option>
                    <option value="possui_wifi">Wifi?</option>
                    <option value="tipo">Tipo</option>
                    <option value="categoria">Categoria</option>
                  </select> 
                  <input id="valor" name="value_data" class="input-text" placeholder="Valor" type="text" required />
                <input class="input-btn" type="submit" value="Atualizar" />
            </div>
        </form>

        <table id="myTable">
            <tr id="0">
                <th>ID</th>
                <th>CNPJ</th>
                <th>Nome</th>
                <th>Caixa</th>
                <th>Area</th>
                <th>Data Abertura</th>
                <th>Pais</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Ticket-medio</th>
                <th>Funcionarios</th>
                <th>Hóspedes</th>
                <th>Ocupação máxima</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Café</th>
                <th>Wifi</th>
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