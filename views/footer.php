<script>
const archivoInput = document.getElementById('archivoInput');
const botonInput = document.getElementById('botonInput');
let filePHP;

archivoInput.addEventListener('change', function(e) {
    var arxiu = e.target.files[0];
    if (arxiu) {
        var lector = new FileReader();
        lector.readAsText(arxiu);
        lector.onload = function (event) {
            var contingut = event.target.result;
            filePHP = editFile(contingut);
            console.log(filePHP);
        }
        botonInput.style.display = "block";
    }
});

botonInput.addEventListener('click', function(e) {
    if (filePHP != "") {
        sendInsert(filePHP);
    }
})

</script>
</body>

</html>