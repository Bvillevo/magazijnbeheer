<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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

   //  public function __toString()
   // {
   //     return strval($this->bestelordernummer);
   // }


    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=20)
     * @Assert\Length(
     *      min = 0,
     *      max = 6,
     *      minMessage = "leverancier moet minimaal 1  karakter hebben",
     *      maxMessage = "leverancier mag maximaal 6 karakters hebben"
     *)
     */
    private $leverancier;


    /**
     * @var int
     *
     *
     * @ORM\OneToMany(targetEntity="Bestelregel", mappedBy="bestellingid")
     */
    private $bestellingen;


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
     * Set bestellingen
     *
     * @param string $bestellingen
     *
     * @return Bestelopdracht
     */
    public function setBestellingen($bestellingen)
    {
        $this->bestellingen = $bestellingen;

        return $this;
    }

    /**
     * Get bestellingen
     *
     * @return string
     */
    public function getBestellingen()
    {
        return $this->bestellingen;
    }

    public function __toString()
    {
        return (string) $this->bestelordernummer;
    }

    public function __construct()
   {
       $this->bestellingen = new ArrayCollection();
   }


}
