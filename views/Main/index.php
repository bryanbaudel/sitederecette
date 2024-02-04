<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bienvenue sur mon site de recettes</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
  }

  .header {
    background-image: url('img/fond.png');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    position: relative;
  }

  .text-container {
    position: absolute;
    top: 35%;
    width: 100%;
  }

  .header h1 {
    font-size: 4em;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    margin: 0;
  }

  .header p {
    font-size: 1.5em;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    margin-bottom: 20px;
  }

  .header a {
    display: inline-block;
    padding: 15px 30px;
    font-size: 1.5em;
    text-decoration: none;
    color: white;
    background-color: #008CBA;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    box-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  }

  .header a:hover {
    background-color: #005f73;
  }

  .footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
  }

</style>
</head>
<body>

<div class="header">
  <div class="text-container">
    <h1>Bienvenue sur mon site de recettes</h1>
    <p>Explore ma collection de recettes pour trouver l'inspiration culinaire</p>
    <a href="recettes">Voir les recettes</a>
  </div>
</div>

</body>
</html>
