function pesquisarPublicacoes(a) {
    if (url = "", 1 == a) url = base_url + "publicacoes/pesquisarPublicacoes/", categoria = $("#Categoria").val(), ano = $("#Ano").val(), data = {
        ano: ano,
        categoria: categoria
    };
    else if (2 == a) {
        if (busca = $("#Busca").val().toString(), busca.length < 3) return void alert("Digite pelo menos três letras para a busca.");
        registrarEvento("busca", "clique", busca), url = base_url + "publicacoes/pesquisarPublicacoesPorBusca/", data = {
            busca: busca
        }
    } else url = base_url + "publicacoes/listarPublicacoes/", data = {};
    $.ajax({
        url: url,
        method: "POST",
        data: data,
        dataType: "json",
        success: function(a) {
            if (null != a.erro) alert(a.msg);
            else {
                var c = "";
                $(".itensPublicacoes").html(""), Object.keys(a).length > 0 ? ($.each(a, function(a, e) {
                    ano = e.DataPublicacao.split("-")[0], urlDownload = null == e.Arquivo || 0 == e.Arquivo.length ? null == e.Link || 0 == e.Link.length ? "javascript:void(0);" : e.Link : base_url + "downloads/publicacoes/" + e.Arquivo, descricao = e.Descricao.length > 180 ? e.Descricao.substr(0, 177) + "..." : e.Descricao, c += '<div class="col-12 col-sm-12 col-md-4"><a href="{URL}" onclick="registrarEvento(\'publicacao\', \'clique\', \'{NOME}\');" target="_blank"><div class="card publications"><div class="card-block"><h6 class="card-subtitle mb-2 text-muted">{NOME} ({ANO})</h6><p class="card-text">{DESCRICAO}</p></div></div></a></div>'.replace(/{NOME}/g, e.Nome).replace(/{URL}/g, urlDownload).replace(/{DESCRICAO}/g, descricao).replace(/{ANO}/g, ano)
                }), $(".itensPublicacoes").html(c)) : $(".itensPublicacoes").html('<div class="col-12">Nenhum artigo encontrado para a busca ou para o ano / categoria selecionados.</div>')
            }
        },
        error: function(a, c, e) {
            $("#itensPublicacoes").html('<div class="col-12">Erro ao buscar informaÃ§Ãµes das publicaÃ§Ãµes.</div>')
        }
    })
}
$(document).ready(function() {
    pesquisarPublicacoes(0), $("#Categoria").change(function() {
        pesquisarPublicacoes(1)
    }), $("#Ano").change(function() {
        pesquisarPublicacoes(1)
    }), $("#Busca").bind("keydown keyup", function(a) {
        13 == a.keyCode && $("#btnPesquisar").click()
    }), $("#btnPesquisar").click(function() {
        pesquisarPublicacoes(2)
    }), "#relatorios" == window.location.hash && ($("#Ano option:contains(2015)").attr("selected", !0), $("#Categoria option:contains('RelatÃ³rios')").attr("selected", !0), $("#Categoria").trigger("change"))
});