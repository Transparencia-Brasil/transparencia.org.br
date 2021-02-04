msgsGenericas= {
    campoObrigatorio: "Obrigatório"
},
$("#frmContato").validate( {
    rules: {
        nome: {
            required: !0, maxlength: 100
        }
        , email: {
            required: !0, email: !0, maxlength: 50
        }
        , assunto: {
            required: !0
        }
        , mensagem: {
            required: !0, maxlength: 500
        }
        , veiculo: {
            required: !0
        }
        , uf: {
            required: !0
        }
        , TelefoneDDD: {
            required: !0
        }
        , cidade: {
            required: !0
        }
        , Telefone: {
            required: !0
        }
    }
    , messages: {
        nome: {
            required: msgsGenericas.campoObrigatorio, maxlength: "O nome digitado não pode ser maior que 100 caracteres."
        }
        , email: {
            required: msgsGenericas.campoObrigatorio, email: "Digite um endereço de e-mail válido.", maxlength: "O email digitado não pode ser maior que 50 caracteres."
        }
        , assunto: {
            required: "Selecione um assunto."
        }
        , mensagem: {
            required: "O campo mensagem é obrigatório.", maxlength: "A mensagem não pode ser maior que 500 caracteres."
        }
        , veiculo: {
            required: msgsGenericas.campoObrigatorio
        }
        , uf: {
            required: msgsGenericas.campoObrigatorio
        }
        , TelefoneDDD: {
            required: msgsGenericas.campoObrigatorio
        }
        , cidade: {
            required: msgsGenericas.campoObrigatorio
        }
        , Telefone: {
            required: msgsGenericas.campoObrigatorio
        }
    }
}

);