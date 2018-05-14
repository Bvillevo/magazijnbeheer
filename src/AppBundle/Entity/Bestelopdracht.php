<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestelopdracht
 *
 * @ORM\Table(name="bestelopdracht")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelopdrachtRepository")
 */
class Bestelopdracht
{
    /**
     * @var int
     *
     * @ORM\Column(name="bestelordernummer", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="Goederen", inversedBy="goederen")
     * @ORM\JoinColumn(name="ordernummer", referencedColumnName="bestelordernummer")
     */
    private $bestelordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnr", type="integer")
     */
    private $artikelnr;

    /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    private $hoeveelheid;

    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=20)
     */
    private $leverancier;


    /**
     * @var int
     *
     * @ORM\Column(name="bestelregels", type="integer")
     * @ORM\OneToMany(targetEntity="BestelRegel", mappedBy="artikel")
     */
    public $bestelregels;


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
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return Bestelopdracht
     */
    public function setBestelordernummer($bestelordernummer)
    {
        $this->bestelordernummer = $bestelordernummer;

        return $this;
    }

    /**
     * Get bestelordernummer
     *
     * @return int
     */
    public function getBestelordernummer()
    {
        return $this->bestelordernummer;
    }

    /**
     * Set artikelnr
     *
     * @param integer $artikelnr
     *
     * @return Bestelopdracht
     */
    public function setArtikelnr($artikelnr)
    {
        $this->artikelnr = $artikelnr;

        return $this;
    }

    /**
     * Get artikelnr
     *
     * @return int
     */
    public function getArtikelnr()
    {
        return $this->artikelnr;
    }

    /**
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return Bestelopdracht
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
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Bestelopdracht
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
     * Set bestelregels
     *
     * @param integer $bestelregels
     *
     * @return Artikel
     */
    public function setBestelregels($bestelregels)
    {
        $this->bestelregels = $bestelregels;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return int
     */
    public function getBestelregels()
    {
        return $this->bestelregels;
    }

    public function __construct()
    {
       $bestelregels = new ArrayCollection();
    }
}
