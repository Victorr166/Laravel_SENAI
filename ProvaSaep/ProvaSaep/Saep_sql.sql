
CREATE DATABASE clinica_veterinaria_db;

USE clinica_veterinaria_db;

-- TABELA DE USUARIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- TABELA DE TUTORES
CREATE TABLE tutores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- TABELA DE PETS
CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    raca VARCHAR(50),
    idade INT,
    sexo VARCHAR(20),
    tutor_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (tutor_id) REFERENCES tutores(id)
);

-- TABELA DE AGENDAMENTOS
CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    descricao VARCHAR(255),
    pet_id INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (pet_id) REFERENCES pets(id)
);

-- USUARIOS
INSERT INTO usuarios
(nome, email, senha, created_at, updated_at)
VALUES
('Administrador', 'admin@clinica.com', SHA2('123456', 256), NOW(), NOW()),
('Carlos Oliveira', 'carlos@clinica.com', SHA2('123456', 256), NOW(), NOW()),
('Mariana Santos', 'mariana@clinica.com', SHA2('123456', 256), NOW(), NOW());

-- TUTORES
INSERT INTO tutores
(nome, cpf, telefone, email, created_at, updated_at)
VALUES
('João da Silva', '12345678901', '(16) 99999-1111', 'joao@email.com', NOW(), NOW()),
('Maria Oliveira', '98765432100', '(16) 98888-2222', 'maria@email.com', NOW(), NOW()),
('Carlos Santos', '11122233344', '(16) 97777-3333', 'carlos@email.com', NOW(), NOW()),
('Ana Souza', '55566677788', '(16) 96666-4444', 'ana@email.com', NOW(), NOW());

-- PETS
INSERT INTO pets
(nome, especie, raca, idade, sexo, tutor_id, created_at, updated_at)
VALUES
('Rex', 'Cachorro', 'Labrador', 4, 'Macho', 1, NOW(), NOW()),
('Luna', 'Gato', 'Siamês', 2, 'Fêmea', 1, NOW(), NOW()),
('Thor', 'Cachorro', 'Golden Retriever', 3, 'Macho', 2, NOW(), NOW()),
('Mel', 'Gato', 'Persa', 5, 'Fêmea', 3, NOW(), NOW()),
('Bob', 'Cachorro', 'Poodle', 1, 'Macho', 4, NOW(), NOW());

-- AGENDAMENTOS
INSERT INTO agendamentos
(data, hora, descricao, pet_id, created_at, updated_at)
VALUES
('2026-11-24', '08:00:00', 'Consulta de rotina', 1, NOW(), NOW()),
('2026-11-25', '10:30:00', 'Vacinação', 2, NOW(), NOW()),
('2026-11-26', '14:00:00', 'Avaliação veterinária', 3, NOW(), NOW()),
('2026-11-27', '09:00:00', 'Exame de rotina', 4, NOW(), NOW()),
('2026-11-28', '15:30:00', 'Retorno veterinário', 5, NOW(), NOW()),
('2026-11-29', '11:00:00', 'Consulta de acompanhamento', 1, NOW(), NOW());
