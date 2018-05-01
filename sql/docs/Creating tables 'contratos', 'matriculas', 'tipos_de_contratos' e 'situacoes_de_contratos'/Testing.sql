USE rvschool;
SHOW TABLES;

#Insere tipos de contratos
INSERT INTO tipos_de_contratos(nome) VALUES ('Matrícula');
INSERT INTO tipos_de_contratos(nome) VALUES ('Rematrícula');
#Este script abaixo não deve ser executado com sucesso, pois os nomes são únicos.
INSERT INTO tipos_de_contratos(nome) VALUES ('Matrícula');
#End
#Insere situacoes de contratos
INSERT INTO situacoes_de_contratos(nome, descricao) 
VALUES ('Vigente', 'Contrato em andamento atualmente. Os alunos ativos devem ter pelo menos um contrato vigente.'),
('Encerrado', 'O contrato foi cumprido normalmente e chegou ao seu término. Após encerrado o contrato não é possível realizar movimentações adicionais.'),
('Rescindido', 'Houve rescisão contratual por qualquer uma das partes (aluno ou escola).'),
('Cancelado', 'O contrato foi cancelado por não conter informações válidas. Normalmente esta situação é usada por motivo de erro de operação no sistema.'),
('Trancado', 'O contrato foi trancado por motivos pessoais do aluno.');
#End
#Matricula um aluno em uma turma
INSERT INTO matriculas(aluno, turma, dataMatricula, dataInicioAtividades)
VALUES (1, 1, '2018-04-26', '2018-04-26');
#End
#Insere um contrato ao aluno
INSERT INTO contratos(numero, aluno, situacao, tipo, dataInicio, dataTermino, contratoTurmas, contratoAulasLivres, atendente1, atendente2, atendente3, 
dataContrato, contratante)
VALUES ('2018-6', 1, 1, 111, '2018-04-26', '2019-04-26', true, false, 1, 20, null, '2018-04-26', 'Alan Nunes da Silva');
#End

#Test
SELECT * FROM matriculas;

ALTER TABLE matriculas ADD FOREIGN KEY (aluno) REFERENCES alunos(id);
ALTER TABLE matriculas ADD FOREIGN KEY (turma) REFERENCES turmas(id);

ALTER TABLE contratos ADD FOREIGN KEY (aluno) REFERENCES alunos(id);
ALTER TABLE contratos ADD FOREIGN KEY (situacao) REFERENCES situacoes_de_contratos(id);
ALTER TABLE contratos ADD FOREIGN KEY (tipo) REFERENCES tipos_de_contratos(id);
ALTER TABLE contratos ADD FOREIGN KEY (atendente1) REFERENCES funcionarios(id);
ALTER TABLE contratos ADD FOREIGN KEY (atendente2) REFERENCES funcionarios(id);
ALTER TABLE contratos ADD FOREIGN KEY (atendente3) REFERENCES funcionarios(id);

ALTER TABLE contratos 
DROP FOREIGN KEY atendente1;


ALTER TABLE alunos ENGINE=InnoDB;
ALTER TABLE bolsas ENGINE=InnoDB;
ALTER TABLE cargos ENGINE=InnoDB;
ALTER TABLE funcionarios ENGINE=InnoDB;
ALTER TABLE matriculas ENGINE=InnoDB;
ALTER TABLE roles ENGINE=InnoDB;
ALTER TABLE tipos_de_contratos ENGINE=InnoDB;
ALTER TABLE situacoes_de_contratos ENGINE=InnoDB;
ALTER TABLE turmas ENGINE=InnoDB;
ALTER TABLE contratos ENGINE=InnoDB;

INSERT INTO matriculas (aluno, turma, dataMatricula, dataInicioAtividades)
VALUES (1, 1, '2018-04-26', '2018-04-26');

#Testing 'Contratos' table
SELECT * FROM contratos;
INSERT INTO `rvschool`.`contratos` (`numero`, `aluno`, `situacao`, `tipo`, `dataInicio`, `dataTermino`, `contratoTurmas`, `contratoAulasLivres`, `atendente1`, `dataContrato`, `contratante`) VALUES 
('2018-99', '1', '99', '1', '2018-04-29', '2018-04-29', '0', '1', '1', '2018-04-29', 'Alan Nunes da Silva');

#All the constraints are working