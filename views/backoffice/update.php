<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<form action="/views/backoffice/update_insert" method="POST">
    <label for="id_Recettes">Id :</label>
    <input type="number" id="id_Recettes" name="id_Recettes" value="<?= $backoffice['id_Recettes'] ?>" readonly>

    <label for="Titre">Titre :</label>
    <input type="text" id="Titre" name="Titre" value="<?= $backoffice['Titre'] ?>">

    <label for="Instructions">Instructions :</label>
    <input type="text" id="Instructions" name="Instructions" value="<?= $backoffice['Instructions'] ?>">

    <input type="submit" value="Envoyer" class="btn">
</form>
