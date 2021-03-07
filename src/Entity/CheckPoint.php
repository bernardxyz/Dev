<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class CheckPoint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Race", inversedBy="checkpoint")
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CheckPointType", inversedBy="checkPoint")
     */
    private $checkPointType;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCheckPoint", mappedBy="checkPoint")
     */
    private $userCheckPoint;

    public function __construct()
    {
        $this->userCheckPoint = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

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

    public function getCheckPointType(): ?CheckPointType
    {
        return $this->checkPointType;
    }

    public function setCheckPointType(?CheckPointType $checkPointType): self
    {
        $this->checkPointType = $checkPointType;

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
            $userCheckPoint->setCheckPoint($this);
        }

        return $this;
    }

    public function removeUserCheckPoint(UserCheckPoint $userCheckPoint): self
    {
        if ($this->userCheckPoint->removeElement($userCheckPoint)) {
            // set the owning side to null (unless already changed)
            if ($userCheckPoint->getCheckPoint() === $this) {
                $userCheckPoint->setCheckPoint(null);
            }
        }

        return $this;
    }
}
