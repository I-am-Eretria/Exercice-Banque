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

    public function getLibelle() : string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
    

    
    public function getSoldeInitial() : float
    {
        return $this->soldeInitial;
    }

    public function setSoldeInitial(float $soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }



    public function getDeviseMonetaire() : string
    {
        return $this->deviseMonetaire;
    }
 
    public function setDeviseMonetaire(string $deviseMonetaire)
    {
        $this->deviseMonetaire = $deviseMonetaire;

        return $this;
    }

    
    
    public function getTitulaire() : Titulaire
    {
        return $this->titulaire;
    }

    public function setTitulaire(Titulaire $titulaire)
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
    
    public function crediterCompte(float $montant){
        $result = $this->getSoldeInitial()+$montant;
        $result = $this->SetSoldeInitial($result);
        return $result;
    }



    // Débiter le compte de X euros 

    public function debiterCompte(float $montant){
        $result = $this->getSoldeInitial()-$montant;
        $result = $this->SetSoldeInitial($result);
        return $result;
    }



   // Effectuer un virement d'un compte à l'autre.

    public function virementCompte(CompteBancaire $compteCible, float $montant) {
        
        // Débiter le compte source
        $this->debiterCompte($montant);
    
        // Créditer le compte cible
        $compteCible->crediterCompte($montant);
    
        // Return les nouveaux soldes
        return [
            'compteSource' => $this->getSoldeInitial(),
            'compteCible' => $compteCible->getSoldeInitial(),
        ];
    }
    
}