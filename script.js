// CONCURS
function obrirFinestraConcurs() {
    var altura = 350;
    var amplada = 450;
    var x = parseInt((window.screen.height / 2) - (altura / 2));
    var y = parseInt((window.screen.width / 2) - (amplada / 2));
    window.open("views/alumne/sorteigBenvinguda.php", "La meva finestra", "height=" + altura + ",width=" + amplada + ",top=" + x + ",left=" + y + "");
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

//ARXIU

function loadFile(e) {
    return new Promise(function (resolve, reject) {
        var arxiu = e.target.files[0];
        if (arxiu) {
            var lector = new FileReader();
            lector.readAsText(arxiu);
            lector.onload = function (event) {
                var contingut = event.target.result;
                resolve(editFile(contingut));
            }
        }
    })
}

function editFile(contingut) {
    arrayAlumnes = new Array;
    arrayMatricules = new Array;
    array = new Array;
    arrayAux = new Array;
    contingut = contingut.split(";");

    for (let i = 0; i < contingut.length; i++) {
        aux = contingut[i].split("(");
        if (aux[1] && aux[1].length > 1) {
            aux[1] = aux[1].substring(0, aux[1].length - 1);
        }
        aux[0] = aux[0].replace(/,$/, '');
        arrayAux.push(aux);
        arrayAlumnes.push(aux[0]);
        arrayMatricules.push(aux[1]);
    }

    arrayAux.pop();
    arrayAlumnes.pop();
    arrayMatricules.pop();

    for (let i = 0; i < arrayAlumnes.length; i++) {
        aux = arrayAlumnes[i].split(",");
        aux2 = arrayMatricules[i].split(",");
        aux.push(aux2);
        array.push(aux);
    }
    sendFile(array)
    return array;
}

function sendFile(array) {
    const cadenaAEnviar = array;

    fetch('index.php?controller=Admin&action=showAdminStudents', {
        method: 'POST',
        body: JSON.stringify({ cadena: cadenaAEnviar }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.text())
        .then(data => {
            const dataHTML = document.getElementById("data");
            dataHTML.innerHTML = data
        })
        .catch(error => {
            console.error(error);
        });
}

function sendInsert(array) {
    const cadenaAEnviar = array;

    fetch('index.php?controller=Admin&action=sendStudentsToDB', {
        method: 'POST',
        body: JSON.stringify({ cadena: cadenaAEnviar }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        });
}