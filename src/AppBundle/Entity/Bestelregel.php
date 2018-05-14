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
     *
     *
     * @ORM\Column(name="artikelid")
     */
    private $artikel;

    /**
     *
     *
     * @ORM\Column(name="bestellingid")
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="bestelregels")
     * @ORM\ManyToOne(targetEntity="Bestelopdracht", inversedBy="bestelregels")
     * @ORM\JoinColumn(name="artikelid", referencedColumnName="artikelid")
     */
    private $bestelling;


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
     * Set artikel
     *
     *
     * @return Bestelregel
     */
    public function setArtikel($artikel)
    {
        $this->artikel = $artikel;

        return $this;
    }

    /**
     * Get artikelid
     *
     */
    public function getArtikel()
    {
        return $this->artikel;
    }

    /**
     * Set bestelling
     *
     * @param string $bestelling
     *
     * @return Bestelregel
     */
    public function setBestelling($bestelling)
    {
        $this->bestelling = $bestelling;

        return $this;
    }

    /**
     * Get bestelling
     *
     * @return string
     */
    public function getBestelling()
    {
        return $this->bestelling;
    }
}
