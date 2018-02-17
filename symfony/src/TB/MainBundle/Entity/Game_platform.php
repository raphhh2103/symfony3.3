<?php

namespace TB\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game_platform
 *
 * @ORM\Table(name="game_platform")
 * @ORM\Entity(repositoryClass="TB\MainBundle\Repository\Game_platformRepository")
 */
class Game_platform
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
     * @var Jeux
     * @ORM\ManyToOne(targetEntity="TB\MainBundle\Entity\Jeux", inversedBy="gamePlatforms")
     */
    private $jeux;

    /**
     * @var Platform
     * @ORM\ManyToOne(targetEntity="TB\MainBundle\Entity\Platform")
     */
    private $platform;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateSortie", type="date")
     */
    private $dateSortie;

    /**
     * @var int
     *
     * @ORM\Column(name="Prix", type="float")
     */
    private $prix;


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
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     *
     * @return Game_platform
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Game_platform
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return Jeux
     */
    public function getJeux()
    {
        return $this->jeux;
    }

    /**
     * @param Jeux $jeux
     * @return Game_platform
     */
    public function setJeux($jeux)
    {
        $this->jeux = $jeux;
        return $this;
    }

    /**
     * @return Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param Platform $platform
     * @return Game_platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
        return $this;
    }
}

