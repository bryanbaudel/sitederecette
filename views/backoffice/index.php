<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>backoffice</title>
</head>
<body>

<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Instructions</th>
        <th></th>
    </tr>

    <?php foreach($backoffice as $backoffices): ?>  
        <tr>
            <td><?= $backoffices['id_Recettes'] ?></td>
            <td><?= $backoffices['Titre'] ?></td>
            <td><?= $backoffices['Instructions'] ?></td>
            <td>
                <form action="/views/backoffice/update/<?= $backoffices['id_Recettes'] ?>" method="POST">
                    <input type="submit" value="Mettre à jour" class="btn">
                </form>
                <form action="backoffice/delete/<?= $backoffices['id_Recettes'] ?>" method="GET">
                    <input type="submit" value="Supprimer" class="btn">
                </form>
            </td>
        </tr>   
    <?php endforeach ?>       

</table>
</body>
</html>
