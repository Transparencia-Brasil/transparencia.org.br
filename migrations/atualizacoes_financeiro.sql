-- campo ordem quem somso
alter table quem_somos add Ordem int(11);
alter table quem_somos modify Descricao varchar(1000) NOT NULL;

-- campo ordem banners
alter table banners add Ordem int(11);

-- campo imagem_logo projeto
-- campo ordem projeto
alter table projetos add Ordem int(11);
alter table projetos add Imagem_logo varchar(100);
alter table projetos add Mouseover_cor varchar(20);
alter table projetos add Desativado bit(1) default b'1';
alter table projetos add DesativadoPeriodoVigencia varchar(50);
alter table projetos add CaptacaoRecursos bit(1) default b'1';
alter table projetos add LinkTarget bit(1) default b'1';

-- 2018-01-23 ADM Financiamento

CREATE TABLE financiamentos (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    FonteDeFinanciamento VARCHAR(50) NOT NULL,
    Valor VARCHAR(100) NULL,
    Periodo VARCHAR(200) NOT NULL,
    Tipo VARCHAR(100),
    TipoLink VARCHAR(100),
    Ativo bit(1) default b'1'
);

CREATE TABLE financiamentos_arquivos (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    CodigoFinanciamento INT(11) NOT NULL,
    Arquivo VARCHAR(100) NOT NULL,
    Tipo ENUM('relatorio','termo-de-doacao') NOT NULL,
    Ativo bit(1) default b'1'
);

ALTER TABLE financiamentos_arquivos ADD CONSTRAINT fk_financiamento_arquivos FOREIGN KEY (CodigoFinanciamento) REFERENCES financiamentos(Codigo);

CREATE TABLE auditorias_contabilidade (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    Ano VARCHAR(50) NOT NULL,
    Documento VARCHAR(100) NULL,
    Ativo bit(1) default b'1'
);

CREATE TABLE auditorias_contabilidade_arquivos (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    CodigoAuditoriaContabilidade INT(11) NOT NULL,
    Arquivo VARCHAR(100) NOT NULL,
    Ativo bit(1) default b'1'
);

ALTER TABLE auditorias_contabilidade_arquivos ADD CONSTRAINT fk_auditorias_contabilidade FOREIGN KEY (CodigoAuditoriaContabilidade) REFERENCES auditorias_contabilidade(Codigo);


CREATE TABLE relatorios_atividades (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    Ano VARCHAR(50) NOT NULL,
    Documento VARCHAR(100) NULL,
    Ativo bit(1) default b'1'
);

CREATE TABLE relatorios_atividades_arquivos (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    CodigoRelatorioAtividade INT(11) NOT NULL,
    Arquivo VARCHAR(100) NOT NULL,
    Ativo bit(1) default b'1'
);

ALTER TABLE relatorios_atividades_arquivos ADD CONSTRAINT fk_relatorios_atividades FOREIGN KEY (CodigoRelatorioAtividade) REFERENCES relatorios_atividades(Codigo);



INSERT INTO financiamentos VALUES (1,'Google.org','R$ 1.500.000,00','jul/2016 - dez/2018','Projeto Tá de Pé','/projetos/tadepe','1');

INSERT INTO financiamentos_arquivos VALUES (1,1,'Semi-Annual%20Report%20Transparencia_jan2017.pdf','relatorio','1');

INSERT INTO financiamentos_arquivos VALUES (2,1,'teste.pdf','relatorio','1');

INSERT INTO financiamentos_arquivos VALUES (3,1,'teste de termo.pdf','termo-de-doacao','1');
INSERT INTO financiamentos_arquivos VALUES (4,1,'teste de termo 2.pdf','termo-de-doacao','1');
INSERT INTO financiamentos_arquivos VALUES (5,1,'teste de termo 3.pdf','termo-de-doacao','1');
INSERT INTO financiamentos_arquivos VALUES (6,1,'teste de termo 4.pdf','termo-de-doacao','1');