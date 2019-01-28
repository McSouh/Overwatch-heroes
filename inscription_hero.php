<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création personnage</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php 
include('./navigateur.php');
?>
<div class="container">
<div class="hero">
<h2>Créer un nouveau Personnage</h2><br>
<form action="./inscription_hero_post.php" method="post" enctype="multipart/form-data">
<input placeholder="Nom" type="text" name="name"><br>
<input placeholder="Mot de passe" type="password" name="password"><br>
<input placeholder="Rôle" type="text" name="type"><br>
<input placeholder="Difficulté" type="text" name="difficulty"><br>
<br><label for="file" class="label-file">Choisir une image</label>
<input id="file" class="input-file" type="file" name="photo" />
<br><br>
<textarea placeholder="Description" name="description"cols="30" rows="10"></textarea><br>
<input type="submit">
</form>
</div>
</div>
</body>
</html>