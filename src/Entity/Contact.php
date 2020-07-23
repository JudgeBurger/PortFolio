<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Ce champ est requis.")
     * @Assert\Length(
     *     min="2",
     *     max="100",
     *     maxMessage="Votre Nom ne peut pas excéder {{ limit }} caractères"
     * )
     *
     */
    private $firstname;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Ce champ est requis.")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre Prénom ne peut pas excéder {{ limit }} caractères"
     * )
     *
     */
    private $lastname;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Ce champ est requis.")
     */
    private $company;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]{10}/"
     * )
     *
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Ce champ est requis.")
     * @Assert\Length(min="10")
     */
    private $message;

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     * @return Contact
     */
    public function setFirstname(?string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return Contact
     */
    public function setLastname(?string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     * @return Contact
     */
    public function setCompany(?string $company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Contact
     */
    public function setPhoneNumber(?string $phoneNumber): Contact
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }


}
