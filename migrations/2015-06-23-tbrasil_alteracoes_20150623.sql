alter table newsletters modify column Criacao timestamp not null default current_timestamp;

SET FOREIGN_KEY_CHECKS = 0;
truncate table blogs_categoria;

insert into blogs_categoria(Nome)
values
('Projeto Excelências'),
('Projeto Às Claras'),
('Projeto Meritíssimos'),
('Financiamento eleitoral'),
('Licitações'),
('Estados e municípios'),
('Reforma política'),
('Ficha Limpa'),
('Acesso à informação'),
('Transparência'),
('Gastos públicos'),
('Legislativo'),
('Executivo'),
('Judiciário'),
('Ministério Público'),
('Tribunais de Contas'),
('Órgãos de controle'),
('Controle social'),
('Cidadania')

SET FOREIGN_KEY_CHECKS = 1;