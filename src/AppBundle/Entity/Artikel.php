<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Artikel", inversedBy="artikel")
     * @ORM\JoinColumn(name="artikelnummer", referencedColumnName="cva")
     * @Assert\Length(
     *      min = 10,
     *      max = 10,
     *      minMessage = "artikelnummer moet 10 karakters hebben",
     *      maxMessage = "artikelnummer moet 10 karakters hebben"
     *)
     */
    private $artikelnr;

    public function __toString()
   {
       return strval($this->artikelnr);
   }

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
     * @ORM\Column(name="Magazijnlocatie", type="string", length=6)
         * @Assert\Regex(
         *    pattern = "/^20|[0-1]{1}[0-9]{1}\/[A-Z][0]{1}[0-9]{1}|10$/i",
         *    match=true,
         *    message="Ongeldige locatie [ERROR1]")
         * @Assert\Regex(
         *    pattern = "/^[2]{1}[1-9]{1}\/[A-Z]{1}[0-9]{1}$/i",
         *    match=false,
         *    message="Ongeldige locatie [ERROR2]")
         * @Assert\Regex(
         *    pattern = "/^[3-9]{1}[0-9]{1}\/[A-Z][0-9]{1}$/i",
         *    match=false,
         *    message="Ongeldige locatie [ERROR3]")
         * @Assert\Regex(
         *    pattern = "/^[0-1]{1}[0-9]{1}\/[A-Z][1]{1}[1-9]{1}$/i",
         *    match=false,
         *    message="Ongeldige locatie [ERROR4]")
         * @Assert\Regex(
         *    pattern = "/^[0-1]{1}[0-9]{1}\/[A-Z][2-9]{1}[0-9]{1}$/i",
         *    match=false,
         *    message="Ongeldige locatie [ERROR5]")
         * @Assert\Regex(
         *    pattern = "/^[0-9A-Za-z]+$/i",
         *    match=false,
         *    message="Ongeldige locatie [ERROR6]")
         * @Assert\Length(
         *      max = 6,
         *      maxMessage = "Mag niet meer zijn dan {{ limit }} karakters"
         * )
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
     * @ORM\OneToOne(targetEntity="Artikel", mappedBy="cVA")
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
    private $voorraadInAantal;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelserie", type="integer")
     */
    private $bestelserie;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    public $status;

    /**
     * @var int
     *
     * @ORM\Column(name="verkopen", type="integer")
     */
    public $verkopen;

    /**
     * @var int
     *
     * @ORM\Column(name="gereserveerdeVoorraad", type="integer")
     */
    public $gereserveerdeVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="vrijeVoorraad", type="integer")
     */
    public $vrijeVoorraad;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Bestelregel", mappedBy="Artikel")
     */
    private $artikelen;

    public function __construct()
   {
       $this->artikelen = new ArrayCollection();
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


    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Artikel
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

     /**
     * Get verkopen
     *
     * @return int
     */
    public function getVerkopen()
    {
        return $this->verkopen;
    }

    /**
     * Set verkopen
     *
     * @param integer $verkopen
     *
     * @return Artikel
     */
    public function setVerkopen($verkopen)
    {
        $this->verkopen = $verkopen;

        return $this;
    }

     /**
     * Get gereserveerdeVoorraad
     *
     * @return int
     */
    public function getGereserveerdeVoorraad()
    {
        return $this->gereserveerdeVoorraad;
    }

    /**
     * Set gereserveerdeVoorraad
     *
     * @param integer $gereserveerdeVoorraad
     *
     * @return Artikel
     */
    public function setGereserveerdeVoorraad($gereserveerdeVoorraad)
    {
        $this->gereserveerdeVoorraad = $gereserveerdeVoorraad;

        return $this;
    }

     /**
     * Get vrijeVoorraad
     *
     * @return int
     */
    public function getvrijeVoorraad()
    {
        return $this->vrijeVoorraad;
    }

    /**
     * Set vrijeVoorraad
     *
     * @param integer $vrijeVoorraad
     *
     * @return Artikel
     */
    public function setVrijeVoorraad($vrijeVoorraad)
    {
        $this->vrijeVoorraad = $vrijeVoorraad;

        return $this;
    }


  }
