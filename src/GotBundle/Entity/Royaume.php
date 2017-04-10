<?php

namespace GotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Royaume
 *
 * @ORM\Table(name="royaume")
 * @ORM\Entity(repositoryClass="GotBundle\Repository\RoyaumeRepository")
 */
class Royaume
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="capitale", type="string", length=255)
     */
    private $capitale;

    /**
     * @var int
     *
     * @ORM\Column(name="nbhabitant", type="integer")
     */
    private $nbhabitant;


    /**
     * @ORM\OneToMany(targetEntity="Personnage", mappedBy="royaume")
     */
    private $personnage;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Royaume
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set capitale
     *
     * @param string $capitale
     *
     * @return Royaume
     */
    public function setCapitale($capitale)
    {
        $this->capitale = $capitale;

        return $this;
    }

    /**
     * Get capitale
     *
     * @return string
     */
    public function getCapitale()
    {
        return $this->capitale;
    }

    /**
     * Set nbhabitant
     *
     * @param integer $nbhabitant
     *
     * @return Royaume
     */
    public function setNbhabitant($nbhabitant)
    {
        $this->nbhabitant = $nbhabitant;

        return $this;
    }

    /**
     * Get nbhabitant
     *
     * @return int
     */
    public function getNbhabitant()
    {
        return $this->nbhabitant;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personnage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add personnage
     *
     * @param \GotBundle\Entity\Personnage $personnage
     *
     * @return Royaume
     */
    public function addPersonnage(\GotBundle\Entity\Personnage $personnage)
    {
        $this->personnage[] = $personnage;

        return $this;
    }

    /**
     * Remove personnage
     *
     * @param \GotBundle\Entity\Personnage $personnage
     */
    public function removePersonnage(\GotBundle\Entity\Personnage $personnage)
    {
        $this->personnage->removeElement($personnage);
    }

    /**
     * Get personnage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }
}
