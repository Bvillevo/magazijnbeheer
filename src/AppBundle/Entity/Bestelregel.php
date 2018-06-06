<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
