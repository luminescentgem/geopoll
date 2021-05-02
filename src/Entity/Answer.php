<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=1)
	 */
	private $question;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $option;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

	/**
	 * @ORM\Column(type="string", length=255)
	 */

	public function getId(): ?int
         	{
         		return $this->id;
         	}

	public function getQuestion(): ?string
         	{
         		return $this->question;
         	}

	public function setQuestion(string $question): self
         	{
         		$this->question = $question;
         
         		return $this;
         	}

	public function getOption(): ?int
         	{
         		return $this->option;
         	}

	public function setOption(int $option): self
         	{
         		$this->option = $option;
         
         		return $this;
         	}

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
