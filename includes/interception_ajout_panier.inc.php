<?php
//Je récupère l'id du casque ajouté au panier à l'aide de l'url
//puis je l'ajoute à mon array $_SESSION['panier']
//Je ne pense pas que ce soit une bonne méthode mais c'est la seule que j'ai trouvé
$url=filter_input(INPUT_SERVER,'REQUEST_URI');
$pos=strpos($url,'=');
if ($pos!==false) {
    array_push($_SESSION['panier'], substr($url,$pos+1));
}

