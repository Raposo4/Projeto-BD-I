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
        <form action="../php/processaHotel.php" method="post" class="form">
            <div id="input-data">
                <input id="name" class="input-text" placeholder="Nome" type="text" required />
                <input id="caixa" class="input-text" placeholder="Caixa" type="number" min="0.00" max="10000.00" step="0.01"  required />
                <input id="Data_Abertura" class="input-text" placeholder="Data de abertura" type="date" required />
                <input id="Pais" class="input-text" placeholder="País" type="text" required />
                <input id="Estado" class="input-text" placeholder="Estado" type="text" required />
                <input id="Cidade" class="input-text" placeholder="Cidade" type="text" required />
                <input id="Rua" class="input-text" placeholder="Rua" type="text" required />
                <input id="Aluguel" class="input-text" placeholder="Valor aluguel" type="text" required />
                <input id="Funcionarios" class="input-text" placeholder="Número funcionários" type="number" required />
                <input id="Clientes" class="input-text" placeholder="Número hospedes" type="number" required />
                <input id="Ocupacao-Max" class="input-text" placeholder="Ocupação Máxima" type="number" required />
                <select name="Cafe" id="Cafe" class="input-text">
                    <option value="">Tem café?</option>
                    <option value="TRUE">Sim</option>
                    <option value="FALSE">Não</option>
                  </select>
                 <select name="Wifi" id="Wifi" class="input-text">
                    <option value="">Tem wifi?</option>
                    <option value="TRUE">Sim</option>
                    <option value="FALSE">Não</option>
                  </select> 
                <input class="input-btn" type="submit" value="Enviar" />
            </div>
        </form>
    </br>
        <form action="../php/buscaHotel.php" method="post" class="form">
            <div id="input-data">
              <select name="Atributo" id="Atributo" class="input-text">
                    <option value="">Atributo:</option>
                    <option value="nome_fantasia">Nome</option>
                    <option value="caixa_total">Caixa</option>
                    <option value="data_abertura">Data de abertura</option>
                    <option value="loc_cidade">Cidade</option>
                    <option value="loc_estado">Estado</option>
                    <option value="loc_pais">País</option>
                    <option value="loc_numero">Número</option>
                    <option value="loc_complemer">Rua</option>
                    <option value="valor_aluguel">Aluguel</option>
                    <option value="num_funcionar">Num Funcionários</option>
                    <option value="num_hospedes">Num Hospedes</option>
                    <option value="ocupacao_maxi">Ocupação</option>
                    <option value="possui_cafe">Café?</option>
                    <option value="possui_wifi">Wifi?</option>
                  </select> 
                  <input id="valor" class="input-text" placeholder="Valor" type="text" required />
                <input class="input-btn" type="submit" value="Buscar" />
            </div>
        </form>

        <table id="myTable">
            <tr id="0">
                <th>ID</th>
                <th>Nome</th>
                <th>Caixa</th>
                <th>Data Abertura</th>
                <th>Pais</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Rua</th>
                <th>Aluguel</th>
                <th>Funcionarios</th>
                <th>Cliente</th>
                <th>Ocupação máxima</th>
                <th>Categoria</th>
                <th>Café</th>
                <th>Wifi</th>
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