<?php

namespace App\Entity;

use App\Repository\NotificationsRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotificationsRepository::class)
 */
class Notifications
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
     * @ORM\Column(type="datetime")
     */
    private $createtAt;

    /**
     * @ORM\Column(type="text")
     */
    private $text;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notifications")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="notifications")
     */
    private $organization;
    
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

    public function getCreatetAt(): ?DateTimeInterface
    {
        return $this->createtAt;
    }

    public function setCreatetAt(DateTimeInterface $createtAt): self
    {
        $this->createtAt = $createtAt;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

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

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }
}
