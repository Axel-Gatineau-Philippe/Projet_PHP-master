<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 03/01/2018
 * Time: 20:27
 */

class User
{
    private $nameUser;
    private $firstNameUser;
    private $mailUser;
    private $passUser;
    private $typeUser;
    private $cleActivation;
    private $actifActivation;

    /**
     * User constructor.
     * @param $nameUser
     * @param $firstNameUser
     * @param $mailUser
     * @param $passUser
     * @param $typeUser
     */
    public function __construct($nameUser, $firstNameUser, $mailUser, $passUser, $typeUser, $cleActivation)
    {
        $this->nameUser = $nameUser;
        $this->firstNameUser = $firstNameUser;
        $this->mailUser = $mailUser;
        $this->passUser = $passUser;
        $this->typeUser = $typeUser;
        $this->cleActivation = $cleActivation;
    }

    /**
     * @return mixed
     */
    public function getCleActivation()
    {
        return $this->cleActivation;
    }

    /**
     * @param mixed $cleActivation
     */
    public function setCleActivation($cleActivation)
    {
        $this->cleActivation = $cleActivation;
    }

    /**
     * @return mixed
     */
    public function getActifActivation()
    {
        return $this->actifActivation;
    }

    /**
     * @param mixed $actifActivation
     */
    public function setActifActivation($actifActivation)
    {
        $this->actifActivation = $actifActivation;
    }

    /**
     * @return mixed
     */
    public function getNameUser()
    {
        return $this->nameUser;
    }

    /**
     * @param mixed $nameUser
     */
    public function setNameUser($nameUser)
    {
        $this->nameUser = $nameUser;
    }

    /**
     * @return mixed
     */
    public function getFirstNameUser()
    {
        return $this->firstNameUser;
    }

    /**
     * @param mixed $firstNameUser
     */
    public function setFirstNameUser($firstNameUser)
    {
        $this->firstNameUser = $firstNameUser;
    }

    /**
     * @return mixed
     */
    public function getMailUser()
    {
        return $this->mailUser;
    }

    /**
     * @param mixed $mailUser
     */
    public function setMailUser($mailUser)
    {
        $this->mailUser = $mailUser;
    }

    /**
     * @return mixed
     */
    public function getPassUser()
    {
        return $this->passUser;
    }

    /**
     * @param mixed $passUser
     */
    public function setPassUser($passUser)
    {
        $this->passUser = $passUser;
    }

    /**
     * @return mixed
     */
    public function getTypeUser()
    {
        return $this->typeUser;
    }

    /**
     * @param mixed $typeUser
     */
    public function setTypeUser($typeUser)
    {
        $this->typeUser = $typeUser;
    }
}
?>