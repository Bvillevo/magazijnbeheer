<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goederen
 *
 * @ORM\Table(name="ontvangengoederen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GoederenRepository")
 */
class Goederen
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum", type="date", nullable=true)
     */
    private $datum;

    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=20)
     */
    private $leverancier;

    /**
     * @var int
     *
     * @ORM\Column(name="ordernummer", type="integer", unique=true)
     */
    private $ordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer", unique=true)
     */
    private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=20)
     */
    private $omschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    private $hoeveelheid;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="string", length=20, nullable=true)
     */
    private $kwaliteit;

    /**
     * Set id
     *
     * @param \integer $id
     *
     * @return Goederen
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
     * Set datum
     *
     * @param \DateTime $datum
     *
     * @return Goederen
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Goederen
     */
    public function setLeverancier($leverancier)
    {
        $this->leverancier = $leverancier;

        return $this;
    }

    /**
     * Get leverancier
     *
     * @return string
     */
    public function getLeverancier()
    {
        return $this->leverancier;
    }

    /**
     * Set ordernummer
     *
     * @param integer $ordernummer
     *
     * @return Goederen
     */
    public function setOrdernummer($ordernummer)
    {
        $this->ordernummer = $ordernummer;

        return $this;
    }

    /**
     * Get ordernummer
     *
     * @return int
     */
    public function getOrdernummer()
    {
        return $this->ordernummer;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Goederen
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Goederen
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return Goederen
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;

        return $this;
    }

    /**
     * Get hoeveelheid
     *
     * @return int
     */
    public function getHoeveelheid()
    {
        return $this->hoeveelheid;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return Goederen
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;

        return $this;
    }

    /**
     * Get kwaliteit
     *
     * @return string
     */
    public function getKwaliteit()
    {
        return $this->kwaliteit;
    }
}
