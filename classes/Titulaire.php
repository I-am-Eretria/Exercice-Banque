<?php

class Titulaire{

    //attributs
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;
    private string $ville;
    private array $compteBancaires;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = New DateTime ($dateNaissance);
        $this->ville = $ville;
        $this->compteBancaires = [];
    }


    //getter et setter

    public function getNom() : string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    

    public function getPrenom() : string
    {
        return $this->prenom;
    }
 
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    

    public function getDateNaissance() : DateTime 
    {
        return $this->dateNaissance->format("d/m/Y");
    }
    

    public function setDateNaissance(DateTime $dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    

    public function getVille() : string
    {
        return $this->ville;
    }

    public function setVille(string $ville)
    {
        $this->ville = $ville;

        return $this;
    }



    public function getCompteBancaires() : CompteBancaire
    {
        return $this->compteBancaires;
    }

    public function setCompteBancaires(CompteBancaire $compteBancaires)
    {
        $this->compteBancaires = $compteBancaires;

        return $this;
    }


    //toString

    public function __toString(){
        return $this->nom." ".$this->prenom;
    }



    public function addCompteBancaire(CompteBancaire $compteBancaire){ 
        $this->compteBancaires[] = $compteBancaire; 
    }

    public function afficherCompteBancaires(){
        $result = "<h4>Compte(s) Bancaire de $this</h4><ul>";

        foreach ($this->compteBancaires as $compteBancaire) {
            $result .= "<li>$compteBancaire</li>";
        }

        $result .= "</ul>";

        return $result;
    }

}