create database simulado_mecSaeb;
use simulado_mecSaeb;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARBINARY(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(100)
);

CREATE TABLE veiculos (
    id_veiculo INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(10) NOT NULL UNIQUE,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    id_cliente INT NOT NULL,
    CONSTRAINT fk_veiculo_cliente FOREIGN KEY (id_cliente) 
        REFERENCES clientes(id_cliente)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE agendamentos (
    id_agendamento INT AUTO_INCREMENT PRIMARY KEY,
    data_agendamento DATETIME NOT NULL,
    descricao_servico VARCHAR(255) NOT NULL,
    status VARCHAR(30) DEFAULT 'Agendado',
    id_cliente INT NOT NULL,
    id_veiculo INT NOT NULL,
    CONSTRAINT fk_agendamento_cliente FOREIGN KEY (id_cliente) 
        REFERENCES clientes(id_cliente)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    CONSTRAINT fk_agendamento_veiculo FOREIGN KEY (id_veiculo) 
        REFERENCES veiculos(id_veiculo)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

INSERT INTO usuarios (nome, email, senha) VALUES
('Victor', 'victor@oficina.com', SHA2('1234567', 256)),
('Manoel', 'manoel@oficina.com', SHA2('1234567', 256)),
('Roberto', 'roberto@oficina.com', SHA2('1234567', 256));

INSERT INTO clientes (nome, cpf, telefone, email) VALUES
('João Pereira', AES_ENCRYPT('12345678901', 'chave_secreta_lgpd'), '(19) 98765-4321', 'joao.pereira@email.com'),
('Fernanda Lima', AES_ENCRYPT('98765432100', 'chave_secreta_lgpd'), '(19) 91234-5678', 'fernanda.lima@email.com'),
('Ricardo Santos', AES_ENCRYPT('45678912399', 'chave_secreta_lgpd'), '(19) 99876-5432', 'ricardo.santos@email.com');

INSERT INTO veiculos (placa, marca, modelo, ano, id_cliente) VALUES
('ABC1D23', 'Volkswagen', 'Gol', 2019, 1),
('EFG1H23', 'Chevrolet', 'Onix', 2021, 2),
('IJK4L56', 'Fiat', 'Argo', 2020, 3);

INSERT INTO agendamentos (data_agendamento, descricao_servico, status, id_cliente, id_veiculo) VALUES
('2026-11-18 09:00:00', 'Troca de óleo e filtros', 'Agendado', 1, 1),
('2026-11-18 14:30:00', 'Alinhamento e balanceamento', 'Agendado', 2, 2),
('2026-11-19 10:00:00', 'Revisão completa de freios', 'Agendado', 3, 3);

select * from usuarios;
select * from clientes;
select * from veiculos;
select * from agendamentos;