<?php

namespace App\Entity;

use App\Repository\UserCheckPointRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserCheckPointRepository::class)
 */
class UserCheckPoint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $time;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userCheckPoint")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CheckPoint", inversedBy="userCheckPoint")
     */
    private $checkPoint;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setUserCheckPoint($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserCheckPoint() === $this) {
                $user->setUserCheckPoint(null);
            }
        }

        return $this;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCheckPoint(): ?CheckPoint
    {
        return $this->checkPoint;
    }

    public function setCheckPoint(?CheckPoint $checkPoint): self
    {
        $this->checkPoint = $checkPoint;

        return $this;
    }
}
