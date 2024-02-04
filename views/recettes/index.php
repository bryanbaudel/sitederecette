<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devoir recette</title>
</head>

<style>

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    background-color: #f5f5f5;
    color: #333;
    line-height: 1.6;
    padding: 20px;
    background-image: url('/img/fond3.png');
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
}

.navbar {
    font-family: Arial, sans-serif;
}

.navbar a {
    display: block;
    text-align: center;
    text-decoration: none;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

h1, h2 {
    text-align: center;
}

#cartIcon {
    position: fixed;
    top: 10px;
    right: 10px;
}

#searchForm,
#createRecipeSection,
#createIngredientSection {
    max-width: 500px;
    width: 100%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    text-align: center;
}

#ingredientFilters {
    text-align: center;
    margin: 20px 0;
}

#ingredientFilters label {
    margin: 0 10px;
}

.carousel-item {
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

#ingredientFilters {
    text-align: center;
    margin: 20px 0;
}

#ingredientFilters label {
    margin: 0 10px;
}

.recipes-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.recipe {
    background-color: #fff;
    padding: 20px;
    width: calc(50% - 10px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
}

.ingredient-list p {
    display: inline-block;
    margin-right: 10px;
}

.recipe-chart {
    margin: 20px auto;
    max-width: 800px;
}

.graphiques-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: flex-start;
    padding: 20px 0;
}

.graphique {
    flex-basis: 45%;
    margin: 2.5%;
    max-width: 45%;
}

#cartIcon .fas {
    font-size: 24px;
}

#cartIcon p {
    display: inline-block;
    margin-left: 5px;
    vertical-align: top;
}

.centered-text {
    text-align: center;
}

</style>

<body>

<h1>Recette de cuisine</h1>

<div class="navbar">
    <a href="/backoffice">Backoffice</a>
</div>

<a href="/panier" id="cartIcon">
    <i class="fas fa-shopping-cart"></i><p id="cart">0</p>
</a>

<form action="#" method="POST" id="searchForm">
    <input type="text" name="q" id="q" placeholder="Rechercher une recette..." oninput="searchRecipes()">
    <button type="button" onclick="searchRecipes()">Rechercher</button>
</form>

<!-- Carrousel Bootstrap -->
<div id="recipeCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $active = true;
        foreach ($recettes as $recette) :
        ?>
        <div class="carousel-item <?= $active ? 'active' : '' ?>">
            <h2><a href="/recettes/lire/<?= $recette['slug'] ?>"><?= $recette['Titre'] ?></a></h2>
            <p><?= substr($recette['Instructions'], 0, 30)."..." ?></p>
        </div>
        <?php
        $active = false;
        endforeach;
        ?>
    </div>
    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
</div>

<div id="ingredientFilters">
    <?php foreach($allIngredients as $ingredient): ?>
    <label>
        <input type="checkbox" name="ingredientFilter" value="<?= $ingredient['Nom_Ingredients'] ?>" onclick="searchRecipes()">
        <?= $ingredient['Nom_Ingredients'] ?>
    </label>
    <?php endforeach ?>
</div>

<div id="searchResults" style="display: none;">
    <p class="centered-text">Aucune recette trouvée.</p>
</div>

<p class="centered-text"><em>Toutes les recettes sont prévues pour une personne.</em></p>

<br>

<div class="recipes-container">
    <?php foreach($recettes as $recette): ?>
    <div class="recipe" data-recipe-id="<?= $recette['id_Recettes'] ?>">
        <h2><a href="/recettes/lire/<?= $recette['slug'] ?>"><?= $recette['Titre'] ?></a></h2>
        <p><?= $recette['Total_Calorique'] ?></p> 
        <div class="ingredient-list">
            <?php foreach($ingredients as $ingredient): ?>
            <?php if ($ingredient['id_Recettes'] == $recette['id_Recettes']): ?>
            <p><?= $ingredient['Nom_Ingredients'] ?></p> 
            <?php endif; ?>
            <?php endforeach ?>
        </div>
    </div>
    <?php endforeach ?>
</div>

<h2>Ajouter les ingrédients au panier</h2>
<div class="container">
    <div class="row">
        <?php foreach($allIngredients as $ingredient): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $ingredient['Nom_Ingredients'] ?></h5>
                    <p><span class="price"><?= $ingredient['Prix'] ?> F</span></p>
                    <div class="text-end">
                        <a href="#" class="btn btn-primary add-to-cart" data-id="<?= $ingredient['id_Ingredients'] ?>" style="background-color:black">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<br>

<div id="createRecipeSection">
    <h2>Créer une nouvelle recette</h2>
    <form action="/recettes/create" method="POST">
        <label for="titre">Titre de la recette :</label>
        <input type="text" name="titre" required>
        <label for="instructions">Instructions :</label>
        <textarea name="instructions" required></textarea>
        <button type="submit">Créer la recette</button>
    </form>
</div>

<div id="createIngredientSection">
    <h2>Ajouter un nouvel ingrédient</h2>
    <a href="/views/recettes/createingredients.php" class="btn btn-primary">Ajouter un ingrédient</a>
</div>

<br>

<h2>Graphiques</h2>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>
<script>  
    var _seed = 42;
    Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
    };

    var colors = [
        '#008FFB',
        '#00E396',
        '#FEB019',
        '#FF4560',
        '#775DD0',
        '#546E7A',
        '#26a69a',
        '#D10CE8',
    ]
</script>

<div id="app">
    <div class="graphiques-container">
        <div v-for="(recipe, index) in recettes" :key="index" class="graphique">
            <h2>{{ recipe.nom }}</h2>
            <apexchart type="bar" height="350" :options="getChartOptions(recipe)" :series="getSeries(recipe)"></apexchart>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#app',
        components: {
            apexchart: VueApexCharts,
        },
        data: {
            recettes: [
                {
                    nom: "Pâtes Carbonara",
                    ingredients: [
                        { nom: "Pâtes", calories: 300 },
                        { nom: "Crème fraîche", calories: 150 },
                        { nom: "Fromage", calories: 120 },
                        { nom: "Lardons", calories: 200 }
                    ],
                    
                    caloriesParPersonne: 770
                },
                {
                    nom: "Taboulé",
                    ingredients: [
                        { nom: "Semoule", calories: 180 },
                        { nom: "Menthe", calories: 5 },
                        { nom: "Raisins secs", calories: 90 },
                        { nom: "Tomates", calories: 30 },
                        { nom: "Oignon", calories: 20 },
                        { nom: "Jus de citron", calories: 10 },
                        { nom: "Huile d'olive", calories: 120 },
                        { nom: "Poivre", calories: 0 }
                    ],
                    caloriesParPersonne: 455
                },
                 {
                    nom: "Hachis Parmentier",
                    ingredients: [
                        { nom: "Viande haché", calories: 250 },
                        { nom: "Sel", calories: 0 },
                        { nom: "Ail", calories: 10 },
                        { nom: "Carottes", calories: 25 },
                        { nom: "Pulpe de tomate", calories: 30 },
                        { nom: "Poivre", calories: 0 },
                        { nom: "Pomme de terre", calories: 150 },
                    
                    ],
                    caloriesParPersonne: 465
                },
                {
                    nom: "Pizza chèvre miel",
                    ingredients: [
                        { nom: "Pâte à pizza", calories: 300 },
                        { nom: "Crème fraîche", calories: 150 },
                        { nom: "Sel", calories: 0 },
                        { nom: "Huile d'olive", calories: 120 },
                        { nom: "Fromage de chèvre", calories: 150 },
                        { nom: "Poivre", calories: 0 },
                        { nom: "Oignon rouge", calories: 20 },
                        { nom: "Miel", calories: 64 },
                    ],
                    caloriesParPersonne: 740 
                },
                {
                    nom: "Pâtes bolognaise",
                    ingredients: [
                        { nom: "Pâtes", calories: 300 },
                        { nom: "Sel", calories: 0 },
                        { nom: "Oignon", calories: 20 },
                        { nom: "Huile d'olive", calories: 120 },
                        { nom: "Poivre", calories: 0 },
                        { nom: "Viande haché", calories: 250 },
                        { nom: "Ail", calories: 10 },
                        { nom: "Carottes", calories: 25 },
                        { nom: "Pulpe de tomate", calories: 30 },
                    ],
                    caloriesParPersonne: 755 
                }
            ]
        },
        methods: {
            getSeries(recipe) {
                return [{
                    name: 'Calories par ingrédient',
                    data: recipe.ingredients.map(i => i.calories)
                }];
            },
            getChartOptions(recipe) {
                return {
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    title: {
                        text: `Total des calories par personne pour cette recette : ${recipe.caloriesParPersonne}`
                    },
                    xaxis: {
                        categories: recipe.ingredients.map(i => i.nom)
                    },
                    yaxis: {
                        title: {
                            text: 'Calories'
                        }
                    },
                    plotOptions: {
                        bar: {
                            distributed: true
                        }
                    },
                    colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a', '#D10CE8']
                };
            }
        }
    });
</script>


<footer>
    <p class="centered-text">Copyright 2019</p>
</footer>

</body>
</html>
