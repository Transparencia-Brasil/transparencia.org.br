CREATE TABLE quem_somos (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    CodigoQuemSomosArea INT(11) NOT NULL,
    Nome VARCHAR(50) NOT NULL,
    Cargo VARCHAR(50) NULL,
    Descricao VARCHAR(200) NOT NULL,
    Imagem VARCHAR(50),
    Ativo bit(1) default b'1'
);

CREATE TABLE quem_somos_area (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50) NOT NULL,
    Ativo bit(1) default b'1'
);

INSERT INTO quem_somos_area (Nome) VALUES('Conselho Deliberativo');
INSERT INTO quem_somos_area (Nome) VALUES('Conselho Fiscal');
INSERT INTO quem_somos_area (Nome) VALUES('Conselho de Ética');
INSERT INTO quem_somos_area (Nome) VALUES('Equipe Executiva');

ALTER TABLE quem_somos ADD CONSTRAINT fk_quem_somos FOREIGN KEY (CodigoQuemSomosArea) REFERENCES quem_somos_area(Codigo);
