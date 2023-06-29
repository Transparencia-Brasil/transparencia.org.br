function registrarPageView(pagina) {
    if (gtag) {
        gtag('config', 'G-5Q93JSV8P7', {
            'page_path': '/' + pagina
        });
    }
}

function registrarEvento(elemento, evento, nome) {
    
    if (gtag) {
        gtag('event', evento, {
            'event_category': elemento,
            'event_label': nome
        });
    }
}

