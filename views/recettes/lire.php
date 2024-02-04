<div class="recipe-container">
    <h2 class="recipe-title"><?= $recettes['Titre'] ?></h2>

    <div class="recipe-instructions">
        <p><?= nl2br($recettes['Instructions']) ?></p>
    </div>

    <div class="recipe-details">
        <h3 class="total-calories-title">Total calorique :</h3>
        <p class="total-calories"><?= $recettes['Total_Calorique'] ?></p>
    </div>

    <div class="recipe-ingredients">
        <h3>Ingrédients :</h3>
        <ul>
            <?php foreach($ingredients as $ingredient): ?>
                <?php if ($ingredient['id_Recettes'] == $recettes['id_Recettes']): ?>
                    <li><?= $ingredient['Nom_Ingredients'] ?></li>
                <?php endif; ?>
            <?php endforeach ?>
        </ul>
    </div>

    <a href="/recettes" class="back-link">Retour à la liste des recettes</a>
</div>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    line-height: 1.6;
    padding: 20px;
}

.recipe-container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.recipe-title {
    font-weight: bold;
    text-align: center;
    margin: 0 0 20px;
}

.recipe-instructions {
    font-size: 16px;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.recipe-details, .recipe-ingredients {
    margin-top: 20px;
}

.total-calories-title, .recipe-ingredients h3 {
    font-size: 18px;
    font-weight: bold;
    color: #ff6f61;
}

.total-calories {
    font-size: 20px;
    color: #444;
}

.recipe-ingredients ul {
    padding: 0;
}

.recipe-ingredients li {
    background-color: #e7e7e7;
    border-radius: 5px;
    padding: 5px 10px;
    margin: 5px 0;
    display: inline-block;
}

.back-link {
    display: block;
    width: 200px;
    margin: 30px auto 0;
    text-align: center;
    padding: 10px;
    background-color: #008CBA;
    color: #fff;
    border-radius: 5px;
}

.back-link:hover {
    background-color: #005f73;
}
</style>
