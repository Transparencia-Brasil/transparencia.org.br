ALTER TABLE associados_como_conheceu_tipo
ADD COLUMN Ativo TINYINT NOT NULL Default 1

UPDATE associados_como_conheceu_tipo SET Ativo = 0;

INSERT INTO associados_como_conheceu_tipo (Nome) VALUE ('Reportagens da mídia');
INSERT INTO associados_como_conheceu_tipo (Nome) VALUE ('Mídias sociais');
INSERT INTO associados_como_conheceu_tipo (Nome) VALUE ('Amigos ou familiares');
INSERT INTO associados_como_conheceu_tipo (Nome) VALUE ('Acesso direto');
INSERT INTO associados_como_conheceu_tipo (Nome) VALUE ('Outros');
