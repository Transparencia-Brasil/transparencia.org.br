<<<<<<< HEAD
=======
var SPMaskBehavior=function(e) {
    return 9===e.replace(/\D/g, "").length?"00000-0000": "0000-00009"
}

,
spOptions= {
    onKeyPress:function(e, r, o, i) {
        o.mask(SPMaskBehavior.apply( {}
        , arguments), i)
    }
}

;
$(document).ready(function() {
    $("#estrangeiro").change(function() {
        this.checked?($("#UF").prop("disabled", !0), $("#Cidade").prop("disabled", !0), $("#cpf").prop("disabled", !0), $("#cnpj").prop("disabled", !0)): ($("#UF").prop("disabled", !1), $("#Cidade").prop("disabled", !1), $("#cpf").prop("disabled", !1), $("#cnpj").prop("disabled", !1))
    }
    ), $('input[name="tipoDocumento"]').click(function() {
        $("#cpf-box").hide(), $("#cnpj-box").hide(), "1"==$(this).val()?$("#cpf-box").show(): $("#cnpj-box").show()
    }
    ), $("#CodigoValorDoacao").trigger("change"), outroValor=$("#OutroValor").val(), null!=outroValor&&void 0!=outroValor&&""!=outroValor&&$("#dd-outroValor").show(), $("#CodigoValorDoacao").change(function() {
        valor=parseInt($(this).val(), 10), 6==valor?$("#dd-outroValor").show(): $("#dd-outroValor").hide()
    }
    ), $(".ddd").mask("99"), $(".tel").mask(SPMaskBehavior, spOptions), $("#Cpf").mask("000.000.000-00", {
        reverse: !0
    }
    ), $(".numero").mask("###.##0,00", {
        reverse: !0
    }
    ), msgsGenericas= {
        campoObrigatorio: "Este campo é obrigatório"
    }
    , $("input:radio[name=TipoContribuicao]").change(function() {
        3==this.value||4==this.value?$("#TipoContribuicaoOutroValor").show(): $("#TipoContribuicaoOutroValor").hide()
    }
    ), $("#frmAssociado").validate( {
        rules: {
            Nome: {
                required: !0, maxlength: 100
            }
            , Cpf: {
                required: !0, maxlength: 15
            }
            , Email: {
                required: !0, email: !0, maxlength: 50
            }
            , CelularDDD: {
                required: !0, maxlength: 2, minlength: 2
            }
            , Celular: {
                required: !0, maxlength: 10, minlength: 9
            }
            , UF: {
                required: !0
            }
            , Cidade: {
                required: !0
            }
            , AceiteObjetivos: {
                required: !0
            }
            , AceiteNormas: {
                required: !0
            }
            , AceiteDeclaracaoNaoCondenado: {
                required: !0
            }
            , Endereco: {
                required: !0
            }
            , Profissao: {
                required: !0
            }
            , MeioPagamento: {
                required: !0
            }
            , EntidadeEmpregadora: {
                required: !0
            }
            , TipoContribuicao: {
                required: !0
            }
            , OutroValor: {
                required: !0
            }
            , CodigoEscolaridadeTipo: {
                required: !0
            }
            , Motivo: {
                required: !0
            }
        }
        , messages: {
            Nome: {
                required: msgsGenericas.campoObrigatorio, maxlength: "O nome digitaido não pode ser maior que 100 caracteres."
            }
            , Cpf: {
                required: msgsGenericas.campoObrigatorio, maxlength: "O cpf digitado deve ter 11 caracteres.", maxlength: "O cpf digitado não pode ser maior que 11 caracteres."
            }
            , Email: {
                required: msgsGenericas.campoObrigatorio, email: "Digite um endereço de e-mail válido.", maxlength: "O email digitado não pode ser maior que 50 caracteres."
            }
            , CelularDDD: {
                required: msgsGenericas.campoObrigatorio, minlength: "O ddd do celular digitado deve ter 2 dígitos.", maxlength: "O ddd do celular digitado deve ter 2 dígitos."
            }
            , Celular: {
                required: msgsGenericas.campoObrigatorio, minlength: "O número celular digitado deve ter pelo menos 8 dígitos.", maxlength: "O número de celular digitado não pode ser maior que 9 caracteres."
            }
            , CelularDDD: {
                required: msgsGenericas.campoObrigatorio, minlength: "O DDD do celular deve ter 2 dígitos.", maxlength: "O DDD do celular deve ter 2 dígitos."
            }
            , UF: {
                required: "Selecione um estado."
            }
            , Cidade: {
                required: "Digite o nome da sua cidade"
            }
            , Profissao: {
                required: msgsGenericas.campoObrigatorio
            }
            , Endereco: {
                required: msgsGenericas.campoObrigatorio
            }
            , MeioPagamento: {
                required: msgsGenericas.campoObrigatorio
            }
            , TipoContribuicao: {
                required: msgsGenericas.campoObrigatorio
            }
            , OutroValor: {
                required: msgsGenericas.campoObrigatorio
            }
            , AceiteObjetivos: {
                required: msgsGenericas.campoObrigatorio
            }
            , EntidadeEmpregadora: {
                required: msgsGenericas.campoObrigatorio
            }
            , AceiteNormas: {
                required: msgsGenericas.campoObrigatorio
            }
            , AceiteDeclaracaoNaoCondenado: {
                required: msgsGenericas.campoObrigatorio
            }
            , CodigoEscolaridadeTipo: {
                required: msgsGenericas.campoObrigatorio
            }
            , Motivo: {
                required: msgsGenericas.campoObrigatorio
            }
        }
    }
    )
}

);
>>>>>>> task63
