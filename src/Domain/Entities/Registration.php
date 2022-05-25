<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use DateTimeInterface;

final class Registration
{
    private string $nome;
    private Email $email;
    private DateTimeInterface $birthDate;
    private Cpf $registrationNumber;
    private DateTimeInterface $registrationAt;

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of birthDate
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set the value of birthDate
     *
     * @return  self
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get the value of registrationNumber
     */
    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    /**
     * Set the value of registrationNumber
     *
     * @return  self
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * Get the value of registrationAt
     */
    public function getRegistrationAt()
    {
        return $this->registrationAt;
    }

    /**
     * Set the value of registrationAt
     *
     * @return  self
     */
    public function setRegistrationAt($registrationAt)
    {
        $this->registrationAt = $registrationAt;

        return $this;
    }
}
