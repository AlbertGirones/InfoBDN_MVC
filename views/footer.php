<script>
const archivoInput = document.getElementById('archivoInput');
const botonInput = document.getElementById('botonInput');
let filePHP;
archivoInput.addEventListener('input', async function(e) {
    filePHP = await loadFile(e);
    botonInput.style.display = "block";
});

botonInput.addEventListener('click', function(e) {
    if (filePHP) {
        sendInsert(filePHP);
    }
})

</script>
</body>

</html>