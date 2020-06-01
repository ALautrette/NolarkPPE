<!DOCTYPE html>
<?php
include('../includes/debut_page.php')
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

        if (empty($_SESSION['panier'])) {
            echo "<p>Votre panier est vide</p>";
        } else {
            //echo var_dump($_SESSION['panier']);
            echo '<section id="panier">';
            $cout = 0;
            foreach ($_SESSION['panier'] as $casque) {
                $cnx = new PDO('mysql:host=127.0.0.1;dbname=nolark', 'nolarkuser', 'nolarkpwd');
                $req = 'select nom, modele, prix, image, libelle '
                        . 'from casque '
                        . 'inner join marque on casque.marque=marque.id '
                        . 'inner join type on casque.type=type.id '
                        . 'where casque.id=' . $casque;
                $res = $cnx->prepare($req);
                $res->execute();
                $article = $res->fetch();
                unset($cnx);
                if (!empty($article['prix'])) {
                    $cout += $article['prix'];
                    echo'<article class="casque_panier">'
                    . '<img src="../images/casques/' . $article['libelle'] . '/' . $article['image'] . '" alt="' . $article['modele'] . '">'
                    . '<p class="prix_article">' . $article['prix'] . '€</p>'
                    . '<p class="nom_article">' . $article['nom'] . '</p>'
                    . '<p class="modele_article">' . $article['modele'] . '</p>'
                    . '</article>';
                } else {
                    unset($_SESSION['panier'][array_search($casque, $_SESSION['panier'])]);
                    echo '<p class="error">Article indisponible</p>';
                }
            }
            echo'</section>';
            echo'<section id="total_panier">'
            . '<p id="nb_articles">Nombre d\'articles : ' . count($_SESSION['panier']) . '</p>'
            . '<p id=cout_articles>Coût total des articles : ' . $cout . '€</p>'
            . '<p id="cout_livraison">Coût de la livraison : 0.00€</p>'
            . '<p id="cout_total">Total : ' . $cout . '€</p>'
            . '</section>';
             
        }

        include('../includes/footer.inc.php');
        ?>
    </body>
</html>

