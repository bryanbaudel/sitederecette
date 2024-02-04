<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un ingrédient</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }

        label, input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="text"] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: calc(94%); 
        }

        input[type="submit"] {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005f73;
        }
    </style>
</head>
<body>
    <form action="/recettes/addIngredient" method="POST">
        <label for="nom">Nom de l'ingrédient :</label>
        <input type="text" id="nom" name="nom" required>

        <input type="submit" value="Ajouter l'ingrédient">
    </form>
</body>
</html>
