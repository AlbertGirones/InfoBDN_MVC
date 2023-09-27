<!DOCTYPE html>
<html>
<head>
    <title>Sorteig de Benvinguda</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../script.js"></script>
    <link rel="stylesheet" href="../../style.css">
</head>

<body class="bodySorteig">
    <h1 class="titol">Enhorabona!</h1>
    <div id="resultat"></div>
    <script>
        var premiAleat = obtenirPremiAleat();
        document.getElementById("resultat").innerHTML = "<h2>Has guanyat:</h2><p>" + premiAleat + "</p>";
    </script>
    <a onclick='window.close()'><img src="../../img/48/icons8-cross-mark-48.png" class="imatgeCross"></a>
</body>
</html>