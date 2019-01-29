<?php 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=Overwatch;charset=utf8', 'root', 'root');
} catch(Exception $e){
    die("Erreur :".$e->getMessage());
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php 
include('./navigateur.php');
?>
<div class="container">
<div class="hero">
<h2>Connectez-vous</h2><br>
<form action="./connexion_hero.php" method="post">
<input placeholder="Nom" type="text" name="name"><br>
<input placeholder="Mot de passe" type="password" name="password"><br><br>
<input type="submit">
</form>
<br>
<?php 

if(!empty($_POST["name"]) && !empty($_POST["password"])){
    $name = htmlspecialchars($_POST["name"]);
    $password = htmlspecialchars($_POST["password"]);
    $req = $bdd->query("SELECT * FROM perso WHERE name = '$name'");
    while ($donnees = $req->fetch()){
    if($donnees["password"]==$_POST["password"]){
        session_start();
        echo 'Connecté';
        $_SESSION["name"] = $name;
        header("Refresh:0; url=index.php");
    } else {
        echo 'Mauvais identifiants';
    }
}
}
?>
</div>
</div>
    
</body>
</html>