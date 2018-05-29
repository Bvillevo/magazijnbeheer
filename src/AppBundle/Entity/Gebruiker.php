<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gebruiker
 *
 * @ORM\Table(name="gebruiker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GebruikerRepository")
 */
class Gebruiker
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="gebruikersnaam", type="string", length=100)
     */
    private $gebruikersnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="wachtwoord", type="string", length=100)
     */
    private $wachtwoord;

    /**
     * @var string
     *
     * @ORM\Column(name="rol", type="string", length=100)
     */
    private $rol;

    /**
     * Set rol
     *
     * @param string $idea
     *
     * @return Gebruiker
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gebruikersnaam
     *
     * @param string $gebruikersnaam
     *
     * @return Gebruiker
     */
    public function setGebruikersnaam($gebruikersnaam)
    {
        $this->gebruikersnaam = $gebruikersnaam;

        return $this;
    }

    /**
     * Get gebruikersnaam
     *
     * @return string
     */
    public function getGebruikersnaam()
    {
        return $this->gebruikersnaam;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Gebruiker
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set wachtwoord
     *
     * @param string $wachtwoord
     *
     * @return Gebruiker
     */
    public function setWachtwoord($wachtwoord)
    {
        $this->wachtwoord = $wachtwoord;

        return $this;
    }

    /**
     * Get wachtwoord
     *
     * @return string
     */
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }

    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return Gebruiker
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }
}
