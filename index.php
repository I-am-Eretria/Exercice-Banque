<h1>Exerices POO PHP</h1>
<h2>Partie II: Banque</h2>

<br>

<h3>Consignes:</h3>
<p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires 
et leurs comptes bancaires respectifs. </p>

<h4>Un compte bancaire est composé des éléments suivants : </h4>
<ul>
    <li>Un libellé (compte courant, livret A, ...)</li>
    <li>Un solde initial</li>
    <li>Une devise monétaire</li>
    <li>Un titulaire unique</li>
</ul>

<h4>Un titulaire comporte : </h4>
<ul>
    <li>Un nom</li>
    <li>Un prénom</li>
    <li>Une date de naissance</li>
    <li>Une ville</li>
    <li>L'ensemble de ses comptes bancaires.</li>
</ul>

<h4>Sur un compte bancaire, on doit pouvoir :</h4>
<ul>
    <li>Créditer le compte de X euros </li>
    <li>Débiter le compte de X euros</li>
    <li>Effectuer un virement d'un compte à l'autre.</li>
</ul>

<h4>On doit pouvoir :</h4>
<ul>
    <li>Afficher  toutes  les  informations  d'un(e)  titulaire  (dont  l'âge)  et  l'ensemble  des  comptes 
    appartenant à celui(celle)-ci.</li>
    <li>Afficher  toutes  les  informations  d'un  compte  bancaire,  notamment  le  nom  /  prénom  du 
    titulaire du compte.</li>
</ul>

<h3>Résultats:</h3>

<?php

//autochargement de classes php
spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});

$stephane = new Titulaire("SMAIL", "Stéphane", "1975-01-01", "Mulhouse");
$mickael = new Titulaire("MURMANN", "Mickael", "1976-02-02", "Strasbourg");

$cb1 = new CompteBancaire ("Compte Courant", 800, "€", $stephane);
$cb2 = new CompteBancaire ("Livret A", 1200, "€", $stephane);
$cb3 = new CompteBancaire ("Compte Courant", 900, "€", $mickael);



echo $cb1->afficherTitulaire();
echo $cb2->afficherTitulaire();
echo $cb3->afficherTitulaire();

echo $stephane->afficherCompteBancaires();
echo $mickael->afficherCompteBancaires();


$cb1->debiterCompte(100);
$cb2->crediterCompte(100);
echo $stephane->afficherCompteBancaires();

$cb1->virementCompte($cb2, 300);
echo $stephane->afficherCompteBancaires();
