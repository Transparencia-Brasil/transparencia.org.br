function registrarPageView(pagina) {
	if (ga) ga('send', 'pageview', '/' + pagina);
}

function registrarEvento(elemento, evento, nome) {
	if (ga) ga('send', 'event', elemento, evento, nome);
}
//# sourceMappingURL=ga.js.map
