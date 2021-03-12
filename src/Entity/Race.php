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
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="races")
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
    private $organization;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CheckPoint", mappedBy="race")
     */
    private $checkpoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserRace", mappedBy="race")
     */
    private $userRace;

    public function __construct()
    {
        $this->checkpoints = new ArrayCollection();
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
     * @return Collection|CheckPoint[]
     */
    public function getCheckpoints(): Collection
    {
        return $this->checkpoints;
    }

    public function addCheckpoints(CheckPoint $checkpoint): self
    {
        if (!$this->checkpoints->contains($checkpoint)) {
            $this->checkpoints[] = $checkpoint;
            $checkpoint->setRace($this);
        }

        return $this;
    }

    public function removeCheckpoints(CheckPoint $checkpoint): self
    {
        if ($this->checkpoints->removeElement($checkpoint)) {
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
