<?php

namespace TB\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Asserts;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="TB\MainBundle\Repository\PictureRepository")
 */
class Picture
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
     * @ORM\ManyToOne(targetEntity="TB\MainBundle\Entity\Jeux", inversedBy="pictures")
     * @ORM\JoinColumn(nullable=true)
     */
    private $jeux;

    /**
     * @var string
     *
     * @ORM\Column(name="PictureURL", type="string", length=255)
     */
    private $pictureURL;

    /**
     * @var mixed
     *
     * @Asserts\All({
     * @Asserts\File(
     *     mimeTypes={"image/jpeg", "image/png"},
     *     mimeTypesMessage="le format n'est pas valide",
     *     maxSize="10M",
     *     maxSizeMessage="fichier trop grand")
     * })
     */
    private $files;


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
     * Set pictureURL
     *
     * @param string $pictureURL
     *
     * @return Picture
     */
    public function setPictureURL($pictureURL)
    {
        $this->pictureURL = $pictureURL;

        return $this;
    }

    /**
     * Get pictureURL
     *
     * @return string
     */
    public function getPictureURL()
    {
        return $this->pictureURL;
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
     * @return Picture
     */
    public function setJeux($jeux)
    {
        $this->jeux = $jeux;
        return $this;
    }

    /**
     * @param UploadedFile $files
     * @return Picture
     */
    public function setFiles($files)
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return UploadedFile
     */
    public function getFiles()
    {
        return $this->files;
    }
}

