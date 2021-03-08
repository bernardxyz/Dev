<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
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
    private $location;

    /**
     * @ORM\Column(type="date")
     */
    private $registrationDate;

    /**
     * @ORM\Column(type="float")
     */
    private $raceLength;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalCheckPoints;

    /**
     * @ORM\Column(type="time")
     */
    private $startTime;

    /**
     * @ORM\Column(type="time")
     */
    private $maxTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="race")
     * @JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RaceType", inversedBy="race")
     */
    private $racetype;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="race")
     */
    private $organizaion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CheckPoint", mappedBy="race")
     */
    private $checkpoint;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRace", mappedBy="race")
     */
    private $userRace;

    public function __construct()
    {
        $this->checkpoint = new ArrayCollection();
        $this->userRace = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getRegistrationDate(): ?DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getRaceLength(): ?float
    {
        return $this->raceLength;
    }

    public function setRaceLength(float $raceLength): self
    {
        $this->raceLength = $raceLength;

        return $this;
    }

    public function getTotalCheckPoints(): ?int
    {
        return $this->totalCheckPoints;
    }

    public function setTotalCheckPoints(int $totalCheckPoints): self
    {
        $this->totalCheckPoints = $totalCheckPoints;

        return $this;
    }

    public function getStartTime(): ?DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getMaxTime(): ?DateTimeInterface
    {
        return $this->maxTime;
    }

    public function setMaxTime(DateTimeInterface $maxTime): self
    {
        $this->maxTime = $maxTime;

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

    public function getRacetype(): ?RaceType
    {
        return $this->racetype;
    }

    public function setRacetype(?RaceType $racetype): self
    {
        $this->racetype = $racetype;

        return $this;
    }

    public function getOrganizaion(): ?Organization
    {
        return $this->organizaion;
    }

    public function setOrganizaion(?Organization $organizaion): self
    {
        $this->organizaion = $organizaion;

        return $this;
    }

    /**
     * @return Collection|CheckPoint[]
     */
    public function getCheckpoint(): Collection
    {
        return $this->checkpoint;
    }

    public function addCheckpoint(CheckPoint $checkpoint): self
    {
        if (!$this->checkpoint->contains($checkpoint)) {
            $this->checkpoint[] = $checkpoint;
            $checkpoint->setRace($this);
        }

        return $this;
    }

    public function removeCheckpoint(CheckPoint $checkpoint): self
    {
        if ($this->checkpoint->removeElement($checkpoint)) {
            // set the owning side to null (unless already changed)
            if ($checkpoint->getRace() === $this) {
                $checkpoint->setRace(null);
            }
        }

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
            $userRace->setRace($this);
        }

        return $this;
    }

    public function removeUserRace(UserRace $userRace): self
    {
        if ($this->userRace->removeElement($userRace)) {
            // set the owning side to null (unless already changed)
            if ($userRace->getRace() === $this) {
                $userRace->setRace(null);
            }
        }

        return $this;
    }
}
