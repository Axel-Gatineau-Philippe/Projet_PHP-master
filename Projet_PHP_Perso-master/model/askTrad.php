<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 04/01/2018
 * Time: 15:41
 */

class AskTrad
{
    private $Valeur;
    private $Etat;
    private $Date;
    private $NumroUtilisateur;

    /**
     * @return mixed
     */
    public function getValeur()
    {
        return $this->Valeur;
    }

    /**
     * @param mixed $Valeur
     */
    public function setValeur($Valeur)
    {
        $this->Valeur = $Valeur;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->Etat;
    }

    /**
     * @param mixed $Etat
     */
    public function setEtat($Etat)
    {
        $this->Etat = $Etat;
    }


    /**
     * @return mixed
     */
    public function getNumeroUtilisateur()
    {
        return $_SESSION["NumeroUtilisateur"];
    }
}