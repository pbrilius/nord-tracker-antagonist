<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
    private $Comment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateStarted;

    /**
     * @ORM\Column(type="dateinterval", nullable=true)
     */
    private $timeSpent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->Comment;
    }

    public function setComment(?string $Comment): self
    {
        $this->Comment = $Comment;

        return $this;
    }

    public function getDateStarted(): ?\DateTimeInterface
    {
        return $this->dateStarted;
    }

    public function setDateStarted(\DateTimeInterface $dateStarted): self
    {
        $this->dateStarted = $dateStarted;

        return $this;
    }

    public function getTimeSpent(): ?\DateInterval
    {
        return $this->timeSpent;
    }

    public function setTimeSpent(?\DateInterval $timeSpent): self
    {
        $this->timeSpent = $timeSpent;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'comment' => $this->Comment,
            'dateStarted' => $this->dateStarted->format('Y-m-d H:i:s'),
            'timeSpent' => $this->timeSpent->format('%hh %mm'),
        ];
    }
}
