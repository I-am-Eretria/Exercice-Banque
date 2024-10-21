<?php

class CompteBancaire {

    //attributs
    private string $libelle;
    private float $soldeInitial;
    private string $deviseMonetaire;
    private Titulaire $titulaire;

    public function __construct(string $libelle, float $soldeInitial, string $deviseMonetaire, Titulaire $titulaire){
        $this->libelle = $libelle;
        $this->soldeInitial = $soldeInitial;
        $this->deviseMonetaire = $deviseMonetaire;
        $this->titulaire = $titulaire;
        $this->titulaire->addCompteBancaire($this);
    }

    //getter et setter

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
    

    
    public function getSoldeInitial()
    {
        return $this->soldeInitial;
    }

    public function setSoldeInitial($soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }



    public function getDeviseMonetaire()
    {
        return $this->deviseMonetaire;
    }
 
    public function setDeviseMonetaire($deviseMonetaire)
    {
        $this->deviseMonetaire = $deviseMonetaire;

        return $this;
    }

    
    
    public function getTitulaire() : Titulaire
    {
        return $this->titulaire;
    }

    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }



    //toString
    public function __toString(){
        return $this->libelle." - ".$this->soldeInitial."".$this->deviseMonetaire;
    }




    public function getNomPrenom(){
        return $this->getTitulaire();
    }

    public function afficherTitulaire(){
        $result = "<h4>$this</h4><p>Titulaire: ".$this->getNomPrenom()."</p><br>";

        return $result;
    }

    // Créditer le compte de X euros 
    // Débiter le compte de X euros 
    // Effectuer un virement d'un compte à l'autre.

    public function crediterCompte($nombre){
        $result = $this->getSoldeInitial()+$nombre;
        $result = $this->SetSoldeInitial($result);
        return $result;
    }

    public function debiterCompte($nombre){
        $result = $this->getSoldeInitial()-$nombre;
        $result = $this->SetSoldeInitial($result);
        return $result;
    }

    

}