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
     * @ORM\OneToMany(targetEntity="Bestelopdracht", mappedBy="bestelopdracht")
     * @ORM\JoinColumn(name="bestelordernummer", referencedColumnName="ordernummer")
     */
    private $ordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer", unique=true)\
     * @ORM\OneToMany(targetEntity="Artikel", mappedBy="artikel")
     * @ORM\JoinColumn(name="artikelnr", referencedColumnName="artikelnummer")
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
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
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
     */
    public function setLeverancier($leverancier)
    {
        $this->leverancier = $leverancier;
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
     */
    public function setOrdernummer($ordernummer)
    {
        $this->ordernummer = $ordernummer;
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
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;
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
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;
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
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;
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
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;
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
