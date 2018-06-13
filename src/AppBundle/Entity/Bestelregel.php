<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bestelregel
 *
 * @ORM\Table(name="bestelregel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelregelRepository")
 */
class Bestelregel
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
     * @var int
     *
     * @ORM\Column(name="bestellingid", type="integer")
     * @ORM\ManyToOne(targetEntity="Bestelopdracht", inversedBy="bestellingen")
     * @ORM\JoinColumn="bestelordernummer", referencedColumnName="bestellingid")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    public $bestellingid;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnr", type="integer")
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="")
     * @ORM\JoinColumn="artikel", referencedColumnName="artikelnr")
     *
     */
    public $artikelnr;

    /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    public $hoeveelheid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ontvangstdatum", type="date", nullable=true)
     */
    private $ontvangstdatum;

    /**
     * @var int
     *
     * @ORM\Column(name="keuringseis", type="integer")
     * @Assert\Length(
     *      min = 4,
     *      max = 4,
     *      minMessage = "keuringseis moet 4 cijfers hebben",
     *      maxMessage = "keuringseis moet 4 cijfers hebben"
     *)
     */
    public $keuringseis;




    /**
     * Set id
     *
     * @param int $id
     *
     * @return Bestelregel
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
     * Set bestellingid
     *
     * @param integer $bestellingid
     *
     * @return Bestelregel
     */
    public function setBestellingid($bestellingid)
    {
        $this->bestellingid = $bestellingid;

        return $this;
    }

    /**
     * Get bestellingid
     *
     * @return int
     */
    public function getOmschrijving()
    {
        return $this->bestellingid;
    }

    /**
     * Set artikelnr
     *
     * @param integer $artikelnr
     *
     * @return Bestelregel
     */
    public function setOmschrijving($artikelnr)
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
     * @return Bestelregel
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
     * Set ontvangstdatum
     *
     * @param \DateTime $ontvangsdatum
     */
    public function setOntvangstdatum($ontvangstdatum)
    {
        $this->ontvangstdatum = $ontvangstdatum;
    }

    /**
     * Get ontvangstdatum
     *
     * @return \DateTime
     */
    public function getOntvangstdatum()
    {
        return $this->ontvangstdatum;
    }

    /**
     * Set keuringseis
     *
     * @param integer $keuringseis
     *
     * @return Bestelregel
     */
    public function setKeuringsEis($keuringseis)
    {
        $this->keuringseis = $keuringseis;

        return $this;
    }

    /**
     * Get keuringseis
     *
     * @return int
     */
    public function getKeuringsEis()
    {
        return $this->keuringseis;
    }

}
