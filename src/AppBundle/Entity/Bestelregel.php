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
     * @ORM\Column(name="artikelid", type="integer")
     */
    private $artikelid;

    /**
     * @var integer
     *
     * @ORM\Column(name="bestellingid", type="integer")
     */
    private $bestellingid;


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
     * Set artikelid
     *
     * @param integer $artikelid
     *
     * @return Bestelregel
     */
    public function setArtikelid($artikelid)
    {
        $this->artikelid = $artikelid;

        return $this;
    }

    /**
     * Get artikelid
     *
     * @return int
     */
    public function getArtikelid()
    {
        return $this->artikelid;
    }

    /**
     * Set bestellingid
     *
     * @param string $bestellingid
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
     * @return string
     */
    public function getBestellingid()
    {
        return $this->bestellingid;
    }
}
