
namespace TB\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="TB\MainBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @var Picture
     * @ORM\OneToOne(targetEntity="TB\MainBundle\Entity\Picture", cascade={"persist"})
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="UserLastName", type="string", length=255)
     */
    private $userLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="UserFirstName", type="string", length=255)
     */
    private $userFirstName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UserBirthDate", type="date", nullable=true)
     */
    private $userBirthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="UserAddress", type="string", length=255, nullable=true)
     */
    private $userAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="UserEmail", type="string", length=255, unique=true)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="UserPassword", type="string", length=255)
     */
    private $userPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="UserSalt", type="string", length=255)
     */
    private $userSalt;

    /**
     * @var array
     *
     * @ORM\Column(name="UserRoles", type="array")
     */
    private $userRoles;


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
     * Set userLastName
     *
     * @param string $userLastName
     *
     * @return User
     */
    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;

        return $this;
    }

    /**
     * Get userLastName
     *
     * @return string
     */
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    /**
     * Set userFirstName
     *
     * @param string $userFirstName
     *
     * @return User
     */
    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;

        return $this;
    }

    /**
     * Get userFirstName
     *
     * @return string
     */
    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    /**
     * Set userBirthDate
     *
     * @param \DateTime $userBirthDate
     *
     * @return User
     */
    public function setUserBirthDate($userBirthDate)
    {
        $this->userBirthDate = $userBirthDate;

        return $this;
    }

    /**
     * Get userBirthDate
     *
     * @return \DateTime
     */
    public function getUserBirthDate()
    {
        return $this->userBirthDate;
    }

    /**
     * Set userAddress
     *
     * @param string $userAddress
     *
     * @return User
     */
    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;

        return $this;
    }

    /**
     * Get userAddress
     *
     * @return string
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     *
     * @return User
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set userSalt
     *
     * @param string $userSalt
     *
     * @return User
     */
    public function setUserSalt($userSalt)
    {
        $this->userSalt = $userSalt;

        return $this;
    }

    /**
     * Get userSalt
     *
     * @return string
     */
    public function getUserSalt()
    {
        return $this->userSalt;
    }

    /**
     * Set userRoles
     *
     * @param array $userRoles
     *
     * @return User
     */
    public function setUserRoles($userRoles)
    {
        $this->userRoles = $userRoles;

        return $this;
    }

    /**
     * Get userRoles
     *
     * @return array
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    /**
     * @return Picture
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param Picture $photo
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return $this->getUserRoles();
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getUserPassword();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return $this->getUserSalt();
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getUserEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}

