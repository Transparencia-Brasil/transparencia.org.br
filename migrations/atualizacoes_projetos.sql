alter table projetos MODIFY Desativado TINYINT NOT NULL DEFAULT 0;
alter table projetos MODIFY CaptacaoRecursos TINYINT  NOT NULL DEFAULT 0;
alter table projetos MODIFY LinkTarget TINYINT NOT NULL DEFAULT 0;