function obrirFinestraConcurs() {
    var altura = 350;
    var amplada = 450;
    var x = parseInt((window.screen.height/2)-(altura/2));
    var y = parseInt((window.screen.width/2)-(amplada/2));
    window.open("views/alumne/sorteigBenvinguda.php","La meva finestra","height="+altura+",width="+amplada+",top="+x+",left="+y+"");
}

function obtenirPremiAleat() {
    var premis = [
    "2 cursos gratuïts ( JavaScript i PHP)",
    "1 viatge amb la teva parella a Roma!",
    "1 beca universitària per a la carrera que vulguis!",
    ];
    var indexAleat = Math.floor(Math.random() * premis.length);
    return premis[indexAleat];
}

function loadFile() {
    var x = 'hola';
    console.log(x);
}