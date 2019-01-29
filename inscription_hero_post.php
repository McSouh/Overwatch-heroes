<?php 
//Connection bdd
try {
	$bdd = new PDO('mysql:host=localhost;dbname=Overwatch;charset=utf8', 'root', 'root');
} catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
};

// Condition récupération de données
if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['type']) && isset($_POST['difficulty']) && isset($_POST['description']) && isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0 && $_FILES["photo"]["size"] <= 5000000){
    // Recup donnée POST
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);
    $type = htmlspecialchars($_POST['type']);
    $difficulty = htmlspecialchars($_POST['difficulty']);
    $description = htmlspecialchars($_POST['description']);
    // INSERT SQL
    $req = $bdd->prepare('INSERT INTO perso (name, password, type, difficulty, description) VALUES (:name, :password, :type, :difficulty, :description)');
    $req->execute(array(
        'name' => $name,
        'password' => $password,
        'type' => $type,
        'difficulty' => $difficulty,
        'description' => $description
    ));
    

    // Recup photo
    $file_info = pathinfo($_FILES["photo"]["name"]);
    $extension_upload = $file_info["extension"];
    $extension_allowed = array('png', 'jpg', 'jpeg', 'gif');
    if(in_array($extension_upload, $extension_allowed)){
        move_uploaded_file($_FILES["photo"]["tmp_name"], 'photos/'.$name.'.png');
    }

    // Connexion
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
};
// Redirection page d'accueil
header('Location: index.php');

?>