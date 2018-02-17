<?php

namespace TB\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Platform
 *
 * @ORM\Table(name="platform")
 * @ORM\Entity(repositoryClass="TB\MainBundle\Repository\PlatformRepository")
 */
class Platform
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
     * @ORM\Column(name="PlatformName", type="string", length=255)
     */
    private $platformName;


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
     * Set platformName
     *
     * @param string $platformName
     *
     * @return Platform
     */
    public function setPlatformName($platformName)
    {
        $this->platformName = $platformName;

        return $this;
    }

    /**
     * Get platformName
     *
     * @return string
     */
    public function getPlatformName()
    {
        return $this->platformName;
    }
}

