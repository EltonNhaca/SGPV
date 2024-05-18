const btn = document.getElementByClassName("btn");
const main_content = document.getElementByClassName("main_content");
const x = window.matchMedia("(max-width: 700px)");

function cadastro() {
	main_content.innerHTML = '<object width="100%" height="100%" type="text/html" data="nome do documento"></object>';
}