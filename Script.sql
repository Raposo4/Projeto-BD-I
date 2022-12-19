-- *********************************************
-- * SQL PostgreSQL generation                 
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 20 2021              
-- * Generation date: Thu Dec 15 18:02:26 2022 
-- * LUN file: /home/notezandro/Desktop/BD-HOTEL-CARDINALIDADECERTA.lun 
-- * Schema: Certo/1-1 
-- ********************************************* 


-- Database Schema
-- ________________ 
create schema trabalhoowl;

-- Tables Section
-- _____________ 

create table trabalhoowl.Bike (
     id_bike serial not null,
     aro numeric(5,2) not null,
     cor varchar(50) not null,
     tem_rodinhas char not null,
     em_uso char(1) not null,
     id_hotel int not null,
     constraint ID_Bike primary key (id_bike, id_hotel));

create table trabalhoowl.Chatbot (
     nome_empresa varchar(255) not null,
     data_inico date not null,
     valor_pago numeric(7,2) not null,
     duracao date not null,
     constraint ID_Chatbot primary key (nome_empresa),
     constraint SID_Chatbot unique (data_inico));

create table trabalhoowl.Cliente (
     CPF_Cliente char(11) not null,
     RG char(9) not null,
     nome char(255) not null,
     telefone char(255) not null,
     email char(255) not null,
     data_de_cadastro date not null,
     data_nasc date not null,
     endereco varchar(255) not null,
     loc_numero varchar(30) not null,
     loc_cidade varchar(30) not null,
     loc_estado varchar(30) not null,
     loc_pais varchar(30) not null,
     constraint ID_Cliente_ID primary key (CPF_Cliente));

create table trabalhoowl.Cozinha (
     id_cozinha serial not null,
     valor_estoque numeric(7, 2) not null,
     funcionando char(1) not null,
     id_hotel int not null,
     constraint ID_Cozinha_ID primary key (id_cozinha));

create table trabalhoowl.Dependente (
     CPF_Dep varchar(11) not null,
     nome varchar(255) not null,
     relacao varchar(255) not null,
     CPF_Func varchar(11) not null,
     constraint ID_Dependente primary key (CPF_Dep));

create table trabalhoowl.Despesas (
     data_vencimento date not null,
     id_despesa numeric(3) not null,
     status varchar(30) not null,
     valor numeric(4,2) not null,
     pago_a varchar(15) not null,
     id_hotel int not null);

create table trabalhoowl.Teatro (
     nome varchar(20) not null,
     Atracao varchar(30) not null,
     Capacidade numeric(3) not null,
     data_evento date not null,
     Hora_evento varchar(6) not null,
     ingressos_disponiveis numeric(1) not null,
     conteudo_adulto char not null,
     constraint FKIns_Tea_ID primary key (nome));

create table trabalhoowl.Restaurante (
     nome varchar(20) not null,
     Especialidade varchar(30) not null,
     ticket_medio numeric(3,2) not null,
     tipo_servico varchar(20) not null,
     constraint FKIns_Res_ID primary key (nome));

create table trabalhoowl.Banco (
     nome varchar(20) not null,
     vinte_quatro_horas char not null,
     caixa_deposito char not null,
     retaguarda char not null,
     nmro_agencia varchar(20) not null,
     constraint FKIns_Ban_ID primary key (nome));

create table trabalhoowl.Espaco_de_Eventos (
     id_hotel int not null,
     capacidade numeric(5) not null,
     tipo varchar(30) not null,
     num_salas numeric(4) not null,
     constraint FKFornece_ID primary key (id_hotel));

create table trabalhoowl.Estacionamento (
     id_hotel int not null,
     vagas_disponiveis numeric(5) not null,
     vagas_totais numeric(5) not null,
     constraint FKEstaciona_ID primary key (id_hotel));

create table trabalhoowl.Eventos (
     evento_nome varchar(255) not null,
     data date not null,
     hora_inicio varchar(50) not null,
     hora_fim varchar(50) not null,
     descricao varchar(255) not null,
     convidados numeric(5) not null,
     id_hotel int not null,
     constraint ID_Eventos primary key (evento_nome),
     constraint SID_Eventos_1 unique (data),
     constraint SID_Eventos unique (hora_inicio));

create table trabalhoowl.Funcionario (
     CPF_Func varchar(11) not null,
     cargo varchar(50) not null,
     nome varchar(30) not null,
     data_nascimento date not null,
     contato varchar(255) not null,
     salario numeric(8,2) not null,
     sexo varchar(10) not null,
     tipo_contrato varchar(10) not null,
     endereco varchar(30) not null,
     setor_nome varchar(255),
     constraint ID_Funcionario primary key (CPF_Func));

create table trabalhoowl.Hotel (
     id_hotel serial not null,
     CNPJ varchar(20) not null,
     nome_fantasia char(255) not null,
     area numeric(7,2) not null,
     caixa_total numeric(10,2) not null,
     data_abertura date not null,
     loc_cidade char(255) not null,
     loc_estado char(255) not null,
     loc_pais char(255) not null,
     loc_numero numeric(6) not null,
     loc_complemento char(255) not null,
     ticket_medio numeric(10,2) not null,
     num_funcionarios numeric(5) not null,
     num_hospedes numeric(5) not null,
     ocupacao_maxima numeric(5) not null,
     possui_cafe char not null,
     possui_wifi char not null,
	 tipo varchar(30) not null,
     categoria varchar(255) not null,
     constraint ID_Hotel_ID primary key (id_hotel));

create table trabalhoowl.Instalacoes (
     nome varchar(20) not null,
     valor_aluguel numeric(5,2) not null,
     Horario_Funcionamento varchar(40) not null,
     Teatro varchar(20),
     Restaurante varchar(20),
     Banco varchar(20),
     id_hotel int not null,
     constraint ID_Instalacoes primary key (nome));

create table trabalhoowl.Lava_Jato (
     id_hotel int not null,
     placa_carro varchar(50) not null,
     categoria_lavagem varchar(10) not null,
     constraint FKOferta_ID primary key (id_hotel));

create table trabalhoowl.Lobby (
     id_hotel int not null,
     area_m numeric(3,2) not null,
     areas_disponiveis numeric(2,0) not null,
     areas_totais numeric(2,0) not null,
     valor_em_aluguel numeric(5,2) not null,
     constraint FKDispoe_ID primary key (id_hotel));

create table trabalhoowl.Nota_Fiscal (
     id_nota serial not null,
     id_reserva int not null,
     valor numeric(8,2) not null,
     metodo_de_pagamento varchar(15) not null,
     id_hotel int not null,
     constraint ID_Nota_Fiscal primary key (id_nota),
     constraint FKGera_ID unique (id_reserva));

create table trabalhoowl.Oferece (
     id_cozinha int not null,
     id_servico int not null,
     constraint ID_Oferece primary key (id_cozinha, id_servico));

create table trabalhoowl.Piscinas (
     id_hotel int not null,
     manutencao char not null,
     capacidade numeric(4) not null,
     status_limpeza varchar(30) not null,
     constraint FKTem_ID primary key (id_hotel));

create table trabalhoowl.Prod_Entrada (
     cod_entrada serial not null,
     qtd numeric(7,2) not null,
     cod_produto int not null,
     constraint ID_Prod_Entrada primary key (cod_entrada));

create table trabalhoowl.Prod_Saida (
     cod_saida serial not null,
     qtd numeric(7,2) not null,
     cod_produto int not null,
     constraint ID_Prod_Saida primary key (cod_saida));

create table trabalhoowl.Produto (
     cod_produto serial not null,
     qtd_atual numeric(7,2) not null,
     qtd_min numeric(7,2) not null,
     descricao char(255) not null,
     id_cozinha int not null,
     constraint ID_Produto_ID primary key (cod_produto));

create table trabalhoowl.Programa_de_Fidelidade (
     CPF_Cliente char(11) not null,
     qtd_reservas numeric(4) not null,
     pontos numeric(6) not null,
     constraint FKFideliza_ID primary key (CPF_Cliente));

create table trabalhoowl.Quarto (
     numero_quarto numeric(4) not null,
     tipo char(255) not null,
     status varchar(30) not null,
     manutencao char not null,
     ultima_limpeza date not null,
     num_cama_casal numeric(1) not null,
     num_cama_solteiro numeric(1) not null,
     id_hotel int not null,
     constraint ID_Quarto_ID primary key (numero_quarto, id_hotel));

create table trabalhoowl.Requisicoes (
     id_req numeric(3) not null,
     Classificacao varchar(255) not null,
     Campo_livre varchar(255) not null,
     status varchar(30) not null,
     data_abertura date not null,
     data_fim date not null,
     CPF_Cliente char(11) not null,
     CPF_Func varchar(11) not null,
     constraint ID_Requisicoes primary key (id_req));

create table trabalhoowl.Reserva (
     id_reserva serial not null,
     data_entrada date not null,
     data_saida date not null,
     valor numeric(7,2) not null,
     cafe_da_manha char not null,
     id_hotel int not null,
     numero_quarto numeric(4) not null,
     CPF_Cliente char(11) not null,
     constraint ID_Reserva_ID primary key (id_reserva));

create table trabalhoowl.Servico_de_Quarto (
     id_servico serial not null,
     valor numeric(7,2) not null,
     pedido char(255) not null,
     quarto numeric(4) not null,
     id_reserva int not null,
     constraint ID_Servico_de_Quarto_ID primary key (id_servico));

create table trabalhoowl.Servicos_Medicos (
     id_hotel int not null,
     horario_de_func varchar(50) not null,
     qtd_band_aid numeric(5) not null,
     qtd_dipirona numeric(5) not null,
     qtd_medicos numeric(5) not null,
     constraint FKOferece__ID primary key (id_hotel));

create table trabalhoowl.Setor (
     setor_nome varchar(255) not null,
     CPF_Func varchar(11) not null,
     numero numeric(4) not null,
     localizacao varchar(255) not null,
     id_hotel int not null,
     constraint ID_Setor_ID primary key (setor_nome),
     constraint FKGerencia_ID unique (CPF_Func, id_hotel));

create table trabalhoowl.Uso_Da_Bike (
     id_bike int not null,
	 id_hotel int not null,
     CPF_Cliente char(11) not null,
     data_retirada timestamp not null,
     data_devolucao timestamp,
     constraint ID_Uso_Da_Bike primary key (id_bike, CPF_Cliente));

create table trabalhoowl.Vaga (
     num_vaga serial not null,
     setor varchar(255) not null,
     status varchar(30) not null,
     veiculo varchar(255) not null,
     id_hotel int not null,
     CPF_Cliente char(11) not null,
     Per_id_hotel int not null,
     constraint ID_Vaga primary key (num_vaga),
     constraint SID_Vaga unique (setor, num_vaga));


-- Constraints Section
-- ___________________ 

     alter table trabalhoowl.Bike add constraint FKAluga__FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

--Not implemented
--alter table  trabalhoowl.Cliente add constraint ID_Cliente_CHK
--     check(exists(select * from Reserva
--                  where Reserva.CPF_Cliente = CPF_Cliente)); 

--Not implemented
--alter table  trabalhoowl.Cliente add constraint ID_Cliente_CHK
--     check(exists(select * from Programa_de_Fidelidade
--                  where Programa_de_Fidelidade.CPF_Cliente = CPF_Cliente)); 

--Not implemented
--alter table  trabalhoowl.Cozinha add constraint ID_Cozinha_CHK
--     check(exists(select * from Produto
--                  where Produto.id_cozinha = id_cozinha)); 

--Not implemented
--alter table  trabalhoowl.Cozinha add constraint ID_Cozinha_CHK
--     check(exists(select * from Oferece
--                  where Oferece.id_cozinha = id_cozinha)); 

alter table  trabalhoowl.Cozinha add constraint FKHC_Possui_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Dependente add constraint FKDepende_FK
     foreign key (CPF_Func)
     references trabalhoowl.Funcionario;

alter table  trabalhoowl.Despesas add constraint FKPaga_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel;

alter table  trabalhoowl.Teatro add constraint FKIns_Tea_FK
     foreign key (nome)
     references trabalhoowl.Instalacoes;

alter table  trabalhoowl.Restaurante add constraint FKIns_Res_FK
     foreign key (nome)
     references trabalhoowl.Instalacoes;

alter table  trabalhoowl.Banco add constraint FKIns_Ban_FK
     foreign key (nome)
     references trabalhoowl.Instalacoes;

alter table  trabalhoowl.Espaco_de_Eventos add constraint FKFornece_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

--Not implemented
--alter table  trabalhoowl.Estacionamento add constraint FKEstaciona_CHK
--     check(exists(select * from Vaga
--                  where Vaga.Per_id_hotel = id_hotel)); 

alter table  trabalhoowl.Estacionamento add constraint FKEstaciona_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Eventos add constraint FKSedia_FK
     foreign key (id_hotel)
     references trabalhoowl.Espaco_de_Eventos ON DELETE CASCADE;

alter table  trabalhoowl.Funcionario add constraint FKTrabalha_FK
     foreign key (setor_nome)
     references trabalhoowl.Setor;

--Not implemented
--alter table  trabalhoowl.Hotel add constraint ID_Hotel_CHK
--     check(exists(select * from Setor
--                  where Setor.id_hotel = id_hotel)); 

--Not implemented
--alter table  trabalhoowl.Hotel add constraint ID_Hotel_CHK
--     check(exists(select * from Cozinha
--                  where Cozinha.id_hotel = id_hotel)); 

--Not implemented
--alter table  trabalhoowl.Hotel add constraint ID_Hotel_CHK
--     check(exists(select * from Quarto
--                  where Quarto.id_hotel = id_hotel)); 

alter table  trabalhoowl.Instalacoes add constraint EXCL_Instalacoes
     check((Banco is not null and Restaurante is null and Teatro is null)
           or (Banco is null and Restaurante is not null and Teatro is null)
           or (Banco is null and Restaurante is null and Teatro is not null)
           or (Banco is null and Restaurante is null and Teatro is null)); 

alter table  trabalhoowl.Instalacoes add constraint FKhabita_FK
     foreign key (id_hotel)
     references trabalhoowl.Lobby ON DELETE CASCADE;

alter table  trabalhoowl.Lava_Jato add constraint FKOferta_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

--Not implemented
--alter table  trabalhoowl.Lobby add constraint FKDispoe_CHK
--     check(exists(select * from Instalacoes
--                  where Instalacoes.id_hotel = id_hotel)); 

alter table  trabalhoowl.Lobby add constraint FKDispoe_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Nota_Fiscal add constraint FKGera_FK
     foreign key (id_reserva)
     references trabalhoowl.Reserva;

alter table  trabalhoowl.Nota_Fiscal add constraint FKEmite_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Oferece add constraint FKOfe_Ser_FK
     foreign key (id_servico)
     references trabalhoowl.Servico_de_Quarto;

alter table  trabalhoowl.Oferece add constraint FKOfe_Coz
     foreign key (id_cozinha)
     references trabalhoowl.Cozinha;

alter table  trabalhoowl.Piscinas add constraint FKTem_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Prod_Entrada add constraint FKEntrada_FK
     foreign key (cod_produto)
     references trabalhoowl.Produto;

alter table  trabalhoowl.Prod_Saida add constraint FKSaida_FK
     foreign key (cod_produto)
     references trabalhoowl.Produto;

--Not implemented
--alter table  trabalhoowl.Produto add constraint ID_Produto_CHK
--     check(exists(select * from Prod_Entrada
--                  where Prod_Entrada.cod_produto = cod_produto)); 

--Not implemented
--alter table  trabalhoowl.Produto add constraint ID_Produto_CHK
--     check(exists(select * from Prod_Saida
--                  where Prod_Saida.cod_produto = cod_produto)); 

alter table  trabalhoowl.Produto add constraint FKGuarda_FK
     foreign key (id_cozinha)
     references trabalhoowl.Cozinha;

alter table  trabalhoowl.Programa_de_Fidelidade add constraint FKFideliza_FK
     foreign key (CPF_Cliente)
     references trabalhoowl.Cliente;

--Not implemented
--alter table  trabalhoowl.Quarto add constraint ID_Quarto_CHK
--     check(exists(select * from Reserva
--                  where Reserva.numero_quarto = numero_quarto)); 

alter table  trabalhoowl.Quarto add constraint FKPossui_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Requisicoes add constraint FKGera__FK
     foreign key (CPF_Cliente)
     references trabalhoowl.Cliente;

alter table  trabalhoowl.Requisicoes add constraint FKAtende_FK
     foreign key (CPF_Func)
     references trabalhoowl.Funcionario;

--Not implemented
--alter table  trabalhoowl.Reserva add constraint ID_Reserva_CHK
--     check(exists(select * from Servico_de_Quarto
--                  where Servico_de_Quarto.id_reserva = id_reserva)); 

--Not implemented
--alter table  trabalhoowl.Reserva add constraint ID_Reserva_CHK
--     check(exists(select * from Nota_Fiscal
--                  where Nota_Fiscal.id_reserva = id_reserva)); 

alter table  trabalhoowl.Reserva add constraint FKReserva_H_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Reserva add constraint FKReserva_FK
     foreign key (numero_quarto, id_hotel)
     references trabalhoowl.Quarto;

alter table  trabalhoowl.Reserva add constraint FKFaz_FK
     foreign key (CPF_Cliente)
     references trabalhoowl.Cliente;

--Not implemented
--alter table  trabalhoowl.Servico_de_Quarto add constraint ID_Servico_de_Quarto_CHK
--     check(exists(select * from Oferece
--                  where Oferece.id_servico = id_servico)); 

alter table  trabalhoowl.Servico_de_Quarto add constraint FKAgrega_preco_FK
     foreign key (id_reserva)
     references trabalhoowl.Reserva;

alter table  trabalhoowl.Servicos_Medicos add constraint FKOferece__FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

--Not implemented
--alter table  trabalhoowl.Setor add constraint ID_Setor_CHK
--     check(exists(select * from Funcionario
--                  where Funcionario.setor_nome = setor_nome)); 

alter table  trabalhoowl.Setor add constraint FKGerencia_FK
     foreign key (CPF_Func)
     references trabalhoowl.Funcionario;

alter table  trabalhoowl.Setor add constraint FKFunciona_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Uso_Da_Bike add constraint FKUso_Cli_FK
     foreign key (CPF_Cliente)
     references trabalhoowl.Cliente;

alter table  trabalhoowl.Uso_Da_Bike add constraint FKUso_Bik
     foreign key (id_hotel, id_bike)
     references trabalhoowl.Bike;

alter table  trabalhoowl.Vaga add constraint FKMantem_FK
     foreign key (id_hotel)
     references trabalhoowl.Hotel ON DELETE CASCADE;

alter table  trabalhoowl.Vaga add constraint FKAluga_FK
     foreign key (CPF_Cliente)
     references trabalhoowl.Cliente;

alter table  trabalhoowl.Vaga add constraint FKPertence_FK
     foreign key (Per_id_hotel)
     references trabalhoowl.Estacionamento;


-- Index Section
-- _____________ 

create index FKAluga__IND
     on trabalhoowl.Bike (id_hotel);

create index FKHC_Possui_IND
     on trabalhoowl.Cozinha (id_hotel);

create index FKDepende_IND
     on trabalhoowl.Dependente (CPF_Func);

create index FKPaga_IND
     on trabalhoowl.Despesas (id_hotel);

create index FKSedia_IND
     on trabalhoowl.Eventos (id_hotel);

create index FKTrabalha_IND
     on trabalhoowl.Funcionario (setor_nome);

create index FKhabita_IND
     on trabalhoowl.Instalacoes (id_hotel);

create index FKEmite_IND
     on trabalhoowl.Nota_Fiscal (id_hotel);

create index FKOfe_Ser_IND
     on trabalhoowl.Oferece (id_servico);

create index FKEntrada_IND
     on trabalhoowl.Prod_Entrada (cod_produto);

create index FKSaida_IND
     on trabalhoowl.Prod_Saida (cod_produto);

create index FKGuarda_IND
     on trabalhoowl.Produto (id_cozinha);

create index FKPossui_IND
     on trabalhoowl.Quarto (id_hotel);

create index FKGera__IND
     on trabalhoowl.Requisicoes (CPF_Cliente);

create index FKAtende_IND
     on trabalhoowl.Requisicoes (CPF_Func);

create index FKReserva_H_IND
     on trabalhoowl.Reserva (id_hotel);

create index FKReserva_IND
     on trabalhoowl.Reserva (numero_quarto);

create index FKFaz_IND
     on trabalhoowl.Reserva (CPF_Cliente);

create index FKAgrega_preco_IND
     on trabalhoowl.Servico_de_Quarto (id_reserva);

create index FKFunciona_IND
     on trabalhoowl.Setor (id_hotel);

create index FKUso_Cli_IND
     on trabalhoowl.Uso_Da_Bike (CPF_Cliente);

create index FKMantem_IND
     on trabalhoowl.Vaga (id_hotel);

create index FKAluga_IND
     on trabalhoowl.Vaga (CPF_Cliente);

create index FKPertence_IND
     on trabalhoowl.Vaga (Per_id_hotel);


    
    
   
    
 -- ========= ALIMENTANDO TABELA DE HOTEL [ OK ]
    
select *
from trabalhoowl.hotel;

-- familiar, ferias, pode Pet
-- RESORT, POUSADA, hotel

--	=== HOTEL 1
INSERT INTO trabalhoowl.Hotel values
 	(default, '111', 'Alameda Hotel' , 400.00, 6000.00, '2005-05-01' , 'São Paulo' , 'São Paulo' ,
	'Brasil', 2112, 'Rua Augusta', 150, 10, 25, 28, 'S', 'S', 'Hotel', 'Familia');


--	=== HOTEL 2
INSERT INTO trabalhoowl.Hotel values
 	(default, '222', 'Hotel Villge', 300 , 50000.00, '2007-06-01' , 'Xingura' , 'Pará' ,
	'Brasil', 301, 'Rua Guajajaras', 300, 15, 25, 30, 's', 'n', 'hotel', 'Possui PET');


--	=== HOTEL 3
INSERT INTO trabalhoowl.Hotel values
 	(default, '333', 'Aguas Hotel' , 500, 30000.00, '2008-01-01' , 'Santos' , 'São Paulo' ,
	'Brasil', 23343, 'Avenida Charlie Brown Jr.', 150, 20, 50, 70, 's', 's', 'Pousada', 'Ferias');


--	=== HOTEL 4
INSERT INTO trabalhoowl.Hotel values
 	(default , '444', 'Alaska Hotel' , 400, 90000.00, '2008-02-01' , 'Salvador' , 'Bahia' ,
	'Brasil', 3434, 'Avenida Sete de Setembro', 360, 20, 100, 116, 1, 1, 'Hotel', 'Familiar');


--	=== HOTEL 5
INSERT INTO trabalhoowl.Hotel values
 	(default, '555', 'Amazonas Hotel', 135, 10000.00, '2008-02-05' , 'Belém' , 'Pará',
	'Brasil', 5576, 'Avenida Tamandaré', 100, 7, 17, 24, 1, 1, 'Hotel', 'Possui PET');


-- ========= ALIMENTANDO TABELA DE ESPACO_DE_EVENTOS [ ok ]
INSERT INTO trabalhoowl.espaco_de_eventos
	values (1, 30, 'n', 2),
	(2, 15, 'n', 1),
	(3, 50, 'n', 3),
	(4, 10, 'n', 1),
	(5, 10, 'n', 1);

insert into trabalhoowl.estacionamento values(
	1,10,20),
	(2,10,20),
	(3,10,20),
	(4,10,20),
	(5,10,20);
	
INSERT INTO trabalhoowl.cliente values(
    '32957005085','216615094','Caio da Silva','7799999999','dasilva@gmail.com','2012-06-24','2002-06-24','Rua da Silva','366','Salvador','BA','Brasil'),
    ('60094692017','351684906','Ste da Silva','7799999999','dasilvinha@gmail.com','2022-06-24','2002-06-24','Rua de Guaianases','646','São Paulo','SP','Brasil'),
    ('68364499033','457833051','Tha de Jesus','7799999999','thatha@gmail.com','2022-12-24','2002-06-24','Rua de Itaquera','886','São Paulo','SP','Brasil'),
    ('03223975020','147900451','Chico da Silva','7799999999','chick@gmail.com','20212-06-24','2002-06-24','Rua de Xinguara','786','Xinguara','PA','Brasil'),
    ('82706373008','176863539','Gi Ara Pag','7799999999','Aran@gmail.com','2019-06-24','2002-06-24','Rua Americana','986','Americana','SP','Brasil'),
    ('92374639010','250625556','Gi Ma','7799999999','gigi@gmail.com','2018-06-24','2002-06-24','Rua Gru','856','Gru','SP','Brasil'); 
    
insert into trabalhoowl.cliente values(
	'11111111111','11111111','JunJunJun','12345690','jun@usp.br','2020-09-01','2003-04-12','Rua Japão','666','Tokyo','SP','Brasil'),
	('22222222222','22222222','Alois Santos','098766543321','lili@yahoo.us','2019-11-21','2004-09-12','Rua Sol','000','Xinguara','PA','Brasil'),
	('33333333333','33333333','Chico','9870657843','chicur@usp.br','2019-11-21','2002-09-11','Rua Lua','123','Quata','SP','Brasil');



INSERT INTO trabalhoowl.Programa_de_Fidelidade values(
    '32957005085',50,500),
    ('68364499033',11,110),
    ('60094692017',2,20),
    ('03223975020',3,30),
    ('82706373008',1,7),
    ('92374639010',3,9);

insert into trabalhoowl.quarto values(
	110,'suite','ocupado','n','2022-12-02',1,1,1),
 (201,'economico','livre','n','2022-12-10',1,2,1),
 (102,'suite','livre','s','2022-12-16',1,1,1),
 (103,'suite','livre','s','2022-12-15',1,2,1),
 (202,'economico','ocupado','n','2022-12-06',1,0,1),
 --Outro hotel
 (11,'suite','ocupado','n','2022-12-02',1,0,2),
 (21,'economico','livre','s','2022-12-10',1,2,2),
 (23,'economico','livre','s','2022-12-16',1,1,2),
 (13,'suite','livre','s','2022-12-15',1,0,2),
 (22,'economico','ocupado','n','2022-12-06',1,2,2);

INSERT INTO trabalhoowl.Reserva values(
    default, '2022-12-15','2022-12-21',2000,'T',001,101,32957005085);
   
INSERT INTO trabalhoowl.vaga VALUES 
    (1, 'A', 'Ocupado', 'FASD64', 1, '11111111111',1), 
    (2, 'B', 'Disponivel', 'OPOE34', 2, '22222222222',2),
    (3, 'C', 'Disponivel', 'CPIF35', 3, '33333333333',3),
    (4,'C','Ocupado','KILD98',1,'32957005085',1);

insert into trabalhoowl.funcionario values(
	'79433278981','Gerente','Steps','1998-05-06','juliasteps@grace.usp.br',10000.27,'M','C','Rua PET', null);

insert into trabalhoowl.funcionario values(
	'90902992011','Gerente','Ste','1999-08-12','tete@ssi.br',15000.27,'M','C','Rua SSI', null);

insert into trabalhoowl.funcionario values(
	'96325412011','Faxineiro','Manuel Gomes','1986-05-19','canetaAzul@azulcaneta.br',1250.00,'M','CLT','Rua da Rua',null),
	('96325419811','recepcionista','Fabio','1997-01-27','fabio@gmail.com',1400.00,'H','Estágio','Rua dos bobos',null),
	('15204478621','Segurança','Lucas','1995-08-29','lulu@hotmail.com',1900.00,'H','CLT','Rua dos Bixos',null);

insert into trabalhoowl.funcionario values(
	'71601116055','Gerente','Furcas','1990-12-12','furcas@usp.br',5000.00,'M','CLT','Rua Um',null),
	('04918653090','Gerente','Renault','2002-04-27','renault@renault@usp.br',3000.00,'M','CLT','Rua Dois', null);

insert into trabalhoowl.setor values(
	'Infraestrutura','79433278981',1,'São Paulo',1),
	('Criação','90902992011',2,'São Paulo',1),
	('Limpeza','71601116055',3,'São Paulo',1),
	('TI','04918653090',4,'Campinas',1);


  
  --Consulta 6
SELECT contato
FROM trabalhoowl.funcionario
WHERE trabalhoowl.funcionario.CPF_Func IN (SELECT trabalhoowl.Setor.CPF_func
							
		FROM trabalhoowl.Setor)

