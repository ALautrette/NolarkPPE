<!DOCTYPE html>
<?php
include('../includes/debut_page.php');
//Si l'utlisateur n'est pas connecté, je le renvoie vers la page de connexion
if (!isset($_SESSION['pseudo'])) {
    header('Location: http://nolarkprof/pages/connexion.php');
}
?>

<html lang="fr-FR">
    <head>
        <title>Casques Nolark : Sécurité et confort, nos priorités !</title>
        <meta charset="UTF-8">
        <meta name="author" content="José GIL">
        <meta name="description" content="Découvrez des casques moto dépassant même les exigences des tests de sécurité. Tous les casques Nolark au meilleur prix et avec en prime la livraison gratuite !">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/styles.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="../favicon.ico">
    </head>
    <body>
        <?php
        include('../includes/header.html.inc.php');
        echo '<p> Bienvenue <span id="pseudo">' . $_SESSION['pseudo'] . '</span></p>';
        //Affiche un message personnalisé suivant le statut de l'utilisateur 
        if ((int) $_SESSION['niveau'] === 4) {
            echo '<p>Ah un administrateur !</p>';
        } else if ((int) $_SESSION['niveau'] === 3) {
            echo '<p>Oh non, un relou de modo...</p>';
        } else if ((int) $_SESSION['niveau'] === 2) {
            echo '<p>Tient! Un client, bonne navigation sur le site de Nolark !</p>';
        }
        
        //Ajoute une modif de mots de passe
        
        echo "<a href='./deconnexion.php'><img src='../images/btn_deco.png' alt='Bouton de déconnexion'></a>";
        include('../includes/footer.inc.php');
        ?>
    </body>
</html>

