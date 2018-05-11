<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtikelRepository")
 */
class Artikel
{

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnr", type="integer", unique=true)
     *@ORM\Id
     */
    private $artikelnr;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=100)
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="technischeSpecificaties", type="string", length=100, nullable=true)
     */
    private $technischeSpecificaties;

    /**
     * @var string
     *
     * @ORM\Column(name="magazijnlocatie", type="string", length=100)
     */
    private $magazijnlocatie;

    /**
     * @var int
     *
     * @ORM\Column@Column(type="decimal", precision=10, scale=2)
     */
    private $inkoopprijs;

    /**
     * @var int
     *
     * @ORM\Column(name="CVA", type="integer", nullable=true)
     */
    private $cVA;

    /**
     * @var int
     *
     * @ORM\Column(name="minimumVoorraad", type="integer")
     */
    public $minimumVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="voorraadInAantal", type="integer")
     */
    public $voorraadInAantal;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelserie", type="integer")
     */
    public $bestelserie;

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
     * Set artikelnr
     *
     * @param integer $artikelnr
     *
     * @return Artikel
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
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Artikel
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
     * Set technischeSpecificaties
     *
     * @param string $technischeSpecificaties
     *
     * @return Artikel
     */
    public function setTechnischeSpecificaties($technischeSpecificaties)
    {
        $this->technischeSpecificaties = $technischeSpecificaties;

        return $this;
    }

    /**
     * Get technischeSpecificaties
     *
     * @return string
     */
    public function getTechnischeSpecificaties()
    {
        return $this->technischeSpecificaties;
    }

    /**
     * Set magazijnlocatie
     *
     * @param string $magazijnlocatie
     *
     * @return Artikel
     */
    public function setMagazijnlocatie($magazijnlocatie)
    {
        $this->magazijnlocatie = $magazijnlocatie;

        return $this;
    }

    /**
     * Get magazijnlocatie
     *
     * @return string
     */
    public function getMagazijnlocatie()
    {
        return $this->magazijnlocatie;
    }

    /**
     * Set inkoopprijs
     *
     * @param integer $inkoopprijs
     *
     * @return Artikel
     */
    public function setInkoopprijs($inkoopprijs)
    {
        $this->inkoopprijs = $inkoopprijs;

        return $this;
    }

    /**
     * Get inkoopprijs
     *
     * @return int
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }

    /**
     * Set cVA
     *
     * @param integer $cVA
     *
     * @return Artikel
     */
    public function setCVA($cVA)
    {
        $this->cVA = $cVA;

        return $this;
    }

    /**
     * Get cVA
     *
     * @return int
     */
    public function getCVA()
    {
        return $this->cVA;
    }

    /**
     * Set minimumVoorraad
     *
     * @param integer $minimumVoorraad
     *
     * @return Artikel
     */
    public function setMinimumVoorraad($minimumVoorraad)
    {
        $this->minimumVoorraad = $minimumVoorraad;

        return $this;
    }

    /**
     * Get minimumVoorraad
     *
     * @return int
     */
    public function getMinimumVoorraad()
    {
        return $this->minimumVoorraad;
    }

    /**
     * Set voorraadInAantal
     *
     * @param integer $voorraadInAantal
     *
     * @return Artikel
     */
    public function setVoorraadInAantal($voorraadInAantal)
    {
        $this->voorraadInAantal = $voorraadInAantal;

        return $this;
    }

    /**
     * Get voorraadInAantal
     *
     * @return int
     */
    public function getVoorraadInAantal()
    {
        return $this->voorraadInAantal;
    }

    /**
     * Set bestelserie
     *
     * @param integer $bestelserie
     *
     * @return Artikel
     */
    public function setBestelserie($bestelserie)
    {
        $this->bestelserie = $bestelserie;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return int
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
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
       $bestelregels = new ArrayCollection()
    }
}
