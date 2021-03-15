<?php

namespace App\Entity;

use App\Enum\Sex;
use App\Helper\DateTimeHelper;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     *
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastName;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthDate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sex;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="users")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCheckPoint", mappedBy="user")
     */
    private $userCheckPoint;

    /**
     * @var UserType
     * @ORM\ManyToOne(targetEntity="App\Entity\UserType", inversedBy="user")
     */
    private $userType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="users")
     */
    private $organization;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRace", mappedBy="user")
     */
    private $userRace;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notifications", mappedBy="user")
     */
    private $notifications;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserNotifications", mappedBy="user")
     */
    private $userNotifications;

    public function __construct()
    {
        $this->userCheckPoint = new ArrayCollection();
        $this->userRace = new ArrayCollection();
        $this->notifications = new ArrayCollection();
        $this->userNotifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birthDate;
    }

    /** @return string */
    public function getBirthDateFormatted(): string
    {
        return $this->birthDate->format(DateTimeHelper::DEFAULT_DATE_FORMAT);
    }

    public function setBirthDate(DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getSex(): ?bool
    {
        return $this->sex;
    }

    /** @return string */
    public function getSexName():string
    {
        return Sex::getById($this->sex);
    }

    public function setSex(int $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|UserCheckPoint[]
     */
    public function getUserCheckPoint(): Collection
    {
        return $this->userCheckPoint;
    }

    public function addUserCheckPoint(UserCheckPoint $userCheckPoint): self
    {
        if (!$this->userCheckPoint->contains($userCheckPoint)) {
            $this->userCheckPoint[] = $userCheckPoint;
            $userCheckPoint->setUser($this);
        }

        return $this;
    }

    public function removeUserCheckPoint(UserCheckPoint $userCheckPoint): self
    {
        if ($this->userCheckPoint->removeElement($userCheckPoint)) {
            // set the owning side to null (unless already changed)
            if ($userCheckPoint->getUser() === $this) {
                $userCheckPoint->setUser(null);
            }
        }

        return $this;
    }

    public function getUserType(): ?UserType
    {
        return $this->userType;
    }

    public function getUserTypeName()
    {
        if($this->userType){
            return $this->userType->getName();
        }
        return '';
    }

    public function setUserType(?UserType $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @return Collection|UserRace[]
     */
    public function getUserRace(): Collection
    {
        return $this->userRace;
    }

    public function addUserRace(UserRace $userRace): self
    {
        if (!$this->userRace->contains($userRace)) {
            $this->userRace[] = $userRace;
            $userRace->setUser($this);
        }

        return $this;
    }

    public function removeUserRace(UserRace $userRace): self
    {
        if ($this->userRace->removeElement($userRace)) {
            // set the owning side to null (unless already changed)
            if ($userRace->getUser() === $this) {
                $userRace->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notifications[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notifications $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setUser($this);
        }

        return $this;
    }

    public function removeNotification(Notifications $notification): self
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getUser() === $this) {
                $notification->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserNotifications[]
     */
    public function getUserNotifications(): Collection
    {
        return $this->userNotifications;
    }

    public function addUserNotification(UserNotifications $userNotification): self
    {
        if (!$this->userNotifications->contains($userNotification)) {
            $this->userNotifications[] = $userNotification;
            $userNotification->setUser($this);
        }

        return $this;
    }

    public function removeUserNotification(UserNotifications $userNotification): self
    {
        if ($this->userNotifications->removeElement($userNotification)) {
            // set the owning side to null (unless already changed)
            if ($userNotification->getUser() === $this) {
                $userNotification->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(): void
    {
        $this->createdAt = DateTimeHelper::getNew();
    }

}
