<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class UserRace
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $registrationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserRaceStatus", inversedBy="userRace")
     */
    private $userRaceStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userRace")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Race", inversedBy="userRace")
     */
    private $race;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserRaceStatus(): ?UserRaceStatus
    {
        return $this->userRaceStatus;
    }

    public function setUserRaceStatus(?UserRaceStatus $userRaceStatus): self
    {
        $this->userRaceStatus = $userRaceStatus;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }
}
