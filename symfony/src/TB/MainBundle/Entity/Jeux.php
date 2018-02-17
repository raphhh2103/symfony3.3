<?php

namespace TB\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Asserts;

/**
 * Jeux
 *
 * @ORM\Table(name="jeux")
 * @ORM\Entity(repositoryClass="TB\MainBundle\Repository\JeuxRepository")
 */
class Jeux
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
     * @var Game_platform[]
     * @ORM\OneToMany(targetEntity="TB\MainBundle\Entity\Game_platform", mappedBy="jeux")
     */
    private $gamePlatforms;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="TB\MainBundle\Entity\Category")
     */
    private $category;

    /**
     * @var Picture[]
     * @ORM\OneToMany(targetEntity="TB\MainBundle\Entity\Picture", mappedBy="jeux")
     */
    private $pictures;

    /**
     * @var string
     *
     * @ORM\Column(name="JeuxName", type="string", length=255)
     * @Asserts\Length(
     *     min=2,
     *     minMessage="Le champs que vous avez rempli doit faire minimum 2 caractères",
     *     max=25,
     *     maxMessage="trop long"
     * )
     */
    private $jeuxName;


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
     * Set jeuxName
     *
     * @param string $jeuxName
     *
     * @return Jeux
     */
    public function setJeuxName($jeuxName)
    {
        $this->jeuxName = $jeuxName;

        return $this;
    }

    /**
     * Get jeuxName
     *
     * @return string
     */
    public function getJeuxName()
    {
        return $this->jeuxName;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Jeux
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Picture[]
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * @param Picture[] $pictures
     */
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;
    }

    /**
     * @return Game_platform[]
     */
    public function getGamePlatforms()
    {
        return $this->gamePlatforms;
    }

    /**
     * @param Game_platform $gamePlatform
     * @return Jeux
     */
    public function addGamePlatform($gamePlatform)
    {
        $this->gamePlatforms[] = $gamePlatform;
        return $this;
    }

    public function __construct()
    {
        $this->gamePlatforms = [];
    }

    /**
     * @param Game_platform[] $gamePlatforms
     * @return Jeux
     */
    public function setGamePlatforms($gamePlatforms)
    {
        $this->gamePlatforms = $gamePlatforms;
        return $this;
    }
}

