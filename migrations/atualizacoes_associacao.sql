set foreign_key_checks=0;

alter table associados add Endereco varchar(500);
alter table associados add Profissao varchar(200);
alter table associados add EntidadeEmpregadora varchar(200);
alter table associados add AceiteObjetivos bit(1) NOT NULL AFTER AceiteNovidades;
alter table associados add AceiteNormas bit(1) NOT NULL AFTER AceiteNovidades;
alter table associados add AceiteDeclaracaoNaoCondenado bit(1) NOT NULL AFTER AceiteNovidades;


ALTER TABLE associados CHANGE COLUMN `ValorDoacao` `Valor` decimal(10,2) NOT NULL;
alter table associados add TipoAssinatura ENUM('anual','mensal') NOT NULL AFTER Valor;



drop table associados_doacao_tipo;
alter table associados drop foreign key fk_tipo_doacao;
alter table associados drop CodigoTipoDoacao;


CREATE TABLE transacoes (
    Codigo INT(11) AUTO_INCREMENT PRIMARY KEY,
    CodigoAssociado INT(11),
    DataTransacao VARCHAR(50) NOT NULL,
    Valor DECIMAL(10,2),
    CodigoStatusTransacao VARCHAR(100),
    MeioPagamento ENUM('paypal','pagseguro'),
    Tipo ENUM('doacao','associacao')
);

ALTER TABLE transacoes ADD CONSTRAINT fk_transacoes_associados FOREIGN KEY (CodigoAssociado) REFERENCES associados(Codigo);