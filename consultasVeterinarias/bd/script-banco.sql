
CREATE TABLE paciente_dono (
                id INT AUTO_INCREMENT NOT NULL,
                cpf INT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                endereco VARCHAR(500) NOT NULL,
                numero INT NOT NULL,
                telefone INT NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE paciente_pet (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                raca VARCHAR(100) NOT NULL,
                idade INT NOT NULL,
                id_paciente_dono INT NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE veterinario (
                id INT AUTO_INCREMENT NOT NULL,
                cpf INT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                endereco VARCHAR(500) NOT NULL,
                numero INT NOT NULL,
                telefone INT NOT NULL,
                cargo VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE consulta (
                id INT AUTO_INCREMENT NOT NULL,
                data_consulta DATE NOT NULL,
                hora_consulta TIME NOT NULL,
                pet VARCHAR(100) NOT NULL,
                id_veterinario INT NOT NULL,
                valor_consulta FLOAT NOT NULL,
                tipo_pagamento VARCHAR(500) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE servico (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                data_servico DATE NOT NULL,
                hora_servico TIME NOT NULL,
                pet VARCHAR(100) NOT NULL,
                id_funcionario INT NOT NULL,
                valor_servico FLOAT NOT NULL,
                tipo_pagamento VARCHAR(500) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE funcionario (
                id INT AUTO_INCREMENT NOT NULL,
                cpf INT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                endereco VARCHAR(500) NOT NULL,
                numero INT NOT NULL,
                telefone INT NOT NULL,
                cargo VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE usuario (
                id int(11) NOT NULL,
                nome varchar(100) NOT NULL,
                email varchar(100) NOT NULL,
                senha varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE consulta ADD CONSTRAINT veterinario_consulta_fk
FOREIGN KEY (id_veterinario)
REFERENCES veterinario (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE paciente_pet ADD CONSTRAINT paciente_dono_paciente_pet_fk
FOREIGN KEY (id_paciente_dono)
REFERENCES paciente_dono (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE servico ADD CONSTRAINT funcionario_servico_fk
FOREIGN KEY (id_funcionario)
REFERENCES funcionario (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
