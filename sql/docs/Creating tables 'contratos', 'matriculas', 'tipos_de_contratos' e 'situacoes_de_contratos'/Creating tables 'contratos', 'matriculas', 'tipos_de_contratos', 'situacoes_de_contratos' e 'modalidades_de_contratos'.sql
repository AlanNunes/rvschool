CREATE TABLE contratos(
id INT NOT NULL AUTO_INCREMENT,
numero NVARCHAR(20) NOT NULL,
aluno INT NOT NULL,
situacao INT NOT NULL,
tipo INT NOT NULL,
dataInicio DATE NOT NULL,
dataTermino DATE NOT NULL,
contratoTurmas BOOLEAN NOT NULL,
contratoAulasLivres BOOLEAN NOT NULL,
atendente1 INT,
atendente2 INT,
atendente3 INT,
dataContrato DATE NOT NULL,
contratante NVARCHAR(255),
FOREIGN KEY (aluno) REFERENCES alunos(id),
FOREIGN KEY (situacao) REFERENCES situacoes_de_contratos(id),
FOREIGN KEY (tipo) REFERENCES tipos_de_contratos(id),
FOREIGN KEY (atendente1) REFERENCES funcionarios(id),
FOREIGN KEY (atendente2) REFERENCES funcionarios(id),
FOREIGN KEY (atendente3) REFERENCES funcionarios(id),
UNIQUE KEY (numero),
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE matriculas(
id INT NOT NULL AUTO_INCREMENT,
aluno INT NOT NULL,
turma INT NOT NULL,
dataMatricula DATE NOT NULL,
dataInicioAtividades DATE NOT NULL,
FOREIGN KEY (aluno) REFERENCES alunos(id),
FOREIGN KEY (turma) REFERENCES turmas(id),
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE tipos_de_contratos(
id INT NOT NULL AUTO_INCREMENT,
nome NVARCHAR(100) NOT NULL,
UNIQUE KEY (nome),
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE situacoes_de_contratos(
id INT NOT NULL AUTO_INCREMENT,
nome NVARCHAR(100),
descricao NVARCHAR(255),
UNIQUE KEY (nome),
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE modalidades_de_contratos(
id INT NOT NULL AUTO_INCREMENT,
nome NVARCHAR(100),
UNIQUE KEY (nome),
PRIMARY KEY (id)
)ENGINE=InnoDB;