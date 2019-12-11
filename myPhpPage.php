<?php

echo "Welcome ". $_POST['firstname']. "<br />";

if($_POST["answer"] == "2") {
    echo "Bravo ! SpaceFoot fait bien partie des GAFAS !!". "<br />";
} else {
    echo "Non, c'était SPACEFOOT évidemment !". "<br />";
}

echo "Ton niveau en web est à " . $_POST["level"] . "/10 WOW !!". "<br />";

echo "Pourquoi ? car : " . $_POST["comment"] . "<br />";

$phrase = "Les langues que tu connais : ";
if(isset($_POST["html"])){
    $phrase .= $_POST["html"] ." " ;
}
if(isset($_POST["c"])){
    $phrase .= $_POST["c"] . " ";
}
if(isset($_POST["java"])){
    $phrase .= $_POST["java"] . " ";
}

echo $phrase . "<br>";

echo "Ton langage pref : " . $_POST["preflang"]  . "<br />";
