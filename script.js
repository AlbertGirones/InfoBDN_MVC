function obrirFinestraConcurs() {
    var altura=400;
    var amplada=500;
    var x = parseInt((window.screen.height/2)-(altura/2));
    var y = parseInt((window.screen.width/2)-(amplada/2));
    window.open("views/alumne/hla.php","La meva finestra","height="+altura+",width="+amplada+",top="+x+",left="+y+"");
}