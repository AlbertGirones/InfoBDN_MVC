<!DOCTYPE html>
<html>
<head>
    <title>Sorteig de Benvinguda</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../script.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        #resultat {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Enhorabona!</h1>
    <div id="resultat"></div>
    <script>
        var premiAleat = obtenirPremiAleat();
        document.getElementById("resultat").innerHTML = "<h2>Has guanyat:</h2><p>" + premiAleat + "</p>";
    </script>
</body>
</html>