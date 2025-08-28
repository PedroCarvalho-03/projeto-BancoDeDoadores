CREATE DATABASE doador;
USE doador;

-- Tabela de Doadores
CREATE TABLE doador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    CPF VARCHAR(11) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    tipo_sanguineo ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') NOT NULL
);

-- Tabela de Agendamentos
CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doador_id INT NOT NULL,
    data_agendamento DATE NOT NULL,
    hora TIME NOT NULL,
    status ENUM('Agendado', 'Concluído', 'Cancelado') DEFAULT 'Agendado',
    FOREIGN KEY (doador_id) REFERENCES doador(id) ON DELETE CASCADE
);

-- Tabela de Estoque
CREATE TABLE estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_sanguineo ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') NOT NULL,
    quantidade INT DEFAULT 0
);

-- Inserir os tipos sanguíneos no estoque (inicialmente 0 )
INSERT INTO estoque (tipo_sanguineo, quantidade) VALUES
('A+', 0), ('A-', 0), 
('B+', 0), ('B-', 0), 
('AB+', 0), ('AB-', 0), 
('O+', 0), ('O-', 0);





