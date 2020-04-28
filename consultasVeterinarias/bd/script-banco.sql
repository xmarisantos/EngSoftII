
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
                data_consulta INT NOT NULL,
                hora_consulta INT NOT NULL,
                id_paciente_pet INT NOT NULL,
                id_veterinario INT NOT NULL,
                pagamento BOOLEAN NOT NULL,
                PRIMARY KEY (id)
);

ALTER TABLE consulta ADD CONSTRAINT paciente_pet_consulta_fk
FOREIGN KEY (id_paciente_pet)
REFERENCES paciente_pet (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

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
