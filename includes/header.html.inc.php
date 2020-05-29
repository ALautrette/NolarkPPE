<?php
// Sommes-nous sur l'index ? Récupération du nom de page dans $pageActuelle
$scriptName = filter_input(INPUT_SERVER, 'SCRIPT_NAME');
$pageActuelle = substr($scriptName, strrpos($scriptName, '/') + 1);
if ($pageActuelle === 'index.php') {
    $dirIndex = './';
    $dirPages = './pages/';
} else {
    $dirIndex = '../';
    $dirPages = './';
}
// Construction d'un tableau associatif contenant les correspondances
// noms de pages / liens de la barre de navigation
$pages = array(
    'Accueil' => $dirIndex . 'index.php',
    'Route' => $dirPages . 'route.php',
    'Cross' => $dirPages . 'cross.php',
    'Piste' => $dirPages . 'piste.php',
    'Enfants' => $dirPages . 'enfants.php',
    'Nous contacter' => $dirPages . 'nous-contacter.php',
        //'Se connecter'=> $dirPages . 'connexion.php'
);

/* $lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
  $id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
  $pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';
 */
?>

<header>
    <picture>
        <source media="(max-width: 576px)" srcset="<?php echo $dirIndex; ?>images/banniere_small.png">
        <source srcset="<?php echo $dirIndex; ?>images/banniere.png">
        <img src="<?php echo $dirIndex; ?>images/banniere.png" alt="Nolark : Protect your minds ! Cette bannière montre un 
             coucher de soleil avec une femme embrassant un homme réalisant en stoppie sur sa
             moto.">
        <!-- Image basée sur la création originale de ShiftGraphiX sur Pixabay : 
            https://pixabay.com/fr/couple-stoppie-sportive-vélomoteur-3156613/ -->
    </picture>
    <nav>
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>
        <ul>
            <?php
            // Affichage des liens de la barre de navigation
            foreach ($pages as $nom => $url) {
                echo "\n", '<li><a href="', $url, '">', $nom, '</a></li>';
            }
                //Ajout d'un lien vers le panier du client
                //Affiche le nombre d'articles dans le panier
                if (empty($_SESSION['panier'])) {
                    echo "\n", '<li><a href="', $dirPages . 'panier.php', '">', 'Mon Panier', '</a></li>';
                } else {
                    echo "\n", '<li><a href="', $dirPages . 'panier.php', '">', 'Mon Panier (', count($_SESSION['panier']), ')</a></li>';
                }
            //Test si l'utlisateur est connecté
            if (isset($_SESSION['pseudo'])) {
                //Si il est connecté, ajoute un lien vers sa page personnelle
                //Que l'on retrouve dans la barre de navigation dénommé par son pseudo
                echo "\n", '<li><a href="', $dirPages . 'mon-compte.php', '">', $_SESSION['pseudo'], '</a></li>';
                
            } else {
                echo "\n", '<li><a href="', $dirPages . 'connexion.php', '">', 'Se connecter', '</a></li>';
            }
            
            ?>
        </ul>
    </nav>
</header>