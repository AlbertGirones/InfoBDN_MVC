function obrirFinestraConcurs() {
    var altura=600;
    var amplada=700;
    var x = parseInt((window.screen.height/2)-(altura/2));
    var y = parseInt((window.screen.width/2)-(amplada/2));
    window.open("views/alumne/hla.php","La meva finestra","height="+altura+",width="+amplada+",top="+x+",left="+y+"");
}