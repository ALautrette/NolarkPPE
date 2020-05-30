<?php
$url=filter_input(INPUT_SERVER,'REQUEST_URI');
$pos=strpos($url,'=');
if ($pos!==false) {
    array_push($_SESSION['panier'], substr($url,$pos+1));
}

