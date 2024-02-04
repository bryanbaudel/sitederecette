function searchRecipes() {
    var searchTerm = document.getElementById("q").value.toLowerCase();
    var ingredientFilters = document.querySelectorAll('input[name="ingredientFilter"]:checked');
    var selectedIngredients = Array.from(ingredientFilters).map(function(checkbox) {
        return checkbox.value.toLowerCase();
    });

    var recipes = document.getElementsByClassName("recipe");
    var recipeFound = false;
    var displayStyle;

    for (var i = 0; i < recipes.length; i++) {
        var recipe = recipes[i];
        var title = recipe.getElementsByTagName("h2")[0].innerText.toLowerCase();
        var recipeIngredients = Array.from(recipe.querySelectorAll(".ingredient-list p")).map(function(p) {
            return p.textContent.toLowerCase();
        });

        var titleMatch = title.includes(searchTerm);
        var ingredientMatch = hasSelectedIngredients(recipeIngredients, selectedIngredients);

        if (titleMatch && ingredientMatch) {
            displayStyle = "block";
            recipeFound = true;
        } else {
            displayStyle = "none";
        }

        recipe.style.display = displayStyle;
    }

    var searchResults = document.getElementById("searchResults");
    searchResults.style.display = recipeFound ? "none" : "block";
}

function hasSelectedIngredients(recipeIngredients, selectedIngredients) {
    return selectedIngredients.every(function(ingredient) {
        return recipeIngredients.includes(ingredient);
    });
}

document.getElementById("q").addEventListener("input", searchRecipes);
document.querySelectorAll('input[name="ingredientFilter"]').forEach(function(checkbox) {
    checkbox.addEventListener("change", searchRecipes);
});

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("searchResults").style.display = "none";
});
