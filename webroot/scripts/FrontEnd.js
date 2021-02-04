var FrontEnd = {
    Init: function () {
        this.Events();
    },
    Events: function () {
        //BX_SLIDER
        if ($(document).find('.bxslider').length !== 0) {
            $('.bxslider').bxSlider({
                video: true,
                useCSS: true,
                adaptiveHeight: true,
                mode: 'horizontal',
                slideWidth: 1280,
                onSlideNext: function (slideElement, oldIndex, newIndex) {
                    registrarEvento('destaque_principal_setas', 'clique', 'para_frente');
                }, /* $(slideElement).find('img').attr('title'))*/
                onSlidePrev: function (slideElement, oldIndex, newIndex) {
                    registrarEvento('destaque_principal_setas', 'clique', 'para_tras');
                }
            });
        }

        //SCROLL EVENTS - MENU
        $(window).scroll(function (event) {
            var scroll = $(window).scrollTop();
            var header = $('.wr-header');
            var headerH = $('.wr-header').height();

            //console.log(scroll);            
            //console.log(headerH);
            scroll >= headerH * 1.5 ? header.addClass('fixed') : header.removeClass('fixed');

            if ($(document).find('.pg-home .ct-carousel').length !== 0) {
                var carouselH = $('.ct-carousel').height();
                scroll >= headerH & scroll <= carouselH - headerH * 6 ? header.addClass('hidden') : header.removeClass('hidden');
            } else {
                scroll >= headerH & scroll <= headerH * 1.5 ? header.addClass('hidden') : header.removeClass('hidden');
            };
        });

        //MENU       
        /*$(function () {
            var url = window.location.pathname,
                urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
            $('.wr-header .ct-mn .mn ul li a').each(function () {
                if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                    $(this).addClass('ativo');
                }
            });
        });*/

        //LIGHTBOX
        $('.btn-abrir-modal').on('click', function () {
            $('.overlay').fadeIn(400, function () {
                $('.bx-modal').fadeIn(400);
            });
        });
        $('.bx-modal .header .btn-fechar, .overlay').on('click', function () {
            $('.bx-modal').fadeOut(400, function () {
                $('.overlay').eq(0).fadeOut(400);
            });
        });
    }
};

$(document).ready(function () {
    FrontEnd.Init();
});

function abrirModal(titulo, texto, nomeLink, link) {
    $('#modal-texto').text('');
    $('#modal-conteudo').text('');

    if (titulo.length == 0) $('#modal-titulo').hide();else {
        $('#modal-titulo').show();
        $('#modal-titulo').html(titulo);
    }

    $('#modal-texto').html(texto);
    if (nomeLink != null && link != null) $('#modal-conteudo').append('<a href="' + link + '">' + nomeLink + '</a>');
    // abre o modal
    $('.overlay').fadeIn(400, function () {
        $('.bx-modal').fadeIn(400);
    });
}

function abrirDoacao() {
    var url = 'https://pagseguro.uol.com.br'; // https://pagseguro.uol.com.br
    var form = '<form action="' + url + '/checkout/v2/donation.html" id="formDoacaoPost" target="_blank" style="display:none" method="post"><input type="hidden" name="currency" value="BRL" /><input type="hidden" name="receiverEmail" value="doacoes@transparencia.org.br" /></form>';

    $('body').append(form);
    $('#formDoacaoPost').submit();
}
//# sourceMappingURL=FrontEnd.js.map
