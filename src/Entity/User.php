<?php

namespace App\Entity;

use App\Repository\PostRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="user")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCheckPoint", mappedBy="user")
     */
    private $userCheckPoint;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserType", inversedBy="user")
     */
    private $userType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="user")
     */
    private $organization;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRace", mappedBy="user")
     */
    private $userRace;

    public function __construct()
    {
        $this->userCheckPoint = new ArrayCollection();
        $this->userType = new ArrayCollection();
        $this->userRace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $value): self
    {
        $this->firstName = $value;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $value): self
    {
        $this->lastName = $value;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->firstName.' '. $this->lastName;
    }

    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birthDate;
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

    public function setSex(bool $sex): self
    {
        $this->sex = $sex;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUserCheckPoint(): ArrayCollection
    {
        return $this->userCheckPoint;
    }

    public function setUserCheckPoint(?UserCheckPoint $userCheckPoint): self
    {
        $this->userCheckPoint = $userCheckPoint;

        return $this;
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

    public function getUserType(): ArrayCollection
    {
        return $this->userType;
    }

    public function setUserType(?UserType $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    public function addUserType(UserType $userType): self
    {
        if (!$this->userType->contains($userType)) {
            $this->userType[] = $userType;
            $userType->setUser($this);
        }

        return $this;
    }

    public function removeUserType(UserType $userType): self
    {
        if ($this->userType->removeElement($userType)) {
            // set the owning side to null (unless already changed)
            if ($userType->getUser() === $this) {
                $userType->setUser(null);
            }
        }

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

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }
}
